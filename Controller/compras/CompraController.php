<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/autoload.php');

use Models\compras\Compra;
use Models\compras\CompraProducto;
use Models\maintenance_models\TipoCambio;
use Models\maintenance_models\Producto;
use Models\maintenance_models\Almacen;


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idCompra = intval($_POST["idCompra"]);
    $fecha = date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $_POST["fecha"])));
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
    if ($_POST["metodo"] === "Grabar") {
        if ($idMoneda == 2) {
            $tipoCambio = TipoCambio::obtenerTipoCambio("c"); //tenemos que pasar el tipo de orden que es ("v" venta , "c" compra)
            $result = Compra::RegistrarCompraConCambio($idCompra, $fechaFormateada, $total, $subtotal, $igv, $idMoneda, $numeroDocumento, $serieDocumento, $idProveedor, $idAlmacen, $tipoCambio, $tipoPago, $idPersonal);
            $message = ($result) ? "registrado correctamente" : "error en la insercion";
        } else {
            $result = Compra::RegistrarCompra($idCompra, $fechaFormateada, $total, $subtotal, $igv, $idMoneda, $numeroDocumento, $serieDocumento, $idProveedor, $idAlmacen, $tipoPago, $idPersonal);
            $message = ($result) ? "registrado correctamente" : "error en la insercion";
        }
    } else if ($_POST["metodo"] === "modificar") {
        $result = Compra::ModificarCompra($idCompra, $fechaFormateada, $total, $subtotal, $igv, $idMoneda, $numeroDocumento, $serieDocumento, $idProveedor, $idAlmacen, $tipoPago, $idPersonal);
        CompraProducto::EliminarProductoXcompra($idCompra);
        $message = ($result) ? "Compra editada" : "error al editar compra";
    } else if ($_POST["metodo"] == "Eliminar") {
        $result = Compra::EliminarCompra($idCompra, $idPersonal);
        $message = ($result) ? "Compra eliminada" : "error al eliminar compra";
    }

    echo $message;
} elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["idCompra"]) && $_GET["idCompra"] !== 999999999) {
        $idCompra = $_GET["idCompra"];
        $data = Compra::ListarCompraXid($idCompra);
        echo json_encode($data);
    } else {
        $data = Compra::getIdCompra();
        echo json_encode($data);
    }
}
