<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;
use Exception;

class TipoDocumento
{
    public static function getDocumentos()
    {
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarTipoDocumento');
        return $data->fetchAll(PDO::FETCH_OBJ);
    }
}
