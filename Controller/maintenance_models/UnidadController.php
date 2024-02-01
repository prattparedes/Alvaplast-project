<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Alvaplast-project/autoload.php");

use Models\maintenance_models\Unidad;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idUnidad = isset($_POST["idUnidad"]) && $_POST["idUnidad"] !== "" ? $_POST["idUnidad"] : 1;
    $abreviatura = $_POST["abreviatura"];
    $descripcion = $_POST["descripcion"];
    $message;
    if ($_POST["metodo"] == "Grabar") {
        $result = Unidad::registrarUnidad($idUnidad, $abreviatura, $descripcion);
        $message = "unidad registrada";
    } else if ($_POST["metodo"] == "Modificar") {
        $result = Unidad::modificarUnidad($idUnidad, $abreviatura, $descripcion);
        $message = "unidad modificada";
    } else if ($_POST["metodo"] == "Eliminar") {
        $result = Unidad::eliminarUnidad($idUnidad);
        $message = ($result) ? "unidad eliminada" : "no se pudo eliminar la unidad, tiene usos en operaciones";
    }
    echo $message;
}
