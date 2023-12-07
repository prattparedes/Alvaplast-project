<?php 
require_once("../config/connection.php");
class Producto {
       
        public  static function getProductos(){
            $connection = Connection::Conectar();
            $DATA=$connection->query("exec sp_ListarProducto");
            $productos =$DATA->fetchAll(PDO::FETCH_OBJ);   
            return $productos;
        }
   
        public static function getProductosByAlmacen(int $idAlmacen){
            $con = Connection::Conectar();  
            $stmt = $con->prepare("exec sp_ListarProducto_AlmacenXAlmacen :almacen");
            $stmt->bindParam(":idalmacen", $idAlmacen, PDO::PARAM_INT);
            $stmt->execute();   
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public static function getProductosByLineaAlmacen(int $almacen, int $linea) :array {
            $con = Connection::Conectar();  
            $tsmt = $con->prepare("exec sp_ListarProducto_AlmacenXAlmacenConLinea :almacen , :linea");
            $tsmt->bindParam(":almacen", $almacen, PDO::PARAM_INT);
            $tsmt->bindParam(":linea",$linea,PDO::PARAM_INT);
            $tsmt->execute();
            return $tsmt->fetchAll(PDO::FETCH_OBJ);
        }
    }








?>