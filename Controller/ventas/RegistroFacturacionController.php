<?php

use Models\ventas\RegistroFacturacion;

require_once($_SERVER['DOCUMENT_ROOT'] . "/autoload.php");


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $fecha = date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $_POST["fechaIni"])));
    $fechaIni = str_replace(' ', 'T', $fecha);
    $fecha2 = date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $_POST["fechaFin"])));
    $fechaFin = str_replace(' ', 'T', $fecha2);
    $result = RegistroFacturacion::sp_ListarFacturacionXFecha3($fechaIni, $fechaFin);
    echo json_encode($result);
}
