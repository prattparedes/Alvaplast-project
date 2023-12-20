<?php
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/Models/Compra.php");

if(isset($_POST["metodo"])){
    $idCompra =intval($_POST["idCompra"]);
    $fecha=strtotime($_POST["fecha"]);
    $fechaFormateada = date("Y-m-d H:i:s", $fecha);
    $total=(float) $_POST["total"] ;
    $subtotal=(float) $_POST["subtotal"];
    $igv=(float) $_POST["igv"];
    $idMoneda=(int) $_POST["idMoneda"];
    $numeroDocumento=$_POST["numeroDocumento"];
    $serieDocumento=$_POST["serieDocumento"];
    $idProveedor =(int) $_POST["idProveedor"] ;
    $idAlmacen=(int) $_POST["idAlmacen"];
    $tipoPago= $_POST["tipoPago"];
    $idPersonal =(int) $_POST["idPersonal"];
    //mensaje de respuesta para la 
    $message = "";
    if($_POST["metodo"]== "Grabar")
    {
        $result = Compra::RegistrarCompra($idCompra,$fechaFormateada,$total,$subtotal,$igv,$idMoneda,$numeroDocumento,$serieDocumento,$idProveedor,$idAlmacen,$tipoPago,$idPersonal);
        $message = "Compra grabada";
    }else if($_POST["metodo"]== "Modificar"){
        $message = "Compra editada";
    }else if($_POST["metodo"]== "Eliminar"){
        $message = "Compra eliminada";
    }
    if($result){
        echo $message;
    }




}
if(isset($_GET["idCompra"]))
{
    $idCompra = $_GET["idCompra"];
    $data = Compra::ListarCompraXid($idCompra);
    echo json_encode($data);
}


?>