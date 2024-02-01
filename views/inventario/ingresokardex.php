<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->
</head>

<body>
    <header>
        <!-- place navbar here -->

        <div class="container">
            <h3>INGRESO KARDEX</h3>

            <form>
                <!-- <b> <span class="d-block p-2 col-4 bg-secondary text-white">Datos</span></b>
              
                <br> -->
                <b> <span class="d-block p-2 col-12 bg-info text-white">Registrar Datos </span></b>

                <div class="row">
                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Numero O/C:</label>
                        <select id="disabledSelect" class="form-select">
                            <option>Royos</option>
                            <option>San Juan de Lurigancho</option>
                        </select>
                    </div>

                    <div class="col-1">
                        <div></div>
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword6" class="col-form-label">Tipo de Pago:</label>
                        <select id="disabledSelect" class="form-select">
                            <option>EFECTIVO</option>
                            <option>CREDITO</option>
                        </select>
                    </div>
                    <div class="" style="width: 35px;">
                        <div></div>
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Fecha Emisión:</label>
                        <input type="date" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">RUC / DNI:</label>
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="col-1">
                            <div></div>
                        </div>

                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">Inicial:</label>
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>


                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">N Cuotas:</label>
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="" style="width: 50px;">
                            <div></div>
                        </div>

                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">Fecha Llegada:</label>
                            <input type="date" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label for="inputPassword6" class="col-form-label">Proveedor:</label>
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">Monto Financiado:</label>
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">M Cuotas:</label>
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>


                        <div class="" style="width: 150px;">
                            <div></div>
                        </div>



                        <div class="col-2">
                            <label for="inputPassword6" class="col-form-label">Incluye IGV:</label>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Habilitado
                                </label>

                            </div><br>
                        </div>

                    </div>

                    <b> <span class="d-block p-2 col-10 bg-secondary text-white">Comprobante de Pago</span></b>

                    <div class="row">
                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label"></label>
                            <!-- <fieldset disabled> -->
                            <select id="disabledSelect" class="form-select">
                                <option>Nota de Cobranza - A</option>
                                <option>Extranjera</option>
                            </select>
                        </div>

                        <div class="" style="width: 100px;">
                            <label for="inputPassword6" class="col-form-label"></label>

                            <input type="password" id="disabledTextInput" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="" style="width: 55px;">
                            <label for="inputPassword6" class="col-form-label"></label>
                            <fieldset disabled>
                                <input type="password" id="disabledTextInput" class="form-control" aria-describedby="passwordHelpInline" placeholder="--">
                        </div>

                        <div class="" style="width: 100px;">
                            <label for="inputPassword6" class="col-form-label"></label>
                            <input type="password" id="disabledTextInput" class="form-control" aria-describedby="passwordHelpInline" placeholder="">
                        </div>

                        <div class="" style="width: 50px;">
                            <div></div>
                        </div>

                        <div class="col-md-3">
                            <label for="disabledSelect" class="form-label">Caja:</label>
                            <select id="disabledSelect" class="form-select">
                                <option>Caja Venta Almacen I</option>
                                <option>Extranjera</option>
                            </select>
                        </div>

                        <div class="col-1">
                            <div></div>
                        </div>


                    </div>

                    <div>
                        <br>
                    </div>

                    <b> <span class="d-block p-2 col-10 bg-info text-white">Detalles de Producto</span></b>

                    <div></div>



                    <div class="mb-3"></div>
                    <div class="mb-3">
                        <a name="" id="" class="btn btn-primary" href="#" role="button">Nuevo</a>
                        <a name="" id="" class="btn btn-success" href="#" role="button">Grabar</a>
                        <a name="" id="" class="btn btn-secondary" href="#" role="button">Exportar</a>
                    </div>


                    <div class="row">
                        <div class="col-auto">
                            <div class="table-responsive">
                                <table class="tbl_venta">
                                    <thead>
                                        <tr>
                                            <!-- <th>Codigo</th> -->
                                            <th width="200">Producto</th>
                                            <th width="120">Cantidad</th>
                                            <th class="textcenter" width="120">Unidad</th>
                                            <th class="textright" width="120">PreCompra</th>
                                            <th class="textright" width="120">Descuento</th>
                                            <th class="textright" width="100">Total</th>



                                        </tr>
                                    </thead>

                                    <!-- <tr> -->

                                    <tbody id="detalle_venta">
                                        <tr>
                                            <!-- <td>R1C1</td> -->
                                            <td colspan="1">AlvaPlastic</td>
                                            <td class="textcenter">2</td>
                                            <td class="textright">F</td>
                                            <td class="textright">99.00</td>
                                            <td class="textright">126.00</td>
                                            <td class="textright">198.00</td>



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