<?php


namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Blog;
use PHPMailer\PHPMailer\PHPMailer;
use Intervention\Image\ImageManagerStatic as Img;

class PageController {
    public static function index(Router $router){

        $propiedades = Propiedad::getLimit(3);
        $blog = Blog::getLimit(2);
        $inicio = true;

        $router->render('pages/index', [
            'propiedades'=>$propiedades,
            'inicio'=>$inicio,
            'blog' => $blog
        ]);
    }


    public static function propiedades(Router $router){

        $propiedades = Propiedad::all();

        $router->render('pages/propiedades',[
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router){

        $id = validarId('/');
        $propiedades = Propiedad::find($id);

        $router->render('pages/propiedad',[
            'propiedad' => $propiedades
        ]);
    }


    public static function nosotros(Router $router){
        $router->render('pages/nosotros');
    }

    public static function contacto(Router $router){
        
        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $resultado = $_POST['contacto'];


            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io'; 
            $mail->SMTPAuth =true;
            $mail->Username = '1fc07c2e83af5e';
            $mail->Password = 'bad3f9441b0970';
            $mail->SMTPSecure = 'tls';
            $mail->Port =2525;

                // Configurar contenido del mail
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje capo';

                // Habilitar HTML al mail
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            $contenido = '<html>';
            $contenido .= '<p>Hola ' . $resultado['nombre'] . '</p>';
            
            if($resultado['contactar'] === 'telefono'){
                $contenido .= '<p>El cliente solicitó ser comunicado por Telefono<p>';

                $contenido .= '<p>Telefono:  ' . $resultado['telefono'] . '</p>';
                $contenido .= '<p>Fecha:  ' . $resultado['fecha'] . '</p>';
                $contenido .= '<p>Hora:  ' . $resultado['hora'] . '</p>';
            }elseif($resultado['contactar'] === 'email'){
                $contenido .= '<p>El cliente solicitó ser comunicado por Email<p>';
                
                $contenido .= '<p>Email:  ' . $resultado['email'] . '</p>';
            }

            $contenido .= '<p>Mensaje:  ' . $resultado['mensaje'] . '</p>';
            $contenido .= '<p>Presupuesto:  ' . $resultado['presupuesto'] . '</p>';
            $contenido .= '<p>Tipo de negocio:  ' . $resultado['tipo'] . '</p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Mensaje para Apis de emails que no soportan HTML';

            /* debuguear($mail); */
                // Definir un comentario
            if($mail->send()){
                $mensaje = "Mensaje enviado correctamente.";
            } else {
                $mensaje = "Error inesperado. Mensaje no enviado.";
            }

        }
        
        $router -> render ('pages/contacto',[
            'mensaje' => $mensaje
        ]);        
    }



    public static function blog(Router $router){

        $resultado = $_GET['resultado'] ?? null;
        

        $blog = Blog::getLimit(3);

        $router -> render ('pages/blog',[
            "resultado" => $resultado,
            "blog" => $blog
        ]);
    }


    public static function createBlog(Router $router){
        
        $blog = new Blog;
        $errores = Blog::getErrores();       

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $blog = new Blog($_POST['blog']);

            $imagen = $_FILES['blog']["tmp_name"]["imagen"];
            $nombreImagen = md5( uniqid( rand(), true )) . ".jpg";
            
            if($imagen){
                $img = Img::make($imagen)->fit(800,600);
                $blog->setImagen($nombreImagen);
            }
            
            $errores = $blog->validar();
            
            if(empty($errores)){
                
                if(!is_dir(CARPETA_BLOG_IMG)){
                    mkdir(CARPETA_BLOG_IMG);
                }
                $img->save(CARPETA_BLOG_IMG . $nombreImagen);

                $blog -> guardar();
            }
        }


        $router -> render ('blog/create-blog', [
            "errores" => $errores,
            "blog" => $blog
        ]);
    }

    public static function view(Router $router){
        
        $resultado = $_GET['resultado'] ?? null;
        $blog = Blog::all();

        $router->render('blog/admin-blog',[
            "blog" => $blog,
            "resultado" => $resultado
        ]);

    }

    public static function entrada(Router $router){

        $id = validarId('/');
        $blog = Blog::find($id);
     
        $router -> render ('blog/entrada',[
            "blog" => $blog
        ]);
    }


    public static function delete(){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id){
    
                $tipo = $_POST['tipo'];
                if( validarTipoContenido($tipo) ){
                    $propiedad = Blog::find($id);
                    $propiedad->eliminar();
                }
    
            }
        }
        }

}