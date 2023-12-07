<?php  
require_once("../../config/connection.php");

class Venta{


    public static function getVentas(){
        $con = Connection::Conectar (); 
        $data=$con->query ("exec sp_ListarVenta");
        return $data->fetchAll(PDO::FETCH_OBJ);
    }
}



?>