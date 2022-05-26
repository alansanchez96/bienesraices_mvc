<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');
define('CARPETA_PROFILES_IMG', $_SERVER['DOCUMENT_ROOT'] . '/imagenes_vendedores/');
define('CARPETA_BLOG_IMG', $_SERVER['DOCUMENT_ROOT'] . '/imagenes_blog/');

function incluirTemplate( string $nombre, bool $inicio = false ){
    include TEMPLATES_URL . "/${nombre}.php";
}

function authAprovado() {
    session_start();

    if(!$_SESSION['login']){
        header('location: /');
    }
}
function debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function validarTipoContenido($tipo){
    $tipos = ['vendedor','propiedad','blog'];

    return in_array($tipo, $tipos);
}

function validarId(string $url){

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header("Location: ${url}");
    }

    return $id;

}