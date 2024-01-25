<?php

namespace Models\ventas;

use config\Connection;
use PDO;
use Exception;

class Venta
{
    public static function getIdVenta()
    {
        $con = Connection::Conectar();  
        $tsmt = $con->prepare('exec sp_BuscarIdVenta ?');
        $tsmt->bindParam(1,$id_compra,PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT,32);
        $tsmt->execute();
        $longitud = 7;
        $document_number = str_pad($id_compra,$longitud,"0",STR_PAD_LEFT);
        return $document_number;
    }

    // Método estático para obtener todas las ventas.
    public static function getVentas()
    {
        // Se establece la conexión utilizando la clase Connection.
        $connection = Connection::Conectar();

        // Se ejecuta un procedimiento almacenado para obtener la lista de ventas.
        $DATA = $connection->query("exec sp_ListarVenta");

        // Se recuperan los resultados en formato de objeto y se retornan.
        $ventas = $DATA->fetchAll(PDO::FETCH_OBJ);
        return $ventas;
    }
}
