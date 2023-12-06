<h2 style="text-align: center">STOCK DE PRODUCTOS</h2>
<!-- Select de Almacén -->
<label for="almacenSelect" class="form-label">Almacén</label>
<select class="form-select" id="almacenSelect">
    <option value="Almacen1">Almacén 1</option>
    <option value="Almacen2">Almacén 2</option>
    <!-- Agregar más opciones si es necesario -->
</select>

<!-- Select de Línea -->
<label for="lineaSelect" class="form-label">Línea</label>
<select class="form-select" id="lineaSelect">
    <option value="Rollos">Rollos</option>
    <option value="Bolsas">Bolsas</option>
    <option value="Cubiertos">Cubiertos</option>
    <!-- Agregar más opciones si es necesario -->
</select>

<!-- Input para filtrar por Producto -->
<label for="filtroProducto" class="form-label">Producto:</label>
<input type="text" class="form-control" id="filtroProducto">

<hr>

<!-- Tabla -->
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
        <!-- Agregar más filas si es necesario -->
    </tbody>
</table>