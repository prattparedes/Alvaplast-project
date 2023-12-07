<?php

class Connection{

    static function Conectar(){
        try
        {
            $con = new PDO("sqlsrv:server=localhost;database=BD_BLING;ConnectionPooling=0",null,null);
            return $con;
        } catch( PDOException $e ){
            echo  $e->getMessage() ;
    }
    }

}

?>