<?php  
require_once('../../config/connection.php');

class Compra{
    


    public static function getCompras(){
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarCompra');
        return $data->fetchAll(PDO::FETCH_OBJ);
    }
}


?>