<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;
use Exception;

class Linea
{
    //Metodo para lista lineas
    public static function ListarLineas()
    {
        $con = Connection::Conectar();
        $data = $con->query("exec sp_ListarLinea");
        return $data->fetchAll(PDO::FETCH_OBJ);
    }
    //Metodo para registrar linea 
    public static function registrarLinea(int $idLinea, string $descripcion): bool
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_RegistrarLinea :idLinea , :descripcion");
            $stmt->bindParam(":idLinea", $idLinea, PDO::PARAM_INT);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $err) {
            echo $err->getMessage();
            return false;
        }
    }
    //Metodo para modificar linea
    public static function modificarLinea(int $idLinea, string $descripcion)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ModificarLinea :idLinea , :descripcion");
            $stmt->bindParam(":idLinea", $idLinea, PDO::PARAM_INT);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $err) {
            echo $err->getMessage();
            return false;
        }
    }
    //Metodo para eliminar linea
    public static function eliminarLinea(int $idLinea)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_EliminarLinea :idLinea ");
            $stmt->bindParam(":idLinea", $idLinea, PDO::PARAM_INT);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (Exception $err) {
            echo $err->getMessage();
            return false;
        }
    }
}
