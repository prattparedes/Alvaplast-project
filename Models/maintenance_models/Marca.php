<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;
use Exception;

class Marca
{

    public static function getMarcas()
    {
        $con = Connection::Conectar();
        $data = $con->query("exec sp_ListarMarca");
        return $data->fetchAll(PDO::FETCH_OBJ);
    }
    //Metodo para registrar una marca
    public static function registrarMarca(int $idMarca, string $descripcion)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_RegistrarMarca :idMarca, :descripcion");
            $stmt->bindParam(":idMarca", $idMarca, PDO::PARAM_INT);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $err) {
            echo $err->getMessage();
            return false;
        }
    }
    //Metodo para modificar una marca
    public static function modificarMarca(int $idMarca, string $descripcion)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ModificarMarca :idMarca, :descripcion");
            $stmt->bindParam(":idMarca", $idMarca, PDO::PARAM_INT);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $err) {
            echo $err->getMessage();
            return false;
        }
    }
    //Metodo para eliminar marca
    public static function eliminarMarca(int $idMarca)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_EliminarMarca :idMarca");
            $stmt->bindParam(":idMarca", $idMarca, PDO::PARAM_INT);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $err) {
            echo $err->getMessage();
            return false;
        }
    }
}
