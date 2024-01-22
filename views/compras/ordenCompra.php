<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Title</title>
   
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
        use Models\compras\Compra;
        ?>
        <!-- place navbar here -->
        <div class="container">
            <h2>ORDEN DE COMPRA</h2>

            <form>
                <b><span class="d-block p-1 col-md-9 bg-info text-white">Orden de Compra</span></b>
                <div class="row">
                    <div class="col-md-1">
                        <label for="serieDoc" class="col-form-label"></label>
                        <fieldset disabled>
                            <input type="text" id="numeroDocumento" class="form-control" aria-describedby="passwordHelpInline" value="001">
                        </fieldset>
                    </div>

                    <div class="col-md-1">
                        <label for="idCompra" class="col-form-label"></label>
                        <fieldset disabled>
                            <input type="text" style="width:112px;" id="idCompra" class="form-control" aria-describedby="passwordHelpInline" value=<?= Compra::getIdCompra(); ?>>
                        </fieldset>
                    </div>

                    <div class="col-md-1"></div>

                    <div class="col-md-6">
                        <br>
                        <a style="width: 100px;" name="" id="" class="btn btn-primary" href="#" role="button" onclick="nuevaOrdenCompra()">Nuevo</a>
                        <a style="width: 100px;" name="" id="" class="btn btn-success buy_submit" href="#" role="button">Grabar</a>
                        <a style="width: 100px;" name="" id="" class="btn btn-warning " href="#" role="button">Modificar</a>
                        <a style="width: 100px;" name="" id="" class="btn btn-danger buy_submit" href="#" role="button">Eliminar</a>

                        <button style="width: 100px;" class="btn btn-secondary" href="" onclick="loadContent('views/modals/listaordencompra.php')">Buscar</button>
                        <!-- <button style="width: 100px;" class="btn btn-danger" href="" onclick="loadContent('views/home.php')">Salir</button> -->
                    </div>
                </div>
                <br>
                <b><span class="d-block p-1 col-md-9 bg-info text-white">Datos del Proveedor</span></b>

                <div class="row">
                    <label for="inputPassword6" class="col-form-label">Proveedor</label>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="proveedor" placeholder="Seleccione proveedor" aria-label="Recipient's username" aria-describedby="" disabled>
                            <input type="hidden" id="idproveedor" value="0">
                            <button class="btn btn-outline-secondary" href="" onclick="abrirListadoProveedor()" type="button">....</button>
                        </div>
                    </div>

                    <div class="col-md-1"></div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label for="sucursal" class="form-label">Sucursal</label>
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

                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="disabledSelect" class="form-label">Almacen</label>
                        <select id="almacen" class="form-select" disabled>
                            <option value="">Seleccione almacen</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword6" class="col-form-label">Dirección</label>
                        <input type="text" id="direccion" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-1"></div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-2">
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
                        <label for="fecha" class="col-form-label">Fecha</label>
                        <input type="datetime-local" id="fecha" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>


                    <div class="col-md-4">
                        <label for="inputPassword6" class="col-form-label">Descripción</label>
                        <textarea style="height: 5px;" class="form-control" placeholder="" id="descripcion" disabled></textarea disabled>
                    </div>

                    <div class="col-md-2"></div>

                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label for="disabledSelect" class="form-label">Tipo de Pago</label>
                        <select id="tipoPago" class="form-select" disabled>
                            <option value="">Elija una opción</option>
                            <option value="E">EFECTIVO</option>
                            <option value="C">CREDITO</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Incluye IGV</label>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="igv" disabled>
                            <label class="form-check-label" for="flexCheckDefault">Habilitado</label>
                            <br><br>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <br>

                <div class="row">
                    <span class="d-block p-1 col-md-10 bg-info text-white">Detalles de Producto</span>
                    <label for="inputPassword6" class="col-md-12 col-form-label">Producto</label>

                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="productname" placeholder="Seleccione Producto" aria-label="Recipient's username" aria-describedby="" disabled>
                            <input type="hidden" type="text" id="productid">
                            <button class="btn btn-outline-secondary" href="" onclick="abrirListadoProductos()" type="button" id="">....</button>
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
                            <label for="inputPassword6" class="col-form-label">Cantidad</label>
                            <input type="text" id="productquantity" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                        <div class="col-md-1">
                            <label for="inputPassword6" class="col-form-label">P_Unitario</label>
                            <input type="text" id="productprice" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                        <div class="col-md-1">
                            <label for="inputPassword6" class="col-form-label">Descuento</label>
                            <input type="text" id="productdiscount" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3"></div>
                            <div class="mb-3"><br>
                                <a name="" id="addproduct" class="btn btn-primary" href="#" role="button" onclick="añadirProductoOrden()">Agregar</a>
                                <a name="" id="" class="btn btn-warning" href="#" role="button">Cancelar</a>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="container"> -->
                    <br>
                    <!-- <div class="container"> -->
                    <br>

                    <div class="row">
                        <div class="col-auto">
                            <div class="table-responsive">
                                <table class="tbl_venta" id="ordertable">
                                    <thead>
                                        <tr>
                                            <th width="200">Producto</th>
                                            <th>Cantidad</th>
                                            <th class="textcenter" width="120">Unidad</th>
                                            <th class="textcenter" width="120">PreCompra</th>
                                            <th class="textcenter" width="120">Descuento</th>
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
        </div>
        </form>
        </div>
    </header>

    <main></main>

    <footer>
        <!-- place footer here -->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
</body>

</html>