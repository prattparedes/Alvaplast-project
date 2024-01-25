<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/autoload.php");

use Models\maintenance_models\TipoCambio;
use Models\ventas\Venta;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    print_r($_POST);
    $id = (isset($_POST["idVenta"]) && $_POST["idVenta"] !== "") ? $_POST["idVenta"] : 1;
    $idAlmacen = (int) $_POST["idAlmacen"];
    $idPersonal = (int) $_POST["idPersonal"];
    $idDocumento = $_POST["idDocumento"];
    $idCliente = $_POST["idCliente"];
    $fecha = date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $_POST["fecha"])));
    $fechaFormateada = str_replace(' ', 'T', $fecha);
    echo $fechaFormateada . "////";
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
    echo $id;
    if ($_POST["metodo"] === "Grabar") {
        if ($idMoneda == 2) {
            $tipoCambio = TipoCambio::obtenerTipoCambio();
            $response = Venta::registrarVentaConCambion($id, $idAlmacen, $idPersonal, $idDocumento, $idCliente, $fechaFormateada, $total, $subtotal, $igv, $idMoneda, $numeroDocumento, $serieDocumento, $tipoPago, $pagoInicial, $montoFinanciado, $numCuotas, $montoCuota, $tipoCambio);
        } else {
            $response = Venta::registrarVenta($id, $idAlmacen, $idPersonal, $idDocumento, $idCliente, $fechaFormateada, $total, $subtotal, $igv, $idMoneda, $numeroDocumento, $serieDocumento, $tipoPago, $pagoInicial, $montoFinanciado, $numCuotas, $montoCuota);
        }
        $message = ($response) ? "venta registrada" : "error en el registro";
    } else if ($_POST["metodo"] === "Modificar") {
        $response = Venta::modificarVenta($id, $idAlmacen, $idPersonal, $idDocumento, $idCliente, $fechaFormateada, $total, $subtotal, $igv, $idMoneda, $numeroDocumento, $serieDocumento, $tipoPago, $pagoInicial, $montoFinanciado, $numCuotas, $montoCuota);
        $message = ($response) ? "modificado" : "error";
    } else if ($_POST["metodo"] === "Eliminar") {
        $response = Venta::eliminarVenta($idVenta);
        $message = ($response) ? "eliminado correctamente" : "error al eliminar";
    }
    echo $message;
}
