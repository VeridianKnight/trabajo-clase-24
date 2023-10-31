<?php

class Producto{
    // PROPIEDADES DE LA CLASE //
    public $id;
    public $nombre;
    public $precio;
    public $cantidad;

    // CONSTRUCTOR DE LA CLASE //
    public function __construct($id = null, $nombre, $precio, $cantidad) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
    }
    

    // METODOS GET DE LA CLASE //
    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    // METODS SET DE LA CLASE //

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    
}
?>