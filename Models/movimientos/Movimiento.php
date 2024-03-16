<?php

namespace Models\movimientos;

use config\Connection;
use PDO;
use PDOException;

class Movimiento
{
    //Metodo para el registro de un movimiento que se tiene
    public static function registrarMovimiento(int $idMovimento, int $idCaja, int $idOperacion, int $idAlmacen, string $idDocumento, string $numeroDocumento, string $serieDocumento, string $tipoMovimiento, float $monto, string $fecha)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_RegistrarMovimiento :idMovimento,:idCaja,:idOperacion,:idAlmacen,:idDocumento,:numeroDocumento,:serieDocumento,:tipoMovimiento,:monto,:fecha");
            $stmt->bindParam(":idMovimento", $idMovimento, PDO::PARAM_INT);
            $stmt->bindParam(":idCaja", $idCaja, PDO::PARAM_INT);
            $stmt->bindParam(":idOperacion", $idOperacion, PDO::PARAM_INT);
            $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->bindParam(":idDocumento", $idDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":numeroDocumento", $numeroDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":serieDocumento", $serieDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":tipoMovimiento", $tipoMovimiento, PDO::PARAM_STR);
            $stmt->bindParam(":monto", $monto, PDO::PARAM_STR);
            $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }

    public static function obtenerUltimaOperacion()
    {
        $con = Connection::Conectar();
        $stmt = $con->query(" select max(id_movimiento) as 'id_movimiento' from Movimiento");
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    public static function atenderCompra(int $idOperacion)
    {
        $estado = 2;
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_AtenderCompra :idCompra , :estado");
            $stmt->bindParam(":idCompra", $idOperacion, PDO::PARAM_INT);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_INT);
            $stmt->execute();
            $result = ($stmt->rowCount()) ? true : false;
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public static function atenderVenta(int $idOperacion)
    {
        $estado = 2;
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_AtenderVenta :idVenta, :estado");
            $stmt->bindParam(":idVenta", $idOperacion, PDO::PARAM_INT);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_INT);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public static function eliminarFactura(int $idMovimiento)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_EliminarMovimiento :idMovimiento");
            $stmt->bindParam(":idMovimiento", $idMovimiento, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }
}
