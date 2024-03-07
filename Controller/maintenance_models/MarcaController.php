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
    } else if ($_POST["metodo"] == "modificar") {
        $result = Marca::modificarMarca($idMarca, $descripcion);
        $message = "marca modificada";
    } else if ($_POST["metodo"] == "Eliminar") {
        $result = Marca::eliminarMarca($idMarca);
        $message = ($result) ? "marca eliminada" : "no se pudo eliminar la marca, esta registrada en otras operaciones";
    }
    echo $message;
 } else if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["marca"])) {
        $marca = $_GET["marca"];
        $data = Marca::obtenerProductoxMarca($marca);
        echo json_encode($data);
    } else {
        echo "No se recibió la marca.";
    }
    
    
}
