<?php 

namespace MVC;

class Router{

    public $rutasGET = [];
    public $rutasPOST = [];

    public function getUrl($url , $fn){
        $this->rutasGET[$url] = $fn;
    }
    public function postUrl($url , $fn){
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas(){

        session_start();
        $auth = $_SESSION['login'] ?? null;

        $rutasProtegidas = ['/admin','/propiedades/create','/propiedades/update','/propiedades/delete','/vendedores/create','/vendedores/update','/vendedores/delete'];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if($method === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        }
        elseif ($method === 'POST') {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        if(in_array($urlActual, $rutasProtegidas) && !$auth){
            header('Location: /');
        }

        if($fn){
            call_user_func($fn, $this);
            
        }
        else{
            echo "404 error";
        }

    }

        // Views
    public function render($view, $datos = [] ){

        foreach($datos as $key => $value){
            $$key = $value;
        }


        ob_start();
        include __DIR__ . "/view/$view.php";
    
        $contenido = ob_get_clean();
        include __DIR__ . "/view/layout.php";

    }

}

