<?php

namespace Models\inventario;

use config\Connection;
use PDO;
use Exception;
use PDOException;

class Kardex
{

    public static function listarMovimientosAlmacenProducto($id_almacen, $id_producto)
    {
        $connection = Connection::Conectar();

        // Preparar la consulta con parámetros
        $query = "exec sp_ListakardexXAlmacen @id_almacen = ?, @id_producto = ?";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $id_almacen, PDO::PARAM_INT);
        $statement->bindParam(2, $id_producto, PDO::PARAM_INT);

        // Ejecutar la consulta
        $statement->execute();

        // Recuperar los resultados
        $resultados = $statement->fetchAll(PDO::FETCH_OBJ);

        return $resultados;
    }

    public static function registrarKardex(int $idKardex, string $fecha, string $numeroDocumento, string $serieDocumento, string $idDocumento, int $idProducto, int $idAlmacen, int $idMovmiento, float $stock, float $cantidad, float $precio, float $descuento, string $tipo, string $total, string $rucDni, string $nombre)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec ");
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }
}
