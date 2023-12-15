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
</div>
<hr>

<div style="display:flex;">
    <div class="order__left">
        <p style="font-size: 28px;">Orden de Compra N°: <span id="numerocompra"></span></p>
        <form action="/ruta/donde/enviar" method="POST" class="row g-3">
            <!-- Columna Izquierda -->
            <div style="display: flex; flex-direction: column; gap: 10px;">
                <div style="display: flex; gap: 10px;">
                    <div class="col-md-6" style="display: flex; flex-direction: column;">
                        <label for="proveedor" class="form-label">Proveedor</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="proveedor" name="proveedor" disabled>
                            <button class="btn btn-outline-secondary order__btn--inactive" type="button" id="threeDotsButton" onclick="loadModalContent('providerlist')">
                                <i class="bi bi-three-dots order__btn--inactive" id="threeDotsIco"></i>
                            </button>
                            <input type="hidden" id="idproveedor" value="0">
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
                        <label for="sucursal" class="form-label">Sucursal</label>
                        <select name="sucursal" class="form-select" style="width:50%;" id="sucursal" disabled>
                            <option value="1">Principal</option>
                        </select>
                    </div>
                    <div class="col-md-6" style="display: flex; flex-direction: column;">
                        <label for="moneda" class="form-label">Moneda</label>
                        <select class="form-select" style="width:50%;" id="moneda" name="moneda" disabled>
                            <option value="soles">Soles</option>
                            <option value="dolares">Dólares</option>
                        </select>
                    </div>
                </div>
                <div style="display: flex; gap: 10px;">
                    <!-- Almacén -->
                    <div class="col-md-6" style="display: flex; flex-direction: column;">
                        <label for="almacen" class="form-label">Almacén</label>
                        <select name="almacen" class="form-select" style="width:50%;" id="almacen" disabled>
                            <option value="almacen1">Almacén 1</option>
                        </select>
                    </div>
                    <!-- Tipo de Pago -->
                    <div class="col-md-6" style="display: flex; flex-direction: column;">
                        <label for="tipoPago" class="form-label">Tipo de Pago</label>
                        <select name="tipoPago" class="form-select" style="width:50%;" id="tipoPago" disabled>
                            <option value="">Elija una opción</option>
                            <option value="efectivo">EFECTIVO</option>
                            <option value="credito">CREDITO</option>
                            <option value="tarjeta">TARJETA</option>
                        </select>
                    </div>
                </div>
                <!-- Fecha, Descripción y Detalles de la Compra -->
                <div style="display: flex; gap: 10px;">
                    <!-- Fecha -->
                    <div class="col-md-6" style="display: flex; flex-direction: column;">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" disabled>
                    </div>
                    <div class="col-md-6" style="display: flex; flex-direction: column;">
                        <label for="igv" class="form-label">Incluye IGV:</label>
                        <div class="form-check" style="display: flex; align-items: center; height: 36px; font-size: 18px;">
                            <input type="checkbox" class="form-check-input" id="igv" name="igv" disabled style="margin: 0 10px;">
                            <label class="form-check-label" for="igv">Habilitado</label>
                        </div>
                    </div>
                </div>
                <div style="display:flex; gap:10px;">
                    <div class="col-md-12" style="display: flex; flex-direction: column;">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" disabled></textarea>
                    </div>
                </div>
            </div>
            <!-- Columna Derecha -->
            <div style="display: flex; flex-direction: column; gap: 10px;">
                <div style="display: flex; gap: 10px;">

                </div>
            </div>
        </form>
    </div>
    <div class="order__right">
        <p style="font-weight: 600; font-size: 32px; display:flex; gap:20px;">
            <button type="button" class="btn btn-primary btn-lg order__btn--inactive" style="margin-bottom: 16px; border: none;" id="selectproduct" onclick="loadModalContent('productsbuylist')">Seleccionar Producto <i class="bi bi-plus-circle"></i></button>
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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select style="width: 60px;" name="" id="productunit" disabled>
                                <option value="fardo">F</option>
                            </select>
                        </td>
                        <td><input style="width: 60px;" type="number" id="productquantity" disabled></td>
                        <td><input style="width: 80px;" type="number" id="productprice" disabled></td>
                        <td><input style="width: 60px;" type="text" id="productdiscount" value="0" disabled></td>
                    </tr>
                </tbody>
            </table>

            <button style="border: none;" class="btn btn-primary order__btn--inactive" id="addproduct">AÑADIR +</button>
        </div>

        <table id="ordertable" class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                    <th>Precio Compra</th>
                    <th>Descuento (%)</th>
                    <th>Total</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td>Ejemplo Producto</td>
                    <td>1</td>
                    <td>Unidad</td>
                    <td>100</td>
                    <td>90</td>
                    <td>90</td>
                    <td id="deleteProduct" style="color:red !important; font-weight:700; text-align: center;">X</td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>

<?php include 'modals/generalModal.php'; ?>