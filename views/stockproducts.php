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
<div class="table--container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Unidad</th>
                <th>Línea</th>
                <th>Marca</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Producto A</td>
                <td>Unidad X</td>
                <td>Rollos</td>
                <td>Marca 1</td>
                <td>50</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Producto A</td>
                <td>Unidad X</td>
                <td>Rollos</td>
                <td>Marca 1</td>
                <td>50</td>
            </tr>
            <!-- Agregar más filas si es necesario -->
        </tbody>
    </table>
</div>
