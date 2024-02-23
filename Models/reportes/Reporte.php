<?php

namespace Models\reportes;

use config\Connection;
use PDO;
use PDOException;

class Reporte
{
    public static function listarReporteVentas($fechaIni, $fechaFin, $idAlmacen)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ReporteVentas :fechaIni, :fechaFin, :id_almacen");
            $stmt->bindParam(":fechaIni", $fechaIni, PDO::PARAM_STR);
            $stmt->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
            $stmt->bindParam(":id_almacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }

    public static function listarReporteCompras($fechaIni, $fechaFin, $razonSocial, $idAlmacen)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ReporteCompras :fechaIni, :fechaFin, :razonSocial, :idAlmacen");
            $stmt->bindParam(":fechaIni", $fechaIni, PDO::PARAM_STR);
            $stmt->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
            $stmt->bindParam(":razonSocial", $razonSocial, PDO::PARAM_STR);
            $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }

    public static function listarReportexDocumento($fechaIni, $fechaFin, $idAlmacen)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ReporteVentasXTipoDoc :fechaIni, :fechaFin,:tipodoc");
            $stmt->bindParam(":fechaIni", $fechaIni, PDO::PARAM_STR);
            $stmt->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
            $stmt->bindParam(":tipodoc", $tipodoc, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }

    public static function listarReportexFechas($fechaIni, $fechaFin)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ReporteVentasFecha :fechaIni, :fechaFin");
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

    public static function listarReportexSerie($fechaIni, $fechaFin)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ReporteVentasFecha :fechaIni, :fechaFin");
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
}
