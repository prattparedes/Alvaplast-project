<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/Alvaplast-project/autoload.php");

use Models\maintenance_models\Producto;
?>

<?php
$data = Producto::getProductos();
foreach ($data as $product) {
?>
    <tr>
        <td><?= $product->id_producto ?></td>
        <td><?= $product->nombre_producto ?></td>
        <td><?= $product->precio_venta ?></td>
        <td><?= $product->precio_compra ?></td>
        <td><?= $product->moneda ?></td>
        <td><?= $product->marca ?></td>
        <td><?= $product->unidad ?></td>
        <td><?= $product->volumen ?></td>
        <td><?= $product->stock_min ?></td>
        <td><?= $product->stock_max ?></td>
        <td><?= $product->stock ?></td>
        <td style="display:none;"><?= $product->id_moneda ?></td>
        <td style="display:none;"><?= $product->procedencia ?></td>
        <td style="display:none;"><?= $product->id_marca ?></td>
        <td style="display:none;"><?= $product->id_linea ?></td>
        <td style="display:none;"><?= $product->imagen ?></td>
        <td style="display:none;"><?= $product->descripcion ?></td>
        <td style="display:none;"><?= $product->id_unidad ?></td>
        <td style="display:none;"><?= $product->estado ?></td>
    </tr>
<?php } ?>