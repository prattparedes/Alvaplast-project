<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;
use PDOException;

class Almacen
{

    public static function getAlmacenes()
    {
        $con = Connection::Conectar();
        $data = $con->query("exec sp_ListarAlmacen");
        return $data->fetchAll(PDO::FETCH_OBJ);
    }

    public static function listarAlmacen(int $idSucursal)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ListarAlmacenXSucursal :id");
            $stmt->bindParam(":id", $idSucursal, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $err) {
            echo $err->getMessage();
        } finally {
            if ($con) {
                $con = null;
            }
        }
    }
    //Metodo para el registro de almacen 

    public static function registrarAlmacen(int $idAlmacen, int $idSucursal, string $descripcion)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_RegistrarAlmacen :idAlmacen, :idSucursal, :descripcion");
            $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->bindParam(":idSucursal", $idSucursal, PDO::PARAM_INT);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
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

    //Metodo para la modificacion de almacen
    public static function modificarAlmacen(int $idAlmacen, int $idSucursal, string $descripcion)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ModificarAlmacen :idAlmacen, :idSucursal, :descripcion");
            $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->bindParam(":idSucursal", $idSucursal, PDO::PARAM_INT);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
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

    public static function eliminarAlmacen(int $idAlmacen)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_EliminarAlmacen :idAlmacen");
            $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
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

    public static function registrarCodFacturacion(string $idCodigo, int $idAlmacen)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_RegistrarCodigo_Facturacion :idCodigo, :idAlmacen");
            $stmt->bindParam(":idCodigo", $idCodigo, PDO::PARAM_STR);
            $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
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

    public static function eliminarCodFacturacion(string $idCodigo)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_EliminarCodigo_Facturacion :idCodigo");
            $stmt->bindParam(":idCodigo", $idCodigo, PDO::PARAM_STR);
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

    //Metodo para poder encontrar el ultimo id de almacen
    public static function getIdAlmacen(): int
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->query("select max(id_almacen) from Almacen");
            $data = $stmt->fetch();
            return (int) $data[0];
        } catch (PDOException $err) {
            echo $err->getMessage();
            return 0;
        } finally {
            if ($con) {
                $con = null;
            }
        }
    }
}
