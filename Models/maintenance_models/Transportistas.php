<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;
use Exception;
use PDOException;
use ReturnTypeWillChange;

class Transportistas
{
    public static function getTransportistas()
    {
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarTransportista');
        return $data->fetchAll(PDO::FETCH_OBJ);
    }

    public static function  registrartransportista(int $idTrans, string $nombre, string $apPaterno, string $apMaterno, string $dni, string $ruc, string $licencia, string $direccion, string $telefono, string $celular, string $estado): bool
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_RegistrarTransportista
            :id, :nombre, :apPaterno, :apMaterno, :dni, :ruc, :licencia, :direccion, :telefono, :celular, :estado ");
            $stmt->bindParam(":id", $idTrans, PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":apPaterno", $apPaterno, PDO::PARAM_STR);
            $stmt->bindParam(":apMaterno", $apMaterno, PDO::PARAM_STR);
            $stmt->bindParam(":dni", $dni, PDO::PARAM_STR);
            $stmt->bindParam(":ruc", $ruc, PDO::PARAM_STR);
            $stmt->bindParam(":licencia", $licencia, PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $stmt->bindParam(":celular", $celular, PDO::PARAM_STR);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            // Extraer solo el mensaje descriptivo
            $errorMessage = $e->getMessage();

            while (($sqlServerPos = strpos($errorMessage, 'SQL Server')) !== false) {
                $errorMessage = trim(substr($errorMessage, $sqlServerPos + strlen('SQL Server') + 1));
            }

            echo "Error: " . $errorMessage;
            return false;
        } finally {
            if ($con) {
                $con = null;
            }
        }
    }

    public static function modificarTransportista(int $idTrans, string $nombre, string $apPaterno, string $apMaterno, string $dni, string $ruc, string $licencia, string $direccion, string $telefono, string $celular, string $estado)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ModificarTransportista
            :id, :nombre, :apPaterno, :apMaterno, :dni, :ruc, :licencia, :direccion, :telefono, :celular, :estado ");
            $stmt->bindParam(":id", $idTrans, PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":apPaterno", $apPaterno, PDO::PARAM_STR);
            $stmt->bindParam(":apMaterno", $apMaterno, PDO::PARAM_STR);
            $stmt->bindParam(":dni", $dni, PDO::PARAM_STR);
            $stmt->bindParam(":ruc", $ruc, PDO::PARAM_STR);
            $stmt->bindParam(":licencia", $licencia, PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $stmt->bindParam(":celular", $celular, PDO::PARAM_STR);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $err) {
            echo $err->getMessage();
            return false;
        } finally {
            if ($con) {
                $con = null;
            }
        }
    }

    public static function eliminarTransportista(int $idTrans)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_EliminarTransportista :id");
            $stmt->bindParam(":id", $idTrans, PDO::PARAM_INT);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
        } finally {
            if ($con) {
                $con = null;
            }
        }
    }
}
