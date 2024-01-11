<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;
use Exception;

class Vehiculo
{
    public static function getVehiculos()
    {
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarVehiculo');
        return $data->fetchAll(PDO::FETCH_OBJ);
    }
}
