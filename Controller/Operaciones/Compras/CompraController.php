<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/Operaciones/Compras/Compra.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/Operaciones/Compras/CompraProducto.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/Operaciones/Movimientos/Movimiento.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/Mantenimiento/TipoCambio.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idCompra = intval($_POST["idCompra"]);
    $fecha = date("Y-m-d H:i:s", strtotime($_POST["fecha"]));
    $fechaFormateada = str_replace(' ', 'T', $fecha);
    $total = (float) $_POST["total"];
    $subtotal = (float) $_POST["subtotal"];
    $igv = (float) $_POST["igv"];
    $idMoneda = (int) $_POST["idMoneda"];
    $numeroDocumento = $_POST["numeroDocumento"];
    $serieDocumento = $_POST["serieDocumento"];
    $idProveedor = (int) $_POST["idProveedor"];
    $idAlmacen = (int) $_POST["idAlmacen"];
    $tipoPago = $_POST["tipoPago"];
    $idPersonal = (int) $_POST["idPersonal"];
    //mensaje de respuesta para la 
    $message = "";
    if ($_POST["metodo"] == "Grabar") {
        if ($idMoneda == 2) {
            $tipoCambio = TipoCambio::obtenerTipoCambio("c"); //tenemos que pasar el tipo de orden que es ("v" venta , "c" compra)
            $result = Compra::RegistrarCompraConCambio($idCompra, $fechaFormateada, $total, $subtotal, $igv, $idMoneda, $numeroDocumento, $serieDocumento, $idProveedor, $idAlmacen, $tipoCambio, $tipoPago, $idPersonal);
        } else {
            $result = Compra::RegistrarCompra($idCompra, $fechaFormateada, $total, $subtotal, $igv, $idMoneda, $numeroDocumento, $serieDocumento, $idProveedor, $idAlmacen, $tipoPago, $idPersonal);
        }
        $message = "Compra grabada";
    } else if ($_POST["metodo"] == "modificar") {
        $data = Movimiento::BuscarMovimientoCompra($idCompra);
        if ($data) {
        } else {
            $result = Compra::ModificarCompra($idCompra, $fechaFormateada, $total, $subtotal, $igv, $idMoneda, $numeroDocumento, $serieDocumento, $idProveedor, $idAlmacen, $tipoPago, $idPersonal);
            if ($result) {
                $r = CompraProducto::EliminarProductoXcompra($idCompra);
            }
            $message = "Compra editada";
        }
    } else if ($_POST["metodo"] == "Eliminar") {
        $result = Compra::EliminarCompra($idCompra, $idPersonal);
        $delete = ($result) ? CompraProducto::EliminarProductoXcompra($idCompra) : null;
        if ($delete) {
            $message = "Compra Eliminada";
        }
    }

    echo $message;
}
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $idCompra = $_GET["idCompra"];
    $data = Compra::ListarCompraXid($idCompra);
    echo json_encode($data);
}
