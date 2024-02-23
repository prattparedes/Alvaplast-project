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
                $idAlmacen = (int) $_POST["idAlmacen"];
                $fechaIni = $_POST["fechaIni"];
                $fechaFin = $_POST["fechaFin"];
                $proveedor = $_POST["proveedor"];
                $result = Reporte::listarReporteCompras($fechaIni, $fechaFin, $proveedor, $idAlmacen);
                echo json_encode($result);
                break;
            case "Documento":
                $idAlmacen = (int) $_POST["tipodoc"];
                $fechaIni = $_POST["fechaIni"];
                $fechaFin = $_POST["fechaFin"];
                $result = Reporte::listarReportexDocumento($fechaIni, $fechaFin, $tipodoc);
                echo json_encode($result);
                break;
                
            case "Fecha":
                $fechaIni = $_POST["fechaIni"];
                $fechaFin = $_POST["fechaFin"];
                $result = Reporte::listarReportexFechas($fechaIni, $fechaFin);
                echo json_encode($result);
                break;
            case "Cliente":
                break;
            case "Producto":
                break;
            case "Marca":
                break;
            case "Serie":
                $fechaIni = $_POST["fechaIni"];
                $fechaFin = $_POST["fechaFin"];
                $result = Reporte::listarReportexSerie($fechaIni, $fechaFin);
                echo json_encode($result);

                break;
            case "Costo":
                break;
            case "Utilidad":
                break;
        }
    }
}