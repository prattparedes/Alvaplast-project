<div class="stockentry">
    <div class="btns__left">
        <button type="button" class="order__btn btn btn-primary btn-lg">Nuevo Ingreso <i class="bi bi-plus-circle"></i></button>
    </div>

    <div class="btns__right">
        <button type="button" class="order__btn order__btn--inactive btn btn-primary btn-lg">Grabar <i class="bi bi-floppy"></i></button>
        <button type="button" class="order__btn order__btn--inactive btn btn-primary btn-lg">Exportar <i class="bi bi-file-earmark-arrow-down"></i></button>
    </div>
    <!-- Contenido específico de la página de productos -->
</div>

<p style="font-size: 28px;">Comprobante: </p>
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
        <label for="ordenVenta" class="form-label">Numero O/C</label> <button class="form__btn"><i class="bi bi-three-dots"></i></button>
        <input type="text" class="form-control" id="ordenVenta" name="ordenVenta">
    </div>
    <div class="col-md-6">
        <label for="rucDni" class="form-label">RUC o DNI</label>
        <input type="text" class="form-control" id="rucDni" name="rucDni">
    </div>
    <div class="col-md-6">
        <label for="cliente" class="form-label">Proveedor</label>
        <input type="text" class="form-control" id="proveedor" name="proveedor">
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
        </select>
    </div>
    <div class="col-md-6">
        <label for="tipopago" class="form-label">Tipo de pago</label>
        <select class="form-control" name="tipopago" id="">
            <option value="">EFECTIVO</option>
            <option value="">CRÉDITO</option>
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
        <label for="montoCuota" class="form-label">Emisión</label>
        <input type="date" class="form-control" id="fecha" name="fecha">
    </div>
    <div class="col-md-6">
        <label for="montoCuota" class="form-label">Llegada</label>
        <input type="date" class="form-control" id="fecha" name="fecha">
    </div>
</form>
<hr>
<div class="table--container">
    <table class="table">
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
                <td>90</td>
                <td>10</td>
            </tr>
        </tbody>
    </table>
</div>