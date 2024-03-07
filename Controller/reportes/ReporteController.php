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
                $tipodoc =$_POST["tipodoc"];
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
                $idCliente = $_POST["idCliente"];
                $result = Reporte::listarReportexCliente($idCliente);
                echo json_encode($result);
                break;
                
            case "Producto":
                $idProducto = $_POST["idProducto"];
                $result = Reporte::listarReportexProducto($idProducto);
                echo json_encode($result);
                break;
            case "Marca":
                break;

            case "Serie":
              //  $idAlmacen = (int) $_POST["id_tipodocumento"];
                $fechaIni = $_POST["fechaIni"];
                $fechaFin = $_POST["fechaFin"];
                $result = Reporte::listarReportexSerie($fechaIni, $fechaFin);
                echo json_encode($result);

                break;
           
            case "Utilidad":
                $tipoDoc = $_POST["tipodoc"];
                $fechaIni = $_POST["fechaIni"];
                $fechaFin = $_POST["fechaFin"];
                $result = Reporte::listarReportexUtilidad($fechaIni, $fechaFin, $tipoDoc);
                echo json_encode($result);
                break;

                case "Costo":
                    $idAlmacen = (int) $_POST["idAlmacen"];
                    $fechaIni = $_POST["fechaIni"];
                    $fechaFin = $_POST["fechaFin"];
                    $result = Reporte::listarReportexCosto($fechaIni, $fechaFin,$idAlmacen);
                    echo json_encode($result);
                    break;
        }
    }
}