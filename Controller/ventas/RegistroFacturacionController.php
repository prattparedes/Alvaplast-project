<?php
use Models\ventas\RegistroFacturacion;

require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/autoload.php");


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $fechaIni = $_POST['fechaIni'];
    $fechaFin = $_POST['fechaFin'];
    $result = RegistroFacturacion::sp_ListarFacturacionXFecha3($fechaIni, $fechaFin);
    echo json_encode($result);
}
