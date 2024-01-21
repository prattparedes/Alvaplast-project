<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Alvaplast-project/autoload.php");

use Models\maintenance_models\Almacen;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idAlmacen = isset($_POST["idAlmacen"]) && $_POST["idAlmacen"] !== "" ? $_POST["idAlmacen"] : 1;;
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
    } else if ($_POST["metodo"] === "Modificar") {
        $response = Almacen::modificarAlmacen($idAlmacen, $idSucursal, $descripcion);
        $message = ($response) ? "almacen modificado correctamente" : "error al modificar el almacen";
    } else if ($_POST["metodo"] === "Eliminar") {
        //$result = Almacen::eliminarCodFacturacion($cod_facturacion);
        $response = Almacen::eliminarAlmacen($idAlmacen);
        $message = ($response) ? "almacen eliminado completamente" : "no se pudo eliminar , este almacen ya está registrado en otra operación";
    }
    echo $message;
}
