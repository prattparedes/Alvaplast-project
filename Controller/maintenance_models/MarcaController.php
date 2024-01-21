<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Alvaplast-project/autoload.php");

use Models\maintenance_models\Marca;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idMarca = isset($_POST["idMarca"]) && $_POST["idMarca"] !== "" ? $_POST["idMarca"] : 1;
    $descripcion = $_POST["descripcion"];
    $message;
    if ($_POST["metodo"] == "Grabar") {
        $result = Marca::registrarMarca($idMarca, $descripcion);
        $message = "marca grabada";
    } else if ($_POST["metodo"] == "Modificar") {
        $result = Marca::modificarMarca($idMarca, $descripcion);
        $message = "marca modificada";
    } else if ($_POST["metodo"] == "Eliminar") {
        $result = Marca::eliminarMarca($idMarca);
        $message = ($result) ? "marca eliminada" : "no se pudo eliminar la marca, esta registrada en otras operaciones";
    }
    echo $message;
}
