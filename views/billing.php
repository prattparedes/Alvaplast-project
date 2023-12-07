<div class="billing">
    <div class="btns__left">
        <button type="button" class="maintenance__btn  btn btn-primary btn-lg">Nueva Facturación <i class="bi bi-plus-circle"></i></button>
    </div>
    <div class="btns__right">
        <button type="button" class="maintenance__btn maintenance__btn--inactive btn btn-primary btn-lg">Grabar <i class="bi bi-floppy"></i></button>
        <button type="button" class="maintenance__btn maintenance__btn--inactive btn btn-primary btn-lg">Modificar <i class="bi bi-pencil-square"></i></button>
        <button type="button" class="maintenance__btn maintenance__btn--inactive btn btn-primary btn-lg">Eliminar <i class="bi bi-trash"></i></button>
        <button type="button" class="maintenance__btn btn btn-primary btn-lg">Buscar <i class="bi bi-search"></i></i></button>
        <button type="button" class="maintenance__btn maintenance__btn--inactive btn btn-primary btn-lg">Exportar <i class="bi bi-file-earmark-arrow-down"></i></button>
        <button type="button" class="maintenance__btn maintenance__btn--inactive btn btn-primary btn-lg">Imprimir <i class="bi bi-printer"></i></button>
    </div>
    <!-- Contenido específico de la página de productos -->
</div>
<hr>
<p style="font-size: 28px;">Tipo de Documento: </p>
<div class="col-md-6">
    <select class="form-select" id="tipoDocumento" name="tipoDocumento">
        <option value="Nota de Cobranza A">Nota de Cobranza A</option>
        <option value="Ticket">Ticket</option>
        <option value="Factura">Factura</option>
        <option value="Boleta">Boleta</option>
        <!-- Puedes agregar más opciones según sea necesario -->
    </select>
</div>
<hr>
<form action="/ruta/donde/enviar" method="POST" class="row g-3">
    <!-- Columna izquierda -->
    <div class="col-md-6">
        <label for="ordenVenta" class="form-label">Orden de Venta</label> <button class="form__btn"><i class="bi bi-three-dots"></i></button>
        <input type="text" class="form-control" id="ordenVenta" name="ordenVenta">
    </div>
    <div class="col-md-6">
        <label for="almacen" class="form-label">Almacén</label>
        <input type="text" class="form-control" id="almacen" name="almacen">
    </div>
    <div class="col-md-6">
        <label for="rucDni" class="form-label">RUC o DNI</label>
        <input type="text" class="form-control" id="rucDni" name="rucDni">
    </div>
    <div class="col-md-6">
        <label for="cliente" class="form-label">Cliente</label>
        <input type="text" class="form-control" id="cliente" name="cliente">
    </div>
    <div class="col-md-6">
        <label for="direccion" class="form-label">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion">
    </div>
    <div class="col-md-6">
        <label for="vendedor" class="form-label">Vendedor</label>
        <input type="text" class="form-control" id="vendedor" name="vendedor">
    </div>
    <!-- Columna derecha -->
    <div class="col-md-6">
        <label for="fechaEmision" class="form-label">Fecha Emisión</label>
        <input type="date" class="form-control" id="fechaEmision" name="fechaEmision">
    </div>
    <div class="col-md-6">
        <label for="caja" class="form-label">Caja</label>
        <input type="text" class="form-control" id="caja" name="caja">
    </div>
    <div class="col-md-6">
        <label for="moneda" class="form-label">Moneda</label>
        <select class="form-select" id="moneda" name="moneda">
            <option value="soles">Soles</option>
            <option value="dolares">Dólares</option>
            <!-- Agregar más opciones si es necesario -->
        </select>
    </div>
    <div class="col-md-6">
        <label for="inicial" class="form-label">Inicial</label>
        <input type="number" class="form-control" id="inicial" name="inicial">
    </div>
    <div class="col-md-6">
        <label for="financiado" class="form-label">Financiado</label>
        <input type="number" class="form-control" id="financiado" name="financiado">
    </div>
    <div class="col-md-6">
        <label for="cuotas" class="form-label">Cuotas</label>
        <input type="number" class="form-control" id="cuotas" name="cuotas">
    </div>
    <div class="col-md-6">
        <label for="montoCuota" class="form-label">Monto Cuota</label>
        <input type="number" class="form-control" id="montoCuota" name="montoCuota">
    </div>
    
    
    <div class="col-md-6">
        <label for="nroFacturaGuia" class="form-label">Nro Factura / Nro. Guía</label>
        <input type="text" class="form-control" id="nroFacturaGuia" name="nroFacturaGuia">
    </div>
    <hr>
    <h3>Transporte:</h3>
    <div class="col-md-6">
        <label for="puntoPartida" class="form-label">Punto Partida</label>
        <input type="text" class="form-control" id="puntoPartida" name="puntoPartida">
    </div>
    <div class="col-md-6">
        <label for="marcaUnidad" class="form-label">Marca Unidad</label>
        <input type="text" class="form-control" id="marcaUnidad" name="marcaUnidad">
    </div>
    <div class="col-md-6">
        <label for="placa" class="form-label">Placa</label>
        <input type="text" class="form-control" id="placa" name="placa">
    </div>
    <div class="col-md-6">
        <label for="transportistaRuc" class="form-label">Transportista/RUC</label>
        <input type="text" class="form-control" id="transportistaRuc" name="transportistaRuc">
    </div>
    <div class="col-md-6">
        <label for="choferLicencia" class="form-label">Chofer/Licencia</label>
        <input type="text" class="form-control" id="choferLicencia" name="choferLicencia">
    </div>

</form>

<hr>
<button type="button" class="btn btn-primary btn-lg" style="margin-bottom: 8px">Añadir Producto <i class="bi bi-plus-circle"></i></button>
<table class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Unidad</th>
            <th>Precio Venta</th>
            <th>Precio Real</th>
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
            <td>90</td>
            <td>90</td>
        </tr>
    </tbody>
</table>