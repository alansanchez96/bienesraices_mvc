<?php

namespace Model;

class Blog extends ActiveRecord {

    protected static $columnasDB = ['id','nombre','apellido','titulo','descripcion','imagen','fecha'];
    protected static $tabla = 'blog';

    public $id;
    public $nombre;
    public $apellido;
    public $titulo;
    public $descripcion;
    public $imagen;
    public $fecha;

    public function __construct( $args = [] ){

        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->fecha = date('Y/m/d');

    } 

    public function validar(){

        if(!$this->nombre){
            self::$errores[] = "El nombre es obligatorio.";
        }
        if(!$this->apellido){
            self::$errores[] = "El apellido es obligatorio.";
        }
        if(!$this->titulo){
            self::$errores[] = "El titulo es obligatorio";
        }
        if(!$this->descripcion){
            self::$errores[] = "La descripcion es obligatoria";
        }
        if(!$this->imagen){
            self::$errores[] = "La imagen es obligatoria";
        }

        return self::$errores;
    }

    public function guardar(){
        if(!is_null($this->id)){
            $this->actualizar();
        }
        else{
            $this->crear();
        }
    }

    public function crear(){

        $atributos = $this -> sanitizarAtributos();
        
        $file = join(', ', array_keys($atributos) );
        $column = join("', '", array_values($atributos) );
        
        // Insertar valores a DB
        $query = " INSERT INTO " . self::$tabla . " ( ";
        $query .= $file; 
        $query .= " ) VALUES (' "; 
        $query .= $column;
        $query .= " ' );";

        $resultado = self::$db->query($query);
        
        if($resultado){
            // Redirecciona a los usuarios a la direccion especificada para que no llenen con la misma consulta muchas veces más y solo puede utilizarse ANTES de un codigo HTML
            header('Location: /blog?resultado=1');
        }

        return $resultado;

    }

    public function eliminar(){
        // Eliminar propiedad
        $query = " DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if($resultado){
            $this->borrarImagen();
            header('location: /blog/admin-blog?resultado=3');
        }
    }


}