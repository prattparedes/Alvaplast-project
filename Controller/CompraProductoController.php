<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/Models/CompraProducto.php");

if($_SERVER["REQUEST_METHOD"] === "POST"){
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
if($_SERVER["REQUEST_METHOD"] === "GET"){
    $idCompra = $_GET["idCompra"];

    $data=CompraProducto::ListarDetalleCompraXid($idCompra);
    echo json_encode($data);
}



?>