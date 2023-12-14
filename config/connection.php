<?php

class Connection{
    private static $host = "localhost";
    private static $database = "BD_BLING";

    static function Conectar(){
        try
        {
            $con = new PDO("sqlsrv:server=".Connection::$host.";database=".Connection::$database.";ConnectionPooling=0",null,null);
            return $con;
        } catch( PDOException $e ){
            echo  $e->getMessage() ;
    }
    }

}
?>