<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/autoload.php");

use Models\ventas\EstadoCuenta;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (isset($_POST["fechaIni"])) {
        $fechaIni = $_POST['fechaIni'] . ":00";
        $fechaFin = $_POST['fechaFin'] . ":00";
        $result = EstadoCuenta::listarEstadoCuenta($fechaIni, $fechaFin);
        echo json_encode($result);
    }

    if (isset($_POST["metodo"])) {
        $idCuenta = (int) $_POST["idCuenta"];
        $total = (float) $_POST["total"];
        $pago = (float) $_POST["pago"];
        if ($_POST["metodo"] === "Anular") {
            $response = EstadoCuenta::anularPago($idCuenta, $total);
        } else if ($_POST["metodo"] === "Grabar") {
            if ($total == $pago) {
                $response = EstadoCuenta::registrarPagoTotal($idCuenta, $total);
            } else {
                $response = EstadoCuenta::registrarPagoParcial($pago, $total, $idCuenta);
            }
            $message = ($response) ? "Todo correcto" : "error en insercion ";
        }
    }
}
