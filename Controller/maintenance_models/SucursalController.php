<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/autoload.php");

use Models\maintenance_models\Sucursal;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idSucursal = isset($_POST["idSucursal"]) && $_POST["idSucursal"] !== "" ? $_POST["idSucursal"] : 1;
    $descripcion = $_POST["descripcion"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    if ($_POST["metodo"] == "Grabar") {
        $result = Sucursal::registrarSucursal($idSucursal, $descripcion, $direccion, $telefono);
        $message = ($result) ? "surcursal registrada" : "error al registrar sucursal";
    } else if ($_POST["metodo"] == "modificar") {
        $result = Sucursal::modificarSucursal($idSucursal, $descripcion, $direccion, $telefono);
        $message = ($result) ? "sucursal modificada" : "error al modificar la sucursal";
    } else if ($_POST["metodo"] == "Eliminar") {
        $result = Sucursal::eliminarSucursal($idSucursal);
        $message = ($result) ? "sucursal eliminada" : "no se pudó eliminar la sucursal, tiene almacenes creados de esa sucursal";
    }
    echo $message;
}
