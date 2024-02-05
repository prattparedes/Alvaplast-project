</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Sucursal;
        use Models\maintenance_models\Almacen;
        use Models\maintenance_models\Moneda;
        use Models\maintenance_models\Unidad;
        use Models\compras\Compra;

        use Models\maintenance_models\Personal;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">
                <!-- <h5 style="background: black; color: white; text-align:center;">FACTURACIÓN</h5> -->

                <div class="row">
                    <!-- <h5 style="background: grey; color: white; text-align:center;">FACTURACIÓN</h5> -->
                    <h5 style="background: Black; color: white; text-align:center;" class="titulo">FACTURACIÓN</h5>

                    <div class="" style="width: 200px;">
                        <!-- <label for="number" class="col-form-label"></label> -->
                        <select name="" id="disabledSelect" class="form-select" disabled>
                            <option value="" default>Elija una opción</option>
                            <option value="" default>NOTA DE COBRANZA -B</option>
                        </select>
                        </fieldset>
                    </div>

                    <div class="" style="width: 95px; margin-left:-20px">
                        <!-- <label for="number" class="col-form-label">Numero</label> -->
                        <fieldset disabled>
                            <input type="number" id="disabledTextInput" placeholder="000" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </fieldset>
                    </div>

                    <div class="" style="width: 115px;margin-left:-20px">
                        <!-- <label for="number" class="col-form-label">Serie</label> -->
                        <fieldset disabled>
                            <input type="number" id="disabledTextInput" placeholder="0000000" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </fieldset>
                    </div>
                </div>


              
                <hr style="margin-top: 12px;">
                <h5 style="background: teal; color: white; text-align:left;" class="titulo">DATOS DE LA VENTA</h5>
                <div class="row">
                    <div class="col-md-12"style="margin-top: -5px;">
                        <label for="inputPassword6" class="col-form-label">Orden de Venta</label>
                        <div class="input-group">

                            <input type="text" class="form-control" aria-describedby="">
                            <button style="height: 35PX;" class="btn btn-outline-secondary" type="button" id="" onclick="loadContent('views/modals/listaordenventa.php')">....</button>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label">Almacen</label>
                        <select name="" id="inputPassword6" class="form-select" disabled>
                            <option value="" default>Elija una opción</option>

                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">RUC/DNI</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-6" style="margin-left:-4px">
                        <label for="inputPassword6" class="col-form-label">..</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label">Cliente</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label">Dirección</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        <br>
                    </div>



                  
                        <div class="col-md-6" style="margin-top:-15px">
                            <label for="inputPassword6" class="col-form-label">Fecha de Emisión</label>
                            <input type="date" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                        <div class="col-md-6">
                            <label for="flexCheckDefault" class="form-label">Incluye IGV</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Habilitado</label>
                            </div>
                        </div>
                   

                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Caja</label>
                        <select name="" id="cargo" class="form-select" disabled>
                            <option value="" default>Elija una opción</option>
                            <option value="A">Administrador</option>
                            <option value="V">Vendedor</option>
                        </select>
                    </div>


                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Moneda</label>
                        <select name="" id="cargo" class="form-select" disabled>
                            <option value="" default>Elija una opción</option>
                            <option value="A">Administrador</option>
                            <option value="V">Vendedor</option>
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
                        <select name="" id="cargo" class="form-select" disabled>
                            <option value="" default>Elija una opción</option>
                        </select>
                        
                    </div>

                    <div class="col-md-6" style="margin-top: -5px;">
                        <label for="inputPassword6" class="col-form-label">Marca/Unidad</label>
                        <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-6"style="margin-top: -5px;">
                        <label for="inputPassword6" class="col-form-label">Placa</label>
                        <select name="" id="cargo" class="form-select" disabled>
                            <option value="" default>Elija una opción</option>
                            <option value="A">Administrador</option>
                            <option value="V">Vendedor</option>
                        </select>
                    </div>

                    <div><br></div>


                    <hr>

                    <div class="row mb-6" style="margin-top: -10px;">
                        <div class="col-md-6">

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
                                <label class="form-check-label" for="flexCheckDefault">Transportista</label>
                            </div>
                        </div>
                 
                    </div>
                            <div class="col-md-6">
                                <label for="inputPassword6" class="form-label">Nombre</label>
                                <select id="disabledSelect" class="form-select" disabled>
                                    <option>Leonel Messi Pascual Lucas</option>
                                    <option>Extranjera</option>
                                </select>
                            </div>

                            <div class="col-md-6" style="margin-top: -5px;">
                                <label for="inputPassword6" class="col-form-label">RUC</label>
                                <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline" disabled>
                            </div>
                     
                        <div class="col-md-12">
                            <label for="inputPassword6" class="col-form-label">P. Partida</label>
                            <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                        <div class=""><br></div>
                    </div>
               

                <div class="row">

                    <div class="row mb-2" style="margin-top: -10px;">
                        <hr>
                        <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
                                <label class="form-check-label" for="flexCheckDefault">Chofer/Licencia</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6"style="margin-top: -10px;">
                        <label for="inputPassword6" class="col-form-label">Nombre</label>
                        <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-6"style="margin-top: -10px;">
                        <label for="inputPassword6" class="col-form-label">Placa</label>
                        <input type="text" id="celular" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>
                </div>


                <div class="col-md-12">
                    <label for="inputPassword6" class="col-form-label">Nro Factura/Guia</label>
                    <input type="text" id="usuario" class="form-control" aria-describedby="passwordHelpInline" disabled>
                </div>


                <hr>


                <!-- <div class="col-md-12">
                    <a style="width: 80px;" id="" class="btn btn-primary me-2 provider_submit" href="#" role="button">Nuevo</a>
                    <button style="width: 80px;margin-left:-10px;" type="button" style="margin-left:-8px" class="btn btn-success me-2 provider_submit">Grabar</button>
                    <a style="width: 80px;margin-left:-10px;" name="" id="" style="margin-left:-8px" class="btn btn-warning me-2 provider_submit" href="#" role="button">Editar</a>
                    <a style="width: 80px;margin-left:-10px;" name="" id="" style="margin-left:-8px" class="btn btn-danger provider_submits" href="#" role="button">Eliminar</a>
                </div> -->




            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:4px">


                        <div class="col-md-12" style="margin-top: -5px;">
                            <a style="width: 90px;" id="" class="btn btn-primary me-2 provider_submit" href="#" role="button">Nuevo</a>
                            <button style="width: 90px;margin-left:-10px;" type="button" class="btn btn-success me-2 provider_submit">Grabar</button>
                            <a style="width: 90px;margin-left:-10px;" name="" id="" class="btn btn-warning me-2 provider_submit" href="#" role="button">Editar</a>
                            <a style="width: 90px;margin-left:-10px;" name="" id="" class="btn btn-danger provider_submits" href="#" role="button">Eliminar</a>
                            <a style="width: 90px;margin-left:-3px;" name="" id="" class="btn btn-info provider_submits" href="#" role="button">Imprimir</a>
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
                            <tr>

                                <td class="textleft">Gran feria de AlvaPlastic de 50x50cm</td>
                                <td class="textcenter">2</td>
                                <td class="textcenter">F</td>
                                <td class="textcenter">12599.00</td>
                                <td class="textcenter">12615.00</td>
                                <td class="textright">50198.00</td>

                            </tr>

                        </tbody>


                        <tfoot class="footer">

                            <tr>
                                <td colspan="5" class="textright"></td>
                                <td class="textright">--</td>
                            </tr>


                            <tr>
                                <td colspan="5" class="textright">Precio Bruto</td>
                                <td class="textright" id="productsubtotal1">15000</td>
                            </tr>

                            <tr>
                                <td colspan="5" class="textright">Descuento</td>
                                <td class="textright" id="productDescuento">70</td>
                            </tr>

                            <tr>
                                <td colspan="5" class="textright">Precio Neto</td>
                                <td class="textright" id="productsubtotal2">1170</td>
                            </tr>

                            <tr>
                                <td colspan="5" class="textright">IGV S/.</td>
                                <td class="textright" id="productigv">40</td>
                            </tr>

                            <tr>
                                <td colspan="5" class="textright">Total S/.</td>
                                <td class="textright" id="productTotal">5200.00</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>