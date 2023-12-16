<?php require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/Models/Compra.php')?>
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
<p style="font-size: 28px;">Orden de Compra N°:<span id="numerocompra"><?=Compra::getIdCompra();?></span></p>
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
        <select class="form-control" id="sucursal" name="sucursal">
            <option value="">Seleccione una sucursal</option>
            <?php require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/Models/Sucursal.php");
            $sucursales = Sucursal::getSucursales(); ?>
            <option value="<?=$sucursales->id_sucursal?>"><?=$sucursales->descripcion?></option>
        </select>
    </div>
    <div class="col-md-6">
        <label for="direccion" class="form-label">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" disabled>
    </div>
    <div class="col-md-6">
        <label for="moneda" class="form-label">Moneda</label>
        <select class="form-select" id="moneda" name="moneda" disabled>
            <option value="">Elije una moneda</option>
            <?php require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/Models/Moneda.php");
            $monedas = Moneda::getMonedas();
            foreach($monedas as $moneda){
            ?>
            <option value="<?=$moneda->id_moneda?>"><?=$moneda->descripcion?></option>
            <?php }?>
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