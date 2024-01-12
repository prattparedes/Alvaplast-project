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
        require_once($_SERVER["DOCUMENT_ROOT"] . "/Alvaplast-project/autoload.php");

        use Models\compras\Compra;
        use Models\maintenance_models\Sucursal;
        use Models\maintenance_models\Moneda;
        use Models\maintenance_models\Almacen;
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
                            <input type="serieDoc" id="disabledTextInput" class="form-control" aria-describedby="passwordHelpInline" value="001">
                        </fieldset>
                    </div>

                    <div class="col-md-1">
                        <label for="idCompra" class="col-form-label"></label>
                        <fieldset disabled>
                            <input type="text" id="idCompra" class="form-control" aria-describedby="passwordHelpInline">
                        </fieldset>
                    </div>

                    <div class="col-md-1"></div>

                    <div class="col-md-6">
                        <br>
                        <a style="width: 100px;" name="" id="" class="btn btn-primary" href="#" role="button">Nuevo</a>
                        <a style="width: 100px;" name="" id="" class="btn btn-success" href="#" role="button">Grabar</a>
                        <a style="width: 100px;" name="" id="" class="btn btn-warning" href="#" role="button">Modificar</a>
                        <a style="width: 100px;" name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a>

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
                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" href="" onclick="loadContent('views/modals/listadoproveedores.php')" type="button" id="button-addon2">....</button>
                        </div>
                    </div>

                    <div class="col-md-1"></div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label for="sucursal" class="form-label">Sucursal</label>
                        <select id="sucursal" class="form-select">
                            <option value="">Seleccionar </option>
                            <?php
                            $data = Sucursal::getSucursales(); ?>
                            <option value="<?= $data->id_sucursal ?>"><?= $data->descripcion ?></option>
                        </select>

                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="almacen" class="form-label">Almacen</label>
                        <select id="almacen" class="form-select">
                            <option value="">Seleccionar almacen</option>
                            <?php
                            $almacenes = Almacen::getAlmacenes();
                            foreach ($almacenes as $almacen) { ?>
                                <option value="<?= $almacen->id_almacen ?>"><?= $almacen->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword6" class="col-form-label">Dirección</label>
                        <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-1"></div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-2">
                        <label for="moneda" class="form-label">Moneda</label>
                        <select id="moneda" class="form-select">
                            <option value="">Seleccionar una moneda</option>
                            <?php $monedas = Moneda::getMonedas();
                            foreach ($monedas as $moneda) { ?>
                                <option value="<?= $moneda->id_moneda ?>"><?= $moneda->descripcion ?></option>
                            <?php } ?>

                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="fecha" class="col-form-label">Fecha</label>
                        <input type="datetime-local" id="fecha" class="form-control" aria-describedby="passwordHelpInline">
                    </div>


                    <div class="col-md-4">
                        <label for="inputPassword6" class="col-form-label">Descripción</label>
                        <textarea style="height: 5px;" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    </div>

                    <div class="col-md-2"></div>

                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label for="tipoPago" class="form-label">Tipo de Pago</label>
                        <select id="tipoPago" class="form-select">
                            <option value="E">Efectivo</option>
                            <option value="C">Credito</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Incluye IGV</label>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
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
                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" href="" onclick="loadContent('views/modals/listadoproductoscompras.php')" type="button" id="button-addon2">....</button>
                        </div>
                    </div>

                    <div class="col-md-1">
                        <!-- Deja este espacio vacío o agrega contenido según sea necesario -->
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label for="disabledSelect" class="form-label">Unidad</label>
                            <select id="disabledSelect" class="form-select">
                                <option>Royos</option>
                                <option>San Juan de Lurigancho</option>
                            </select>
                        </div>

                        <div class="col-md-1">
                            <label for="inputPassword6" class="col-form-label">Cantidad</label>
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="col-md-1">
                            <label for="inputPassword6" class="col-form-label">P_Unitario</label>
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="col-md-1">
                            <label for="inputPassword6" class="col-form-label">Descuento</label>
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3"></div>
                            <div class="mb-3"><br>
                                <a name="" id="" class="btn btn-primary" href="#" role="button">Agregar</a>
                                <a name="" id="" class="btn btn-warning" href="#" role="button">Cancelar</a>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="container"> -->
                    <br>

                    <div class="row">
                        <div class="col-auto">
                            <div class="table-responsive">
                                <table class="tbl_venta">
                                    <thead>
                                        <tr>
                                            <th width="150">Codigo</th>
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
                                        <tr>
                                            <td>R1C1</td>
                                            <td colspan="1">AlvaPlastic</td>
                                            <td class="textcenter">10</td>
                                            <td class="textright">150.00</td>
                                            <td class="textright">150.00</td>
                                            <td class="textright">50.00</td>
                                            <td class="textright">1250.00</td>


                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>

                                            <td colspan="6" class="textright">Precio Bruto</td>
                                            <td class="textright">100.00</td>
                                        </tr>

                                        <tr>
                                            <td colspan="6" class="textright">Descuento</td>
                                            <td class="textright">100.00</td>
                                        </tr>

                                        <tr>
                                            <td colspan="6" class="textright">Precio Neto</td>
                                            <td class="textright">100.00</td>
                                        </tr>

                                        <tr>
                                            <td colspan="6" class="textright">IGV S/.</td>
                                            <td class="textright">100.00</td>
                                        </tr>

                                        <tr>
                                            <td colspan="6" class="textright">Total S/.</td>
                                            <td class="textright">100.00</td>
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
        <!-- place footer here -->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
</body>

</html>