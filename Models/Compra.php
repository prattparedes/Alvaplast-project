<?php  
require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/config/connection.php');

class Compra{
    
    public static function getIdCompra()
    {
        $con = Connection::Conectar();  
        $tsmt = $con->prepare('exec sp_BuscarIdCompra ?');
        $tsmt->bindParam(1,$id_compra,PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT,32);
        $tsmt->execute();
        $longitud = 7;
        $document_number = str_pad($id_compra,$longitud,"0",STR_PAD_LEFT);
        return $document_number;
    }


    public static function getCompras(){
        $con = Connection::Conectar();
        $data = $con->query('exec sp_ListarCompra');
        return $data->fetchAll(PDO::FETCH_OBJ);
    }

    public static function RegistrarCompra(int $idCompra, string $date,float $total,float $subtotal, float $igv, int $idMoneda, string $numeroDocumento,string $serieDocumento, int $idProveedor,int $idAlmacen,string $tipoPago,int $idPersonal) : bool
    {
       try{
        $con = Connection::Conectar();
        $tsmt = $con->prepare('exec sp_RegistrarCompra ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?');
        $result=$tsmt->execute([$idCompra,$date,$total,$subtotal,$igv,$idMoneda,$numeroDocumento,$serieDocumento,$idProveedor,$idAlmacen,$tipoPago,$idPersonal]);
        return $result;
       }catch(Exception $e){
        echo $e->getMessage();
        return false;
       }
        
    }

    public static function EliminarCompra(int $idCompra, int $idPersonal):bool
    {
        try{
            $con = Connection::Conectar();  
            $tsmt = $con->prepare('sp_EliminarCompra :idCompra, :idPersonal');
            $tsmt->bindParam(":idCompra", $idCompra, PDO::PARAM_INT,32);
            $tsmt->bindParam(":idPersonal", $idPersonal, PDO::PARAM_INT,32);
            $result=$tsmt->execute();
            return $result;   
        }catch(Exception $er){
            echo $er->getMessage();
            return false;
        }
         
    }

    public static function ListarCompraXid(int $id){
        $con =  Connection::Conectar();
        $stmt = $con->prepare("exec sp_ListaCompraXID ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function ModificarCompra(int $idCompra, string $fecha, float $total,float $subtotal, float $igv, int $idMoneda,string $numeroDocumento, string $serieDocumento, int $idProveedor,int $idAlmacen, string $tipoPago, int $idPersonal) :bool
    {
        try{
            $con = Connection::Conectar();
            $stmt = $con->prepare("exec sp_ModificarCompra ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?");
            $result=$stmt->execute([$idCompra,$fecha,$total,$subtotal,$igv,$idMoneda,$numeroDocumento,$serieDocumento,$idProveedor,$idAlmacen,$tipoPago,$idPersonal]);
            return $result;
        }catch(Exception $er){
            echo $er->getMessage();
            return false;
        }
    }
}
?>