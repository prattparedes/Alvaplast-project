<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;
use Exception;
use PDOException;

class Vehiculo
{
    public static function getVehiculos()
    {
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarVehiculo');
        return $data->fetchAll(PDO::FETCH_OBJ);
    }


    public static function registrarVehiculo(int $idVehiculo, string $placa, string $marca, string $modelo, string $tipoVehiculo): bool
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare(" exec sp_RegistrarVehiculo :idVehiculo, :placa, :marca, :modelo, :tipoVehiculo");
            $stmt->bindParam(":idVehiculo", $idVehiculo, PDO::PARAM_INT);
            $stmt->bindParam(":placa", $placa, PDO::PARAM_STR);
            $stmt->bindParam(":marca", $marca, PDO::PARAM_STR);
            $stmt->bindParam(":modelo", $modelo, PDO::PARAM_STR);
            $stmt->bindParam(":tipoVehiculo", $tipoVehiculo, PDO::PARAM_STR);
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

    public static function modificarVehiculo(int $idVehiculo, string $placa, string $marca, string $modelo, string $tipoVehiculo): bool
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare(" exec sp_ModificarVehiculo :idVehiculo, :placa, :marca, :modelo, :tipoVehiculo");
            $stmt->bindParam(":idVehiculo", $idVehiculo, PDO::PARAM_INT);
            $stmt->bindParam(":placa", $placa, PDO::PARAM_STR);
            $stmt->bindParam(":marca", $marca, PDO::PARAM_STR);
            $stmt->bindParam(":modelo", $modelo, PDO::PARAM_STR);
            $stmt->bindParam(":tipoVehiculo", $tipoVehiculo, PDO::PARAM_STR);
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

    public static function eliminarVehiculo(int $idVehiculo)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_EliminarVehiculo :idVehiculo");
            $stmt->bindParam(":idVehiculo", $idVehiculo, PDO::PARAM_INT);
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
