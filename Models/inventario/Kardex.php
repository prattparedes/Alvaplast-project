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

    public static function registrarKardex(int $idKardex, string $fecha, string $numeroDocumento, string $serieDocumento, string $idDocumento, int $idProducto, int $idAlmacen, int $idMovimiento, float $stock, float $cantidad, float $precio, float $descuento, string $tipo, string $total, string $rucDni, string $nombre)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_RegistrarKardex :idKardex, :fecha, :numeroDocumento, :serieDocumento, :idDocumento, :idProducto, :idAlmacen, :idMovimiento , :stock, :cantidad, :precio, :descuento, :tipo, :total, :rucDni , :nombre ");
            $stmt->bindParam(":idKardex", $idKardex, PDO::PARAM_INT);
            $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $stmt->bindParam(":numeroDocumento", $numeroDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":serieDocumento", $serieDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":idDocumento", $idDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
            $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->bindParam(":idMovimiento", $idMovimiento, PDO::PARAM_INT);
            $stmt->bindParam(":stock", $stock, PDO::PARAM_STR);
            $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_STR);
            $stmt->bindParam(":precio", $precio, PDO::PARAM_STR);
            $stmt->bindParam(":descuento", $descuento, PDO::PARAM_STR);
            $stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);
            $stmt->bindParam(":total", $total, PDO::PARAM_STR);
            $stmt->bindParam(":rucDni", $rucDni, PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public static function regularizarKardexFecha(int $idProducto, int $idAlmacen, string $fecha)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_RegularizaKardexFecha :idProducto, :idAlmacen, :fecha");
            $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
            $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }


    public static function eliminarKardex(int $idKardex, int $idProducto, int $idAlmacen)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("DELETE FROM Kardex WHERE id_kardex= :idKardex AND id_producto=:idProducto AND id_almacen=:idAlmacen");
            $stmt->bindParam(":idKardex", $idKardex, PDO::PARAM_INT);
            $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
            $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }


    public static function listaridKardexMovimiento(int $idMovimiento)
    {
        $con = Connection::Conectar();
        $stmt = $con->query("select id_kardex from Kardex where id_movimiento = $idMovimiento ");
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        $id = $data->id_kardex;
        return $id;
    }
}
