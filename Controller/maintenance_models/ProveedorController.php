<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Alvaplast-project/autoload.php");

use Models\maintenance_models\Proveedor;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idProveedor = isset($_POST["idProveedor"]) && $_POST["idProveedor"] !== "" ? $_POST["idProveedor"] : 1;
    $idUbigeo = $_POST["idUbigeo"];
    $razonSocial = $_POST["razonSocial"];
    $ruc = $_POST["ruc"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $fax = $_POST["fax"];
    $contacto = $_POST["contacto"];
    $email = $_POST["email"];
    $descripcion = isset($_POST["descripcion"]) && $_POST["descripcion"] !== "" ? $_POST["descripcion"] : "";
    $estado = (int) $_POST["estado"];
    $estadoReal = (bool) $estado;
    $message;
    if ($_POST["metodo"] == "Grabar") {
        $result = Proveedor::registrarProveedor($idProveedor, $idUbigeo, $razonSocial, $ruc, $direccion, $telefono, $fax, $contacto, $email, $descripcion, $estadoReal);
        $message = "proveedor registrado";
    } else if ($_POST["metodo"] == "modificar") {
        $result = Proveedor::modificarProveedor($idProveedor, $idUbigeo, $razonSocial, $ruc, $direccion, $telefono, $fax, $contacto, $email, $descripcion, $estadoReal);
        $message = "proveedor modificado";
    } else if ($_POST["metodo"] == "Eliminar") {
        $result = Proveedor::eliminarProveedor($idProveedor);
        $message = ($result) ? "proveedor eliminado" : "error al eliminar el proveedor";
    }
    if (isset($message)) {
        echo $message;
    }
} else if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $idProveedor = $_GET["idProveedor"];
    $data = Proveedor::obtenerProveedorPorID($idProveedor);
    echo json_encode($data);
}
