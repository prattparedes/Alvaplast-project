<?php

namespace Models\maintenance_models;

use config\Connection;
use PDO;
use Exception;


class Cliente
{
    // Método estático para obtener todos los clientes.
    public static function getClientes()
    {
        // Se establece la conexión utilizando la clase Connection.
        $connection = Connection::Conectar();

        // Se ejecuta un procedimiento almacenado para obtener la lista de clientes.
        $data = $connection->query("exec sp_ListarCliente");

        // Se recuperan los resultados en formato de objeto y se retornan.
        $clientes = $data->fetchAll(PDO::FETCH_OBJ);
        return $clientes;
    }

    // Metodo para registrar cliente
    public static function registrarCliente(int $idCliente, string $razonSocial, string $ruc, string $dni, string $direccion, string $telefono, string $celular, string $estado, string $tipoCliente, string $distrito, string $idUbigeo): bool
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_RegistrarCliente :idCliente, :razonSocial, :ruc, :dni, :direccion, :telefono, :celular, :estado, :tipoCliente, :distrito, :idUbigeo");
            $stmt->bindParam(":idCliente", $idCliente, PDO::PARAM_INT);
            $stmt->bindParam(":razonSocial", $razonSocial, PDO::PARAM_STR);
            $stmt->bindParam(":ruc", $ruc, PDO::PARAM_STR);
            $stmt->bindParam(":dni", $dni, PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $stmt->bindParam(":celular", $celular, PDO::PARAM_STR);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
            $stmt->bindParam(":tipoCliente", $tipoCliente, PDO::PARAM_STR);
            $stmt->bindParam(":distrito", $distrito, PDO::PARAM_STR);
            $stmt->bindParam("idUbigeo", $idUbigeo, PDO::PARAM_STR);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $err) {
            echo $err->getMessage();
            return false;
        }
    }

    //Metodo para mofoficar cliente
    public static function modificarCliente(int $idCliente, string $razonSocial, string $ruc, string $dni, string $direccion, string $telefono, string $celular, string $estado, string $tipoCliente, string $distrito, string $idUbigeo): bool
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ModificarCliente :idCliente, :razonSocial, :ruc, :dni, :direccion, :telefono, :celular, :estado, :tipoCliente, :distrito, :idUbigeo");
            $stmt->bindParam(":idCliente", $idCliente, PDO::PARAM_INT);
            $stmt->bindParam(":razonSocial", $razonSocial, PDO::PARAM_STR);
            $stmt->bindParam(":ruc", $ruc, PDO::PARAM_STR);
            $stmt->bindParam(":dni", $dni, PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $stmt->bindParam(":celular", $celular, PDO::PARAM_STR);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
            $stmt->bindParam(":tipoCliente", $tipoCliente, PDO::PARAM_STR);
            $stmt->bindParam(":distrito", $distrito, PDO::PARAM_STR);
            $stmt->bindParam("idUbigeo", $idUbigeo, PDO::PARAM_STR);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $err) {
            echo $err->getMessage();
            return false;
        }
    }

    //Metodo para eliminar cliente
    public static function eliminarCliente(int $idCliente): bool
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_EliminarCliente :idCliente");
            $stmt->bindParam(":idCliente", $idCliente, PDO::PARAM_INT);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $err) {
            echo $err->getMessage();
            return false;
        }
    }
}
