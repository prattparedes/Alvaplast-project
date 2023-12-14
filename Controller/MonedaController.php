<?php
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/Models/Moneda.php");
    
class MonedaController{

    public static function grabarMoneda(){
        try{
            $id = 1;
            $descripcion = $_POST["descripcion"];
            $abr = $_POST["abreviatura"];
            Moneda::RegistrarMoneda($id,$descripcion, $abr);
            
        }catch(Exception $e){
            echo  $e->getMessage() ;
        }
    }

    }

if(isset($_POST)){
    $id = 1;
    $descripcion = $_POST["descripcion"];
    $abre = $_POST["abreviatura"];
    
    if($_POST['metodo'] == "nuevo"){
         Moneda::RegistrarMoneda($id, $descripcion, $abre);
    }else if ($POST['metodo'] == "editar"){
        $result = Moneda::ModificarMoneda($id, $descripcion, $abre);
    }else if ($_POST['metodo'] == "eliminar"){
        $result = Moneda::EliminarMoneda($id);
    }
}

?>