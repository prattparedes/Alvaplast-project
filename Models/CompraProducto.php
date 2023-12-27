<?php
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/config/connection.php");

class CompraProducto{


public static function RegistrarCompraProducto(int $idCompra,int $idProducto,float $cantidad,float $precioCompra,float $descuento,float $subtotal){
    try{
        $con = Connection::Conectar();
        $tsmt = $con->prepare("exec sp_RegistrarCompra_Producto :idCompra, :idProducto, :cantidad, :precioCompra, :descuento, :subtotal");
        $tsmt->bindParam(":idCompra",$idCompra,PDO::PARAM_INT);
        $tsmt->bindParam(":idProducto",$idProducto,PDO::PARAM_INT);
        $tsmt->bindParam(":cantidad",$cantidad,PDO::PARAM_STR);
        $tsmt->bindParam(":precioCompra",$precioCompra,PDO::PARAM_STR);
        $tsmt->bindParam(":descuento",$descuento,PDO::PARAM_STR);
        $tsmt->bindParam(":subtotal",$subtotal,PDO::PARAM_STR);
        $result = $tsmt->execute();
        return $result;
    }catch(Exception $e){
        echo $e->getMessage();
    }
    
}

public static function ListarDetalleCompraXid(int $idCompra){
    try{
        $con = Connection::Conectar();
        $stmt = $con->prepare("exec sp_ListaDetalleCompraXCompra :idCompra");
        $stmt->bindParam(":idCompra",$idCompra,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }catch(Exception $e){
        echo $e->getMessage();
    }
}

//Funcion para eliminar los productos de una compra realizada 
public static function EliminarProductoXcompra(int $idCompra):bool
{
    try{
        $con = Connection::Conectar();
        $stmt =$con->prepare("exec sp_EliminarCompra_Producto :idCompra");
        $stmt->bindParam(":idCompra",$idCompra,PDO::PARAM_INT);
        $result=$stmt->execute();
        return $result;
    }catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
}
//Función para eliminar 
public static function EliminarProductoXProducto(int $idCompra, int $idProducto):bool
{
    try{
        $con = Connection::Conectar();
        $stmt = $con->prepare("exec sp_EliminarCompra_ProductoxProducto :idCompra, :idCompra");
        $stmt->bindParam(":idCompra",$idCompra,PDO::PARAM_INT);
        $stmt->bindParam(":idProducto",$idProducto,PDO::PARAM_INT);
        $result=$stmt->execute();
        return $result;
    }catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
}
}


?>