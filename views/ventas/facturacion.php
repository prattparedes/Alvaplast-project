</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Almacen;
        use Models\maintenance_models\Moneda;
        use Models\maintenance_models\Caja;
        use Models\maintenance_models\Personal;
        use Models\maintenance_models\Vehiculo;
        use Models\maintenance_models\Transportistas;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">
                <div class="row numero_documento--title">
                    <h5 style="background: Black; color: white; text-align:center;" class="titulo" id="titulo">FACTURACIÓN</h5>

                    <div class="row" style="margin-top: 7px; display:flex; justify-content:center;">
                        <div class="" style="width: 230px;">
                            <select name="" id="tipoDocumento" style="width:210px !important; font-size:14px;margin-right:20px;" class="form-select" disabled onchange="seleccionarTipoDocumentoFacturacion(this.value)">
                                <option value=""></option>
                                <option value="001">NOTA DE COBRANZA - A</option>
                                <option value="002">NOTA DE COBRANZA - B</option>
                                <option value="003">NOTA DE COBRANZA - C</option>
                                <option value="012">NOTA DE COBRANZA - D</option>
                                <option value="013">NOTA DE COBRANZA - E</option>
                            </select>
                            </fieldset>
                        </div>

                        <div class="" style="width: 90px; margin-left:-20px">
                            <fieldset disabled>
                                <input type="number" id="numeroDocumento" placeholder="001" class="form-control" aria-describedby="passwordHelpInline" disabled>
                            </fieldset>
                        </div>

                        <div class="" style="width: 108px;margin-left:-20px">
                            <fieldset disabled>
                                <input type="number" id="serieDocumento" placeholder="0000000" class="form-control" aria-describedby="passwordHelpInline" disabled>
                            </fieldset>
                        </div>
                    </div>
                </div>



                <hr style="margin-top: 12px;">
                <h5 style="background: teal; color: white; text-align:left;" class="titulo">DATOS DE LA VENTA</h5>
                <div class="row">
                    <div class="col-md-12" style="margin-top: -5px;">
                        <label for="inputPassword6" class="col-form-label">Orden de Venta</label>
                        <div class="input-group">
                            <input type="text" class="form-control" aria-describedby="" id="ordenVenta">
                            <input type="hidden" id="idVenta" value="">
                            <button style="height: 35PX;" class="btn btn-outline-secondary" type="button" id="" onclick="loadContent('views/modals/listaordenventafacturacion.php')">....</button>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label">Almacen</label>
                        <select id="almacen" class="form-select" disabled>
                            <option value="">Seleccione</option>
                            <?php
                            $almacenes = Almacen::getAlmacenes();
                            foreach ($almacenes as $almacen) { ?>
                                <option value="<?= $almacen->id_almacen ?>" style="display:none"><?= $almacen->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">RUC/DNI</label>
                        <input type="text" id="rucDni" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-6" style="margin-left:-4px">
                        <label for="inputPassword6" class="col-form-label">..</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label">Cliente</label>
                        <input type="text" id="cliente" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label">Dirección</label>
                        <input type="text" id="direccion" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        <br>
                    </div>




                    <div class="col-md-6" style="margin-top:-15px">
                        <label for="inputPassword6" class="col-form-label">Fecha de Emisión</label>
                        <input type="datetime-local" id="fecha" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="flexCheckDefault" class="form-label">Incluye IGV</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                            <label class="form-check-label" for="flexCheckDefault">Habilitado</label>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Caja</label>
                        <select name="caja" id="caja" style="width:100% !important" class="form-select" disabled>
                            <?php
                            $idAlmacen = 1;
                            $cajas = Caja::getCajasXAlmacen($idAlmacen);
                            foreach ($cajas as $caja) { ?>
                                <option value="<?= $caja->id_caja ?>"><?= $caja->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Moneda</label>
                        <select id="moneda" class="form-select" disabled>
                            <?php
                            $monedas = Moneda::getMonedas();
                            foreach ($monedas as $moneda) { ?>
                                <option value="<?= $moneda->id_moneda ?>"><?= $moneda->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>




                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Inicial</label>
                        <input type="text" id="inicial" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Cuotas</label>
                        <input type="text" id="cuotas" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>


                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Financiado</label>
                        <input type="text" id="montofin" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Monto en Cuotas</label>
                        <input type="text" id="montocuo" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        <br>
                    </div>



                    <br>
                    <h5 style="background: teal; color: white; text-align:left;" class="titulo">INFORMACIÓN</h5>
                    <div class="col-md-12" style="margin-top: -5px;">
                        <label for="inputPassword6" class="col-form-label">Vendedor</label>
                        <select id="vendedor" class="form-select" disabled>
                            <?php
                            $data = Personal::getPersonal();
                            foreach ($data as $pers) {
                            ?>
                                <option value="<?= $pers->id_personal ?>">
                                    <?= $pers->nombres . ' ' . $pers->ap_paterno . ' ' . $pers->ap_materno ?>
                                </option>
                            <?php } ?>
                        </select>

                    </div>

                    <div class="col-md-6" style="margin-top: -5px;">
                        <label for="inputPassword6" class="col-form-label">Marca/Unidad</label>
                        <input type="text" id="marcaVehiculo" class="form-control" aria-describedby="passwordHelpInline" disabled value="Hiunday">
                    </div>

                    <div class="col-md-6" style="margin-top: -5px;">
                        <label for="inputPassword6" class="col-form-label">Placa</label>
                        <select name="" id="placaVehiculo" class="form-select" disabled onchange="seleccionarPlacaVehiculo()">
                            <?php
                            $vehiculos = Vehiculo::getVehiculos();
                            foreach ($vehiculos as $vehiculo) { ?>
                                <option value="<?= $vehiculo->id_vehiculo ?>" data-marca="<?= $vehiculo->marca_vehiculo ?>"><?= $vehiculo->placa ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div><br></div>


                    <hr>

                    <div class="row mb-6" style="margin-top: -10px;">
                        <div class="col-md-6">

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled checked>
                                <label class="form-check-label" for="flexCheckDefault">Transportista/RUC</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword6" class="form-label">Nombre</label>
                        <select id="nombreTransportista" class="form-select" onchange="selectTransportista()">
                            <?php
                            $transportistas = Transportistas::getTransportistas();
                            foreach ($transportistas as $transportista) { ?>
                                <option value="<?= $transportista->id_transportista ?>" data-ruc="<?= $transportista->ruc ?>" data-dni="<?= $transportista->dni ?>"><?= $transportista->nombres . " " . $transportista->ap_paterno . " " . $transportista->ap_materno ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-6" style="margin-top: -5px;">
                        <label for="inputPassword6" class="col-form-label">RUC</label>
                        <input type="text" id="rucVehiculo" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label">P. Partida</label>
                        <input type="text" id="partida" class="form-control" aria-describedby="passwordHelpInline" value="Mz. L Lote 8 - A.H. San Fernando">
                    </div>

                    <div class=""><br></div>
                </div>


                <div class="row">

                    <div class="row mb-2" style="margin-top: -10px;">
                        <hr>
                        <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled checked>
                                <label class="form-check-label" for="flexCheckDefault">Chofer/Licencia</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" style="margin-top: -10px;">
                        <label for="inputPassword6" class="col-form-label">Nombre</label>
                        <select id="nombreChofer" class="form-select" name="" id="" onchange="selectChofer()">
                            <?php
                            $choferes = Transportistas::getTransportistas();
                            foreach ($choferes as $transportista) { ?>
                                <option value="<?= $transportista->id_transportista ?>" data-licencia="<?= $transportista->licencia ?>"><?= $transportista->nombres . " " . $transportista->ap_paterno . " " . $transportista->ap_materno ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-6" style="margin-top: -10px;">
                        <label for="inputPassword6" class="col-form-label">Licencia</label>
                        <input type="text" id="choferLicencia" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>
                </div>


                <div class="col-md-12">
                    <label for="inputPassword6" class="col-form-label">Nro Factura/Guia</label>
                    <input type="text" id="usuario" class="form-control" aria-describedby="passwordHelpInline">
                </div>

                <hr>

            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:4px">


                        <div class="col-md-12" style="margin-top: -5px;">
                            <a style="width: 90px;" id="" class="btn btn-primary me-2" href="#" role="button" onclick="NuevaFacturación()">Nuevo</a>
                            <button style="width: 90px;margin-left:-10px;" type="button" class="btn btn-success me-2">Grabar</button>
                            <a style="width: 90px;margin-left:-10px;" name="" id="" class="btn btn-warning me-2" href="#" role="button">Anular</a>
                            <a style="width: 90px;margin-left:-10px;" name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a>
                            <a style="width: 90px;margin-left:-3px;" name="" id="" class="btn btn-info" href="#" role="button">Imprimir</a>
                            <button style="width: 90px;" style="margin-left:8px" class="btn btn-secondary me-2" href="#" onclick="loadContent('views/modals/filtroregistrofacturacion.php')" role="button">Buscar</button>
                        </div>
                        <hr>
                    </div>
                </div>

                <h5 style="background: teal; color: white; text-align:left;" class="titulo">DETALLE DE FACTURACIÓN</h5>
                <hr>
                <div class="table--container">
                    <table style="width:100%;" class="tbl_venta" id="ordertable">
                        <thead>
                            <tr>
                                <th width="210">Producto</th>
                                <th width="50">Cantidad</th>
                                <th class="textcenter" width="90">Unidad</th>
                                <th class="textcenter" width="100">PreVenta</th>
                                <th class="textcenter" width="100">PreReal</th>
                                <th class="textcenter" width="100">Total</th>
                            </tr>
                        </thead>

                        <tbody id="detalle_venta">
                        </tbody>


                        <tfoot class="footer">

                            <tr>
                                <td colspan="5" class="textright"></td>
                                <td class="textright">--</td>
                            </tr>


                            <tr>
                                <td colspan="5" class="textright">Precio Bruto</td>
                                <td class="textright" id="productsubtotal1">0</td>
                            </tr>

                            <tr>
                                <td colspan="5" class="textright">Descuento</td>
                                <td class="textright" id="productDescuento">0</td>
                            </tr>

                            <tr>
                                <td colspan="5" class="textright">Precio Neto</td>
                                <td class="textright" id="productsubtotal2">0</td>
                            </tr>

                            <tr>
                                <td colspan="5" class="textright">IGV S/.</td>
                                <td class="textright" id="productigv">0</td>
                            </tr>

                            <tr>
                                <td colspan="5" class="textright">Total S/.</td>
                                <td class="textright" id="productTotal">0</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>