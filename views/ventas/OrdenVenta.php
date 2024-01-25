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
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/autoload.php");

        use Models\maintenance_models\Sucursal;
        use Models\ventas\Venta;

        ?>
        <div class="container">
            <h3>ORDEN DE VENTA</h3>

            <form>
                <span class="d-block p-1 col-md-10 bg-info text-white">Detalles de Orden de venta</span>

                <div class="row">
                    <div class="col-md-1">
                        <label for="inputPassword6" class="col-form-label"></label>
                        <fieldset disabled>
                            <input type="text" id="serieDocumento" class="form-control" aria-describedby="passwordHelpInline" value="001">
                        </fieldset>
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label"></label>
                        <fieldset disabled>
                            <input type="text" id="numDocumento" class="form-control" aria-describedby="passwordHelpInline" value="<?= Venta::obtenerVentaId(); ?>">
                        </fieldset>
                    </div>

                    <div class="col-md-1"></div>

                    <div class="col-md-6">
                        <br>



                        <a style="width: 100px;" name="" id="" class="btn btn-primary" href="#" role="button">Nuevo</a>
                        <a style="width: 100px;" name="" id="" class="btn btn-success" href="#" role="button">Grabar</a>
                        <a style="width: 100px;" name="" id="" class="btn btn-warning" href="#" role="button">Modificar</a>
                        <a style="width: 100px;" name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a>




                        <button style="width: 100px;" class="btn btn-secondary" href="" onclick="loadContent('views/modals/listaordenventa.php')">Buscar</button>

                        <!-- <button style="width: 90px;" class="btn btn-danger" onclick="loadContent('views/home.php')">Salir</button> -->
                    </div>
                </div>

                <br>
                <span class="d-block p-1 col-md-5 bg-info text-white">Detalles de Cliente</span>
                <div class="row">
                    <label style="margin-top: 5px;" for="disabledSelect" class="form-label">Cliente</label>
                    <div class="col-md-5">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Ingrese nombre de cliente" aria-label="Recipient's username" aria-describedby="">


                            <button class="btn btn-outline-secondary" href="" onclick="loadContent('views/modals/listadoclientes.php')" type="button" id="">....</button>
                        </div>

                        <label for="disabledSelect" class="form-label">Dirección</label>
                        <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <span class="d-block p-1 col-md-12 bg-info text-white">Detalles de Producto</span>
                        <label for="inputPassword6" class="col-md-12 col-form-label">Vendedor</label>
                        <select id="disabledSelect" class="form-select">
                            <option>Susan Paredes Villanueva</option>
                            <option>Extranjera</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <label for="disabledSelect" class="form-label">RUC - DNI</label>
                        <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-1"></div>

                    <div class="col-md-2">
                        <label for="disabledSelect" class="form-label">Sucursal</label>
                        <select id="disabledSelect" class="form-select" onchange="listarAlmacenes(this.value)">
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

                    <div class="col-md-2">
                        <label for="almacen" class="form-label">Almacen </label>
                        <select id="almacen" class="form-select">
                            <option value="0">seleccione un almacen</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-1">
                    <div></div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <label for="disabledSelect" class="form-label">Moneda</label>
                        <select id="disabledSelect" class="form-select">
                            <option>Soles</option>
                            <option>Extranjera</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="disabledSelect" class="form-label">Tipo Pago</label>
                        <select id="disabledSelect" class="form-select">
                            <option>Efectivo</option>
                            <option>Credito</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <div></div>
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Fechassss</label>
                        <input type="date" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Inicial</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Monto Financiado</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-2">
                        <!-- Deja este espacio vacío o agrega contenido según sea necesario -->
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword6" class="col-form-label">Notas</label>
                        <textarea style="height: 5px;" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Cuotas</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Monto Cuotas</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
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

                    <label for="inputPassword6" class="col-md-12 col-form-label">Producto</label>

                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="">
                            <!-- <button class="btn btn-outline-secondary" href="" onclick="loadContent('views/modals/listadoproductosventa.php')" type="button" id="">....</button> -->
                            <button class="btn btn-outline-secondary" href="" onclick="loadContent3()" type="button" id="">....</button>
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

                    <div class="container">
                        <br>

                        <div class="row">
                            <div class="col-auto">
                                <div class="table-responsive">
                                    <table class="tbl_venta">
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
                                            <tr>
                                                <!-- <td>R1C1</td> -->
                                                <td colspan="1">AlvaPlastic</td>
                                                <td class="textcenter">2</td>
                                                <td class="textcenter">F</td>
                                                <td class="textcenter">99.00</td>
                                                <td class="textcenter">126.00</td>
                                                <td class="textcenter">198.00</td>



                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5" class="textright">Precio Bruto</td>
                                                <td class="textright">167.80</td>
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