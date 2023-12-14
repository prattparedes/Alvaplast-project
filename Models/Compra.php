<?php  
require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/config/connection.php');

class Compra{
    
    public static function getIdCompra()
    {
        $con = Connection::Conectar();  
        $tsmt = $con->prepare('exec sp_BuscarIdCompra ?');
        $tsmt->bindParam(1,$id_compra,PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT,32);
        $tsmt->execute();
        return $id_compra;
    }

    public static function getCompras(){
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarCompra');
        return $data->fetchAll(PDO::FETCH_OBJ);
    }

    public static function RegistrarCompra(int $idCompra, string $date,float $total,float $subtotal, float $igv, int $idMoneda, string $numeroDocumento,string $serieDocumento, int $idProveedor,int $idAlmacen,string $tipoPago,int $idPersonal){
        $con = Connection::Conectar();
        $tsmt = $con->prepare('exec sp_RegistrarCompra ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?');

        $result=$tsmt->execute([$idCompra,$date,$total,$subtotal,$igv,$idMoneda,$numeroDocumento,$serieDocumento,$idProveedor,$idAlmacen,$tipoPago,$idPersonal]);
        return $result;
    }

    public static function EliminarCompra(int $idCompra, int $idPersonal){
        $con = Connection::Conectar();  
        $tsmt = $con->prepare('sp_EliminarCompra :idCompra, :idPersonal');
        $tsmt->bindParam(":idCompra", $idCompra, PDO::PARAM_INT,32);
        $tsmt->bindParam(":idPersonal", $idPersonal, PDO::PARAM_INT,32);
        $result=$tsmt->execute();
        return $result;    
    }
}

?>