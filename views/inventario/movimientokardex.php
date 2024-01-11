<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
    <!-- Bootstrap CSS v5.3.2 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->
</head>

<body>
    <header>
        <!-- place navbar here -->

        <div class="container">
            <h3>MOVIMIENTO DE KARDEX</h3>

            <form>

                <b> <span class="d-block p-1 col-12 bg-info text-white">Lista de Productos</span></b><br>
                <b> <span class="d-block p-1 col-6 bg-info text-white">Lista de Productos</span></b>

                <div class="row">
                    <div class="col-md-4">
                        <label for="inputPassword6" class="col-form-label">Almacen:</label>
                        <select id="disabledSelect" class="form-select">
                            <option>Royos</option>
                            <option>San Juan de Lurigancho</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Filtro:</label>
                        <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <!-- <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label"> Producto </label>
                        <fieldset disabled>
                            <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="Bolsa 10x15">
                        </fieldset>
                    </div>

                    <div class="col-md-1">
                        <div></div>
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Fecha Desde:</label>
                        <input type="date" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Stock Fisico Final:</label>
                        <fieldset disabled>
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </fieldset>
                    </div>

                    <div class="col-md-1">
                        <div></div>
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Fecha Hasta:</label>
                        <input type="date" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-3">
                        <a name="" id="" class="btn btn-primary" href="#" role="button">Consultar</a>
                        <a name="" id="" class="btn btn-success" href="#" role="button">Exportar</a>
                        <a name="" id="" class="btn btn-danger" href="#" onclick="loadContent('views/home.php')" role="button">Cancelar</a>
                    </div> -->
                </div>
            </form>
        </div>
        <br>
        <!-- Tabla 01 -->
        <div class="container">
            <b> <span class="d-block p-1 col-6 bg-info text-white">Detalles de Producto</span></b>
            <br>

            <div class="row">

                <div class="col-md-4">
                    <div class="table-responsive">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col-1">Producto</th>
                                    <th style="width:50px" scope="col-1">Unidad</th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr class="">
                                    <td scope="row">A01</td>
                                    <td scope="row">A01</td>

                                </tr>

                                <tr class="">
                                    <td scope="row">A02</td>
                                    <td>AlvaPlastic02</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>







                <b> <span class="d-block p-1 col-7 bg-info text-white">Detalles de busquedad de Producto</span></b>
                <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label"> Producto </label>
                        <fieldset disabled>
                            <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="Bolsa 10x15">
                        </fieldset>
                    </div>

                    <div class="col-md-1">
                        <div></div>
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Fecha Desde:</label>
                        <input type="date" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="row">
                   
                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Stock Fisico Final:</label>
                        <fieldset disabled>
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </fieldset>
                    </div>

                    <div class="col-md-1">
                        <div></div>
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Fecha Hasta:</label>
                        <input type="date" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-3">
                    <br>
                        <a name="" id="" class="btn btn-primary" href="#" role="button">Consultar</a>
                        <a name="" id="" class="btn btn-success" href="#" role="button">Exportar</a>
                        <a name="" id="" class="btn btn-danger" href="#" onclick="loadContent('views/home.php')" role="button">Cancelar</a>
                    </div>
                    
                </div>
                <br>
                <b> <span class="d-block p-1 col-8 bg-info text-white">Detalles de Proveedores y productos</span></b>
                <br>
                <!-- Tabla 02 -->
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col-1">Fecha</th>
                                    <th scope="col-1">Proveedor / Cliente</th>
                                    <th scope="col-1">Motivo</th>
                                    <th scope="col-1">Documento</th>
                                    <th scope="col-1">Monto</th>
                                    <th scope="col-1">Inicio</th>
                                    <th scope="col-1">Ingreso</th>
                                    <th scope="col-1">Salida</th>
                                    <th scope="col-1">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <!-- <td scope="row"></td> -->


                                </tr>

                                <tr class="">
                                    <!-- <td scope="row"></td> -->

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
