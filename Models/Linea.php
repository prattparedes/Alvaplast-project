<?php 
require_once("../config/connection.php");


class Linea{
    public static function ListarLineas(){
        $con = Connection::Conectar();
        $data = $con->query("exec sp_ListarLinea");
        return $data->fetchAll(PDO::FETCH_OBJ);
    }
}


?>