<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/config/connection.php");

class Proveedor
{

    public static function listarProveedores()
    {
        $con = Connection::Conectar();
        $data = $con->query("exec sp_ListarProveedor");
        return $data->fetchAll(PDO::FETCH_OBJ);
    }
    // Método para obtener un proveedor por su ID
    public static function obtenerProveedorPorID($idProveedor)
    {
        $con = Connection::Conectar();
        $query = "exec sp_ListaProveedorXID :idProveedor";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':idProveedor', $idProveedor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
