<div class="buyorder">
    <div class="btns__left">
        <button type="button" class="order__btn btn btn-primary btn-lg" id="neworder">Generar Orden de Compra <i class="bi bi-plus-circle"></i></button>
    </div>

    <div class="btns__right">
        <button type="button" class="order__btn order__btn--inactive btn btn-primary btn-lg">Grabar <i class="bi bi-floppy"></i></button>
        <button type="button" class="order__btn order__btn--inactive btn btn-primary btn-lg">Modificar <i class="bi bi-pencil-square"></i></button>
        <button type="button" class="order__btn order__btn--inactive btn btn-primary btn-lg">Eliminar <i class="bi bi-trash"></i></button>
        <button type="button" class="order__btn btn btn-primary btn-lg" id="openModalButton" onclick="loadModalContent('buyorderlist')">Buscar <i class="bi bi-search"></i></i></button>
        <button type="button" class="order__btn order__btn--inactive btn btn-primary btn-lg">Exportar <i class="bi bi-file-earmark-arrow-down"></i></button>
    </div>
    <!-- Contenido específico de la página de productos -->
</div>
<hr>
<p style="font-size: 28px;">Orden de Compra N°: </p>
<form action="/ruta/donde/enviar" method="POST" class="row g-3">
    <div class="col-md-6">
        <label for="proveedor" class="form-label">Proveedor</label>
        <div class="input-group">
            <input type="text" class="form-control" id="proveedor" name="proveedor" disabled>
            <button class="btn btn-outline-secondary order__btn--inactive" type="button" id="threeDotsButton" onclick="loadModalContent('providerlist')">
                <i class="bi bi-three-dots order__btn--inactive" id="threeDotsIco" onclick="loadModalContent('providerlist')"></i>
            </button>
        </div>
    </div>
    <div class="col-md-6">
        <label for="sucursal" class="form-label">Sucursal</label>
        <input type="text" class="form-control" id="sucursal" name="sucursal" disabled>
    </div>
    <div class="col-md-6">
        <label for="direccion" class="form-label">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" disabled>
    </div>
    <div class="col-md-6">
        <label for="moneda" class="form-label">Moneda</label>
        <select class="form-select" id="moneda" name="moneda" disabled>
            <option value="soles">Soles</option>
            <option value="dolares">Dólares</option>
            <!-- Agregar más opciones si es necesario -->
        </select>
    </div>
    <div class="col-md-6">
        <label for="almacen" class="form-label">Almacén</label>
        <input type="text" class="form-control" id="almacen" name="almacen" disabled>
    </div>
    <div class="col-md-6">
        <label for="tipoPago" class="form-label">Tipo de Pago</label>
        <input type="text" class="form-control" id="tipoPago" name="tipoPago" disabled>
    </div>
    <div class="col-md-6">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" class="form-control" id="fecha" name="fecha" disabled>
    </div>
    <div class="col-md-12">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" disabled></textarea>
    </div>
    <div class="col-md-12">
        <label for="detallesCompra" class="form-label">Detalles de la Compra</label>
        <textarea class="form-control" id="detallesCompra" name="detallesCompra" rows="3" disabled></textarea>
    </div>
</form>

<hr>
<button type="button" class="btn btn-primary btn-lg order__btn--inactive" style="margin-bottom: 16px; border:none;" id="selectproduct" onclick="loadModalContent('productsbuylist')">Seleccionar Producto <i class="bi bi-plus-circle"></i></button>
<p style="font-weight:600">Producto seleccionado: <span style="margin-right: 20px;" id="productname">NINGUNO</span> Unidad: <input style="width: 60px;" type="text" id="productunit"> Cantidad: <input style="width: 60px;" type="number" id="productquantity"> Precio Unitario: <input style="width: 80px;" type="number" id="productprice"> Descuento: <input style="width: 60px;" type="text" id="productdiscount" value="0">
    % <button style="margin-left:32px; border:none;" class="btn btn-primary order__btn--inactive" id="addproduct">AÑADIR +</button>
</p>
<table id="ordertable" class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Unidad</th>
            <th>Precio Compra</th>
            <th>Descuento</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <!-- Agregar filas según sea necesario -->
            <td>Ejemplo Producto</td>
            <td>1</td>
            <td>Unidad</td>
            <td>100</td>
            <td>0</td>
            <td>90</td>
        </tr>
    </tbody>
</table>

<?php include 'modals/generalModal.php'; ?>