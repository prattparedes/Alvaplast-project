<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

use Models\ventas\Venta;


if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["idVenta"]) && $_GET["idVenta"] !== 999999999) {
        $idVenta = $_GET["idVenta"];
        // $data = Venta::ListarVentaXid($idVenta);
        echo json_encode($data);
    } else {
        $data = Venta::getIdVenta();
        echo json_encode($data);
    }
}