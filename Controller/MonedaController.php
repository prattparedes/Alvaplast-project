<?php
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/Models/Moneda.php");
    
class MonedaController{

    public static function grabarMoneda(){
        try{
            $descripcion = $_POST["descripcion"];
            $abr = $_POST["abreviatura"];
            $id = Moneda::RegistrarMoneda($descripcion, $abr);
            
        }catch(Exception $e){
            echo  $e->getMessage() ;
        }
        return $id;
    }

    }
?>