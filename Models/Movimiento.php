<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/Alvaplast-project/Config/connection.php");

class Movimiento
{
    //funcion para poder buscar un movimiento hecho de una compra
    public static function BuscarMovimientoCompra(int $idOperación)
    {   
        try{
            $con = Connection::Conectar();
            $data = $con->prepare("exec sp_BuscarMovimientoCompra ?");
            $data->bindParam(1,$idOperación,PDO::PARAM_INT);
            $data->execute();
            return $data->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            return array($e->getMessage());
        }
    }
}




?>