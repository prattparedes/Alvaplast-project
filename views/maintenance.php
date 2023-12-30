<div class="maintenance">
  <h2 style="text-align:center;">Mantenimiento</h2>
  <div class="maintenance__btns">
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" onclick="loadMaintenanceContent('productmodal')">Productos <i class="bi bi-plus-circle" onclick="loadMaintenanceContent('productmodal')"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" onclick="loadMaintenanceContent('clientmodal')">Clientes <i class="bi bi-plus-circle" onclick="loadMaintenanceContent('clientmodal')"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" onclick="loadMaintenanceContent('providermodal')">Proveedores <i class="bi bi-plus-circle" onclick="loadMaintenanceContent('providermodal')"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" onclick="loadMaintenanceContent('productlines')">Línea <i class="bi bi-plus-circle" onclick="loadMaintenanceContent('productlines')"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" onclick="loadMaintenanceContent('productbrands')">Marca <i class="bi bi-plus-circle" onclick="loadMaintenanceContent('productbrands')"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" onclick="loadMaintenanceContent('productunits')">Unidad <i class="bi bi-plus-circle" onclick="loadMaintenanceContent('productunits')"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" onclick="loadMaintenanceContent('currencieslist')">Moneda <i class="bi bi-plus-circle" onclick="loadMaintenanceContent('currencieslist')"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" onclick="loadMaintenanceContent('branchmodal')">Sucursal <i class="bi bi-plus-circle" onclick="loadMaintenanceContent('branchmodal')"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" onclick="loadMaintenanceContent('storemodal')">Almacén <i class="bi bi-plus-circle" onclick="loadMaintenanceContent('storemodal')"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" onclick="loadMaintenanceContent('vehiclesmodal')">Vehículos <i class="bi bi-plus-circle" onclick="loadMaintenanceContent('vehiclesmodal')"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" onclick="loadMaintenanceContent('documentsmodal')">Documento <i class="bi bi-plus-circle" onclick="loadMaintenanceContent('documentsmodal')"></i></button>
    <button type="button" class="maintenance__btn btn btn-primary btn-lg" onclick="loadMaintenanceContent('carrierslist')">Transportistas <i class="bi bi-plus-circle" onclick="loadMaintenanceContent('carrierslist')"></i></button>
  </div>
  <hr>
  <div class="maintenance__container" style="max-width: 1600px; margin:16px auto;">
    <h3 style="text-align:center;">↑ Seleccione una opción arriba ↑</h3>
  </div>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
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
</div> -->

<?php include 'modals/generalModal.php'; ?>