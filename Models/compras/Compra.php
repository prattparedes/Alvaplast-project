<?php

namespace Models\compras;

use config\Connection;
use PDO;
use Exception;
use PDOException;

class Compra
{

    public static function getIdCompra()
    {
        $con = Connection::Conectar();
        $tsmt = $con->prepare('exec sp_BuscarIdCompra ?');
        $tsmt->bindParam(1, $id_compra, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 32);
        $tsmt->execute();
        $longitud = 7;
        $document_number = str_pad($id_compra, $longitud, "0", STR_PAD_LEFT);
        return $document_number;
    }


    public static function getCompras()
    {
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarCompra');
        return $data->fetchAll(PDO::FETCH_OBJ);
    }

    public static function RegistrarCompra(int $idCompra, string $fecha, float $total, float $subtotal, float $igv, int $idMoneda, string $numeroDocumento, string $serieDocumento, int $idProveedor, int $idAlmacen, string $tipoPago, int $idPersonal): bool
    {
        try {
            $con = Connection::Conectar();
            $tsmt = $con->prepare('exec sp_RegistrarCompra :idCompra, :fecha, :total, :subtotal, :igv, :idMoneda, :numeroDocumento, :serieDocumento, :idProveedor, :idAlmacen,:tipoPago, :idPersonal');
            $tsmt->bindParam(":idCompra", $idCompra, PDO::PARAM_INT);                                           //paramtro del idCompra 
            $tsmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);                                                 //parametro de la fecha 
            $tsmt->bindParam(":total", $total, PDO::PARAM_STR);                                                 //parametro del total
            $tsmt->bindParam(":subtotal", $subtotal, PDO::PARAM_STR);                                           //parametro del subtotal
            $tsmt->bindParam(":igv", $igv, PDO::PARAM_STR);                                                     //parametro del IGV
            $tsmt->bindParam(":idMoneda", $idMoneda, PDO::PARAM_INT);                                           //parametro del codigo de moneda
            $tsmt->bindParam(":numeroDocumento", $numeroDocumento, PDO::PARAM_STR);                              //parametro del numero de documento
            $tsmt->bindParam(":serieDocumento", $serieDocumento, PDO::PARAM_STR);                               //parametro de la serie del documento
            $tsmt->bindParam(":idProveedor", $idProveedor, PDO::PARAM_INT);                                     //parametro del codigo del proveedor
            $tsmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);                                         //parametro del codigo de almacen
            $tsmt->bindParam(":tipoPago", $tipoPago, PDO::PARAM_STR);                                           //parametro del tipo de pago
            $tsmt->bindParam(":idPersonal", $idPersonal, PDO::PARAM_INT);                                       //parametro del codigo del personal
            $tsmt->execute();                                 //ejecución del procedimiento almacenado
            $result = ($tsmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    //Registrar compra con tipo cambio
    public static function RegistrarCompraConCambio(int $idCompra, string $fecha, float $total, float $subtotal, float $igv, int $idMoneda, string $numeroDocumento, string $serieDocumento, int $idProveedor, int $idAlmacen, float $tipoCambio, string $tipoPago, int $idPersonal): bool
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare('exec sp_RegistrarCompraConCambion :idCompra, :fecha, :total, :subtotal, :igv, :idMoneda, :numeroDocumento, :serieDocumento, :idProveedor, :idAlmacen, :tipoCambio, :tipoPago, :idPersonal');
            $stmt->bindParam(':idCompra', $idCompra, PDO::PARAM_INT);
            $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $stmt->bindParam(':total', $total, PDO::PARAM_INT);
            $stmt->bindParam(":subtotal", $subtotal, PDO::PARAM_STR);
            $stmt->bindParam(":igv", $igv, PDO::PARAM_STR);
            $stmt->bindParam(":idMoneda", $idMoneda, PDO::PARAM_INT);
            $stmt->bindParam(":numeroDocumento", $numeroDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":serieDocumento", $serieDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":idProveedor", $idProveedor, PDO::PARAM_INT);
            $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->bindParam(":tipoCambio", $tipoCambio, PDO::PARAM_STR);
            $stmt->bindParam(":tipoPago", $tipoPago, PDO::PARAM_STR);
            $stmt->bindParam(":idPersonal", $idPersonal, PDO::PARAM_INT);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }

    public static function EliminarCompra(int $idCompra, int $idPersonal): bool
    {
        try {
            $con = Connection::Conectar();
            $tsmt = $con->prepare('sp_EliminarCompra :idCompra, :idPersonal');
            $tsmt->bindParam(":idCompra", $idCompra, PDO::PARAM_INT);
            $tsmt->bindParam(":idPersonal", $idPersonal, PDO::PARAM_INT);
            $tsmt->execute();
            $result = ($tsmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (Exception $er) {
            echo $er->getMessage();
            return false;
        }
    }

    public static function ListarCompraXid(int $idCompra)
    {
        try {
            $con =  Connection::Conectar();
            $stmt = $con->prepare("exec sp_ListaCompraXID :idCompra");
            $stmt->bindParam(":idCompra", $idCompra, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function ModificarCompra(int $idCompra, string $fecha, float $total, float $subtotal, float $igv, int $idMoneda, string $numeroDocumento, string $serieDocumento, int $idProveedor, int $idAlmacen, string $tipoPago, int $idPersonal): bool
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ModificarCompra :idCompra, :fecha, :total, :subtotal, :igv, :idMoneda, :numeroDocumento, :serieDocumento, :idProveedor, :idAlmacen, :tipoPago, :idPersonal");
            $stmt->bindParam(":idCompra", $idCompra, PDO::PARAM_INT);
            $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $stmt->bindParam(":total", $total, PDO::PARAM_STR);
            $stmt->bindParam(":subtotal", $subtotal, PDO::PARAM_STR);
            $stmt->bindParam(":igv", $igv, PDO::PARAM_STR);
            $stmt->bindParam(":idMoneda", $idMoneda, PDO::PARAM_INT);
            $stmt->bindParam(":numeroDocumento", $numeroDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":serieDocumento", $serieDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":idProveedor", $idProveedor, PDO::PARAM_INT);
            $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->bindParam(":tipoPago", $tipoPago, PDO::PARAM_STR);
            $stmt->bindParam(":idPersonal", $idPersonal, PDO::PARAM_INT);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
            //$result=$stmt->execute([$idCompra,$fecha,$total,$subtotal,$igv,$idMoneda,$numeroDocumento,$serieDocumento,$idProveedor,$idAlmacen,$tipoPago,$idPersonal]);
            return $result;
        } catch (Exception $er) {
            echo $er->getMessage();
            return false;
        } finally {
            ($con) ? null : null;
        }
    }
}
