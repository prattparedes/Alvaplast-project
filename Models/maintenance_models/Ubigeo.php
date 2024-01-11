<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;
use Exception;

class Ubigeo
{

    public static function getDepartamentos()
    {
        $con = Connection::Conectar();
        $data = $con->query("exec sp_ListarUbigeo");
        return $data->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getProvincias($codigoDepartamento)
    {
        $con = Connection::Conectar();
        $query = "EXEC sp_ListarProvicia @Depatamento = :codigoDepartamento";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':codigoDepartamento', $codigoDepartamento, PDO::PARAM_STR);
        $stmt->execute();
        $provincias = $stmt->fetchAll(PDO::FETCH_OBJ);

        return json_encode($provincias);
    }

    public static function getDistritos($codigoProvincia)
    {
        $con = Connection::Conectar();
        $query = "EXEC sp_ListarDistritro @Provicia = :codigoProvincia";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':codigoProvincia', $codigoProvincia, PDO::PARAM_STR);
        $stmt->execute();
        $distritos = $stmt->fetchAll(PDO::FETCH_OBJ);

        return json_encode($distritos);
    }
}
