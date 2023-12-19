<?php
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/config/connection.php");
class Moneda
{

    public static function getMonedas()
    {
        $con = Connection::Conectar();
        $data = $con->query("exec sp_ListarMoneda");
        return $data->fetchAll(PDO::FETCH_OBJ);
    }

<<<<<<< HEAD
    public static function RegistrarMoneda(int $id_moneda,string $descripcion, string $abr){ 
       try{
        $con = Connection::Conectar();
        $tsmt = $con->prepare("exec sp_RegistrarMoneda ?, ?, ?");
        $result=$tsmt->execute([$id_moneda,$descripcion,$abr]);
        echo $result ;
       }catch(Exception $ex){
        echo "ERROR:" .$ex->getMessage();
        
        }
        
    }

    public static function ModificarMoneda(int $id,string $descripcion, string $abr,)
=======
    public static function RegistrarMoneda(int $id_moneda,string $descripcion, string $abr):bool{ 
        $con = Connection::Conectar();
        $tsmt = $con->prepare("exec sp_RegistrarMoneda ?, ?, ?");
        $result=$tsmt->execute([$id_moneda,$descripcion,$abr]);
        return $result ;
    }

    public static function ModificarMoneda(int $id,string $descripcion, string $abr,): bool
>>>>>>> pruebas
    {
        try{
            $con = Connection::Conectar();
            $tsmt = $con->prepare("exec sp_ModificarMoneda :id, :desc, :abre");
            $tsmt->bindParam(":id",$id,PDO::PARAM_INT,10);
            $tsmt->bindParam(":desc",$descripcion,PDO::PARAM_STR,20);
            $tsmt->bindParam(":abre",$abr,PDO::PARAM_STR,4);
            $result=$tsmt->execute();
            echo $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
        
    }

    public static function EliminarMoneda(int $id):bool
    {
        $con = Connection::Conectar();
        $tsmt = $con->prepare("sp_EliminarMoneda :id");
        $tsmt->bindParam(":id",$id,PDO::PARAM_INT,10);
        $result = $tsmt->execute();
        return $result; 
    }
}