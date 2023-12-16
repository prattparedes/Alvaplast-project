<?php
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/config/connection.php");
class Moneda
{
    //Metodo de la Clase Moneda para obtener todas las monedas registradas
    public static function getMonedas()
    {
        $con = Connection::Conectar();               //Conexión a la base de datos
        $data = $con->query("exec sp_ListarMoneda"); //peticion de el procedimiento almacenado
        return $data->fetchAll(PDO::FETCH_OBJ);      //captura los datos y los retorna(PDO::FETCH_OBJ sirve para poder llamar a los campos como parametros)
    }
    //Metodo para registrar una nueva moneda 
    //parametros :
                   // id_moneda
                   //descripcion
                   //abreviatura
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
    //Metodo para modificar moneda 
    /*parametros :
                    id_moneda
                    descripcion
                    abreciatura*/ 
    public static function ModificarMoneda(int $id,string $descripcion, string $abr,)
    {
        try{
            $con = Connection::Conectar();  //Conexión a la base de datos
            $tsmt = $con->prepare("exec sp_ModificarMoneda :id, :desc, :abre");  //Preparamos el procedimiento con los parametros necesarios
            $tsmt->bindParam(":id",$id,PDO::PARAM_INT,10); //pasamos el primer parametro
            $tsmt->bindParam(":desc",$descripcion,PDO::PARAM_STR,20); //pasamos el segundo parametro 
            $tsmt->bindParam(":abre",$abr,PDO::PARAM_STR,4);//pasamos el tercer parametro
            $result=$tsmt->execute();
            echo $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
        
    }
    /*
    Metodo para eliminar moneda
    parametros :
                    id_moneda
     */
    public static function EliminarMoneda(int $id)
    {
        try{
            $con = Connection::Conectar();
            $tsmt = $con->prepare("sp_EliminarMoneda :id");
            $tsmt->bindParam(":id",$id,PDO::PARAM_INT,10);
            $result = $tsmt->execute();
            echo $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
         
    }
}