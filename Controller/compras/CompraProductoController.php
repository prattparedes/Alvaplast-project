<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

use Models\compras\CompraProducto;
use Models\maintenance_models\Almacen;
use Models\maintenance_models\Producto;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idAlmacen = (int) $_POST["idAlmacen"];
    $idCompra = (int) $_POST["idCompra"];
    $idProducto = (int) $_POST["idProducto"];
    $cantidad = (float) $_POST["cantidad"];
    $precioCompra = (float) $_POST["precioCompra"];
    $descuento = (float) $_POST["descuento"];
    $subtotal = (float) $_POST["subtotal"];
    $nombreProducto = $_POST["nombreProducto"];
    $nombreAlmacen = $_POST["nombreAlmacen"];

    $message = "";
    if ($_POST["metodo"] == "Grabar") {
        $result = CompraProducto::RegistrarCompraProducto($idCompra, $idProducto, $cantidad, $precioCompra, $descuento, $subtotal);
        if ($result) {
            $response = Almacen::validarProductoAlmacen($idAlmacen, $idProducto);
            $res = !$response;
            if ($res) {
                $descripcion = "el producto " . $nombreProducto . " esta en el almacen " . $nombreAlmacen;
                Producto::registrarProductoxAlmacen($idProducto, $idAlmacen, $descripcion);
            }
            $message = "producto guardado";
        }
    } else if ($_POST["metodo"] == "modificar") {
        $result = CompraProducto::RegistrarCompraProducto($idCompra, $idProducto, $cantidad, $precioCompra, $descuento, $subtotal);
        if ($result) {
            $response = Almacen::validarProductoAlmacen($idAlmacen, $idProducto);
            $res = !$response;
            if ($res) {
                $descripcion = "el producto " . $nombreProducto . " esta en el almacen " . $nombreAlmacen;
                Producto::registrarProductoxAlmacen($idProducto, $idAlmacen, $descripcion);
            }
            $message = "producto guardado";
        }
    } else if ($_POST["metodo"] == "Eliminar") {
    }
    echo $message;
}
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $idCompra = $_GET["idCompra"];
    $data = CompraProducto::ListarDetalleCompraXid($idCompra);
    echo json_encode($data);
}
