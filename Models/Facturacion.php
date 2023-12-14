<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/config/connection.php');

class Facturacion{
    

    public static function getFacturacion(){
        $con = Connection::Conectar();
        $data = $con->query("exec sp_ListarFacturacionXAlmacen 2");
        return $data->fetchAll(PDO::FETCH_OBJ);
    }
}

?>