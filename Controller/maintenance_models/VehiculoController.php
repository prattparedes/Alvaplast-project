<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Alvaplast-project/autoload.php");

use Models\maintenance_models\Vehiculo;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //print_r($_POST);
    $idVehiculo = (int) $_POST["idVehiculo"];
    $placa = $_POST["placa"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $tipo = $_POST["tipo"];
    if ($_POST["metodo"] === "Grabar") {
        $response = Vehiculo::registrarVehiculo($idVehiculo, $placa, $marca, $modelo, $tipo);
        $message = ($response) ? "correcto registrado" : "incorrecto";
    } else if ($_POST["metodo"] === "Modificar") {
        $response = Vehiculo::modificarVehiculo($idVehiculo, $placa, $marca, $modelo, $tipo);
        $message = ($response) ? "correcto modificado" : "incorrecto";
    } else if ($_POST["metodo"] == "Eliminar") {
        $response = Vehiculo::eliminarVehiculo($idVehiculo);
        $message = ($response) ? "correcto eliminado" : "incorrecto";
    }
    echo $message;
}
