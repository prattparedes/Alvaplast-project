<div class="kardex__movement">
    <div class="kardex__left">
        <h3 style="background: black; color: white; text-align:center;">Lista de Productos</h3>
        <div>
            <span style="display:inline-block; width:80px; margin-bottom:8px;">Almacén:</span>
            <select name="almacen" id="almacenSelect">
                <?php
                require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/Almacen.php");
                $almacenes = Almacen::getAlmacenes();
                foreach ($almacenes as $almac) {
                ?>
                    <option value="<?= $almac->id_almacen ?>"><?= $almac->descripcion ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div>
            <span style="display:inline-block; width:80px;">Filtro:</span> <input type="text"> <button>Buscar</button>
        </div>
        <hr>
        <div class="table--container">
            <table border="1" style="width:100%;" class="table" id="productosKardex">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th style="width:60px;">Unidad</th>
                    </tr>
                </thead>
                <tbody style="font-size: 12px !important">
                    <?php
                    require_once('../Models/Producto.php');
                    $producto = Producto::getProductos();
                    foreach ($producto as $produc) {
                    ?>
                        <tr>
                            <td style="display:none;"><?= $produc->id_producto ?></td>
                            <td><?= $produc->nombre_producto ?></td>
                            <td><?= $produc->unidad ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="kardex__right">
        <div style="display:flex; align-items:center; ">
            Stock Físico Final: <span id="stockfinal" style="font-weight:700; margin-left:8px;">-</span>
            <div style="margin-left: 80px;">
                <p>Desde: <input type="date" id="fecha1" name="fecha1"></p>
                <p style="margin-bottom:0;">Hasta: <input type="date" id="fecha1" name="fecha2"></p>
            </div>
            <div style="margin-left: 20px;">
                <button type="button" class="order__btn btn btn-primary btn-lg">Consultar <i class="bi bi-search"></i></i></button>
                <button type="button" class="order__btn btn btn-primary btn-lg">Exportar <i class="bi bi-file-earmark-arrow-down"></i></button>
            </div>
        </div>
        <hr>
        <div class="table--container">
            <table border="1" style="width:100%;" class="table" id="movimientosKardex">
                <thead>
                    <tr>
                        <th style="min-width: 116px;">Fecha</th>
                        <th style="min-width: 230px;">Proveedor/Cliente</th>
                        <th style="min-width: 71.5px;">Motivo</th>
                        <th style="min-width: 117.3px;">Documento</th>
                        <th style="min-width: 77.8px;">Monto</th>
                        <th style="min-width: 58.3px;">Inicio</th>
                        <th style="min-width: 73.44px;">Ingreso</th>
                        <th style="min-width: 62.19px;">Salida</th>
                        <th style="min-width: 58.84px;">Saldo</th>
                    </tr>
                </thead>
                <tbody style="font-size: 12px !important;">
                    <!-- <tr>
                        <td>07/12/2023 19:24:00</td>
                        <td>Proveedor 1</td>
                        <td>Compra</td>
                        <td>NC-A/001-000001</td>
                        <td>10.00</td>
                        <td>5.00</td>
                        <td>2.00</td>
                        <td>0</td>
                        <td>3.00</td>
                    </tr>
                    <tr>
                        <td>06/11/2023 14:49:00</td>
                        <td>Cliente A</td>
                        <td>Venta</td>
                        <td>NC-A/001-000001</td>
                        <td>10.00</td>
                        <td>5.00</td>
                        <td>2.00</td>
                        <td>0</td>
                        <td>3.00</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>