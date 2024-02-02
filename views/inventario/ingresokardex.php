</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Sucursal;
        use Models\maintenance_models\Almacen;
        use Models\maintenance_models\Moneda;
        use Models\maintenance_models\Unidad;
        use Models\ventas\Venta;


        ?>

        <div class="kardex__movement">
            <div class="kardex__left" style="width: 31%;">
                <h5 style="background: gray; color: white; text-align:center;">INGRESO A KARDEX</h5>


                <div class="col-md-10">
                    <label for="inputPassword6" class="form-label">Nro. O/C</label>
                    <div class="input-group">
                        <input type="text" class="form-control" aria-describedby="button-addon2">
                        <button style="width:40px;height:35px" class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="loadContent('views/modals/listaordencompra.php')">....</button>
                    </div>


                    <hr>

                    <div class="row">
                        <b>
                            <h6>Datos del Cliente</h6>
                        </b>
                    </div>
                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label">RUC/DNI</label>
                        <input type="text" id="materno" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>


                <div class="col-md-10">
                    <label for="inputPassword6" class="col-form-label">Proveedor</label>
                    <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline">
                </div>


                <div class="row">
                    <div class="col-md-5">
                        <label for="number" class="col-form-label">Tipo de Pago</label>
                        <select name="" id="cargo" class="form-select">
                            <option value="" default>Elija una opción</option>
                            <option value="" default>Efectivo</option>
                        </select>
                        </fieldset>
                    </div>


                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">Fecha de Emisión</label>
                        <input type="date" id="nombres" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">Inicial</label>
                        <input placeholder="" id="telefono" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">N. Cuotas</label>
                        <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">Llegada</label>
                        <input type="date" id="nombres" class="form-control" aria-describedby="passwordHelpInline">
                    </div>



                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">M.Financiado</label>
                        <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">M. Cuota</label>
                        <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">Incluye IGV</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                    </div>
                </div>
                <hr>

            </div>

            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:4px">


                        <div class="col-md-12">
                            <a style="width: 75px;" name="" id="" class="btn btn-primary" href="#" role="button" onclick="nuevaOrdenCompra()">Nuevo</a>
                            <a style="width: 75px;" name="" id="" class="btn btn-success buy_submit" href="#" role="button">Grabar</a>
                            <a style="width: 80px;" name="" id="" class="btn btn-warning" href="#" role="button">Exportar</a>
                            <a style="width: 75px;margin-top:1px" name="" id="" class="btn btn-danger  buy_submit" href="#" role="button">Salir</a>

                            <button style="width: 75px;" class="btn btn-secondary" onclick="loadContent('views/modals/listaordenventa.php')">Buscar</button>
                        </div>

                        <b>
                            <hr> COMPROBANTE
                        </b>

                        <!-- <label for="inputPassword6" class="col-md-12 col-form-label">Producto</label> -->
                        <div class="row">
                            <div class="col-md-5">
                                <label for="inputPassword6" class="col-form-label"></label>
                                <select name="" id="" class="form-select">
                                    <option value="" default>Elija una opción</option>
                                    <option value="" default>Efectivo</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="inputPassword6" class="col-form-label"></label>
                                <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                            </div>

                            <div class="col-md-3">
                                <label for="inputPassword6" class="col-form-label"></label>
                                <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-10">
                                <label for="inputPassword6" class="col-form-label">Caja</label>
                                <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline">
                            </div>
                        </div>

                        <br>

                    </div>


                </div>

                <hr>
                <b>
                    <h6>Detalles</h6>
                </b>

                <div class="table--container">
                    <table style="width:80%;" class="tbl_venta" id="ordertable">
                        <thead>
                            <tr>

                                <th width="250">Producto</th>
                                <th class="textcenter" width="100">Cantidad</th>
                                <th class="textcenter" width="100">Unidad</th>
                                <th class="textcenter" width="120">Pre-Compra</th>
                                <th class="textcenter" width="120">Descuento</th>
                                <th class="textcenter" width="120">Total</th>

                            </tr>
                        </thead>

                        <tbody id="detalle_venta">
                            <tr>

                                <td class="textleft">Gran feria de AlvaPlastic de 50x50cm</td>
                                <td class="textcenter">2</td>
                                <td class="textcenter">F</td>
                                <td class="textcenter">12599.00</td>
                                <td class="textcenter">12615.00</td>
                                <td class="textcenter">50198.00</td>

                            </tr>

                        </tbody>


                        <tfoot>
                            <tr>
                                <td colspan="5" class="textright">Precio Bruto</td>
                                <td class="textright">50198.00</td>
                            </tr>

                            <tr>
                                <td colspan="5" class="textright">Descuento</td>
                                <td class="textright">00.00</td>
                            </tr>

                            <tr>
                                <td colspan="5" class="textright">Precio Neto</td>
                                <td class="textright">167.80</td>
                            </tr>

                            <tr>
                                <td colspan="5" class="textright">IGV S/.</td>
                                <td class="textright">30.20</td>
                            </tr>

                            <tr>
                                <td colspan="5" class="textright">Total S/.</td>
                                <td class="textright">198.00</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>