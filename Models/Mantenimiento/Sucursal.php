<?php  
require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/config/connection.php');

class Sucursal{
    
    public static function getSucursales(){
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarSucursal');
        return $data->fetch(PDO::FETCH_OBJ);
    }
    
}




?>