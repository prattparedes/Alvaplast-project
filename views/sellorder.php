<div class="sellorder">
    <div class="btns__left">
        <button type="button" class="maintenance_btn btn btn-primary btn-lg">Generar Orden de Venta <i class="bi bi-plus-circle"></i></button>
    </div>

    <div class="btns__right">
        <button type="button" class="maintenance_btn maintenance_btn--inactive btn btn-primary btn-lg">Grabar <i class="bi bi-floppy"></i></button>
        <button type="button" class="maintenance_btn maintenance_btn--inactive btn btn-primary btn-lg">Modificar <i class="bi bi-pencil-square"></i></button>
        <button type="button" class="maintenance_btn maintenance_btn--inactive btn btn-primary btn-lg">Eliminar <i class="bi bi-trash"></i></button>
        <button type="button" class="maintenance_btn btn btn-primary btn-lg">Buscar <i class="bi bi-search"></i></i></button>
        <button type="button" class="maintenance_btn maintenance_btn--inactive btn btn-primary btn-lg">Exportar <i class="bi bi-file-earmark-arrow-down"></i></button>
    </div>
    <!-- Contenido específico de la página de productos -->
</div>
<hr>
<p style="font-size: 28px;">Orden de Venta N°: </p>
<form action="/ruta/donde/enviar" method="POST" class="row g-3">
  <div class="col-md-6">
    <label for="cliente" class="form-label">Cliente</label> <button class="form_btn"><i class="bi bi-three-dots"></i></button>
    <input type="text" class="form-control" id="cliente" name="cliente">
  </div>
  <div class="col-md-6">
    <label for="direccion" class="form-label">Dirección</label>
    <input type="text" class="form-control" id="direccion" name="direccion">
  </div>
  <div class="col-md-6">
    <label for="rucDni" class="form-label">RUC o DNI</label>
    <input type="text" class="form-control" id="rucDni" name="rucDni">
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
    <label for="tipoPago" class="form-label">Tipo de Pago</label>
    <input type="text" class="form-control" id="tipoPago" name="tipoPago">
  </div>
  <div class="col-md-6">
    <label for="inicial" class="form-label">Inicial</label>
    <input type="number" class="form-control" id="inicial" name="inicial">
  </div>
  <div class="col-md-6">
    <label for="cuotas" class="form-label">Cuotas</label>
    <input type="number" class="form-control" id="cuotas" name="cuotas">
  </div>
  <div class="col-md-6">
    <label for="montoFinanciado" class="form-label">Monto Financiado</label>
    <input type="number" class="form-control" id="montoFinanciado" name="montoFinanciado">
  </div>
  <div class="col-md-6">
    <label for="montoCuota" class="form-label">Monto Cuota</label>
    <input type="number" class="form-control" id="montoCuota" name="montoCuota">
  </div>
  <div class="col-md-6">
    <label for="vendedor" class="form-label">Vendedor</label>
    <input type="text" class="form-control" id="vendedor" name="vendedor">
  </div>
  <div class="col-md-6">
    <label for="sucursal" class="form-label">Sucursal</label>
    <input type="text" class="form-control" id="sucursal" name="sucursal">
  </div>
  <div class="col-md-6">
    <label for="almacen" class="form-label">Almacén</label>
    <input type="text" class="form-control" id="almacen" name="almacen">
  </div>
  <div class="col-md-6">
    <label for="fecha" class="form-label">Fecha</label>
    <input type="date" class="form-control" id="fecha" name="fecha">
  </div>
  <div class="col-md-6">
    <label for="tipoDocumento" class="form-label">Tipo de Documento</label>
    <input type="text" class="form-control" id="tipoDocumento" name="tipoDocumento">
  </div>
  <div class="col-md-12">
    <label for="notas" class="form-label">Notas</label>
    <textarea class="form-control" id="notas" name="notas" rows="3"></textarea>
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