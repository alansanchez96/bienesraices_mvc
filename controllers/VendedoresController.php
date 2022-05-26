<?php 

    namespace Controllers;
    use MVC\Router;
    use Model\Propiedad;
    use Model\Vendedor;
    use Intervention\Image\ImageManagerStatic as Img;

class VendedoresController {

    public static function create(Router $router){
        
        $vendedores = new Vendedor;
        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
            $vendedores = new Vendedor($_POST['vendedores']);
            
            $imagen = $_FILES['vendedores']['tmp_name']['imagen'];
            $nombreImagen = md5( uniqid( rand(), true )) . ".jpg";
    
            if($imagen){
                $img = Img::make($imagen)->fit(800,600);
                $vendedores->setImagen($nombreImagen);
            }
    
            $errores = $vendedores->validar();
            
            if(empty($errores)){
                
                if(!is_dir(CARPETA_PROFILES_IMG)){
                    mkdir(CARPETA_PROFILES_IMG);
                }
                $img->save(CARPETA_PROFILES_IMG . $nombreImagen);
                
                $vendedores->guardar();
                
    
            }
        }

        $router -> render('vendedores/create',[
            'vendedores' => $vendedores,
            'errores' => $errores,
        ]);
    }
    
    public static function update(Router $router){
        
        $id = validarId('admin');

        $vendedores = Vendedor::find($id);
        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $args = $_POST['vendedores'];
    
            $imagen = $_FILES['vendedores']['tmp_name']['imagen'];
            
            $nombreImagen = md5( uniqid( rand(), true )) . ".jpg";
    
            if($imagen){
                $img = Img::make($imagen)->fit(800,600);
                $vendedores->setImagen($nombreImagen);
            }
            $vendedores->sincronizar($args);
            
            $errores = $vendedores->validar();
            
    
            if(empty($errores)){
    
                if($imagen){
                   $img->save(CARPETA_PROFILES_IMG . $nombreImagen);
                }
    
                $vendedores->guardar();
            }
    
        }

        $router -> render('vendedores/update',[
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
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }

    }



}