<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/Models/Kardex.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados desde el frontend
    $id_producto = $_POST['id_producto'];
    $id_almacen = $_POST['id_almacen'];

    // Llamar al método del modelo para obtener los movimientos del kardex
    $movimientos = KardexModel::listarMovimientosAlmacenProducto($id_almacen, $id_producto);

    // Enviar la respuesta al frontend
    echo json_encode($movimientos);
}
?>