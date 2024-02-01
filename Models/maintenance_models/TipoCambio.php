<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;
use Exception;


class TipoCambio
{
    public static function getTipoCambio()
    {
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarTipo_Cambio');
        return $data->fetchAll(PDO::FETCH_OBJ);
    }

    //Funcion para recoger el tipo cambio que tiene el dolar para la compra
    public static function obtenerTipoCambio(string $orden  = "v"): float  //pedimos un parametro para saber que tipo de orden sera (o compra o venta)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->query("exec sp_LitarTipo_Cambio");
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            if ($orden == "c") {
                return $data->cambio_compra;
            } else {
                return $data->cambio_venta;
            }
        } catch (Exception $err) {

            echo $err->getMessage();
            return 0.00;
        } finally {
            if ($con) {
                $con = null;
            }
        }
    }
}
