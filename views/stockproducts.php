<h2 style="text-align: center">STOCK DE PRODUCTOS</h2>

<!-- Select de Almacén -->

<label for="almacenSelect" class="form-label">Almacén</label>
<select class="form-select" id="almacenSelect">
    <?php 
    require_once("../Models/Almacen.php");
    $almacenes = Almacen::getAlmacenes();
        foreach ($almacenes as $almac) {
            ?> 
        <option value="<?=$almac->id_almacen?>"><?=$almac->descripcion?></option>
    <?php   
        }
    ?>
    <!-- Agregar más opciones si es necesario -->
</select>

<!-- Select de Línea -->
<label for="lineaSelect" class="form-label">Línea</label>
<select class="form-select" id="lineaSelect">
    <option value="">Ingrese linea</option>
<?php
require_once("../Models/Linea.php");
 $listas = Linea::ListarLineas();
    foreach ($listas as $linea) {
?>
    <option value="<?= $linea->id_linea?>"><?=$linea->descripcion?></option>
    <!-- Agregar más opciones si es necesario -->
    <?php
    }
    ?>
    </select>


<!-- Input para filtrar por Producto -->
<label for="filtroProducto" class="form-label">Producto:</label>
<input type="text" class="form-control" id="filtroProducto">
<br>
<hr>
<!-- Tabla -->
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Unidad</th>
            <th>Imagen</th>
            <th>Marca</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody id="content">
            <?php 
            if(!isset($_GET["buscarProducto"])) {
                require_once("../Models/Producto.php");
                $data = new Producto();
                $datos=$data->getProductos();
            }
                foreach($datos as $data){
                    ?>
            <tr>
                <td><?= $data->id_producto?></td>
                <td><?= $data->nombre_producto?></td>
                <td><?= $data->marca?></td>
                <?php $imagen_bd = base64_encode($data->imagen); $imagen_mostrada= 'data:image/png;base64,'.$imagen_bd;?>
                <td><img src="<?=$imagen_mostrada ?>" width="100px" alt="imagen de bd"></td>
                <td>Marca 1</td>
                <td><?=$data->stock?></td>
            </tr>
            <?php
            }
            ?>
            
        <!-- Agregar más filas si es necesario -->
    </tbody>
</table>