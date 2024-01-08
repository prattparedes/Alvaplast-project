<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Alvaplast-project/Models/Mantenimiento/Linea.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idLinea = isset($_POST["idLinea"]) && $_POST["idLinea"] !== "-" ? $_POST["idLinea"] : 1;
    $descripcion = $_POST["descripcion"];
    $message;
    if ($_POST["metodo"] == "Grabar") {
        $result = Linea::registrarLinea($idLinea, $descripcion);
        $message = "Linea registrada";
    } elseif ($_POST["metodo"] == "Modificar") {
        $result = Linea::modificarLinea($idLinea, $descripcion);
        $message = "Linea modificada";
    } elseif ($_POST["metodo"] == "Eliminar") {
        $result = Linea::eliminarLinea($idLinea);
        $message = "Linea eliminada";
    }
    if ($result) {
        echo $message;
    }
}
