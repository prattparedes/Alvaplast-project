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
    public static function RegistrarMoneda(int $id_moneda,string $descripcion, string $abr):bool{
         
       try{
        $con = Connection::Conectar();
        $tsmt = $con->prepare("exec sp_RegistrarMoneda ?, ?, ?");
        $result=$tsmt->execute([$id_moneda,$descripcion,$abr]);
        return $result ;
       }catch(Exception $ex){
        echo "ERROR:" .$ex->getMessage();
        return false; 
        }
        
    }
    //Metodo para modificar moneda 
    /*parametros :
                    id_moneda
                    descripcion
                    abreciatura*/ 
    public static function ModificarMoneda(int $id,string $descripcion, string $abr,):bool
    {
        try{
            $con = Connection::Conectar();  //Conexión a la base de datos
            $tsmt = $con->prepare("exec sp_ModificarMoneda :id, :desc, :abre");  //Preparamos el procedimiento con los parametros necesarios
            $result=$tsmt->execute([$id,$descripcion,$abr]);
            return $result;
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
        
    }
    /*
    Metodo para eliminar moneda
    parametros :
                    id_moneda
     */
    public static function EliminarMoneda(int $id):bool
    {
        try{
            $con = Connection::Conectar();
            $tsmt = $con->prepare("sp_EliminarMoneda ?");
            $result = $tsmt->execute([$id]);
            return $result;
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
         
    }
    
}