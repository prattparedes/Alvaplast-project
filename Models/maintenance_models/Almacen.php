<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;

class Almacen
{

    public static function getAlmacenes()
    {
        $con = Connection::Conectar();
        $data = $con->query("exec sp_ListarAlmacen");
        return $data->fetchAll(PDO::FETCH_OBJ);
    }
}
