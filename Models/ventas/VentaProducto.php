<?php

namespace Models\ventas;

use config\Connection;
use PDO;
use PDOException;

class VentaProducto
{

    //Metodo de registro de los productos de la venta
    public static function registrarProductoVenta(int $idVenta, int $idProducto, float $cantidad, float $precioVenta, float $descuento, float $subtotal)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("sp_RegistrarVenta_Producto :idVenta,:idProducto,:cantidad,:precioVenta,:descuento,:subtotal");
            $stmt->bindParam(":idVenta", $idVenta, PDO::PARAM_INT);
            $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
            $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_STR);
            $stmt->bindParam(":precioVenta", $precioVenta, PDO::PARAM_STR);
            $stmt->bindParam(":descuento", $descuento, PDO::PARAM_STR);
            $stmt->bindParam(":subtotal", $subtotal, PDO::PARAM_STR);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }

    public static function obtenerProductoXVenta(int $idVenta)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ListaDetalleVentaXVenta :idVenta");
            $stmt->bindParam(":idVenta", $idVenta, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }


    public static function eliminarProductoVenta(int $idVenta)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec exec sp_EliminarVenta_Producto :idVenta");
            $stmt->bindParam(":idVenta", $idVenta, PDO::PARAM_INT);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }
}
