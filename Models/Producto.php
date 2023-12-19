<?php
// Se requiere el archivo de conexión que probablemente contiene la clase Connection.
require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/config/connection.php');

class Producto {
    // Método estático para obtener todos los productos.
    public static function getProductos() {
        // Se establece la conexión utilizando la clase Connection.
        $connection = Connection::Conectar();
        
        // Se ejecuta un procedimiento almacenado para obtener la lista de productos.
        $DATA = $connection->query("exec sp_ListarProducto");
        
        // Se recuperan los resultados en formato de objeto y se retornan.
        $productos = $DATA->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }

    // Método estático para obtener productos por almacén.
    public static function getProductosByAlmacen(int $idAlmacen) {
        $con = Connection::Conectar();
        
        // Se utiliza una consulta preparada para obtener productos filtrados por un ID de almacén.
        $stmt = $con->prepare("exec sp_ListarProducto_AlmacenXAlmacen @id_almacen = :idalmacen");
        $stmt->bindParam(":idalmacen", $idAlmacen, PDO::PARAM_INT);
        $stmt->execute();
        
        // Se retornan los resultados en formato de objeto.
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Método estático para obtener productos por almacén y línea.
    public static function getProductosByLineaAlmacen(int $almacen, int $linea): array {
        $con = Connection::Conectar();
        
        // Se utiliza una consulta preparada para obtener productos filtrados por un ID de almacén y línea.
        $tsmt = $con->prepare("exec sp_ListarProducto_AlmacenXAlmacenConLinea :almacen , :linea");
        $tsmt->bindParam(":almacen", $almacen, PDO::PARAM_INT);
        $tsmt->bindParam(":linea", $linea, PDO::PARAM_INT);
        $tsmt->execute();
        
        // Se retornan los resultados en formato de objeto.
        return $tsmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getProductoByStock(int $almacen): array {

        $con = Connection::Conectar();
            
        // No es necesario definir los valores de $id_almacen y $id_cliente aquí
        // Utiliza el valor pasado como argumento en la función
            
        $tsmt = $con->prepare("exec sp_ListaProductoStock @id_almacen = :almacen, @id_cliente = :cliente");
        $tsmt->bindParam(":almacen", $almacen, PDO::PARAM_INT);
        $id_cliente = 123; // Asegúrate de obtener el ID del cliente de alguna manera
        $tsmt->bindParam(":cliente", $id_cliente, PDO::PARAM_INT);
        $tsmt->execute();
            
        // Retornar los resultados en formato de objeto.
        return $tsmt->fetchAll(PDO::FETCH_OBJ);
    }  
    public static function getProductosByAlmacen1(int $almacen, int $producto): array {

        $con = Connection::Conectar();
            
            
        $tsmt = $con->prepare("exec sp_ListarProducto_Almacen @id_almacen = :almacen, @id_producto = :producto");
        $tsmt->bindParam(":almacen", $almacen, PDO::PARAM_INT);
        $tsmt->bindParam(":producto", $producto, PDO::PARAM_INT);
        $tsmt->execute();
            
        return $tsmt->fetchAll(PDO::FETCH_OBJ);
    }      
}
?>