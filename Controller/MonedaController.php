<?php
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/Models/Moneda.php");
    
if(isset($_POST)){
    $id = $_POST["id"];
    $descripcion = $_POST["descripcion"];
    $abre = $_POST["abreviatura"];
    
    if($_POST['metodo'] == "Grabar"){
         Moneda::RegistrarMoneda($id, $descripcion, $abre);
    }else if ($POST['metodo'] == "Modificar"){
         Moneda::ModificarMoneda($id, $descripcion, $abre);
    }else if ($_POST['metodo'] == "Eliminar"){
         Moneda::EliminarMoneda($id);
    }
    echo $result;
}

?>