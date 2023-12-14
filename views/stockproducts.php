<h2 style="text-align: center">STOCK DE PRODUCTOS</h2>

<div style="display: flex;">
    <!-- Select de Almacén -->
    <div style="display: flex; flex-direction: column; gap: 10px; width:60%;">
        <div style="display: flex; align-items: center;">
            <label for="almacenSelect" class="form-label" style="width: 100px; margin-right: 10px;">Almacén</label>
            <select class="form-select" id="almacenSelect" style="max-width: 500px;">
                <?php
                require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/Almacen.php");
                $almacenes = Almacen::getAlmacenes();
                foreach ($almacenes as $almac) {
                ?>
                    <option value="<?= $almac->id_almacen ?>"><?= $almac->descripcion ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <!-- Select de Línea -->
        <div style="display: flex; align-items: center;">
            <label for="lineaSelect" class="form-label" style="width: 100px; margin-right: 10px;">Línea</label>
            <select class="form-select" id="lineaSelect" style="max-width: 500px;">
                <option value="">Ingrese línea</option>
                <?php
                require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/Linea.php");
                $listas = Linea::ListarLineas();
                foreach ($listas as $linea) {
                ?>
                    <option value="<?= $linea->id_linea ?>"><?= $linea->descripcion ?></option>
                    <!-- Agregar más opciones si es necesario -->
                <?php
                }
                ?>
            </select>
        </div>

        <!-- Input para filtrar por Producto -->
        <div style="display: flex; align-items: center;">
            <label for="filtroProducto" class="form-label" style="width: 100px; margin-right: 10px;">Producto:</label>
            <input type="text" class="form-control" id="filtroProducto" style="max-width: 800px;">
        </div>
    </div>


    <!-- Botones -->
    <div style="display: flex; justify-content: flex-end; align-items:center">
        <button type="button" class="order__btn btn btn-primary btn-lg">Buscar <i class="bi bi-search"></i></i></button>
        <button type="button" class="order__btn btn btn-primary btn-lg">Exportar <i class="bi bi-file-earmark-arrow-down"></i></button>
        <button type="button" class="order__btn btn btn-primary btn-lg">Imprimir <i class="bi bi-printer"></i></button>
    </div>
</div>
<hr>
<!-- Tabla -->
<div class="table--container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Procedencia</th>
                <th>Marca</th>
                <th>Unidad</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Precio_venta</th>
                <th>Precio_compra</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody id="content">
            <?php
            if (!isset($_GET["buscarProducto"])) {
                require_once("../Models/Producto.php");
                $data = new Producto();
                $datos = $data->getProductos();
            }
            foreach ($datos as $data) {
            ?>
                <tr>
                    <td><?= $data->id_producto ?></td>
                    <td><?= $data->nombre_producto ?></td>
                    <td><?= $data->procedencia ?></td>
                    <td><?= $data->marca ?></td>
                    <td><?= $data->unidad ?></td>
                    <td><?= $data->descripcion ?></td>
                    <?php $imagen_bd = base64_encode($data->imagen);
                    $imagen_mostrada = 'data:image/png;base64,' . $imagen_bd; ?>
                    <td><img src="<?= $imagen_mostrada ?>" width="80px" alt="imagen de bd"></td>
                    <td><?= $data->moneda . number_format($data->precio_venta, 2) ?></td>
                    <td><?= $data->moneda . number_format($data->precio_compra, 2) ?></td>
                    <td><?= intval($data->stock) ?></td>
                </tr>
            <?php
            }
            ?>

            <!-- Agregar más filas si es necesario -->
        </tbody>
    </table>
</div>