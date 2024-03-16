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

    public static function listar(string $fechaIni, string $fechaFin)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ListarEstadoCuenta :fechaIni, :fechaFin");
            $stmt->bindParam(":fechaIni", $fechaIni, PDO::PARAM_STR);
            $stmt->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $err) {
            echo $err->getMessage();
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

    public static function listarReportexDocumento($fechaIni, $fechaFin, $tipodoc)
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

    public static function listarReportexSerie($fechaIni, $fechaFin, $id_tipodocumento)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ReporteVentasxSerie :fechaIni, :fechaFin,:id_tipodocumento");
            $stmt->bindParam(":fechaIni", $fechaIni, PDO::PARAM_STR);
            $stmt->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
            $stmt->bindParam(":id_tipodocumento", $id_tipodocumento, PDO::PARAM_STR);

            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }
    public static function listarReportexCliente($idCliente)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ReporteVentasCliente :id_cliente");
            $stmt->bindParam(":id_cliente", $idCliente, PDO::PARAM_STR);

            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }
    public static function listarReportexProducto($idProducto)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ReporteVentasProducto :id_producto");
            $stmt->bindParam(":id_producto", $idProducto, PDO::PARAM_STR);

            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }

    public static function listarReportexUtilidad($fechaIni, $fechaFin, $tipodoc)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ReporteUtilidadDetalleTipoDoc :fechaIni, :fechaFin, :tipodoc");
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

    public static function listarReportexCosto($fechaIni, $fechaFin, $idAlmacen)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ReporteUtilidadDetalle :fechaIni, :fechaFin, :idAlmacen");
            $stmt->bindParam(":fechaIni", $fechaIni, PDO::PARAM_STR);
            $stmt->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
            $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }
}
