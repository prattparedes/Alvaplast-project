<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/config/connection.php');

class Cliente {
    // Método estático para obtener todos los clientes.
    public static function getClientes() {
        // Se establece la conexión utilizando la clase Connection.
        $connection = Connection::Conectar();
        
        // Se ejecuta un procedimiento almacenado para obtener la lista de clientes.
        $data = $connection->query("exec sp_ListarCliente");
        
        // Se recuperan los resultados en formato de objeto y se retornan.
        $clientes = $data->fetchAll(PDO::FETCH_OBJ);
        return $clientes;
    }

    // Otros métodos para operaciones relacionadas con clientes pueden ser agregados según sea necesario.
}
?>