<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/autoload.php");

use Models\maintenance_models\Transportistas;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $id = isset($_POST["idTrans"]) && $_POST["idTrans"] !== "" ? $_POST["idTrans"] : 1;
    $nombre = $_POST["nombre"];
    $apPaterno = $_POST["ap_paterno"];
    $apMaterno = $_POST["ap_materno"];
    $dni = $_POST["dni"];
    $ruc = $_POST["ruc"];
    $licencia = $_POST["licencia"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $celular = $_POST["celular"];
    $estado = $_POST["estado"];
    if ($_POST["metodo"] === "Grabar") {
        $response = Transportistas::registrartransportista($id, $nombre, $apPaterno, $apMaterno, $dni, $ruc, $licencia, $direccion, $telefono, $celular, $estado);
        $message = ($response) ? "transportista registrado" : "";
    } else if ($_POST["metodo"] === "modificar") {
        $response = Transportistas::modificarTransportista($id, $nombre, $apPaterno, $apMaterno, $dni, $ruc, $licencia, $direccion, $telefono, $celular, $estado);
        $message = ($response) ? "modificacion exitosa" : "un error ocurrio";
    } else if ($_POST["metodo"] === "Eliminar") {
        $response = Transportistas::eliminarTransportista($id);
        $message = ($response) ? "eliminado correctamente" : " hubo algun problema";
    }
    if (isset($message)) {

        echo $message;
    }
}
