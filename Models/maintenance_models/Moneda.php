<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;
use Exception;

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
    public static function RegistrarMoneda(int $idMoneda, string $descripcion, string $abr): bool
    {

        try {
            $con = Connection::Conectar();
            $tsmt = $con->prepare("exec sp_RegistrarMoneda :id,:desc,:abre");
            $tsmt->bindParam(":id", $idMoneda, PDO::PARAM_INT);
            $tsmt->bindParam(":desc", $descripcion, PDO::PARAM_STR);
            $tsmt->bindParam(":abre", $abr, PDO::PARAM_STR);
            $result = $tsmt->execute();
            // $result=$tsmt->execute([$id_moneda,$descripcion,$abr]);
            return $result;
        } catch (Exception $ex) {
            echo "ERROR:" . $ex->getMessage();
            return false;
        }
    }
    //Metodo para modificar moneda 
    /*parametros :
                    id_moneda
                    descripcion
                    abreciatura*/
    public static function ModificarMoneda(int $idMoneda, string $descripcion, string $abr,): bool
    {
        try {
            $con = Connection::Conectar();  //Conexión a la base de datos
            $tsmt = $con->prepare("exec sp_ModificarMoneda :id, :desc, :abre");  //Preparamos el procedimiento con los parametros necesarios
            $tsmt->bindParam(":id", $idMoneda, PDO::PARAM_INT);
            $tsmt->bindParam(":desc", $descripcion, PDO::PARAM_STR);
            $tsmt->bindParam(":abre", $abr, PDO::PARAM_STR);
            $result = $tsmt->execute();
            //$result=$tsmt->execute([$id,$descripcion,$abr]);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    /*
    Metodo para eliminar moneda
    parametros :
                    id_moneda
     */
    public static function EliminarMoneda(int $idMoneda): bool
    {
        try {
            $con = Connection::Conectar();
            $tsmt = $con->prepare("sp_EliminarMoneda :id");
            $tsmt->bindParam(":id", $idMoneda, PDO::PARAM_INT);
            $tsmt->execute();
            $result = ($tsmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
