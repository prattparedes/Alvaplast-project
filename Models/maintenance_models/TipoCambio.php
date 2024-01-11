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
}
