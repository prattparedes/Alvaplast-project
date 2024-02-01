<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Orden de Venta</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> -->

<link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->
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
        <div class="container">
            <h3>ORDEN DE VENTA</h3>

            <form>
                <span class="d-block p-1 col-md-10 bg-info text-white">Detalles de Orden de venta</span>

                <div class="row">
                    <div class="col-md-1">
                        <label class="col-form-label"></label>
                        <fieldset disabled>
                            <input type="text" class="form-control" aria-describedby="passwordHelpInline" placeholder="001">
                        </fieldset>
                    </div>

                    <div class="col-md-2">
                        <label class="col-form-label"></label>
                        <fieldset disabled>
                            <input type="text" class="form-control" id="idVenta" aria-describedby="passwordHelpInline" value=<?=Venta::getIdVenta();?>>
                        </fieldset>
                    </div>

                    <div class="col-md-1"></div>

                    <div class="col-md-6">
                        <br>



                        <a style="width: 100px;" name="" id="" class="btn btn-primary" href="#" role="button" onclick="nuevaOrdenVenta()">Nuevo</a>
                        <a style="width: 100px;" name="" id="btnRegister" class="btn btn-success order__btn--inactive" href="#" role="button">Grabar</a>
                        <a style="width: 100px;" name="" id="btnModify" class="btn btn-warning order__btn--inactive" href="#" role="button" onclick="modificarVenta()">Modificar</a>
                        <a style="width: 100px;" name="" id="btnDelete" class="btn btn-danger order__btn--inactive" href="#" role="button">Eliminar</a>




                        <button style="width: 100px;" class="btn btn-secondary" onclick="abrirListadoVentas()">Buscar</button>

                        <!-- <button style="width: 90px;" class="btn btn-danger" onclick="loadContent('views/home.php')">Salir</button> -->
                    </div>
                </div>

                <br>
                <span class="d-block p-1 col-md-5 bg-info text-white">Detalles de Cliente</span>
                <div class="row">
                    <label style="margin-top: 5px;" class="form-label">Cliente</label>
                    <div class="col-md-5">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Ingrese nombre de cliente" aria-label="Recipient's username" aria-describedby="" id="cliente" disabled>
                            <input type="hidden" id="idcliente" value="0">
                            <button class="btn btn-outline-secondary" onclick="abrirListadoClientes()" type="button" >....</button>
                        </div>

                        <label for="inputPassword6" class="col-form-label">Dirección</label>
                        <input type="text" id="direccion" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <span class="d-block p-1 col-md-12 bg-info text-white">Detalles de Producto</span>
                        <label class="col-md-12 col-form-label">Vendedor</label>
                        <select id="vendedor" class="form-select" disabled>
                            <option>Susan Paredes Villanueva</option>
                            <option>Extranjera</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <label class="form-label">RUC - DNI</label>
                        <input type="text" id="rucDni" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-1">
                        <div></div>
                    </div>

                    <div class="col-md-2">
                        <label for="sucursal" class="form-label">Sucursal</label>
                        <select id="sucursal" class="form-select" disabled>
                            <option value="">Seleccionar </option>
                            <?php
                            $data = Sucursal::getSucursales(); ?>
                            <option value="<?= $data->id_sucursal ?>"><?= $data->descripcion ?></option>
                        </select>

                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="disabledSelect" class="form-label">Almacen</label>
                        <select id="almacen" class="form-select" disabled>
                            <option value="">Seleccione almacen</option>
                            <?php
                            $almacenes = Almacen::getAlmacenes();
                            foreach ($almacenes as $almacen) { ?>
                                <option value="<?= $almacen->id_almacen ?>"><?= $almacen->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <label for="moneda" class="form-label">Moneda</label>
                        <select id="moneda" class="form-select" disabled>
                            <option value="">Seleccione moneda</option>
                            <?php
                            $monedas = Moneda::getMonedas();
                            foreach ($monedas as $moneda) { ?>
                                <option value="<?= $moneda->id_moneda ?>"><?= $moneda->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="disabledSelect" class="form-label">Tipo de Pago</label>
                        <select id="tipoPago" class="form-select" disabled>
                            <option value="">Elija una opción</option>
                            <option value="E">EFECTIVO</option>
                            <option value="C">CREDITO</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <div></div>
                    </div>

                    <div class="col-md-2">
                        <label for="fecha" class="col-form-label">Fecha</label>
                        <input type="datetime-local" id="fecha" class="form-control" disabled>
                    </div>

                    <div class="col-md-2">
                        <label class="col-form-label">Tipo de Documento</label>
                        <select name="" id="tipoDocumento" class="form-select" disabled>
                            <option value="A">NOTA DE COBRANZA - A</option>
                            <option value="B">NOTA DE COBRANZA - B</option>
                            <option value="C">NOTA DE COBRANZA - C</option>
                            <option value="D">NOTA DE COBRANZA - D</option>
                            <option value="E">NOTA DE COBRANZA - E</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label class="col-form-label">Inicial</label>
                        <input type="number" id="inicial" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-2">
                        <label class="col-form-label">Monto Financiado</label>
                        <input type="number" id="montofin" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-2">
                        <!-- Deja este espacio vacío o agrega contenido según sea necesario -->
                    </div>

                    <div class="col-md-4">
                        <label class="col-form-label">Notas</label>
                        <textarea style="height: 5px;" class="form-control" placeholder="Leave a comment here" id="notas" disabled></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label class="col-form-label">Cuotas</label>
                        <input type="number" id="cuotas" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-2">
                        <label class="col-form-label">Monto Cuotas</label>
                        <input type="number" id="montocuo" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-2">
                        <!-- Deja este espacio vacío o agrega contenido según sea necesario -->
                    </div>


                </div>

                <div class="col-md-1">
                    <!-- Deja este espacio vacío o agrega contenido según sea necesario -->
                </div>
                <br>
                <div class="row">
                    <span class="d-block p-1 col-md-10 bg-info text-white">Detalles de Producto</span>
                    <label class="col-md-12 col-form-label">Producto</label>

                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="productname" placeholder="Seleccione Producto" aria-label="Recipient's username" aria-describedby="" disabled>
                            <input type="hidden" type="text" id="productid">
                            <button class="btn btn-outline-secondary" href="" onclick="abrirListadoProductosVenta()" type="button">....</button>
                        </div>
                    </div>

                    <div class="col-md-1">
                        <!-- Deja este espacio vacío o agrega contenido según sea necesario -->
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

                        <div class="col-md-1">
                            <label class="col-form-label">Cantidad</label>
                            <input type="text" id="productquantity" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                        <div class="col-md-1">
                            <label class="col-form-label">P_Unitario</label>
                            <input type="text" id="productprice" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                        <div class="col-md-1">
                            <label class="col-form-label">Descuento</label>
                            <input type="text" id="productdiscount" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                        <div class="col-md-1">
                            <label class="col-form-label">Stock</label>
                            <input type="number" id="productstock" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3"></div>
                            <div class="mb-3"><br>
                                <a name="" id="" class="btn btn-primary" href="#" role="button" onclick="añadirProductoOrdenVenta()">Agregar</a>
                                <a name="" id="" class="btn btn-warning" href="#" role="button">Cancelar</a>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <br>

                        <div class="row">
                            <div class="col-auto">
                                <div class="table-responsive">
                                    <table class="tbl_venta" id="ordertable">
                                        <thead>
                                            <tr>
                                                <!-- <th>Codigo</th> -->
                                                <th width="200">Producto</th>
                                                <th class="textcenter" width="120">Cantidad</th>
                                                <th class="textcenter" width="120">Unidad</th>
                                                <th class="textcenter" width="120">PreVenta</th>
                                                <th class="textcenter" width="120">PreReal</th>
                                                <th class="textcenter" width="120">Total</th>



                                            </tr>
                                        </thead>

                                        <!-- <tr> -->

                                        <tbody id="detalle_venta">

                                        </tbody>
                                        <tfoot>
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
                    </div>
                </div>
        </div>
        </form>
        </div>
    </header>
    <main></main>
    <footer>
        <!-- Coloca el contenido del pie de página aquí -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
</body>

</html>