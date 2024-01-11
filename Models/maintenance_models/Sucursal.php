<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;
use Exception;

class Sucursal
{

    public static function getSucursales()
    {
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarSucursal');
        return $data->fetch(PDO::FETCH_OBJ);
    }
}
