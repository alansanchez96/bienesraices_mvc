<?php 

    namespace Controllers;
    use MVC\Router;
    use Model\Propiedad;
    use Model\Vendedor;
    use Intervention\Image\ImageManagerStatic as Img;

class PropiedadController {

    public static function index(Router $router){
        
        $propiedades = Propiedad::all();
        $resultado = $_GET['resultado'] ?? null;

        $vendedores = Vendedor::all();

        $router->render('propiedades/admin', [
            'propiedad' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);

    }
    public static function create(Router $router){
        
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();


        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $propiedad = new Propiedad($_POST['propiedad']);
            /* debuguear($propiedad); */
    
            // Agregar una propiedad al arreglo vacio
            $imagen = $_FILES['propiedad']['tmp_name']['imagen'];
            $nombreImagen = md5( uniqid( rand(), true )) . ".jpg";
            if($imagen){
                $img = Img::make($imagen)->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }
    
            $errores = $propiedad->validar();
            
            if(empty($errores)){                // Si a errores no se le agregan los valores del arreglo y sigue vacío
                
                // Crear la carpeta del directorio - mkdir()
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }
                // Guardar Imagen con una funcion que otorga Intervention
                $img->save(CARPETA_IMAGENES . $nombreImagen);
                
                $propiedad -> guardar();
            }
        }

        $router->render('propiedades/create', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);

    }
    public static function update(Router $router){
        
        $id = validarId('admin');

        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['propiedad'];
            $propiedad->sincronizar($args);
            $errores = $propiedad -> validar();
            // Validacion Subida de archivos
            $imagen = $_FILES['propiedad']['tmp_name']['imagen'];
            $nombreImagen = md5( uniqid( rand(), true )) . ".jpg";
    
    
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $img = Img::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }
            /* 6977ab0b70a196b0e8a0bfb793b57e7c */  
            if(empty($errores)){
                if($_FILES['propiedad']['tmp_name']['imagen']) {
                    $img->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $propiedad -> guardar();
            }
        }

        $router -> render('propiedades/update', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);

    }

    public static function delete(){
        
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){
 
            $tipo = $_POST['tipo'];
            if( validarTipoContenido($tipo) ){
                $propiedad = Propiedad::find($id);
                $propiedad->eliminar();
            }

        }
    }
    }



}