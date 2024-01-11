<?php

namespace Models\ventas;

use config\Connection;
use PDO;
use Exception;

class Venta
{
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
