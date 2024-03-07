<?php

namespace Models\ventas;

use config\Connection;
use PDO;
use PDOException;

class RegistroFacturacion
{

    //Metodo de registro de los productos de la venta
    public static function sp_ListarFacturacionXFecha3($fechaIni, $fechaFin,)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("sp_ListarFacturacionXFecha3 :fechaIni,:fechaFin");
            $stmt->bindParam(":fechaIni", $fechaIni, PDO::PARAM_STR);
            $stmt->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        }
    }
}


