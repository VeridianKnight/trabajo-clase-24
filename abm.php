<?php
// IMPORTACION DEL ARCHIVO CONEXION.PHP //
include 'conexion.php';
class ABM{
    public $conexion;
    
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    
    public function agregar(Producto $producto) {
        $sql = "INSERT INTO productos (nombre, precio, cantidad) VALUES (?, ?, ?)";
        $par = [$producto->getNombre(), $producto->getPrecio(), $producto->getCantidad()];
        $this->conexion->ejecutar($sql, $par);
    }

    public function editar(Producto $producto){
        $sql = "UPDATE productos SET nombre = ?, precio = ?, cantidad = ? WHERE id = ?";
        $par= [$producto->getNombre(), $producto->getPrecio(), $producto->getCantidad(), $producto->getId()];
        $this->conexion->ejecutar($sql,$par);
    }

    public function  eliminar(Producto $producto){
        $sql = "DELETE from productos WHERE id=?";
        $par= [$producto->getId()];
        $this->conexion->ejecutar($sql,$par);
    }

    public function listar() {
        try {
            $sql = "SELECT * FROM productos";
            $stmt = $this->conexion->ejecutar($sql);
    
            if ($stmt) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return array(); // Return an empty array if there are no results
            }
        } catch (PDOException $e) {
            // Handle any database-related errors here
            echo "Error: " . $e->getMessage();
            return array(); // Return an empty array in case of an error
        }
    }
    
    
    

    public function menu(){
        //ah completar despues
    }

}
?>