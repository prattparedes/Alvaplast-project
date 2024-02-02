<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;

class Concepto
{

    public static function getConceptos()
    {
        $con = Connection::Conectar();
        $data = $con->query("exec sp_ListarConcepto");
        return $data->fetchAll(PDO::FETCH_OBJ);
    }
}
