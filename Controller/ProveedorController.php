<?php
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/Models/Proveedor.php");

if($_SERVER["REQUEST_METHOD"] === "GET"){
    $idProveedor = $_GET["idProveedor"];
    $data = Proveedor::obtenerProveedorPorID($idProveedor);
    echo json_encode($data);
}

?>