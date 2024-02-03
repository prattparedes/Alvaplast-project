<?php

namespace Models\maintenance_models;

use PDO;
use PDOException;
use config\Connection;

class Caja
{

    public static function getCajas()
    {
        $con = Connection::Conectar();
        $stmt = $con->query("exec sp_ListarCaja");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
