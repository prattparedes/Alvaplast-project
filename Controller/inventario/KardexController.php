<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

use Models\facturas\Facturacion;
use Models\inventario\Kardex;
use Models\maintenance_models\Producto;
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

    $idKardex = isset($_POST["idKardex"]) && $_POST["idKardex"] !== "" ? $_POST["idKardex"] : 1;
    $fecha = date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $_POST["fecha"])));
    $fechaFormateada = str_replace(' ', 'T', $fecha);
    $numeroDocumento = $_POST["numeroDocumento"];
    $serieDocumento = $_POST["serieDocumento"];
    $idDocumento = $_POST["idDocumento"];
    $idProducto = $_POST["idProducto"];
    $idAlmacen = $_POST["idAlmacen"];
    $idMovimiento = $_POST["idMovimiento"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];
    $descuento = $_POST["descuento"];
    $tipo = $_POST["tipo"];
    $total = $_POST["total"];
    $ruc = $_POST["ruc"];
    $nombre = $_POST['nombre'];
    $data = Producto::buscarstock($idProducto, $idAlmacen);
    $stock = $data->stock;
    echo $idKardex . "/";
    echo $idProducto . "/";
    echo $idAlmacen . "/";

    if ($_POST["metodo"] === "Grabar") {
        $response1 = Kardex::registrarKardex($idKardex, $fechaFormateada, $numeroDocumento, $serieDocumento, $idDocumento, $idProducto, $idAlmacen, $idMovimiento, $stock, $cantidad, $precio, $descuento, $tipo, $total, $ruc, $nombre);
        $response = Kardex::regularizarKardexFecha($idProducto, $idAlmacen, $fechaFormateada);
        $message = ($response) ? "todo correcto kbron" : "todo mal chabon";
        echo $message;
    } else if ($_POST["metodo"] === "Anular" || $_POST["metodo"] === "Eliminar") {
        $fechaK = Facturacion::obtenerFecha($idKardex, $idProducto, $idAlmacen);
        $result = Kardex::eliminarKardex($idKardex, $idProducto, $idAlmacen);
        if ($result) {
            Kardex::regularizarKardexFecha($idProducto, $idAlmacen, $fechaK);
            echo "logrado el eliminado";
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (isset($_GET["idMovimiento"])) {
        $idMovimiento = $_GET["idMovimiento"];
        $id = Kardex::listaridKardexMovimiento($idMovimiento);
        echo json_encode($id);
    }
}
