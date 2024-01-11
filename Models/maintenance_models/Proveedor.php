<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;
use Exception;

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
    //Metodo para registrar Proveedor
    public static function registrarProveedor(int $idProveedor, string $idUbigeo, string $razonSocial,  string $ruc, string $direccion, string $telefono, string $fax, string $contacto, string $email, string $descripcion, bool $estado): bool
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_RegistrarProveedor :idProveedor,:idUbigeo,:razonSocial,:ruc,:direccion,:telefono,:fax,:contacto,:email,:descripcion,:estado");
            $stmt->bindParam(":idProveedor", $idProveedor, PDO::PARAM_INT);
            $stmt->bindParam(":idUbigeo", $idUbigeo, PDO::PARAM_STR);
            $stmt->bindParam(":razonSocial", $razonSocial, PDO::PARAM_STR);
            $stmt->bindParam(":ruc", $ruc, PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $stmt->bindParam(":fax", $fax, PDO::PARAM_STR);
            $stmt->bindParam(":contacto", $contacto, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam("descripcion", $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_BOOL);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $err) {
            echo $err->getMessage();
            return false;
        }
    }
    //Metodo para modificar proveedor 
    public static function modificarProveedor(int $idProveedor, string $idUbigeo, string $razonSocial,  string $ruc, string $direccion, string $telefono, string $fax, string $contacto, string $email, string $descripcion, bool $estado)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ModificarProveedor :idProveedor,:idUbigeo,:razonSocial,:ruc,:direccion,:telefono,:fax,:contacto,:email,:descripcion,:estado");
            $stmt->bindParam(":idProveedor", $idProveedor, PDO::PARAM_INT);
            $stmt->bindParam(":idUbigeo", $idUbigeo, PDO::PARAM_STR);
            $stmt->bindParam(":razonSocial", $razonSocial, PDO::PARAM_STR);
            $stmt->bindParam(":ruc", $ruc, PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $stmt->bindParam(":fax", $fax, PDO::PARAM_STR);
            $stmt->bindParam(":contacto", $contacto, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam("descripcion", $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_BOOL);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $err) {
            echo $err->getMessage();
            return false;
        }
    }
    public static function eliminarProveedor(int $idProveedor): bool
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_EliminarProveedor :idProveedor");
            $stmt->bindParam(":idProveedor", $idProveedor, PDO::PARAM_INT);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $err) {
            echo $err->getMessage();
            return false;
        }
    }
}
