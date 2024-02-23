<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');


use Models\movimientos\Movimiento;
use Models\facturas\Facturacion;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados desde el frontend
    $idMovimiento =  isset($_POST["idMovmiento"]) && $_POST["idMovmiento"] !== "" ? $_POST["idMovmiento"] : 1;
    $idCaja = (int) $_POST["idCaja"];
    $idOperacion = (int) $_POST["idOperacion"];
    $idAlmacen = (int) $_POST["idAlmacen"];
    $idDocumento = $_POST["idDocumento"];
    $numeroDocumento = $_POST["numeroDocumento"];
    $serieDocumento = $_POST["serieDocumento"];
    $tipoMovimiento = $_POST["tipoMovimiento"];
    $monto = (float) $_POST["monto"];
    $fecha = date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $_POST["fecha"])));
    $fechaFormateada = str_replace(' ', 'T', $fecha);

    if ($_POST["metodo"] === "Grabar") {
        $response = Movimiento::registrarMovimiento($idMovimiento, $idCaja, $idOperacion, $idAlmacen, $idDocumento, $numeroDocumento, $serieDocumento, $tipoMovimiento, $monto, $fechaFormateada);
        if ($tipoMovimiento == "S") {
            Movimiento::atenderCompra($idOperacion);
        } else if ($tipoMovimiento == "E") {
            Movimiento::atenderVenta($idOperacion);
        }
        if ($response) {
            $data = Movimiento::obtenerUltimaOperacion();
            echo $data->id_movimiento;
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (isset($_GET["fechaIni"]) && isset($_GET["fechaFin"])) {
        $fecha = date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $_GET["fechaIni"])));
        $fechaIni = str_replace(' ', 'T', $fecha);
        $fecha2 = date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $_GET["fechaFin"])));
        $fechaFin = str_replace(' ', 'T', $fecha2);

        $data = Facturacion::listarFacturacionXFecha($fechaIni, $fechaFin);
        echo json_encode($data);
    }
    if (isset($_GET["idVenta"])) {
        $id = $_GET["idVenta"];
        $data = Facturacion::listarVentaXidVenta($id);
        echo json_encode($data);
    }
}
