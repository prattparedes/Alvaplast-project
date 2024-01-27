<?php

namespace Models\ventas;

use config\Connection;
use PDO;
use PDOException;

class Venta
{
    public static function getIdVenta()
    {
        $con = Connection::Conectar();  
        $tsmt = $con->prepare('exec sp_BuscarIdVenta ?');
        $tsmt->bindParam(1,$id_compra,PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT,32);
        $tsmt->execute();
        $longitud = 7;
        $document_number = str_pad($id_compra,$longitud,"0",STR_PAD_LEFT);
        return $document_number;
    }

    // Método estático para obtener todas las ventas.
    public static function getVentas()
    {
        // Se establece la conexión utilizando la clase Connection.
        $connection = Connection::Conectar();

        // Se ejecuta un procedimiento almacenado para obtener la lista de ventas.
        $DATA = $connection->query("exec sp_ListarVenta");

        // Se recuperan los resultados en formato de objeto y se retornan.
        $ventas = $DATA->fetchAll(PDO::FETCH_OBJ);
        return $ventas;
    }

    public static function obtenerVentaId()
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare(" exec sp_BuscarIdVenta :id");
            $stmt->bindParam(":id", $idVenta, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 32);
            $stmt->execute();
            $longitud = 7;
            $documento = str_pad($idVenta, $longitud, "0", STR_PAD_LEFT);
            return $documento;
        } catch (PDOException $err) {
            echo $err->getMessage();
        } finally {
            if ($con) {
                $con = null;
            }
        }
    }


    //Registro de una venta sin cambio
    public static function registrarVenta(int $idVenta, int $idAlmacen, int $idPersonal, string $tipoDocumento, int $idCliente, string $fecha, float $total, float $subtotal, float $igv, int $idMoneda, string $numeroDocumento, string $serieDocumento, string $tipoPago, float $pagoInicial, float $montoFinanciado, int $numCuotas, float $montoCuota)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_RegistrarVenta :id,:idAlmacen,:idPersonal,:tipoDocumento,:idCliente,:fecha,:total,:subtotal,:igv,:idMoneda,:numeroDocumento,:serieDocumento,:tipoPago,:pagoInicial,:montoFinanciado,:numCuotas,:montoCuota");
            $stmt->bindParam(":id", $idVenta, PDO::PARAM_INT);
            $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->bindParam(":idPersonal", $idPersonal, PDO::PARAM_INT);
            $stmt->bindParam(":tipoDocumento", $tipoDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":idCliente", $idCliente, PDO::PARAM_INT);
            $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $stmt->bindParam(":total", $total, PDO::PARAM_STR);
            $stmt->bindParam(":subtotal", $subtotal, PDO::PARAM_STR);
            $stmt->bindParam(":igv", $igv, PDO::PARAM_STR);
            $stmt->bindParam(":idMoneda", $idMoneda, PDO::PARAM_INT);
            $stmt->bindParam(":numeroDocumento", $numeroDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":serieDocumento", $serieDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":tipoPago", $tipoPago, PDO::PARAM_STR);
            $stmt->bindParam(":pagoInicial", $pagoInicial, PDO::PARAM_STR);
            $stmt->bindParam(":montoFinanciado", $montoFinanciado, PDO::PARAM_STR);
            $stmt->bindParam(":numCuotas", $numCuotas, PDO::PARAM_INT);
            $stmt->bindParam(":montoCuota", $montoCuota, PDO::PARAM_STR);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        } finally {
            if ($con) {
                $con = null;
            }
        }
    }

    //Registro de venta con cambio
    public static function registrarVentaConCambion(int $idVenta, int $idAlmacen, int $idPersonal, string $idDocumento, int $idCliente, string $fecha, float $total, float $subtotal, float $igv, int $idMoneda, string $numeroDocumento, string $serieDocumento, string $tipoPago, float $pagoInicial, float $montoFinanciado, int $numCuotas, float $montoCuotas, float $tipoCambio)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_RegistrarVentaConCambion :id, :idAlmacen,:idPersonal,:idTipoDocumento,:idCliente,:fecha,:total,:subtotal,:igv,:idMoneda,:numeroDocumento,:serieDocumento,:tipoPago,:pagoInicial,:montoFinanciado,:numCuotas,:montoCuotas,:tipoCambio");
            $stmt->bindParam(":id", $idVenta, PDO::PARAM_INT);
            $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->bindParam(":idPersonal", $idPersonal, PDO::PARAM_INT);
            $stmt->bindParam(":idTipoDocumento", $idDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":idCliente", $idCliente, PDO::PARAM_INT);
            $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $stmt->bindParam(":total", $total, PDO::PARAM_STR);
            $stmt->bindParam(":subtotal", $subtotal, PDO::PARAM_STR);
            $stmt->bindParam(":igv", $igv, PDO::PARAM_STR);
            $stmt->bindParam(":idMoneda", $idMoneda, PDO::PARAM_INT);
            $stmt->bindParam(":numeroDocumento", $numeroDocumento, PDO::PARAM_STR);
            $stmt->bindParam("serieDocumento", $serieDocumento, PDO::PARAM_STR);
            $stmt->bindParam("tipoPago", $tipoPago, PDO::PARAM_STR);
            $stmt->bindParam(":pagoInicial", $pagoInicial, PDO::PARAM_STR);
            $stmt->bindParam("montoFinanciado", $montoFinanciado, PDO::PARAM_STR);
            $stmt->bindParam(":numCuotas", $numCuotas, PDO::PARAM_INT);
            $stmt->bindParam(":montoCuotas", $montoCuotas, PDO::PARAM_STR);
            $stmt->bindParam(":tipoCambio", $tipoCambio, PDO::PARAM_STR);
            $stmt->execute();
            $result = ($stmt) ? true : false;
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        } finally {
            if ($con) {
                $con = null;
            }
        }
    }

    //metodo para modificar venta
    public static function modificarVenta(int $idVenta, int $idAlmacen, int $idPersonal, string $tipoDocumento, int $idCliente, string $fecha, float $total, float $subtotal, float $igv, int $idMoneda, string $numeroDocumento, string $serieDocumento, string $tipoPago, float $pagoInicial, float $montoFinanciado, int $numCuotas, float $montoCuota)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ModificarVenta :id,:idAlmacen,:idPersonal,:tipoDocumento,:idCliente,:fecha,:total,:subtotal,:igv,:idMoneda,:numeroDocumento,:serieDocumento,:tipoPago,:pagoInicial,:montoFinanciado,:numCuotas,:montoCuota");
            $stmt->bindParam(":id", $idVenta, PDO::PARAM_INT);
            $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->bindParam(":idPersonal", $idPersonal, PDO::PARAM_INT);
            $stmt->bindParam(":tipoDocumento", $tipoDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":idCliente", $idCliente, PDO::PARAM_INT);
            $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $stmt->bindParam(":total", $total, PDO::PARAM_STR);
            $stmt->bindParam(":subtotal", $subtotal, PDO::PARAM_STR);
            $stmt->bindParam(":igv", $igv, PDO::PARAM_STR);
            $stmt->bindParam(":idMoneda", $idMoneda, PDO::PARAM_INT);
            $stmt->bindParam(":numeroDocumento", $numeroDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":serieDocumento", $serieDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":tipoPago", $tipoPago, PDO::PARAM_STR);
            $stmt->bindParam(":pagoInicial", $pagoInicial, PDO::PARAM_STR);
            $stmt->bindParam(":montoFinanciado", $montoFinanciado, PDO::PARAM_STR);
            $stmt->bindParam(":numCuotas", $numCuotas, PDO::PARAM_INT);
            $stmt->bindParam(":montoCuota", $montoCuota, PDO::PARAM_STR);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        } finally {
            if ($con) {
                $con = null;
            }
        }
    }

    //Metodo par eliminar una venta
    public static function eliminarVenta(int $idVenta)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_EliminarVenta :id");
            $stmt->bindParam(":id", $idVenta, PDO::PARAM_INT);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }
}
