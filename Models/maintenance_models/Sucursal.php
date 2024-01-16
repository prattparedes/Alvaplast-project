<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;
use PDOException;

class Sucursal
{

    public static function getSucursales()
    {
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarSucursal');
        return $data->fetchAll(PDO::FETCH_OBJ);
    }

    //Metodo para el registro de una sucursal
    public static function registrarSucursal(int $idSucursal, string $descripcion, string $direccion, string $telefono)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_RegistrarSucursal :idSucursal, :descripcion, :direccion, :telefono");
            $stmt->bindParam(":idSucursal", $idSucursal, PDO::PARAM_INT);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        } finally {
            if ($con) {
                $con = null;
            }
        }
    }
    //Metodo para eliminar una sucursal
    public static function modificarSucursal(int $idSucursal, string $descripcion, string $direccion, string $telefono)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ModificarSucursal :idSucursal, :descripcion, :direccion, :telefono");
            $stmt->bindParam(":idSucursal", $idSucursal, PDO::PARAM_INT);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        } finally {
            if ($con) {
                $con = null;
            }
        }
    }
    //Metodo para eliminar sucursal
    public static function eliminarSucursal(int $idSucursal)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_EliminarSucursal :idSucursal");
            $stmt->bindParam(":idSucursal", $idSucursal, PDO::PARAM_INT);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        } finally {
            if ($con) {
                $con = null;
            }
        }
    }
}
