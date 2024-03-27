<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/autoload.php");

use Models\ventas\EstadoCuenta;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (isset($_POST['fechaIni'])) {
        $fechaIni = $_POST['fechaIni'] . ":00";
        $fechaFin = $_POST['fechaFin'] . ":00";
        $result = EstadoCuenta::listarEstadoCuenta($fechaIni, $fechaFin);
        echo json_encode($result);
    }

    if (isset($_POST["tipo"])) {
        $idCuenta = (int) $_POST["idCuenta"];
        $total = (float) $_POST["total"];
        $pago = (float) $_POST["pago"];
        if ($_POST["tipo"] === "Anular") {
            $response = EstadoCuenta::anularPago($idCuenta, $total);
            $message = ($response) ? "Pago cancelado" : "error en la anulacion";
        } else if ($_POST["tipo"] === "Grabar") {
            if ($total == $pago) {
                $response = EstadoCuenta::registrarPagoTotal($idCuenta, $total);
                $message = ($response) ? "Todo correcto" : "error en el pago ";
            } else {
                $response = EstadoCuenta::registrarPagoParcial($pago, $total, $idCuenta);
            }
            $message = ($response) ? "Todo correcto" : "error en el pago parcial";
        }
    }
    if (isset($message)) {
        echo $message;
    }
}
