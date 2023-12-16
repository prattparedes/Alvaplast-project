<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/config/connection.php');

class Proveedor {
    // Método estático para obtener todos los proveedores.
    public static function listarProveedores() {
        // Se establece la conexión utilizando la clase Connection.
        $connection = Connection::Conectar();
        
        // Se ejecuta un procedimiento almacenado para obtener la lista de proveedores.
        $data = $connection->query("exec sp_ListarProveedor");
        
        // Se recuperan los resultados en formato de objeto y se retornan.
        $proveedores = $data->fetchAll(PDO::FETCH_OBJ);
        return $proveedores;
    }

    // Otros métodos para operaciones relacionadas con proveedores pueden ser agregados según sea necesario.
}
?>
