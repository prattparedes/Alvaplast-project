<div class="maintenance">
  <h1 style="text-align:center;">Mantenimiento</h1>
  <div class="maintenance__btns">
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" id="openModalButton" onclick="loadModalContent('productmodal')">Productos <i class="bi bi-plus-circle"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" id="openModalButton" onclick="loadModalContent('clientmodal')">Clientes <i class="bi bi-plus-circle"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" id="openModalButton" onclick="loadModalContent('providermodal')">Proveedores <i class="bi bi-plus-circle"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" id="openModalButton" onclick="loadModalContent('productlines')">Línea <i class="bi bi-plus-circle"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" id="openModalButton" onclick="loadModalContent('productbrands')">Marca <i class="bi bi-plus-circle"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" id="openModalButton" onclick="loadModalContent('productunits')">Unidad <i class="bi bi-plus-circle"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" id="openModalButton" onclick="loadModalContent('currencieslist')">Moneda <i class="bi bi-plus-circle"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" id="openModalButton" onclick="loadModalContent('branchmodal')">Sucursal <i class="bi bi-plus-circle"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" id="openModalButton" onclick="loadModalContent('storemodal')">Almacén <i class="bi bi-plus-circle"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" id="openModalButton" onclick="loadModalContent('vehiclesmodal')">Vehículos <i class="bi bi-plus-circle"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" id="openModalButton" onclick="loadModalContent('documentsmodal')">Tipo de documento <i class="bi bi-plus-circle"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" id="openModalButton" onclick="loadModalContent('productmodal')">Transportistas <i class="bi bi-plus-circle"></i></button>
  </div>
  <hr>
  <h3 style="text-align: center;">Listado</h3>
  <span>Filtrar por Tipo: </span>
  <select id="filtro" style="margin-right: 32px">
    <option value="productos">Productos</option>
    <option value="clientes">Clientes</option>
    <option value="proveedores">Proveedores</option>
    <option value="lineas">Líneas</option>
    <option value="marcas">Marcas</option>
    <option value="unidades">Unidades</option>
    <option value="almacenes">Almacenes</option>
    <option value="transportistas">Transportistas</option>
  </select>
  <span>Filtrar por Nombre: </span>
  <input type="text" id="maintenancefilter" style="margin-right: 32px">
  <button>Buscar </button>
  <hr>
  <table class="table">
    <thead>
      <tr>
        <th>Código</th>
        <th>Producto</th>
        <th>Precio de venta</th>
        <th>Precio de compra</th>
        <th>Moneda</th>
        <th>Marca</th>
        <th>Unidad</th>
        <th>Volumen</th>
        <th>Stock Min.</th>
        <th>Stock Max.</th>
        <th>Stock</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>284</td>
        <td>Charola Redonda N° 30 San Gabriel</td>
        <td>549.99</td>
        <td>120</td>
        <td>S/.</td>
        <td>Super Fast</td>
        <td>MLL</td>
        <td>1</td>
        <td>0</td>
        <td>999</td>
        <td>300</td>
      </tr>
      <!-- Agregar más filas según sea necesario -->
    </tbody>
  </table>
</div>


<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Confirmación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de continuar?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary">Sí</button>
      </div>
    </div>
  </div>
</div>

<?php include 'modals/generalModal.php'; ?>