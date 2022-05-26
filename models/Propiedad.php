<?php

namespace Model;

class Propiedad extends ActiveRecord {

    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedorId'];

        // Variables (Propiedades [de la base de datos])
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;
    
    public function __construct( $args = [] )
    {
        $this -> id = $args['id'] ?? null;
        $this -> titulo = $args['titulo'] ?? '';
        $this -> precio = $args['precio'] ?? '';
        $this -> imagen = $args['imagen'] ?? '';
        $this -> descripcion = $args['descripcion'] ?? '';
        $this -> habitaciones = $args['habitaciones'] ?? '';
        $this -> wc = $args['wc'] ?? '';
        $this -> estacionamiento = $args['estacionamiento'] ?? '';
        $this -> creado = date('Y/m/d');
        $this -> vendedorId = $args['vendedorId'] ?? '';
    }

    public function validar(){

        if(!$this->titulo){
            self::$errores[] = "La propiedad necesita un titulo.";
        }
        if(!$this->precio){
            self::$errores[] = "Porfavor elija un precio de la propiedad.";
        }
        if( strlen( $this->descripcion ) < 50 ){
            self::$errores[] = "El campo descripcion debe tener un minimo de 50 caracteres.";
        }
        if(!$this->habitaciones){
            self::$errores[] = "El campo habitaciones es obligatorio.";
        }
        if(!$this->wc){
            self::$errores[] = "El campo baños es obligatorio.";
        }
        if(!$this->estacionamiento){
            self::$errores[] = "El campo estacionamiento es obligatorio.";
        }
        if(!$this->vendedorId){
            self::$errores[] = "Porfavor escoja un vendedor";
        }
        if(!$this->imagen){
            self::$errores[] = "La imagen es obligatoria";
        }

        return self::$errores;    

    }

}


