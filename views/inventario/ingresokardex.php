</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Sucursal;
        use Models\maintenance_models\Almacen;
        use Models\maintenance_models\Caja;
        use Models\maintenance_models\Moneda;
        use Models\maintenance_models\TipoDocumento;
        use Models\maintenance_models\Unidad;
        use Models\ventas\Venta;


        ?>

        <div class="kardex__movement">
            <div class="kardex__left">
                <h5 style="background: black; color: white; text-align:center;" class="titulo">INGRESO A KARDEX</h5>


                <div class="col-md-12">
                    <label for="inputPassword6" class="form-label">Nro. O/C</label>
                    <div class="input-group">
                        <input type="text" class="form-control" aria-describedby="button-addon2" id="numeroOC" disabled>
                        <button style=" width:40px;height:35px" class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="abrirListadoOC()">....</button>
                    </div>


                    <hr>

                    <div class="row">
                        <b>
                            <!-- <h6>Datos del Proveedor</h6> -->
                            <h5 style="background: teal; color: white; text-align:left;" class="titulo">DATOS DEL PROVEEDOR</h5>
                        </b>
                    </div>
                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label">RUC/DNI</label>
                        <input type="text" id="rucDni" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>
                </div>


                <div class="col-md-12">
                    <label for="inputPassword6" class="col-form-label">Proveedor</label>
                    <input type="text" id="proveedor" class="form-control" aria-describedby="passwordHelpInline" disabled>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <label for="number" class="col-form-label">Tipo de Pago</label>
                        <select name="" id="tipoPago" class="form-select"  disabled>
                            <option value="" default>Elija una opción</option>
                            <option value="E" default>Efectivo</option>
                            <option value="C" default>Credito</option>

                        </select>
                        </fieldset>
                    </div>


                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Fecha de Emisión</label>
                        <input type="datetime-local" id="fecha1" class="form-control" aria-describedby="passwordHelpInline"  disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Inicial</label>
                        <input placeholder="" id="inicial" class="form-control" aria-describedby="passwordHelpInline"  disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">N. Cuotas</label>
                        <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline"  disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Llegada</label>
                        <input type="datetime-local" id="fecha2" class="form-control" aria-describedby="passwordHelpInline"  disabled>
                    </div>



                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">M.Financiado</label>
                        <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline"  disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">M. Cuota</label>
                        <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline"  disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Incluye IGV</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="igv" disabled>
                        </div>
                    </div>
                </div>
                <hr>

            </div>

            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:4px">


                        <div class="col-md-12">
                            <a style="width: 90px;" name="" id="" class="btn btn-primary" href="#" role="button" onclick="NuevoIngreso()">Nuevo</a>
                            <a style="width: 90px;" name="" id="" class="btn btn-success buy_submit" href="#" role="button">Grabar</a>
                            <a style="width: 90px;" name="" id="" class="btn btn-warning" href="#" role="button">Exportar</a>
                            <a style="width: 90px;margin-top:1px" name="" id="" class="btn btn-danger  buy_submit" href="#" role="button" onclick="loadContent('views/home.php')">Salir</a>
                        </div>

                        <b>
                            <hr>
                            <!-- <hr> COMPROBANTE -->
                            <h5 style="background: teal; color: white; text-align:left;" class="titulo">COMPROBANTE</h5>
                        </b>

                        <!-- <label for="inputPassword6" class="col-md-12 col-form-label">Producto</label> -->
                        <div class="row kardex__row">
                            <div class="col-md-6">
                                <label for="inputPassword6" class="col-form-label"></label>
                                <select name="" id="tipoDocumento" class="form-select" disabled>
                                    <?php $documentos = TipoDocumento::getDocumentos();
                                    foreach ($documentos as $doc) {
                                    ?>
                                        <option value="<?= $doc->id_tipodocumento ?>"><?= $doc->descripcion ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="kardex__row--document">
                                <div style="width:100px; margin-right:12px;">
                                    <label for="inputPassword6" class="col-form-label"></label>
                                    <input type="text" id="numero1" class="form-control" aria-describedby="passwordHelpInline" maxlength="3"  disabled>
                                </div>
                                <div style="width:200px;">
                                    <label for="inputPassword6" class="col-form-label"></label>
                                    <input type="text" id="numero2" class="form-control" aria-describedby="passwordHelpInline" maxlength="7"  disabled>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputPassword6" class="col-form-label">Caja</label>
                                <select name="caja" id="caja" class="form-select"  disabled>

                                </select>
                            </div>
                        </div>

                        <br>
                        <hr>


                        <div class="table--container">

                            <table style="width:100%;" class="tbl_venta" id="ordertable">
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

                                </tbody>


                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="textright">Precio Bruto</td>
                                        <td class="textright" id="productsubtotal1">00.00</td>
                                    </tr>

                                    <tr>
                                        <td colspan="5" class="textright">Descuento</td>
                                        <td class="textright" id="productDescuento">00.00</td>
                                    </tr>

                                    <tr>
                                        <td colspan="5" class="textright">Precio Neto</td>
                                        <td class="textright" id="productsubtotal2">00.00</td>
                                    </tr>

                                    <tr>
                                        <td colspan="5" class="textright">IGV S/.</td>
                                        <td class="textright" id="productigv">00.00</td>
                                    </tr>

                                    <tr>
                                        <td colspan="5" class="textright">Total S/.</td>
                                        <td class="textright" id="productTotal">00.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>