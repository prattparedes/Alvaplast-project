<?php  
require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/config/connection.php');


class Vehiculo
{
    public static function getVehiculos(){
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarVehiculo');
        return $data->fetchAll(PDO::FETCH_OBJ);   
    }
}



?>