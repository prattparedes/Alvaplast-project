<?php  
require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/config/connection.php');

class Compra{
    


    public static function getCompras(){
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarCompra');
        return $data->fetchAll(PDO::FETCH_OBJ);
    }
}


?>