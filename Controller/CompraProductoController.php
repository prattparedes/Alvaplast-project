<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/Models/CompraProducto.php");

if(isset($_POST)){
    $idCompra =(int) $_POST["idCompra"] ;
    $idProducto =(int) $_POST["idProducto"];
    $cantidad =(float) $_POST["cantidad"];
    $precioCompra =(float) $_POST["precioCompra"];
    $descuento =(float) $_POST["descuento"];
    $subtotal=(float) $_POST["subtotal"];

    $message = "";
    if($_POST["metodo"] == "Grabar"){
        $result=CompraProducto::RegistrarCompraProducto($idCompra,$idProducto,$cantidad,$precioCompra,$descuento,$subtotal);
        $message = "producto guardado";
    }else if($_POST["metodo"] == "Editar"){
        
    }else if($_POST["metodo"] == "Eliminar"){

    }
    echo $message;
}



?>