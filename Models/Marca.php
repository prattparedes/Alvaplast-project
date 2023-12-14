<?php  
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/config/connection.php");

class Marca
{

    public static function getMarcas() {
        $con = Connection::Conectar();
        $data = $con->query("exec sp_ListarMarca");
        return $data->fetchAll(PDO::FETCH_OBJ);
    }


}



?>