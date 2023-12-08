<?php

require_once("../Models/Moneda.php");
    if(isset($_POST["grabar"])){
        if($_POST["grabar"] == "nuevo"){
       try{
           $descripcion = $_POST["descripcion"];
           $abr = $_POST["abreviatura"];
           $id = Moneda::RegistrarMoneda($descripcion, $abr);
           
        }catch(Exception $e){
            echo "". $e->getMessage() ."";
    }}
}
?>