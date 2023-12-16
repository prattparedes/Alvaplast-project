<div class="billing">
    <div class="btns__left">
        <button type="button" class="order__btn  btn btn-primary btn-lg" id="newbill">Nueva Facturación <i class="bi bi-plus-circle"></i></button>
    </div>
    <div class="btns__right">
        <button type="button" class="order__btn order__btn--inactive btn btn-primary btn-lg">Grabar <i class="bi bi-floppy"></i></button>
        <button type="button" class="order__btn order__btn--inactive btn btn-primary btn-lg">Modificar <i class="bi bi-pencil-square"></i></button>
        <button type="button" class="order__btn order__btn--inactive btn btn-primary btn-lg">Eliminar <i class="bi bi-trash"></i></button>
        <button type="button" class="order__btn btn btn-primary btn-lg" id="openModalButton" onclick="loadModalContent('billingorderlist')">Buscar <i class="bi bi-search"></i></i></button>
        <button type="button" class="order__btn order__btn--inactive btn btn-primary btn-lg">Exportar <i class="bi bi-file-earmark-arrow-down"></i></button>
        <button type="button" class="order__btn order__btn--inactive btn btn-primary btn-lg">Imprimir <i class="bi bi-printer"></i></button>
    </div>
    <!-- Contenido específico de la página de productos -->
</div>
<hr>


<div style="display: flex;">
    <div class="order__left">
        <p style="font-size: 28px;">Documento: <select class="form-select" style="width:35%; display:inline;" id="tipoDocumento" name="tipoDocumento" disabled>
                <option value="Nota de Cobranza A">Nota de Cobranza A</option>
                <option value="Ticket">Ticket</option>
                <option value="Factura">Factura</option>
                <option value="Boleta">Boleta</option>
                <!-- Puedes agregar más opciones según sea necesario -->
            </select> <input type="number" style="width:80px; font-size:18px;"> - <input type="number" style="width:160px;font-size:18px;"></p>
        <hr>
        <form action="/ruta/donde/enviar" method="POST" class="row g-3">
            <!-- Columna izquierda -->
            <div style="display: flex; flex-direction: column; gap: 10px;">
                <div style="display: flex; gap: 10px;">
                    <div class="col-md-6" style="display: flex; flex-direction: column;">
                        <label for="billing" class="form-label">Orden de Venta</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="billing" name="billing" disabled>
                            <button class="btn btn-outline-secondary order__btn--inactive" type="button" id="threeDotsButton" onclick="loadModalContent('sellorderlist')">
                                <i class="bi bi-three-dots order__btn--inactive" id="threeDotsIco"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6" style="display: flex; flex-direction: column;">
                        <label for="almacen" class="form-label">Almacén</label>
                        <input type="text" class="form-control" id="almacen" name="almacen" disabled>
                    </div>
                </div>
                <div style="display: flex; gap: 10px;">
                    <div class="col-md-6" style="display: flex; flex-direction: column;">
                        <label for="rucDni" class="form-label">RUC o DNI</label>
                        <input type="text" class="form-control" id="rucDni" name="rucDni" disabled>
                    </div>
                    <div class="col-md-6" style="display: flex; flex-direction: column;">
                        <label for="cliente" class="form-label">Cliente</label>
                        <input type="text" class="form-control" id="cliente" name="cliente" disabled>
                    </div>
                </div>
                <div style="display: flex; gap: 10px;">
                    <div class="col-md-6" style="display: flex; flex-direction: column;">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" disabled>
                    </div>
                    <div class="col-md-6" style="display: flex; flex-direction: column;">
                        <label for="vendedor" class="form-label">Vendedor</label>
                        <input type="text" class="form-control" id="vendedor" name="vendedor" disabled>
                    </div>
                </div>
                <div style="display: flex; gap: 10px;">
                    <div class="col-md-6" style="display: flex; flex-direction: column;">
                        <label for="fechaEmision" class="form-label">Fecha Emisión</label>
                        <input type="date" class="form-control" id="fechaEmision" name="fechaEmision" disabled>
                    </div>
                    <div class="col-md-6" style="display: flex; flex-direction: column;">
                        <label for="caja" class="form-label">Caja</label>
                        <input type="text" class="form-control" id="caja" name="caja" disabled>
                    </div>
                </div>
                <div style="display: flex; gap: 10px;">
                    <div class="col-md-6" style="display: flex; flex-direction: column;">
                        <label for="moneda" class="form-label">Moneda</label>
                        <select class="form-select" style="width:50%;" id="moneda" name="moneda" disabled>
                            <option value="soles">Soles</option>
                            <option value="dolares">Dólares</option>
                            <!-- Agregar más opciones si es necesario -->
                        </select>
                    </div>
                </div>
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
                </div>

            </div>

            <!-- ... -->
        </form>
        <hr>
        <h3 style="font-size: 1.5em;">Transporte:</h3>
        <div style="display: flex; gap: 10px;">
            <div class="col-md-6" style="display: flex; flex-direction: column;">
                <label for="puntoPartida" class="form-label">Punto Partida</label>
                <input type="text" class="form-control" id="puntoPartida" name="puntoPartida" disabled>
                <label for="marcaUnidad" class="form-label">Marca Unidad</label>
                <input type="text" class="form-control" id="marcaUnidad" name="marcaUnidad" disabled>
                <label for="placa" class="form-label">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa" disabled>
            </div>
            <div class="col-md-6" style="display: flex; flex-direction: column;">
                <label for="transportistaRuc" class="form-label">Transportista/RUC</label>
                <input type="text" class="form-control" id="transportistaRuc" name="transportistaRuc" disabled>
                <label for="choferLicencia" class="form-label">Chofer/Licencia</label>
                <input type="text" class="form-control" id="choferLicencia" name="choferLicencia" disabled>
                <label for="nroFacturaGuia" class="form-label">Nro Factura / Nro. Guía</label>
                <input type="text" class="form-control" id="nroFacturaGuia" name="nroFacturaGuia" disabled>
            </div>
        </div>
    </div>

    <div class="order__right">
        <h3>DETALLES DE LA FACTURACIÓN:</h3>
        <p style="font-weight: 600; font-size: 32px; display:flex; gap:20px;"></p>
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
    </div>
</div>

<?php include 'modals/generalModal.php'; ?>