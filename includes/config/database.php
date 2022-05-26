<?php 

function conectarDB() : mysqli {

    $db = new mysqli('localhost','root','root','bienes_raices');

    if(!$db){
        echo "No se pudo encontrar";
        exit;
    }
    return $db;
}