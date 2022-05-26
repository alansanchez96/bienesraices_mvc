<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController {
    public static function login(Router $router){

        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $auth = new Admin($_POST);

            $errores = $auth -> validar();
            
            
            if(empty($errores)){
                    // Comprobar que el usuario existe
                $resultado = $auth -> existeUsuario();
                
                if(!$resultado){
                    $errores = Admin::getErrores();
                }
                else{
                        // Comprobar que la contraseña sea correcta
                    $autenticado = $auth -> comprobarPassword($resultado);
                    if($autenticado){
                        // Si está autenticado
                        $auth -> autenticado();
                    }else{    
                        // Si es incorrecto
                        $errores = Admin::getErrores();
                    }
                }

            }

        }

        $router->render('auth/login',[
            'errores' => $errores
        ]);
    } 

    public static function logout(Router $router){

        session_start();

        $_SESSION = [];

        header('Location: /');
    } 
}