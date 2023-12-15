<h2 style="text-align:center; margin-bottom: 8px;">Listado de Productos</h2>
<span style="font-weight: 600; width:fit-content;">Filtrar por Nombre: <input type="text" style="width: 240px;"></span>
<span style="font-weight: 600; width:fit-content; margin-left:8px;">Filtrar por Código del Producto: <input type="text" style="width: 240px;"></span>
<span style="font-weight: 600; width:fit-content; margin-left:8px;">Filtrar por Procedencia: <input type="text" style="width: 240px;"></span><button class="modal__btn--search">Buscar</button>
<hr>
<div class="modal__table--container">
    <table id="modaltable" class="table modal__table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Código Producto</th>
                <th>Modelo</th>
                <th>Procedencia</th>
                <th>Precio Real</th>
                <th>Precio Venta</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once('../../Models/Producto.php');
                $producto = Producto::getProductos();
                foreach($producto as $produc){
            ?>
                <tr>
                    <td><?='COD/'.$produc->id_producto?></td>
                    <td><?=$produc->nombre_producto?></td>
                    <td><?=$produc->modelo_producto?></td>
                    <td><?=$produc->modelo_producto?></td>
                    <td><?=$produc->procedencia?></td>
                    <td><?=$produc->precio_venta?></td>
                    <td><?=$produc->precio_compra?></td>
                    <td><?=$produc->stock_min?></td> 
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>