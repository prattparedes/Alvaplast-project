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
            <div class="kardex__left"style="width: 31%;">
                <!-- <h5 style="background: black; color: white; text-align:center;">FACTURACIÓN</h5> -->

                <div class="row">
                    <h5 style="background: grey; color: white; text-align:center;">FACTURACIÓN</h5>

                    <div class="" style="width: 200px;">
                        <!-- <label for="number" class="col-form-label"></label> -->
                        <select name="" id="cargo" class="form-select" disabled>
                            <option value="" default>Elija una opción</option>
                            <option value="" default>NOAT DE COBRANZA -B</option>
                        </select>
                        </fieldset>
                    </div>

                    <div class="" style="width: 95px; margin-left:-20px">
                        <!-- <label for="number" class="col-form-label">Numero</label> -->
                        <fieldset disabled>
                            <input type="number" id="codigo" placeholder="000" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </fieldset>
                    </div>

                    <div class="" style="width: 125px;margin-left:-20px">
                        <!-- <label for="number" class="col-form-label">Serie</label> -->
                        <fieldset disabled>
                            <input type="number" id="codigo" placeholder="0000000" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </fieldset>
                    </div>
                    <hr style="margin-top: 10px;">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="inputPassword6" class="col-form-label">Orden de Venta</label>
                            <div class="input-group">

                                <input type="text" id="" class="form-control" aria-describedby="button-addon2" disabled>
                                <button style="width:50px; height:35px" class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="loadContent('views/modals/listaordenventa.php')" disabled>....</button>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="inputPassword6" class="col-form-label">Almacen</label>
                            <select name="" id="cargo" class="form-select" disabled>
                                <option value="" default>Elija una opción</option>

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputPassword6" class="col-form-label">RUC</label>
                            <input type="text" id="materno" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                        <div class="col-md-6" style="margin-left:-4px">
                            <label for="inputPassword6" class="col-form-label">DNI</label>
                            <input type="text" id="materno" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="inputPassword6" class="col-form-label">Cliente</label>
                            <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                        <div class="col-md-12">
                            <label for="inputPassword6" class="col-form-label">Dirección</label>
                            <input type="text" id="" class="form-control" aria-describedby="passwordHelpInline" disabled>
                            <br>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6" style="margin-top:-15px">
                            <label for="inputPassword6" class="col-form-label">Fecha de Emisión</label>
                            <input type="date" id="" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                        <div class="col-md-2" style="margin-top: -5px;">
                            <label for="inputPassword6" class="col-form-label">Incluye</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
                                <label class="form-check-label" for="flexCheckDefault">IGV</label>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="row">
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
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label for="inputPassword6" class="col-form-label">Inicial</label>
                            <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                        <div class="col-md-6">
                            <label for="inputPassword6" class="col-form-label">Cuotas</label>
                            <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputPassword6" class="col-form-label">Financiado</label>
                            <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                        <div class="col-md-6">
                            <label for="inputPassword6" class="col-form-label">Monto en Cuotas</label>
                            <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline" disabled>
                            <br>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <br>
                        <b><span class="d-block p-1 col-12 bg-danger text-white">Datos de Vendedor</span></b>
                        <div class="col-md-12">
                            <label for="inputPassword6" class="col-form-label">Vendedor</label>
                            <select name="" id="cargo" class="form-select" disabled>
                                <option value="" default>Elija una opción</option>
                            </select>
                            <br>
                        </div>
                    </div>

                    <div class="row" style="margin-top: -10px;">

                        <div class="col-md-6">
                            <label for="inputPassword6" class="col-form-label">Marca/Unidad</label>
                            <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                        <div class="col-md-6">
                            <label for="inputPassword6" class="col-form-label">Placa</label>
                            <select name="" id="cargo" class="form-select" disabled>
                                <option value="" default>Elija una opción</option>
                                <option value="A">Administrador</option>
                                <option value="V">Vendedor</option>
                            </select>
                        </div>
                    </div>
                    <div><br></div>

                    <div class="row">
                        <hr>
                        <div class="row mb-2" style="margin-top: -10px;">
                            <div class="col-md-2">

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
                    </div>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
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

                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Nombre</label>
                        <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Placa</label>
                        <input type="text" id="celular" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>
                </div>ssssssssssssssssssssssssss

               
                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label">Nro Factura/Guia</label>
                        <input type="text" id="usuario" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>
              

                <hr>


              
                <div class="col-md-12">
                    <a style="width: 80px;" id="" class="btn btn-primary me-2 provider_submit" href="#" role="button">Nuevo</a>
                    <button style="width: 80px;margin-left:-10px;" type="button" style="margin-left:-8px" class="btn btn-success me-2 provider_submit">Grabar</button>
                    <a style="width: 80px;margin-left:-10px;" name="" id="" style="margin-left:-8px" class="btn btn-warning me-2 provider_submit" href="#" role="button">Editar</a>
                    <a style="width: 80px;margin-left:-10px;" name="" id="" style="margin-left:-8px" class="btn btn-danger provider_submits" href="#" role="button">Eliminar</a>
                </div>
            </div> -->
                </div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:4px">


                        <div class="row">
                            <br>
                            
                            <b style="margin-top: -15px;">DATOS DEL VENDEDOR<hr></b>
                            <div class="col-md-6">
                                <label for="inputPassword6" class="col-form-label">Vendedor</label>
                                <select name="" id="cargo" class="form-select" disabled>
                                    <option value="" default>Elija una opción</option>
                                </select>
                                <br>
                            </div>
                        </div>


                        <div class="row" style="margin-top: -10px;">

                            <div class="col-md-3">
                                <label for="inputPassword6" class="col-form-label">Marca/Unidad</label>
                                <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="inputPassword6" class="col-form-label">Placa</label>
                                <select name="" id="cargo" class="form-select" disabled>
                                    <option value="" default>Elija una opción</option>
                                    <option value="A">Administrador</option>
                                    <option value="V">Vendedor</option>
                                </select>
                            </div>
                        </div>



                        <div><br></div>

                        <div class="row">
                            <hr>
                            <div class="row mb-3" style="margin-top: -10px;">
                                <div class="col-md-3">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
                                        <label class="form-check-label" for="flexCheckDefault">Transportista</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label for="inputPassword6" class="form-label">Nombre</label>
                                    <select id="disabledSelect" class="form-select" disabled>
                                        <option>Leonel Messi Pascual Lucas</option>
                                        <option>Extranjera</option>
                                    </select>
                                </div>
                                <div class="col-md-3" style="margin-top: -5px;">
                                    <label for="inputPassword6" class="col-form-label">RUC</label>
                                    <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline" disabled>
                                </div>
                            </div>


                            <div class="col-md-6">
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

                            <div class="col-md-3">
                                <label for="inputPassword6" class="col-form-label">Nombre</label>
                                <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline" disabled>
                            </div>

                            <div class="col-md-3">
                                <label for="inputPassword6" class="col-form-label">Placa</label>
                                <input type="text" id="celular" class="form-control" aria-describedby="passwordHelpInline" disabled>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <label for="inputPassword6" class="col-form-label">Nro Factura/Guia</label>
                            <input type="text" id="usuario" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>
                        <hr>
                        <b>
                            <h6>Detalles de Producto</h6>
                        </b>


                        <div class="" style="width: 398px; margin-top:5px">
                            <label for="inputPassword6" class="form-label">Producto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" aria-describedby="button-addon2" disabled>
                                <button style="width:50px; height:35px" class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="loadContent('views/modals/listaordenventa.php')" disabled>....</button>
                            </div>
                        </div>
                        <div><br></div>

                        <div class="row">
                            <div class="" style="width: 170px;">
                                <label for="disabledSelect" class="form-label">Unidad</label>
                                <select id="productunit" class="form-select" disabled>
                                </select>
                            </div>

                            <div class="" style="width: 90px;margin-top:-5px">
                                <label for="inputPassword6" class="col-form-label">Cantidad</label>
                                <input type="text" id="productquantity" class="form-control" aria-describedby="passwordHelpInline" disabled>
                            </div>

                            <div class="col-md-2" style="width: 110px;margin-top:-5px">
                                <label for="inputPassword6" class="col-form-label">P_Unitario</label>
                                <input type="text" id="productprice" class="form-control" aria-describedby="passwordHelpInline" disabled>
                            </div>

                            <div class="col-md-2" style="width: 110px;margin-top:-5px">
                                <label for="inputPassword6" class="col-form-label">Descuento</label>
                                <input type="text" id="productdiscount" class="form-control" aria-describedby="passwordHelpInline" disabled>
                            </div>

                            <div class="" style="width: 90px;margin-top:-5px">
                                <label for="inputPassword6" class="col-form-label">Stock</label>
                                <input type="text" id="clave2" class="form-control" aria-describedby="passwordHelpInline" disabled>
                            </div>

                        </div>
                        <div class="col-md-4" style="margin-top: 10px;">
                            <a name="" id="addproduct" class="btn btn-primary" href="#" role="button" onclick="añadirProductoOrden()">Agregar</a>
                            <a name="" id="" class="btn btn-warning" href="#" role="button">Cancelar</a>

                        </div>
                    </div>
                </div>
                <hr>
                <div class="table--container">
                    <table style="width:90%;" class="tbl_venta" id="ordertable">
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