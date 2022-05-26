<?php

namespace Model;

class Vendedor extends ActiveRecord {

    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id','nombre','apellido','imagen','telefono','email'];

    public $id;
    public $nombre;
    public $apellido;
    public $imagen;
    public $telefono;
    public $email;

    public function __construct( $args = [] )
    {
        $this -> id = $args['id'] ?? null;
        $this -> nombre = $args['nombre'] ?? '';
        $this -> apellido = $args['apellido'] ?? '';
        $this -> imagen = $args['imagen'] ?? '';
        $this -> telefono = $args['telefono'] ?? '';
        $this -> email = $args['email'] ?? '';

    }

    public function validar(){

        if(!$this->nombre){
            self::$errores[] = "El nombre es obligatorio.";
        }
        if(!$this->apellido){
            self::$errores[] = "El apellido es obligatorio.";
        }
        if(!$this->imagen){
            self::$errores[] = "La imagen es obligatoria";
        }
        if(!$this->email){
            self::$errores[] = "El E-mail es obligatorio.";
        }
        if(!$this->telefono){
            self::$errores[] = "El telefono es obligatorio.";
        }
        if(!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$errores[] = "El numero no es válido.";
        }

        return self::$errores;
    }

    public function borrarImagen(){
        $existeArchivo = file_exists(CARPETA_PROFILES_IMG . $this->imagen);
        if($existeArchivo){
            unlink(CARPETA_PROFILES_IMG . $this->imagen);
        }
    }

}


