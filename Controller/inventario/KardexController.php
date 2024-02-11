<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

use Models\inventario\Kardex;
use Models\movimientos\Movimiento;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados desde el frontend
    if (isset($_POST["id_producto"]) && isset($_POST["id_almacen"])) {
        $id_producto = $_POST['id_producto'];
        $id_almacen = $_POST['id_almacen'];

        // Llamar al método del modelo para obtener los movimientos del kardex
        $movimientos = Kardex::listarMovimientosAlmacenProducto($id_almacen, $id_producto);

        // Enviar la respuesta al frontend
        echo json_encode($movimientos);
        return;
    }
    print_r($_POST);
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
}
