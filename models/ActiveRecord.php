<?php 

namespace Model;

class ActiveRecord {

    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

        // Errores
    protected static $errores = [];

        // Metodos
    public static function setDB($database){
        self::$db = $database;
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
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= $file; 
        $query .= " ) VALUES (' "; 
        $query .= $column;
        $query .= " ' );";

        $resultado = self::$db->query($query);
        
        if($resultado){
            // Redirecciona a los usuarios a la direccion especificada para que no llenen con la misma consulta muchas veces más y solo puede utilizarse ANTES de un codigo HTML
            header('Location: /admin?resultado=1');
        }

        return $resultado;

    }
    public function actualizar(){
        $atributos = $this->sanitizarAtributos();
        $valores = [];

        foreach($atributos as $key => $value){
            $valores[] = "{$key} = '{$value}'";
        }
        
        $query = " UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '". self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado){
            header('Location: /admin?resultado=2');
        }

        return $resultado;
    }
    public function eliminar(){
        // Eliminar propiedad
        $query = " DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if($resultado){
            $this->borrarImagen();
            header('location: /admin?resultado=3');
        }
    }

        // Identificar que atributos se añadieron al array y unir los atributos de la DB
        /* 
            Al arreglo de $atributos se le irán agregando las columnas de $columnasDB (id, titulo, etc), una a una, debido al forEach. Esto sucede en $atributos[$columna] = ...

            Luego a cada columna (de $atributos), se le asigna el valor de la columna con el mismo nombre en el objeto. Esto sucede en ... = $this->$columna.

            Recuerda que $this hace referencia al objeto en memoria.   
        */   
    public function atributos(){
        $atributos = [];
        foreach(static::$columnasDB as $columna){
            if($columna === 'id') continue;                         // Ignoramos la columna ID
            $atributos[$columna] = $this -> $columna;          
        }
        /* debuguear($atributos); */
        
        return $atributos;
    }
    public function sanitizarAtributos(){
        $atributos = $this -> atributos();
        $sanitizado = [];                                           // Creamos un array vacio para ir iterando sobre él
        foreach ($atributos as $key => $value) {                    // Acá accedemos a las llaves y valores 
            $sanitizado[$key] = self::$db->escape_string($value);   // Acá pasamos los datos almacenados en DB hacia el arreglo y sanatiza: escape_String
        }
        /* debuguear($sanitizado); */

        return $sanitizado;                                         // Lo retornamos a una variable cuando sea llamada la función
    } 

        // Setear Imagen
    public function setImagen($imagen){

        if(!is_null($this->id)){
            $this->borrarImagen();
        }
        
        if($imagen){
            $this -> imagen = $imagen;
        }
    }
    public function borrarImagen(){
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if($existeArchivo){
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }
    public static function getErrores(){
        return static::$errores;
    }

    public function validar(){
        static::$errores = [];
        return static::$errores;
    }

    /* ** ADMIN ** */

    public static function all(){
        $query = " SELECT * FROM " . static::$tabla ;
        $resultado = self::consultarSQL($query);

        return $resultado;
    }
    public static function getLimit($limit){
        $query = " SELECT * FROM " . static::$tabla . " LIMIT " . $limit;
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function find($id){
        $query = " SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
        $resultado = self::consultarSQL($query);
        
        return array_shift( $resultado );   // Retorna la primer posicion del array
    }

    public static function consultarSQL($Query){
        // Consultar DB
            $resultado = self::$db->query($Query);

        // Iterar Resultados (While || Foreach) SEGUIRA SIENDO UN ARRAY, ACTIVE RECORD SOLO PERMITE UN ARRAY OBJETO ESPEJO, IDENTICO AL DE DB
            $array = [];
            while($registro = $resultado->fetch_assoc()){   // Por cada registro(valores) que tenga $resultado , se agregan a la variable $registro
                $array[] = static::crearObjetos($registro);     // Antes = $registro['titulo'] || eliminar "['titulo']";
            }
            /* 
                foreach($resultado as $key => $value){
                    $array[$key] = $value['titulo'];    // O borrar ['titulo'];
                }
             */
            
        // Liberar la memoria
            $resultado->free();
        // Retornar los resultados a fn all()
        return $array;
    }
        // CAMBIA UN ARRAY ASOCIATIVO A OBJETO
    protected static function crearObjetos($Registro){
        $objeto = new static;
        foreach ($Registro as $key => $value) {
            if(property_exists($objeto, $key)){
                $objeto -> $key = $value;
            }
        }
        return $objeto;
    }


    // Almacenar los registros en memoria
    public function sincronizar( $args = [] ){
        foreach($args as $key => $value){
            if( property_exists( $this , $key ) && !is_null($value) ){
                $this -> $key = $value;
            }
        }
    }

}