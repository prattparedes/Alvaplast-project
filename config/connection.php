<?php

namespace config;

use PDO;
use PDOException;

class Connection
{
    private static $host = "201.218.159.67";
    private static $database = "BD_BLING";

    static function Conectar()
    {
        try {
            $con = new PDO("sqlsrv:server=" . Connection::$host . ";database=" . Connection::$database . ";ConnectionPooling=0", null, null);
            return $con;
        } catch (PDOException $e) {
            echo  $e->getMessage();
        }
    }
}
