<?php
require_once("../config/connection.php");

class Almacen{

    public static function getAlmacenes(){
        $con = Connection::Conectar();
        $data=$con->query("exec sp_ListarAlmacen");
        return $data->fetchAll(PDO::FETCH_OBJ);
    }
}

?>