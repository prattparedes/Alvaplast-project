<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/autoload.php");

use Models\ventas\VentaProducto;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    print_r($_POST);
    $idVenta = isset($_POST["idVenta"]) && $_POST["idVenta"] !== "" ? $_POST["idVenta"] : 1;
    $idProducto = (int) $_POST["idProducto"];
    $cantidad = (float) $_POST["cantidad"];
    $precioVenta = (float) $_POST["precioVenta"];
    $descuento = (float) $_POST["descuento"];
    $subtotal = (float) $_POST["subtotal"];

    if ($_POST["metodo"] === "Grabar") {
        $result = VentaProducto::registrarProductoVenta($idVenta, $idProducto, $cantidad, $precioVenta, $descuento, $subtotal);
        $message = ($result) ? "todo ok" : "no se pudo registrar";
    } elseif ($_POST["metodo"] === "modificar") {
        VentaProducto::registrarProductoVenta($idVenta, $idProducto, $cantidad, $precioVenta, $descuento, $subtotal);
    }
    if (isset($message)) {
        echo $message;
    }
} else if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (isset($_GET["idVenta"])) {
        $idVenta = $_GET["idVenta"];
        $data = VentaProducto::obtenerProductoXVenta($idVenta);
        echo json_encode($data);
    }
}
