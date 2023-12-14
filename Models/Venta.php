<?php  
require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/config/connection.php');

class Venta {
    // Método estático para obtener todas las ventas.
    public static function getVentas() {
        // Se establece la conexión utilizando la clase Connection.
        $connection = Connection::Conectar();
        
        // Se ejecuta un procedimiento almacenado para obtener la lista de ventas.
        $DATA = $connection->query("exec sp_ListarVenta");
        
        // Se recuperan los resultados en formato de objeto y se retornan.
        $ventas = $DATA->fetchAll(PDO::FETCH_OBJ);
        return $ventas;
    }

     // Método estático para mostrar las ventas sin etiquetas de tabla.
     public static function mostrarVentas() {
        // Se obtiene una venta utilizando el método getVentas.
        $venta = self::getVentas();

        if ($venta) {
            // Imprime los valores directamente.
            echo $venta->razon_social . '|';
            echo 'OV/' . $venta->numero_documento . '-' . $venta->serie_documento . '|';
            echo explode(' ', $venta->fecha_emision)[0] . '|';
            echo ($venta->tipo_pago == "E") ? "Efectivo" : "Credito" . '|';
            echo $venta->total . '|';
            echo $venta->Moneda . '|';
            echo $venta->nombres . ' ' . $venta->ap_paterno . ' ' . $venta->ap_materno;
        }
    }
}
?>