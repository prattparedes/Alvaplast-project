<?php

namespace Models\facturas;

use config\Connection;
use PDO;
use Exception;

class Facturacion
{


    public static function getFacturacion()
    {
        $con = Connection::Conectar();
        $data = $con->query("exec sp_ListarFacturacionXAlmacen 2");
        return $data->fetchAll(PDO::FETCH_OBJ);
    }


    public static function listarFacturacionXFecha(string $fechaIni, string $fechaFin)
    {
        $con = Connection::Conectar();
        $data = $con->prepare(" exec sp_ListarFacturacionXFecha3  :fechaIni, :fechaFin");
        $data->bindParam(":fechaIni", $fechaIni, PDO::PARAM_STR);
        $data->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
        $data->execute();
        return $data->fetchAll(PDO::FETCH_OBJ);
    }

    public static function obtenerFecha(int $idKardex, int $idProducto, int $idAlmacen)
    {
        $con = Connection::Conectar();
        $stmt = $con->prepare("select fecha from Kardex where id_kardex = :idKardex AND id_producto = :idProducto AND id_almacen = :idAlmacen");
        $stmt->bindParam(":idKardex", $idKardex, PDO::PARAM_INT);
        $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
        $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        return $data->fecha;
    }
}
