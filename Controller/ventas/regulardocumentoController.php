<?php
use Models\ventas\RegularDocumento;

require_once($_SERVER['DOCUMENT_ROOT'] . "/autoload.php");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $fechaIni = $_POST['fechaIni'];
    $fechaFin = $_POST['fechaFin'];
    $result = RegularDocumento::sp_ListarDocumentosVentas($fechaIni, $fechaFin);
    echo json_encode($result);
}
