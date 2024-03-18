<?php

use Models\ventas\VentaProducto;

require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/autoload.php");

use Models\ventas\EstadoCuenta;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $fechaIni = $_POST['fechaIni'] . ":00";
    $fechaFin = $_POST['fechaFin'] . ":00";
    $result = EstadoCuenta::listarEstadoCuenta($fechaIni, $fechaFin);
    echo json_encode($result);
}
