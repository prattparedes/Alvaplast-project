<?php  
require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/config/connection.php');


class TipoCambio
{
    public static function getTipoCambio(){
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarTipo_Cambio');
        return $data->fetchAll(PDO::FETCH_OBJ);   
    }
}



?>