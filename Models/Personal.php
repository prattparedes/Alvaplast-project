<?php  
require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/config/connection.php');


class Personal
{
    public static function getPersonal(){
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarPersonal');
        return $data->fetchAll(PDO::FETCH_OBJ);   
    }

    public static function getPermisos(){
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarPersonal');
        return $data->fetchAll(PDO::FETCH_OBJ);   
    }
}



?>