<?php  
require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/config/connection.php');


class TipoDocumento
{
    public static function getDocumentos(){
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarTipoDocumento');
        return $data->fetchAll(PDO::FETCH_OBJ);   
    }
}



?>