<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/Models/Operaciones/Compras/CompraProducto.php");
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/Models/Operaciones/Compras/Compra.php");
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $idCompra =(int) $_POST["idCompra"] ;
    $idProducto =(int) $_POST["idProducto"];
    $cantidad =(float) $_POST["cantidad"];
    $precioCompra =(float) $_POST["precioCompra"];
    $descuento =(float) $_POST["descuento"];
    $subtotal=(float) $_POST["subtotal"];
    //buscamos el movimiento de la compra
    
    $message = "";
    if($_POST["metodo"] == "Grabar"){
        $result=CompraProducto::RegistrarCompraProducto($idCompra,$idProducto,$cantidad,$precioCompra,$descuento,$subtotal);
        $message = "producto guardado";
    }else if($_POST["metodo"] == "Editar"){
        $mov = Movimiento::BuscarMovimientoCompra($idCompra);
        if(isset($mov) && ($mov->id_operacion == $idCompra)){
            $result = CompraProducto::EliminarProductoXProducto($idCompra,$idProducto);
            
        }
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