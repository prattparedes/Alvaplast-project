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
            $fechaIniFormatted = $fechaIni->format('Y-m-d H:i:s');
            $fechaFinFormatted = $fechaFin->format('Y-m-d H:i:s');

            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ReporteCompras :fechaIni, :fechaFin, :razonSocial, :idAlmacen");
            $stmt->bindParam(":fechaIni", $fechaIniFormatted, PDO::PARAM_STR);
            $stmt->bindParam(":fechaFin", $fechaFinFormatted, PDO::PARAM_STR);
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
}