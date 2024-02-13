<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Producto;
        use Models\maintenance_models\Almacen;
        ?>


        <div class="kardex__movement">
            <div class="kardex__left">
                
                <h5 style="background: black; color: white; text-align:center; margin-top:5px" class="titulo">MOVIMIENTO KARDEX</h5>
                <div class="col-md-8">
                    <span style="display:inline-block; width:40px; margin-bottom:8px;">Codigo</span>
                    <select name="almacen" id="almacenSelect" class="form-select">
                        <?php
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
                    <span style="display:inline-block; width:80px;">Filtro:</span>
                    <input type="text" id="filtroProductos" class="form-control" onkeyup="FiltrarListaProductosKardex()">

                </div>
                <hr>
                <div class="table--container" id="productosKardex">
                    <table style="width:100%;" class="tbl_venta" id="productosKardex">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th style="width:60px;">Unidad</th>
                            </tr>
                        </thead>
                        <tbody id="detalle_venta">
                            <?php
                            $producto = Producto::getProductos();
                            foreach ($producto as $produc) {
                            ?>
                                <tr>
                                    <td style="display:none;"><?= $produc->id_producto ?></td>
                                    <td class="textleft" width="320"><?= $produc->nombre_producto ?></td>
                                    <td><?= $produc->unidad ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="kardex__right">
            <!-- <b><p>SISTEMA DE VENTAS</p></b> -->
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:-40px">
                    
                        <p id="productoSeleccionadoKardex" style="font-weight:700;">-</p>

                        <div class="col-md-8">
                            Stock Físico Final:
                            <fieldset disabled>
                            <input type="text" id="stockfinal" style="margin-top: 10px;" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div style="margin-left: 10px;">

                        <!-- <p>Desde:
                            <input type="date" id="fecha1" name="fecha1">
                        </p> -->
                        <div class="row">
                            <div class="" style="width:180px;">
                                <label for="fecha1" class="col-form-label">Desde</label>
                                <input type="date" id="fecha1" class="form-control" aria-describedby="passwordHelpInline">
                            </div>
                            <div style="margin-left: 1px;">
                            </div>

                        </div>

                        <div class="" style="width:160px;">
                            <label for="fecha1" class="col-form-label">Hasta</label>
                            <input type="date" id="fecha2" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <!-- <p style="margin-bottom:0;">Hasta:
                            <input type="date" id="fecha2" name="fecha2">
                        </p> -->
                    </div>
                    <div style="margin-left: 20px;">
                        <button style="width: 120px;" type="button" class="btn btn-primary form-control" onclick="filtrarKardexPorFechas()">Consultar <i class="bi bi-search"></i></i></button>
                        <button style="width: 120px;" type="button" class="btn btn-danger form-control" onclick="exportarPDF()">Exportar <i class="bi bi-file-earmark-arrow-down"></i></button>

                    </div>
                </div>
                <hr>
                <div class="table--container">
                    <table style="width:100%;" class="tbl_venta" id="movimientosKardex">
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
                        <tbody id="detalle_venta">
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