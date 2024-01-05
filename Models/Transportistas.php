<?php  
require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/config/connection.php');


class Transportistas
{
    public static function getTransportistas(){
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarTransportista');
        return $data->fetchAll(PDO::FETCH_OBJ);   
    }
}



?>