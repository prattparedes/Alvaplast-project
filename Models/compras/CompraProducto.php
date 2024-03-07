<?php

namespace Models\compras;

use config\Connection;
use PDO;
use Exception;

class CompraProducto
{


    public static function RegistrarCompraProducto(int $idCompra, int $idProducto, float $cantidad, float $precioCompra, float $descuento, float $subtotal)
    {
        try {
            $con = Connection::Conectar();
            $tsmt = $con->prepare("exec sp_RegistrarCompra_Producto ?, ?, ?, ?, ?, ?");
            $tsmt->execute([$idCompra, $idProducto, $cantidad, $precioCompra, $descuento, $subtotal]);
            $result = ($tsmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function ListarDetalleCompraXid(int $idCompra)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ListaDetalleCompraXCompra ?");
            $stmt->execute([$idCompra]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    //Funcion para eliminar los productos de una compra realizada 
    public static function EliminarProductoXcompra(int $idCompra): bool
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_EliminarCompra_Producto ?");
            $result = $stmt->execute([$idCompra]);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    //Función para eliminar 
    public static function EliminarProductoXProducto(int $idCompra, int $idProducto): bool
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_EliminarCompra_ProductoxProducto ?, ?");
            $result = $stmt->execute([$idCompra, $idProducto]);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
