<?php
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/Models/Compra.php");
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/Models/Movimiento.php");

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $idCompra =intval($_POST["idCompra"]);
    $fecha = date("Y-m-d H:i:s", strtotime($_POST["fecha"]));
    $fechaFormateada = str_replace(' ','T',$fecha);
    echo $fechaFormateada;
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
        $result = Compra::ModificarCompra($idCompra,$fechaFormateada,$total,$subtotal,$igv,$idMoneda,$numeroDocumento,$serieDocumento,$idProveedor,$idAlmacen,$tipoPago,$idPersonal);
        $message = "Compra editada";
    }else if($_POST["metodo"]== "Eliminar"){
        $message = "Compra eliminada";
    }
    if($result){
        echo $message;
    }




}
if($_SERVER["REQUEST_METHOD"] === "GET")
{
    $idCompra = $_GET["idCompra"];
    $datos=Movimiento::BuscarMovimientoCompra($idCompra);
    if($datos){
        echo "compra registrada en el kardex <br>";
    }
    $data = Compra::ListarCompraXid($idCompra);
    echo json_encode($data);
}


?>