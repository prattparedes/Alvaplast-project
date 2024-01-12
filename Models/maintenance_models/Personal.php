<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;
use Exception;


class Personal
{
    public static function getPersonal(){
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarPersonal');
        return $data->fetchAll(PDO::FETCH_OBJ);   
    }
}
