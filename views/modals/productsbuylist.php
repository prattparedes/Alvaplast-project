<h2 style="text-align:center; margin-bottom: 8px;">Listado de Productos</h2>
<span style="font-weight: 600; width:fit-content;">Filtrar por Nombre: <input type="text" style="width: 240px;"></span>
<span style="font-weight: 600; width:fit-content; margin-left:8px;">Filtrar por Código del Producto: <input type="text" style="width: 240px;"></span>
<span style="font-weight: 600; width:fit-content; margin-left:8px;">Filtrar por Procedencia: <input type="text" style="width: 240px;"></span><button class="modal__btn--search">Buscar</button>
<hr>
<div class="modal__table--container">
    <table id="modaltable" class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Código Producto</th>
                <th>Modelo</th>
                <th>Procedencia</th>
                <th>Precio Compra</th>
                <th>Precio Venta</th>
            </tr>
        </thead>
        <tbody>
<?php  require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/Models/Producto.php');
$productos = Producto::getProductos();
foreach($productos as $producto){?>
            <tr>
                <td><?=$producto->id_producto?></td>
                <td><?=$producto->nombre_producto?></td>
                <td><?=$producto->linea?></td>
                <td><?=$producto->unidad?></td>
                <td><?=$producto->descripcion?></td>
                <td><?=number_format($producto->precio_compra,2)?></td>
                <td><?=number_format($producto->precio_venta,2)?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>