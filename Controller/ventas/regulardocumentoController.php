<?php

use Models\ventas\RegularDocumento;

require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/autoload.php");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $fechaIni = $_POST['fechaIni'];
    $fechaFin = $_POST['fechaFin'];
    $fecha1 = $fechaIni . ":00";
    $fecha2 = $fechaFin . ":00";
    $result = RegularDocumento::sp_ListarDocumentosVentas($fecha1, $fecha2);
    echo json_encode($result);
}
