<?php
// Se requiere el archivo de conexión que probablemente contiene la clase Connection.
namespace Models\maintenance_models;

use config\Connection;
use PDO;
use Exception;

class Producto
{
    // Método estático para obtener todos los productos.
    public static function getProductos()
    {
        // Se establece la conexión utilizando la clase Connection.
        $connection = Connection::Conectar();

        // Se ejecuta un procedimiento almacenado para obtener la lista de productos.
        $DATA = $connection->query("exec sp_ListarProducto");

        // Se recuperan los resultados en formato de objeto y se retornan.
        $productos = $DATA->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }

    // Método estático para obtener productos por almacén.
    public static function getProductosByAlmacen(int $idAlmacen)
    {
        $con = Connection::Conectar();

        // Se utiliza una consulta preparada para obtener productos filtrados por un ID de almacén.
        $stmt = $con->prepare("exec sp_ListarProducto_AlmacenXAlmacen :almacen");
        $stmt->bindParam(":idalmacen", $idAlmacen, PDO::PARAM_INT);
        $stmt->execute();

        // Se retornan los resultados en formato de objeto.
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Método estático para obtener productos por almacén y línea.
    public static function getProductosByLineaAlmacen(int $almacen, int $linea): array
    {
        $con = Connection::Conectar();

        // Se utiliza una consulta preparada para obtener productos filtrados por un ID de almacén y línea.
        $tsmt = $con->prepare("exec sp_ListarProducto_AlmacenXAlmacenConLinea :almacen , :linea");
        $tsmt->bindParam(":almacen", $almacen, PDO::PARAM_INT);
        $tsmt->bindParam(":linea", $linea, PDO::PARAM_INT);
        $tsmt->execute();

        // Se retornan los resultados en formato de objeto.
        return $tsmt->fetchAll(PDO::FETCH_OBJ);
    }
}
