<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;
use Exception;

class Transportistas
{
    public static function getTransportistas()
    {
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarTransportista');
        return $data->fetchAll(PDO::FETCH_OBJ);
    }
}
