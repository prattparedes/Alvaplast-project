<?php
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/Models/Moneda.php");
    
if($_SERVER["REQUEST_METHOD"] === "POST"){
     $id = isset($_POST["id"]) && $_POST["id"] !== "" ? $_POST["id"] : 1;
    $descripcion = $_POST["descripcion"];
    $abre = $_POST["abreviatura"];

    $message = "";
    if($_POST['metodo'] == "Grabar"){
          $result= Moneda::RegistrarMoneda($id, $descripcion, $abre);
          $message="moneda registrada";
    }else if ($_POST['metodo'] == "Modificar"){
          $result=Moneda::ModificarMoneda($id, $descripcion, $abre);
          $message = "moneda modificada";
    }else if ($_POST['metodo'] == "Eliminar"){
          $result=Moneda::EliminarMoneda($id);
          $message = "moneda eliminada";
    }
    if($result){
          echo $message;
    }
}

?>