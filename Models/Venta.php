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

    // Método estático para mostrar las ventas en una tabla HTML.
    public static function mostrarVentasEnTabla() {
        // Se obtienen las ventas utilizando el método getVentas.
        $ventas = self::getVentas();

        // Se inicia un bucle foreach para recorrer cada venta obtenida.
        foreach ($ventas as $ven) {
            ?>
            <!-- Se inicia una fila de la tabla HTML para mostrar los detalles de cada venta -->
            <tr>
                <!-- Se crea una celda para mostrar la razón social de la venta -->
                <td><?= $ven->razon_social ?></td>

                <!-- Se crea una celda para mostrar el número y serie del documento de la venta -->
                <td><?= 'OV/'.$ven->numero_documento.'-'.$ven->serie_documento ?></td>

                <!-- Se crea una celda para mostrar la fecha de emisión de la venta (se utiliza explode para obtener solo la fecha) -->
                <td><?= explode(' ', $ven->fecha_emision)[0] ?></td>

                <!-- Se crea una celda para mostrar el tipo de pago (Efectivo o Crédito) -->
                <td><?= ($ven->tipo_pago == "E") ? "Efectivo" : "Credito" ?></td>

                <!-- Se crea una celda para mostrar el total de la venta -->
                <td><?= $ven->total ?></td>

                <!-- Se crea una celda para mostrar la moneda de la venta -->
                <td><?= $ven->Moneda ?></td>

                <!-- Se crea una celda para mostrar el nombre completo del cliente asociado a la venta -->
                <td><?= $ven->nombres . ' ' . $ven->ap_paterno . ' ' . $ven->ap_materno ?></td>
            <!-- Se cierra la fila de la tabla HTML -->
            </tr>
            <?php
        }
    }
}
?>


?>