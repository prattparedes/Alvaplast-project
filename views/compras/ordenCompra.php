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


        ?>

        <div class="kardex__movement">
            <div class="kardex__left">
                <h5 style="background: Black; color: white; text-align:center;" class="titulo" id="titulo">ORDEN DE
                    COMPRA</h5>

                <div class="row" style="margin-top: 7px; display:flex; justify-content:center;">
                    <div class="" style="width: 160px;">
                        <!-- <label for="number" class="col-form-label">Codigo</label> -->
                        <fieldset disabled>
                            <input type="text" style="width:100%" id="numeroDocumento" class="form-control" aria-describedby="passwordHelpInline" value="001">
                        </fieldset>
                    </div>

                    <div class="" style="width: 160px;">
                        <!-- <label for="number" class="col-form-label">Codigo</label> -->
                        <fieldset disabled>
                            <input type="text" style="width:100%" id="idCompra" class="form-control" aria-describedby="passwordHelpInline" value=<?= Compra::getIdCompra(); ?>>
                        </fieldset>
                    </div>
                </div>
                <hr>
                <!--Buttoms  -->
                <!-- <span style="margin-top: -5px;" class="d-block p-1 col-md-12 bg-danger text-white">Datos del Proveedor</span> -->

                <div class="col-md-12" style="margin-top: -5px; display:flex; justify-content:center;">
                    <button style="width: 110px; " name="" id="btnNuevo" class="btn btn-primary " role="button" onclick="nuevaOrdenCompra()">Nuevo</button>
                    <a style="width: 95px; margin: 0 3px;" name="" id="btnRegister" class="btn btn-success order__btn--inactive buy_submit" role="button">Grabar</a>
                    <a style="width: 85px; margin: 0 3px;" name="" id="btnModify" class="btn btn-warning order__btn--inactive" onclick="modificarCompra()">Editar</a>
                    <a style="width: 85px; margin: 0 3px;" name="" id="btnDelete" class="btn btn-danger order__btn--inactive buy_submit" role="button">Eliminar</a>
                   
                 
                </div>
                <div class="">
                <button style="width: 95px;" class="btn btn-secondary" id="btnSearch" onclick="abrirListadoCompras()">Buscar</button>
                <button style="width: 120px;margin-top:2px" class="btn btn-success" id="btnSearch" onclick="exportarTablaExcelorden()">ExportarExcel</button>
                </div>
                <hr>
                <div class="row">
                    <b>
                        <!-- <h6>DATOS DEL PROVEEDOR</h6> -->
                        <h5 style="background: teal; color: white; text-align:left;" class="titulo">DATOS DEL PROVEEDOR
                        </h5>
                    </b>
                    <label for="inputPassword6" class="col-form-label">Proveedor</label>
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="proveedor" placeholder="Seleccione proveedor" aria-label="Recipient's username" aria-describedby="" disabled>
                            <input type="hidden" id="idproveedor" value="0">
                            <input type="hidden" id="metodo" value="0">
                            <button style="height: 35px;" class="btn btn-outline-secondary" href="" onclick="abrirListadoProveedor()" type="button">....</button>
                        </div>
                    </div>
                </div>


                <!--Sucursal  -->
                <div class="row">
                    <div class="col-md-6">
                        <label for="sucursal" class="form-label">Sucursal</label>
                        <select id="sucursal" class="form-select" onchange="listarAlmacenes(this.value)" disabled>
                            <?php
                            $data = Sucursal::getSucursales();
                            foreach ($data as $dat) {
                            ?>
                                <option value="<?= $dat->id_sucursal ?>" selected>
                                    <?= $dat->descripcion ?>
                                </option>
                            <?php
                            } ?>
                        </select>
                    </div>

                    <div class="col-md-6" style="margin-top: 5px;">
                        <label for="disabledSelect" class="form-label">Almacen</label>
                        <select id="almacen" class="form-select" disabled>
                            <?php
                            $almacenes = Almacen::getAlmacenes();
                            foreach ($almacenes as $almacen) { ?>
                                <option value="<?= $almacen->id_almacen ?>" <?= $almacen->id_almacen == 1 ? "selected" : "" ?>>
                                    <?= $almacen->descripcion ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label">Dirección</label>
                        <input type="text" id="direccion" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="moneda" class="form-label">Moneda</label>
                        <select id="moneda" class="form-select" disabled onchange="cambiarMoneda(this.value)">
                            <?php
                            $monedas = Moneda::getMonedas();
                            foreach ($monedas as $moneda) { ?>
                                <option value="<?= $moneda->id_moneda ?>">
                                    <?= $moneda->descripcion ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="fecha" class="col-form-label">Fecha</label>
                        <input type="datetime-local" id="fecha" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>


                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label">Descripción</label>
                        <textarea style="height: 5px;" class="form-control" placeholder="" id="descripcion" disabled></textarea disabled>
                        </div>
                </div>

                <div class="row">
                    <div class="col-md-6" style="margin-top: 5px;">
                        <label for="disabledSelect" class="form-label">Tipo de Pago</label>
                        <select id="tipoPago" class="form-select" disabled>
                            <option value="E" selected>EFECTIVO</option>
                            <option value="C">CREDITO</option>
                        </select>
                    </div>

                    <div class="col-md-4" style="display:none;">
                        <label for="inputPassword6" class="col-form-label">Incluye IGV</label>

                        <div class="form-check" >
                            <input class="form-check-input" type="checkbox" value="" id="igv" disabled checked>
                            <label class="form-check-label" for="flexCheckDefault">Habilitado</label>
                            <br><br>
                        </div>
                    </div>
<!--  -->
                    <br><br>
                </div>
                <hr>
                <div class="" id="">
                  
                </div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">
                    <?php
                date_default_timezone_set('America/Lima'); // Establecer la zona horaria de Perú
                ?>
                <b>
                    <p style="font-size: 32px;color:brown;margin-top:-5px">AlvaPlastic</p>
                </b>
                <h5>Fecha: <?= date('d/m/Y g:ia'); ?></h5>

                    <hr style="margin-top: 10px;">
                    <h5 style="background: Teal; color: white; text-align:left;" class="titulo">DETALLE DE PRODUCTOS</h5>
                   
                    <label for="inputPassword6" class="col-md-12 col-form-label">Producto</label>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" id="productname" placeholder="Seleccione Producto" aria-label="Recipient's username" aria-describedby="" disabled>
                            <input type="hidden" type="text" id="productid">
                            <!-- <button style="height: 35px;" class="btn btn-outline-secondary order__btn--inactive" href="" onclick="abrirListadoProductosCompra()" type="button">....</button> -->
                            <button style="height: 35px;" class="btn btn-outline-secondary" href="" onclick="abrirListadoProductosCompra()" type="button">....</button>
                            
                        </div>
                    </div>

                    <div class="row">                                    
                    <div class="col-md-2">
                            <label for="disabledSelect" class="form-label">Unidad</label>
                            <select id="productunit" class="form-select" disabled>
                            <?php
                            $unidades = Unidad::getUnidades();
                            foreach ($unidades as $unidad) { ?>
                                    <option value="<?= $unidad->id_unidad ?>"><?= $unidad->abreviatura ?></option>
                            <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-2" style="margin-top: -5px;">
                            <label for="inputPassword6" class="col-form-label">Cantidad</label>
                            <input type="text" id="productquantity" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                        <div class="col-md-2"style="margin-top: -5px;">
                            <label for="inputPassword6" class="col-form-label">P_Unitario</label>
                            <input type="text" id="productprice" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                        <div class="col-md-2" style="margin-top: -5px; opacity: 0;" id="descuento--div">
                            <label for="inputPassword6" class="col-form-label">Descuento</label>
                            <input type="text" id="productdiscount" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                    </div> 
                    <div class="col-md-4" style="margin-top: 10px;">
                    <a name="" id="addproduct" class="btn btn-primary" href="#" role="button" onclick="añadirProductoOrdenCompra()">Agregar</a>
                    <a name="" id="" class="btn btn-warning" href="#" role="button" onclick="eliminarFilas()">Eliminar</a>

                    </div>


             
                    </div>

                 
                </div>
                <hr>
                <div class="table--container">
                    <table style="width:90%;" class="tbl_venta" id="ordertable">
                    <thead>
                                        <tr>
                                            <th width="200">Producto</th>
                                            <th width="70">Cantidad</th>
                                            <th class="textcenter" width="120">Unidad</th>
                                            <th class="textcenter" width="120">PreCompra</th>
                                            <th class="textcenter" width="120">Descuento</th>
                                            <th class="textcenter" width="120">Total</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody id="detalle_venta">
                                                                                                          
                                    </tbody>
                                        <tfoot>

                                        <tr>
                                                    <td colspan="5"  class="textright"></td>
                                                    <td class="textright">--</td>
                                                </tr>


                                            <tr>
                                                <td colspan="5" class="textright">Precio Bruto</td>
                                                <td class="textright" id="productsubtotal1">0.00</td>
                                            </tr>
    
                                            <tr>
                                                <td colspan="5" class="textright">Descuento S/.</td>
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
                                                <td class="textright" id="productTotal">0.00</td>
                                            </tr>
                                        </tfoot>
                    </table>
                </div>
            </div>
        </div>