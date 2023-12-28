<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/config/connection.php');


class Linea{
    public static function ListarLineas(){
        $con = Connection::Conectar();
        $data = $con->query("exec sp_ListarLinea");
        return $data->fetchAll(PDO::FETCH_OBJ);
    }
}


?>