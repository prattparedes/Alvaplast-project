<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/config/connection.php");

class Proveedor{



    public static function listarProveedores(){
        $con = Connection::Conectar();
        $data = $con->query("exec sp_ListarProveedor");
        return $data->fetchAll(PDO::FETCH_OBJ);
    }
}

?>