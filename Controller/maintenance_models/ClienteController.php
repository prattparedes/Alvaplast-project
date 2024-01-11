<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Alvaplast-project/autoload.php");

use Models\maintenance_models\Cliente;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idCliente = isset($_POST["idCliente"]) && $_POST["idCliente"] !== "-" ? $_POST["idCliente"] : 1;
    $razonSocial = $_POST["razonSocial"];
    $ruc = $_POST["ruc"];
    $dni = $_POST["dni"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $celular = $_POST["celular"];
    $estado = $_POST["estado"];
    $tipoCliente = $_POST["tipoCliente"];
    $distrito = $_POST["distrito"];
    $idUbigeo = $_POST["idUbigeo"];
    $message;
    if ($_POST["metodo"] == "Grabar") {
        $result = Cliente::RegistrarCliente($idCliente, $razonSocial, $ruc, $dni, $direccion, $telefono, $celular, $estado, $tipoCliente, $distrito, $idUbigeo);
        $message = "cliente grabado";
    } elseif ($_POST["metodo"] == "Modificar") {
        $result = Cliente::ModificarCliente($idCliente, $razonSocial, $ruc, $dni, $direccion, $telefono, $celular, $estado, $tipoCliente, $distrito, $idUbigeo);
        $message = "cliente modificado";
    } elseif ($_POST["metodo"] == "Eliminar") {
        $result = Cliente::EliminarCliente($idCliente);
        $message = "cliente eliminado";
    }
    if ($result) {
        echo $message;
    }
}
