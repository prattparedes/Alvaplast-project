<?php

namespace Models\ventas;

use config\Connection;
use PDO;
use PDOException;

class EstadoCuenta
{

    //Metodo de registro de los productos de la venta
    public static function listarEstadoCuenta($fechaIni, $fechaFin)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("sp_ListarEstadoCuenta :fechaIni,:fechaFin");

            $stmt->bindParam(":fechaIni", $fechaIni, PDO::PARAM_STR);
            $stmt->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }


    public static function registrarPagoParcial(float $pago, float $total, int $idCuenta)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_RegistrarPagoParcial :idCuenta,:monto,:total");
            $stmt->bindParam(":idCuenta", $idCuenta, PDO::PARAM_INT);
            $stmt->bindParam(":monto", $pago, PDO::PARAM_STR);
            $stmt->bindParam(":total", $total, PDO::PARAM_STR);
            $stmt->execute();
            return ($stmt->rowCount() > 2) ? true : false;
        } catch (PDOException $err) {
            $err->getMessage();
        }
    }

    public static function registrarPagoTotal(int $idCuenta, float $total)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_RegistrarPagoTotal :idCuenta, :monto");
            $stmt->bindParam(":idCuenta", $idCuenta, PDO::PARAM_INT);
            $stmt->bindParam(":monto", $total, PDO::PARAM_STR);
            $stmt->execute();
            return ($stmt->rowCount() > 0);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }


    public static function anularPago(int $idCuenta, float $total)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_AnularPago :idCuenta, :monto");
            $stmt->bindParam(":idCuenta", $idCuenta, PDO::PARAM_INT);
            $stmt->bindParam(":monto", $total, PDO::PARAM_STR);
            $stmt->execute();
            return ($stmt->rowCount() > 0) ? true : false;
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }
}
