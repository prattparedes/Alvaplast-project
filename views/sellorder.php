<div class="sellorder">
  <div class="btns__left">
    <button type="button" class="order__btn btn btn-primary btn-lg" id="neworder">Generar Orden de Venta <i class="bi bi-plus-circle"></i></button>
  </div>

  <div class="btns__right">
    <button type="button" class="order__btn order__btn--inactive btn btn-primary btn-lg">Grabar <i class="bi bi-floppy"></i></button>
    <button type="button" class="order__btn order__btn--inactive btn btn-primary btn-lg">Modificar <i class="bi bi-pencil-square"></i></button>
    <button type="button" class="order__btn order__btn--inactive btn btn-primary btn-lg">Eliminar <i class="bi bi-trash"></i></button>
    <button type="button" class="order__btn btn btn-primary btn-lg" id="openModalButton" onclick="loadModalContent('sellorderlist')">Buscar <i class="bi bi-search"></i></i></button>
    <button type="button" class="order__btn order__btn--inactive btn btn-primary btn-lg">Exportar <i class="bi bi-file-earmark-arrow-down"></i></button>
  </div>
</div>
<hr>


<div style="display:flex;">
  <div class="order__left">
    <p style="font-size: 28px;">Orden de Venta N°: <span id="numeroventa"></span></p>
    <form action="/ruta/donde/enviar" method="POST" class="row g-3">
      <!-- Columna Izquierda -->
      <div style="display: flex; flex-direction: column; gap: 10px;">
        <!-- ... -->
        <div style="display: flex; gap: 10px;">
          <div class="col-md-6" style="display: flex; flex-direction: column;">
            <label for="cliente" class="form-label">Cliente</label>
            <div class="input-group">
              <input type="text" class="form-control" id="cliente" name="cliente" disabled>
              <button class="btn btn-outline-secondary order__btn--inactive" type="button" id="threeDotsButton" onclick="loadModalContent('clientslist')">
                <i class="bi bi-three-dots order__btn--inactive" id="threeDotsIco"></i>
              </button>
              <input type="hidden" id="idcliente" value="0">
            </div>
          </div>
          <div class="col-md-6" style="display: flex; flex-direction: column;">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" disabled>
          </div>
        </div>
        <!-- ... -->
        <div style="display: flex; gap: 10px;">
          <div class="col-md-6" style="display: flex; flex-direction: column;">
            <label for="rucDni" class="form-label">RUC o DNI</label>
            <input type="text" class="form-control" style="width:50%;" id="rucDni" name="rucDni" disabled>
          </div>
          <div class="col-md-6" style="display: flex; flex-direction: column;">
            <label for="moneda" class="form-label">Moneda</label>
            <select class="form-select" style="width:50%;" id="moneda" name="moneda" disabled>
              <option value="soles">Soles</option>
              <option value="dolares">Dólares</option>
            </select>
          </div>
        </div>
        <!-- ... -->
        <div style="display: flex; gap: 10px;">
          <div class="col-md-6" style="display: flex; flex-direction: column;">
            <label for="tipoPago" class="form-label">Tipo de Pago</label>
            <select name="tipoPago" class="form-select" style="width:50%;" id="tipoPago" disabled>
              <option value="">Elija una opción</option>
              <option value="efectivo">EFECTIVO</option>
              <option value="credito">CREDITO</option>
              <option value="tarjeta">TARJETA</option>
            </select>
          </div>
          <div class="col-md-6" style="display: flex; flex-direction: column;">
            <label for="vendedor" class="form-label">Vendedor</label>
            <select name="vendedor" class="form-select" id="vendedor" disabled>
              <option value="susan">SUSAN</option>
            </select>
          </div>
        </div>
        <!-- ... -->
        <div style="display: flex; gap: 10px;">
          <div class="col-md-6" style="display: flex; flex-direction: column;">
            <label for="sucursal" class="form-label">Sucursal</label>
            <select name="sucursal" class="form-select" style="width:50%;" id="sucursal" disabled>
              <option value="1">Principal</option>
            </select>
          </div>
          <div class="col-md-6" style="display: flex; flex-direction: column;">
            <label for="almacen" class="form-label">Almacén</label>
            <select name="almacen" class="form-select" style="width:50%;" id="almacen" disabled>
              <option value="almacen1">Almacén 1</option>
            </select>
          </div>
        </div>
        <div style="display: flex; gap: 10px;">
          <div class="col-md-6" style="display: flex; flex-direction: column;">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" style="width:50%;" id="fecha" name="fecha" disabled>
          </div>
          <div class="col-md-6" style="display: flex; flex-direction: column;">
            <label for="tipoDocumento" class="form-label">Tipo de Documento</label>
            <select name="notaCobranza" id="notaCobranza" class="form-select" disabled>
              <option value="notaA">NOTA DE COBRANZA - A</option>
            </select>
          </div>
        </div>
      </div>
      <!-- Columna Derecha -->
      <div style="display: flex; flex-direction: column; gap: 10px;">
        <!-- ... -->
        <div style="display: flex; gap: 10px;">
          <div class="col-md-6" style="display: flex; flex-direction: column;">
            <label for="inicial" class="form-label">Inicial</label>
            <input type="number" class="form-control" style="width:50%;" id="inicial" name="inicial" disabled>
          </div>
          <div class="col-md-6" style="display: flex; flex-direction: column;">
            <label for="montoFinanciado" class="form-label">Monto Financiado</label>
            <input type="number" class="form-control" style="width:50%;" id="montoFinanciado" name="montoFinanciado" disabled>
          </div>
        </div>
        <!-- ... -->
        <div style="display: flex; gap: 10px;">
          <div class="col-md-6" style="display: flex; flex-direction: column;">
            <label for="cuotas" class="form-label">Cuotas</label>
            <input type="number" class="form-control" style="width:50%;" id="cuotas" name="cuotas" disabled>
          </div>
          <div class="col-md-6" style="display: flex; flex-direction: column;">
            <label for="montoCuota" class="form-label">Monto Cuota</label>
            <input type="number" class="form-control" style="width:50%;" id="montoCuota" name="montoCuota" disabled>
          </div>
        </div>
        <!-- ... -->
        <div class="col-md-12" style="display: flex; flex-direction: column;">
          <label for="notas" class="form-label">Notas</label>
          <textarea class="form-control" id="notas" name="notas" rows="3" disabled></textarea>
        </div>
      </div>
      <!-- ... -->
    </form>
  </div>
  <div class="order__right">
    <p style="font-weight: 600; font-size: 32px; display:flex; gap:20px;">
      <button type="button" class="btn btn-primary btn-lg order__btn--inactive" style="margin-bottom: 16px;  border: none;" id="selectproduct" onclick="loadModalContent('productsselllist')">Seleccionar Producto <i class="bi bi-plus-circle"></i></button>
      <span style="font-size: 28px;">Producto seleccionado:</span>
      <span style="margin-right: 20px; font-size: 28px;" id="productname">NINGUNO</span>
    </p>
    <div style="display:flex; justify-content:space-between; margin-bottom:20px;">
      <table style="margin-top: 10px;">
        <thead>
          <tr>
            <th style="padding-right: 15px;">Unidad</th>
            <th style="padding-right: 15px;">Cantidad</th>
            <th style="padding-right: 15px;">Precio Unitario</th>
            <th style="padding-right: 15px;">Descuento</th>
            <th>Stock</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><select style="width: 60px;" name="" id="productunit" disabled>
                <option value="fardo">F</option>
              </select></td>
            <td><input style="width: 60px;" type="number" id="productquantity" disabled></td>
            <td><input style="width: 80px;" type="number" id="productprice" disabled></td>
            <td><input style="width: 60px;" type="text" id="productdiscount" value="0" disabled></td>
            <td><span id="productstock">N/A</span></td>
          </tr>
        </tbody>
      </table>

      <button style="border: none;" class="btn btn-primary order__btn--inactive" id="addproduct">AÑADIR +</button>
    </div>

    <!-- <p style="font-weight:600; font-size: 32px">Producto seleccionado: <span style="margin-right: 20px;" id="productname">NINGUNO</span> Unidad: <input style="width: 60px;" type="text" id="productunit" disabled> Cantidad: <input style="width: 60px;" type="number" id="productquantity" disabled> Precio Unitario: <input style="width: 80px;" type="number" id="productprice" disabled> Descuento: <input style="width: 60px;" type="text" id="productdiscount" value="0" disabled>
      % Stock Actual: <span id="productstock">N/A</span><button style="margin-left:32px; border:none;" class="btn btn-primary order__btn--inactive" id="addproduct">AÑADIR +</button>
    </p> -->

    <table id="ordertable" class="table">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Unidad</th>
          <th>Precio Venta</th>
          <th>Precio Real</th>
          <th>Total</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <!-- <td>Ejemplo Producto</td>
          <td>1</td>
          <td>Unidad</td>
          <td>100</td>
          <td>90</td>
          <td>90</td>
        </tr> -->
      </tbody>
    </table>
  </div>
</div>


<?php include 'modals/generalModal.php'; ?>