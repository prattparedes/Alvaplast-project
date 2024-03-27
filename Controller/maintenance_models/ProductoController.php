<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/autoload.php");

use Models\maintenance_models\Almacen;
use Models\maintenance_models\Producto;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["idAlmacen"])) {
        $idalmacen = (int)$_POST["idAlmacen"];
        $result = Producto::getProductosByAlmacen($idalmacen);
        echo json_encode($result);
        return;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idProducto = isset($_POST["idProducto"]) && $_POST["idProducto"] !== "" ?  (int)$_POST["idProducto"] : 1;
    $idLinea = (int) $_POST["idLinea"];
    $idMarca = (int) $_POST["idMarca"];
    $idUnidad = (int) $_POST["idUnidad"];
    $nombre = $_POST["nombre"];
    $codigo = isset($_POST["codigo"]) && $_POST["codigo"] !== "-" ? $_POST["codigo"] : "";
    $procedencia = $_POST["procedencia"];
    $estado = (bool) $_POST["estado"];
    $precioVenta = (float) $_POST["precio_venta"];
    $precioCompra = (float) $_POST["precio_compra"];
    $descripcion = $_POST["descripcion"];
    $stockMin = (float) $_POST["stockmin"];
    $stockMax = (float) $_POST["stockmax"];
    $volumen = (float) $_POST["volumen"];
    $idMoneda = (int) $_POST["idMoneda"];
    if ($_POST["metodo"] == "Grabar") {
        $result = Producto::registrarProducto($idProducto, $idLinea, $idMarca, $idUnidad, $nombre, $codigo, $codigo, $procedencia, $codigo, $estado, $precioVenta, $precioCompra, $descripcion, $stockMin, $stockMax, $volumen, $idMoneda);
        if ($result) {

            $message = "producto registrado";
        } else {
            $message = "producto no registrado";
        }
    } elseif ($_POST["metodo"] == "modificar") {
        $result = Producto::modificarProducto($idProducto, $idLinea, $idMarca, $idUnidad, $nombre, $codigo, $codigo, $procedencia, $codigo, $estado, $precioVenta, $precioCompra, $descripcion, $stockMin, $stockMax, $volumen, $idMoneda);
        if ($result) {
            $message = "producto Modificado con exito!!";
        } else {
            $message = "producto no modificado, revise los datos";
        }
    } elseif ($_POST["metodo"] == "Eliminar") {
        $result = Producto::eliminarProducto($idProducto);
        $message = ($result) ? "Producto eliminado" : "";
    }
    if (isset($message)) {
        echo $message;
    }
}
