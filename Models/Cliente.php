<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/config/Connection.php");
class Cliente{


    //Metodo de lista clientes
    public static function getClients(){
        try{
            $con = Connection::Conectar();
            $data = $con->query("exec sp_ListarCliente");
            return $data->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $err){
            echo $err->getMessage();
        }
    }
}


?>