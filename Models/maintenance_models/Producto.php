<?php
// Se requiere el archivo de conexión que probablemente contiene la clase Connection.
namespace Models\maintenance_models;

use config\Connection;
use PDO;
use Exception;
use PDOException;

class Producto
{
    // Método estático para obtener todos los productos.
    public static function getProductos()
    {
        // Se establece la conexión utilizando la clase Connection.
        $connection = Connection::Conectar();

        // Se ejecuta un procedimiento almacenado para obtener la lista de productos.
        $DATA = $connection->query("exec sp_ListarProducto");

        // Se recuperan los resultados en formato de objeto y se retornan.
        $productos = $DATA->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }

    // Método estático para obtener productos por almacén.
    public static function getProductosByAlmacen(int $idAlmacen)
    {
        $con = Connection::Conectar();

        // Se utiliza una consulta preparada para obtener productos filtrados por un ID de almacén.
        $stmt = $con->prepare("exec sp_ListarProducto_AlmacenXAlmacen :almacen");
        $stmt->bindParam(":idalmacen", $idAlmacen, PDO::PARAM_INT);
        $stmt->execute();

        // Se retornan los resultados en formato de objeto.
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Método estático para obtener productos por almacén y línea.
    public static function getProductosByLineaAlmacen(int $almacen, int $linea): array
    {
        $con = Connection::Conectar();

        // Se utiliza una consulta preparada para obtener productos filtrados por un ID de almacén y línea.
        $tsmt = $con->prepare("exec sp_ListarProducto_AlmacenXAlmacenConLinea :almacen , :linea");
        $tsmt->bindParam(":almacen", $almacen, PDO::PARAM_INT);
        $tsmt->bindParam(":linea", $linea, PDO::PARAM_INT);
        $tsmt->execute();

        // Se retornan los resultados en formato de objeto.
        return $tsmt->fetchAll(PDO::FETCH_OBJ);
    }
    //Metodo para el registro de producto 
    public static function registrarProducto(int $idProducto, int  $idLinea, int  $idMarca, int  $idUnidad, string $nombre, string $codigo, string $modelo, string $procedencia, string $serie, bool $estado, float $precioVenta, float $precioCompra, string $descripcion, float $stockMin, float $stockMax, float $volumen, int $idMoneda)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_RegistrarProducto :idProducto,:idLinea,:idMarca,:idUnidad,:nombre,:codigo,:modelo,:procedencia,:serie,:estado,:precioVenta,:precioCompra,:descripcion,:stockMin,:stockMax,:volumen,:idMoneda");
            $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
            $stmt->bindParam(":idLinea", $idLinea, PDO::PARAM_INT);
            $stmt->bindParam(":idMarca", $idMarca, PDO::PARAM_INT);
            $stmt->bindParam(":idUnidad", $idUnidad, PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":codigo", $codigo, PDO::PARAM_STR);
            $stmt->bindParam(":modelo", $modelo, PDO::PARAM_STR);
            $stmt->bindParam(":procedencia", $procedencia, PDO::PARAM_STR);
            $stmt->bindParam(":serie", $serie, PDO::PARAM_STR);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_BOOL);
            $stmt->bindParam(":precioVenta", $precioVenta, PDO::PARAM_STR);
            $stmt->bindParam(":precioCompra", $precioCompra, PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(":stockMin", $stockMin, PDO::PARAM_STR);
            $stmt->bindParam(":stockMax", $stockMax, PDO::PARAM_STR);
            $stmt->bindParam(":volumen", $volumen, PDO::PARAM_STR);
            $stmt->bindParam(":idMoneda", $idMoneda, PDO::PARAM_INT);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
            return $result;
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

    public static function  modificarProducto(int $idProducto, int  $idLinea, int  $idMarca, int  $idUnidad, string $nombre, string $codigo, string $modelo, string $procedencia, string $serie, bool $estado, float $precioVenta, float $precioCompra, string $descripcion, float $stockMin, float $stockMax, float $volumen, int $idMoneda)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ModificarProducto :idProducto,:idLinea,:idMarca,:idUnidad,:nombre,:codigo,:modelo,:procedencia,:serie,:estado,:precioVenta,:precioCompra,:descripcion,:stockMin,:stockMax,:volumen,:idMoneda");
            $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
            $stmt->bindParam(":idLinea", $idLinea, PDO::PARAM_INT);
            $stmt->bindParam(":idMarca", $idMarca, PDO::PARAM_INT);
            $stmt->bindParam(":idUnidad", $idUnidad, PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":codigo", $codigo, PDO::PARAM_STR);
            $stmt->bindParam(":modelo", $modelo, PDO::PARAM_STR);
            $stmt->bindParam(":procedencia", $procedencia, PDO::PARAM_STR);
            $stmt->bindParam(":serie", $serie, PDO::PARAM_STR);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_BOOL);
            $stmt->bindParam(":precioVenta", $precioVenta, PDO::PARAM_STR);
            $stmt->bindParam(":precioCompra", $precioCompra, PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(":stockMin", $stockMin, PDO::PARAM_STR);
            $stmt->bindParam(":stockMax", $stockMax, PDO::PARAM_STR);
            $stmt->bindParam(":volumen", $volumen, PDO::PARAM_STR);
            $stmt->bindParam(":idMoneda", $idMoneda, PDO::PARAM_INT);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (PDOException $e) {
            // Extraer solo el mensaje descriptivo
            $errorMessage = $e->getMessage();

            while (($sqlServerPos = strpos($errorMessage, 'SQL Server')) !== false) {
                $errorMessage = trim(substr($errorMessage, $sqlServerPos + strlen('SQL Server') + 1));
            }

            echo "Error: " . $errorMessage;
            return false;
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

    public static function eliminarProducto(int $idProducto): bool
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_EliminarProducto :idProducto ");
            $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
            return $result;
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

    public static function mostrarStockProducto(int $idAlmacen, int $idCliente)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ListaProductoStock :idAlmacen, :idCliente");
            $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->bindParam(":idCliente", $idCliente, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $err) {
            echo $err->getMessage();
        } finally {
            if ($con) {
                $con = null;
            }
        }
    }

    public static function registrarProductoxAlmacen(int $idProducto, int $idAlmacen, string $descripcion)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_RegistrarProducto_Almacen :idProducto,:idAlmacen, :descripcion");
            $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
            $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public static function modificarProductoAlmacen(int $idProducto, int $idAlmacen, string $descripcion)
    {
        try {
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ModificarProducto_Almacen :idProducto,:idAlmacen, :descripcion");
            $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
            $stmt->bindParam(":idAlmacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $stmt->execute();
            $result = ($stmt->rowCount() > 0) ? true : false;
            return $result;
        } catch (PDOException $err) {
            echo $err->getMessage();
        }
    }

    public static function buscarstock(int $idProducto, int $idAlmacen)
    {
        $con = Connection::Conectar();
        $stmt = $con->query("select stock from Producto_Almacen where id_producto = $idProducto and id_almacen = $idAlmacen");
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
