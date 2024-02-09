<?php

use Models\ventas\VentaProducto;

require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/autoload.php");

use Models\maintenance_models\TipoCambio;
use Models\ventas\Venta;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $id = (isset($_POST["idVenta"]) && $_POST["idVenta"] !== "0") ? (int) $_POST["idVenta"] : 1;
    $idAlmacen = (int) $_POST["idAlmacen"];
    $idPersonal = (int) $_POST["idPersonal"];
    $idDocumento = $_POST["idDocumento"];
    $idCliente = $_POST["idCliente"];
    $fecha = date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $_POST["fecha"])));
    $fechaFormateada = str_replace(' ', 'T', $fecha);
    $total = (float) $_POST["total"];
    $subtotal = (float) $_POST["subtotal"];
    $igv = (float) $_POST["igv"];
    $idMoneda = (int) $_POST["idMoneda"];
    $numeroDocumento = $_POST["numeroDocumento"];
    $serieDocumento = $_POST["serieDocumento"];
    $tipoPago = $_POST["tipoPago"];
    $pagoInicial = (float) $_POST["pagoInicial"];
    $montoFinanciado = 0.00;
    $numCuotas = 0;
    $montoCuota = 0.00;
    if ($_POST["metodo"] === "Grabar") {
        if ($idMoneda == 2) {
            $tipoCambio = TipoCambio::obtenerTipoCambio();
            $response = Venta::registrarVentaConCambion($id, $idAlmacen, $idPersonal, $idDocumento, $idCliente, $fechaFormateada, $total, $subtotal, $igv, $idMoneda, $numeroDocumento, $serieDocumento, $tipoPago, $pagoInicial, $montoFinanciado, $numCuotas, $montoCuota, $tipoCambio);
        } else {
            $response = Venta::registrarVenta($id, $idAlmacen, $idPersonal, $idDocumento, $idCliente, $fechaFormateada, $total, $subtotal, $igv, $idMoneda, $numeroDocumento, $serieDocumento, $tipoPago, $pagoInicial, $montoFinanciado, $numCuotas, $montoCuota);
        }
        $data = Venta::obtenerVentaXDocumento($serieDocumento);
        $message = ($response) ? $data->id_venta  : "error en el registro";
    } else if ($_POST["metodo"] === "Modificar") {
        $response = Venta::modificarVenta($id, $idAlmacen, $idPersonal, $idDocumento, $idCliente, $fechaFormateada, $total, $subtotal, $igv, $idMoneda, $numeroDocumento, $serieDocumento, $tipoPago, $pagoInicial, $montoFinanciado, $numCuotas, $montoCuota);
        VentaProducto::eliminarProductoVenta($id);
        $message = ($response) ? "modificado" : "error";
    } else if ($_POST["metodo"] === "Eliminar") {
        $response = Venta::eliminarVenta($idVenta);
        $message = ($response) ? "eliminado correctamente" : "error al eliminar";
    }
    echo $message;
} else if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["idVenta"]) && $_GET["idVenta"] !== 999999999) {
        $idVenta = (int) $_GET["idVenta"];
        $data = Venta::getVentaXId($idVenta);
    }
}
