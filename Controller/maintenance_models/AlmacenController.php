<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/autoload.php");

use Models\maintenance_models\Almacen;
use Models\maintenance_models\Caja;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idAlmacen = isset($_POST["idAlmacen"]) && $_POST["idAlmacen"] !== "" ? $_POST["idAlmacen"] : 1;
    $idSucursal = (int) $_POST["idSucursal"];
    $descripcion = $_POST["descripcion"];
    $cod_facturacion = $_POST["cod_facturacion"];

    if ($_POST["metodo"] === "Grabar") {
        $response = Almacen::registrarAlmacen($idAlmacen, $idSucursal, $descripcion);
        if ($response) {
            $idNuevo = Almacen::getIdAlmacen();
            $result = Almacen::registrarCodFacturacion($cod_facturacion, $idNuevo);
        }
        $message = (isset($result)) ? "almacen guardado correctamente" : "error al crear el almacen";
    } else if ($_POST["metodo"] === "modificar") {
        $response = Almacen::modificarAlmacen($idAlmacen, $idSucursal, $descripcion);
        $message = ($response) ? "almacen modificado correctamente" : "error al modificar el almacen";
    } else if ($_POST["metodo"] === "Eliminar") {
        //$result = Almacen::eliminarCodFacturacion($cod_facturacion);
        $response = Almacen::eliminarAlmacen($idAlmacen);
        $message = ($response) ? "almacen eliminado completamente" : "no se pudo eliminar , este almacen ya está registrado en otra operación";
    }
    echo $message;
} else if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (isset($_GET["idSucursal"])) {
        $data = Almacen::listarAlmacen($_GET["idSucursal"]);
        echo json_encode($data);
    } else if (isset($_GET["idAlmacen"])) {
        $data = Caja::getCajasXAlmacen($_GET["idAlmacen"]);
        echo json_encode($data);
    } else if (isset($_GET["id"])) {
        $data = Almacen::obtenerCodFacturacion($_GET["id"]);
        echo json_encode($data);
    }
}
