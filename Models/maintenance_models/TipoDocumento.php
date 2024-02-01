<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;
use Exception;
use PDOException;

class TipoDocumento
{
    public static function getDocumentos()
    {
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarTipoDocumento');
        return $data->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getIdDocumento()
    {
        $con = Connection::Conectar();
        $stmt = $con->prepare("exec sp_BuscarIdTipoDocumento :idDocumento");
        $stmt->bindParam(":idDocumento", $idDocumento, PDO::PARAM_INT | PDO::PARAM_INPUT_OUTPUT, 32);
        $stmt->execute();
        $longitud = 3;
        $documento = str_pad($idDocumento, $longitud, "0", STR_PAD_LEFT);
        return $documento;
    }


    public static function registrarDocumento(string $idDocumento, string $abreviatura, string $descripcion)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare(" exec sp_RegistrarTipoDocumento :idDocumento,:abreviatura,:descripcion");
            $stmt->bindParam(":idDocumento", $idDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":abreviatura", $abreviatura, PDO::PARAM_STR);
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

    public static function modificarDocumento(string $idDocumento, string $abreviatura, string $descripcion)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare(" exec sp_ModificarTipoDocumento :idDocumento,:abreviatura,:descripcion");
            $stmt->bindParam(":idDocumento", $idDocumento, PDO::PARAM_STR);
            $stmt->bindParam(":abreviatura", $abreviatura, PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $er) {
            echo $er->getMessage();
            return false;
        } finally {
            if ($con) {
                $con = null;
            }
        }
    }

    public static function eliminarDocumento(string $idDocumento)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_EliminarTipoDocumento :idDocumento");
            $stmt->bindParam(":idDocumento", $idDocumento, PDO::PARAM_STR);
            $stmt->execute();
            $result = ($stmt) ? true : false;
            return $result;
        } catch (PDOException $er) {
            echo $er->getMessage();
            return false;
        } finally {
            if ($con) {
                $con = null;
            }
        }
    }
}
