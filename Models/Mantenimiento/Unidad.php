<?php
require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/config/connection.php");

class Unidad
{

    public static function getUnidades()
    {
        $con = Connection::Conectar();
        $unidades = $con->query("exec sp_ListarUnidad");
        return $unidades->fetchAll(PDO::FETCH_OBJ);
    }

}

?>