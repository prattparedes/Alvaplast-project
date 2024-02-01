<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/autoload.php");

use Models\ventas\VentaProducto;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $idVenta = isset($_POST["idVenta"]) && $_POST["idVenta"] !== "" ? $_POST["idVenta"] : 1;
    $idProducto = (int) $_POST["idProducto"];
    $cantidad = (float) $_POST["cantidad"];
    $precioVenta = (float) $_POST["precioVenta"];
    $descuento = (float) $_POST["descuento"];
    $subtotal = (float) $_POST["subtotal"];

    if ($_POST["metodo"] === "Grabar") {
        $result = VentaProducto::registrarProductoVenta($idVenta, $idProducto, $cantidad, $precioVenta, $descuento, $subtotal);
    }
} else if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (isset($_GET["idVenta"])) {
        $idVenta = $_GET["idVenta"];
        $data = VentaProducto::obtenerProductoXVenta($idVenta);
        echo json_encode($data);
    }
}
