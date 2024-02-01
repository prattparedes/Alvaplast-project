<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Alvaplast-project/autoload.php");

use Models\maintenance_models\TipoDocumento;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $id = isset($_POST["idDocumento"]) && $_POST["idDocumento"] !== "" ? $_POST["idDocumento"] : 1;
    $abreviatura = $_POST["abreviatura"];
    $descripcion = $_POST["descripcion"];
    if ($_POST["metodo"] === "Grabar") {
        $response = TipoDocumento::registrarDocumento($id, $abreviatura, $descripcion);
        $message = ($response) ? "registrado correctamente" : "error al registrar";
    } else if ($_POST["metodo"] === "Modificar") {
        $response = TipoDocumento::modificarDocumento($id, $abreviatura, $descripcion);
        $message = ($response) ? "modificado correctamente" : "error";
    } else if ($_POST["metodo"] === "Eliminar") {
        $response = TipoDocumento::eliminarDocumento($id);
        $message = ($response) ? "eliminado correctamente" : "error";
    }
    echo $message;
}
