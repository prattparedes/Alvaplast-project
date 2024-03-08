<head>

</head>

<body>

    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/autoload.php');

        use Models\maintenance_models\Sucursal;
        use Models\maintenance_models\Almacen;
        use Models\maintenance_models\Moneda;
        use Models\maintenance_models\Unidad;
        use Models\maintenance_models\Personal;
        use Models\ventas\Venta; ?>

        <div class="kardex__movement">
            <div class="kardex__left">
                <div class="row numero_documento--title">
                    <h5 style="background: Black; color: white; text-align:center;" class="titulo" id="titulo">ORDEN DE VENTA</h5>
                    <div class="row" style="margin-top: 7px; display:flex; justify-content:center;">
                        <div class="numero_documento" style="width: 160px;">
                            <fieldset disabled>
                                <input type="number" id="numeroDocumento" class="form-control" aria-describedby="passwordHelpInline" value="001">
                                <input type="hidden" id="idVenta" value="">
                            </fieldset>
                        </div>
                        -
                        <div class="numero_documento" style="width: 160px;">
                            <fieldset disabled>
                                <input type="text" class="form-control" id="serieDocumento" aria-describedby="passwordHelpInline" value=<?= Venta::getSerieVenta(); ?>>
                                <input type="hidden" id="metodo" value="">
                            </fieldset>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-12" style="margin-top: -5px; display:flex; justify-content:center;">
                    <a style="width: 95px; " name="" id="btnNuevo" class="btn btn-primary" role="button" onclick="nuevaOrdenVenta()">Nuevo</a>
                    <a style="width: 95px; margin: 0 3px;" name="" id="btnRegister" class="btn btn-success order__btn--inactive sell_submit" role="button">Grabar</a>
                    <a style="width: 95px; margin: 0 3px;" name="" id="btnModify" class="btn btn-warning order__btn--inactive" onclick="modificarVenta()">Editar</a>
                    <a style="width: 95px; margin: 0 3px;" name="" id="btnDelete" class="btn btn-danger order__btn--inactive sell_submit" role="button">Eliminar</a>
                   
                </div>
                <div class="">
                <button style="width: 95px;margin-top:2px " class="btn btn-secondary" id="btnSearch" onclick="abrirListadoVentas()">Buscar</button>
                </div>
                <hr>
                <div class="row">
                    <b>
                        <!-- <h6>Datos del Cliente</h6> -->
                        <h5 style="background: teal; color: white; text-align:left;" class="titulo">DATOS DEL CLIENTE</h5>
                    </b>

                    <div class="col-md-12">
                        <label for="inputPassword6" class="form-label">Cliente</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Ingrese nombre de cliente" aria-describedby="" id="cliente" disabled>
                            <input type="hidden" id="idcliente" value="0">
                            <button style="height: 35px;" id="des" class="btn btn-outline-secondary" onclick="abrirListadoClientes()" type="button">....</button>
                        </div>
                    </div>


                    <div class="col-md-12" style="margin-top: -10px;">
                        <label for="inputPassword6" class="col-form-label">Dirección</label>
                        <input type="text" id="direccion" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label">RUC / DNI</label>
                        <input type="text" id="rucDni" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>
                </div>

                <div class="row">
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
                        <label for="inputPassword6" class="col-form-label">Tipo de Pago</label>
                        <select id="tipoPago" class="form-select" disabled>
                            <option value="">Elija una opción</option>
                            <option value="E" selected>EFECTIVO</option>
                            <option value="C">CREDITO</option>
                        </select>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Inicial</label>
                        <input type="number" id="inicial" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Monto Financiado</label>
                        <input type="number" id="montofin" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Cuotas</label>
                        <input type="number" id="cuotas" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Monto cuotas</label>
                        <input type="number" id="montocuo" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>
                </div>
                <hr>
                <b>
                    <!-- <h6 style="margin-top: 5px;">Datos de Vendedor</h6> -->
                    <h5 style="background: teal; color: white; text-align:left;" class="titulo">DATOS DEL VENDEDOR</h5>
                </b>

                <!-- <label for="inputPassword6" class="col-md-12 col-form-label">Producto</label> -->
                <div class="row">
                    <div class="col-md-12">
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
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="inputPassword6" class="col-form-label">Sucursal</label>
                        <select id="sucursal" class="form-select" onchange="listarAlmacenes(this.value)" disabled>
                            <option value="">Seleccionar </option>
                            <?php
                            $data = Sucursal::getSucursales();
                            foreach ($data as $dat) {
                            ?>
                                <option value="<?= $dat->id_sucursal ?>"><?= $dat->descripcion ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>

                    <div class="col-md-6">
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
                </div>


                <div class="row">

                    <div class="" style="width: 200px;">
                        <label for="inputPassword6" class="col-form-label">Fecha</label>
                        <input type="datetime-local" id="fecha" class="form-control" disabled>
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label">Tipo de documento</label>
                        <select name="" id="tipoDocumento" class="form-select" disabled>
                            <option value="001">NOTA DE COBRANZA - A</option>
                            <option value="002">NOTA DE COBRANZA - B</option>
                            <option value="003">NOTA DE COBRANZA - C</option>
                            <option value="012">NOTA DE COBRANZA - D</option>
                            <option value="013">NOTA DE COBRANZA - E</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label">Notas</label>

                        <textarea style="height: 5px;" class="form-control" placeholder="Leave a comment here" id="notas" disabled></textarea>
                    </div>
                </div>

            </div>
            <br>


            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:4px">
                    <?php
                date_default_timezone_set('America/Lima'); // Establecer la zona horaria de Perú
                ?>
                <b>
                    <p style="font-size: 32px;color:brown;margin-top:-5px">AlvaPlastic</p>
                </b>
                <h5>Fecha: <?= date('d/m/Y g:ia'); ?></h5>
                        <br>
                        <hr style="margin-top: -15px;">
                        <b>
                            <!-- <h6 style="margin-top: 5px;">Detalles de Producto</h6> -->
                            <h5 style="background: teal; color: white; text-align:left;" class="titulo">DETALLES DE PRODUCTOS</h5>
                        </b>


                        <div class="" style="width: 398px; margin-top:5px">
                            <label for="inputPassword6" class="form-label">Producto</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="productname" placeholder="Seleccione Producto" aria-label="Recipient's username" aria-describedby="" disabled>
                                <input type="hidden" type="text" id="productid">
                                <button style="height: 35px;" class="btn btn-outline-secondary" href="" onclick="abrirListadoProductosVenta()" type="button">....</button>
                            </div>
                        </div>
                        <div><br></div>

                        <div class="row product__details" style="margin-top: -15px; flex-wrap:nowrap;">
                            <div class="" style="width: 170px;">
                                <label for="disabledSelect" class="form-label">Unidad</label>
                                <select id="productunit" class="form-select" disabled>
                                    <?php
                                    $unidades = Unidad::getUnidades();
                                    foreach ($unidades as $unidad) { ?>
                                        <option value="<?= $unidad->id_unidad ?>"><?= $unidad->abreviatura ?></option>
                                    <?php } ?>
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

                            <!-- <div class="col-md-2" style="width: 110px;margin-top:-5px; opacity:0;">
                                <label for="inputPassword6" class="col-form-label">Descuento</label>
                                <input type="text" id="productdiscount" class="form-control" aria-describedby="passwordHelpInline" disabled>
                            </div> -->

                            <div class="" style="width: 95px;margin-top:-5px">
                                <label for="inputPassword6" class="col-form-label">Stock</label>
                                <input type="number" id="productstock" class="form-control" aria-describedby="passwordHelpInline" disabled>
                            </div>


                        </div>
                        <div style="margin-top: 20px;">
                            <a name="" id="" class="btn btn-primary" href="#" role="button" onclick="añadirProductoOrdenVenta()">Agregar</a>
                            <a name="" id="" class="btn btn-warning" href="#" role="button" onclick="eliminarFilas()">Cancelar</a>
                        </div>







                        <hr>
                        <div class="table--container">
                            <table style="width:100%;" class="tbl_venta" id="ordertable">
                                <thead>
                                    <tr>
                                        <th width="200">Producto</th>
                                        <th width="70">Cantidad</th>
                                        <th class="textcenter" width="120">Unidad</th>
                                        <th class="textcenter" width="120">PreVenta</th>
                                        <th class="textcenter" width="120">CostoVenta</th>
                                        <th class="textcenter" width="120">Total</th>
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
                                        <td class="textright" id="productsubtotal1">0.00</td>
                                    </tr>

                                    <tr>
                                        <td colspan="5" class="textright">Descuento</td>
                                        <td class="textright" id="productDescuento">0.00</td>
                                    </tr>

                                    <tr>
                                        <td colspan="5" class="textright">Precio Neto</td>
                                        <td class="textright" id="productsubtotal2">0.00</td>
                                    </tr>

                                    <tr>
                                        <td colspan="5" class="textright">IGV S/.</td>
                                        <td class="textright" id="productigv">0.00</td>
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
            </div>
        </div>
        <!-- <script>
      $(function(){
        $("#btn").attr("disabled","true");

        $("#des").keyup(function(){
          if($("#des").val()!="")
          $("#btn").removeAttr("disabled");
        });
      });
    </script>
<script src="https://code.jquery.com/jquery-3.7.1.js" 
integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->




</body>
</form>