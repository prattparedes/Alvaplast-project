<?php   
require_once("../config/connection.php");
class Moneda {

    public static function getMonedas(){
        $con = Connection::Conectar();  
        $data = $con->query("exec sp_ListarMoneda");
        return $data->fetchAll(PDO::FETCH_OBJ); 
    }

    public static function RegistrarMoneda(string $descripcion,string $abr): int{
        $id = 1;
        $con = Connection::Conectar();
        $data = $con->prepare("exec sp_RegistrarMoneda @id_moneda = :id ,@descripcion=:desc, @simbolo = :abre");
        $data->bindParam(":id",$id, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT,10);
        $data->bindParam(":desc", $descripcion, PDO::PARAM_STR,20);
        $data->bindParam(":abre", $abr, PDO::PARAM_STR_CHAR,4);
        $data->execute();
        var_dump($id);
        return $id;
    }
}


?>