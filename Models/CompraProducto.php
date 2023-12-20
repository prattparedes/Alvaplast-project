<?php
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/config/connection.php");

class CompraProducto{


public static function RegistrarCompraProducto(int $idCompra,int $idProducto,float $cantidad,float $precioCompra,float $descuento,float $subtotal){
    try{
        $con = Connection::Conectar();
        $tsmt = $con->prepare("exec sp_RegistrarCompra_Producto ?, ?, ?, ?, ?, ?");
        $result = $tsmt->execute([$idCompra,$idProducto,$cantidad,$precioCompra,$descuento,$subtotal]);
        return $result;
    }catch(Exception $e){
        echo $e->getMessage();
    }
    
}



}


?>