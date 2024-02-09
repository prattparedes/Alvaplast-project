<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

use Models\reportes\Reporte;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['metodo'])) {
        $metodo = $_POST['metodo'];
        switch ($metodo) {
            case "Ventas":
                $idAlmacen = (int) $_POST["idAlmacen"];
                $fechaIni = $_POST["fechaIni"];
                $fechaFin = $_POST["fechaFin"];
                $result = Reporte::listarReporteVentas($fechaIni, $fechaFin, $idAlmacen);
                echo json_encode($result);
                break;
            case "Compras":
                break;
            case "Documento":
                break;
            case "Fecha":
                break;
            case "Cliente":
                break;
            case "Producto":
                break;
            case "Marca":
                break;
            case "Serie":
                break;
            case "Costo":
                break;
            case "Utilidad":
                break;
        }
    }
}