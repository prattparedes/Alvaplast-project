<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;
use Exception;

class Unidad
{
    //Metodo para listar unidad
    public static function getUnidades()
    {
        $con = Connection::Conectar();
        $unidades = $con->query("exec sp_ListarUnidad");
        return $unidades->fetchAll(PDO::FETCH_OBJ);
    }
    //Metodo para registrar una unidad
    public static function registrarUnidad(int $idUnidad, string $abreviatura, string $descripcion): bool
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_RegistrarUnidad :idUnidad, :abreviatura, :descripcion");
            $stmt->bindParam(":idUnidad", $idUnidad, PDO::PARAM_INT);
            $stmt->bindParam(":abreviatura", $abreviatura, PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $err) {
            echo $err->getMessage();
            return false;
        }
    }
    //Metodo para modificar unidad
    public static function modificarUnidad(int $idUnidad, string $abreviatura, string $descripcion): bool
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ModificarUnidad :idUnidad, :abreviatura, :descripcion");
            $stmt->bindParam(":idUnidad", $idUnidad, PDO::PARAM_INT);
            $stmt->bindParam(":abreviatura", $abreviatura, PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $err) {
            echo $err->getMessage();
            return false;
        }
    }
    //Metodo para eliminar unidad
    public static function eliminarUnidad(int $idUnidad): bool
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_EliminarUnidad :idUnidad");
            $stmt->bindParam("idUnidad", $idUnidad, PDO::PARAM_INT);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $err) {
            echo $err->getMessage();
            return false;
        }
    }
}
