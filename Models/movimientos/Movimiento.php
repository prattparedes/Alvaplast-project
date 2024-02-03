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
}
