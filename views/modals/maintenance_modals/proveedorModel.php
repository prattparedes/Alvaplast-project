<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mantenimiento de Proveedores</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.3.2 -->
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->
</head>

<body>
    <header>
        <div class="container">
            <h1>Mantenimiento de Proveedores</h1>
            <form class="row g-3">
                <b><span class="d-block p-2 col-12 bg-info text-white">Datos de los Proveedores</span></b>
                <div class="row">
                <div class="col-md-2">
                    <label for="inputPassword6" class="col-form-label">Codigo</label>
                    <fieldset disabled>
                        <input type="text" id="disabledTextInput" class="form-control" aria-describedby="passwordHelpInline">
                    </fieldset>
                </div>
                </div>
                <div class="row">
                <div class=""style="width: 500px;">
                    <label for="inputPassword6" class="col-form-label">Razon Social</label>
                    <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                </div>
                </div>
                <div class="" style="width: 180px;">
                    <label for="inputPassword6" class="col-form-label">RUC</label>
                    <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                </div>

                <div class=""style="width: 310px;">
                    <label for="inputPassword6" class="col-form-label">Direccion</label>
                    <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                </div>

                <div class="row">
                    <div class="" style="width: 180px;">
                        <label for="inputPassword6" class="col-form-label">Telefono</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="" style="width: 180px;">
                        <label for="inputPassword6" class="col-form-label">Fax</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>
<div class="row">
                <div class="" style="width: 357px;">
                    <label for="inputPassword6" class="col-form-label">Contacto</label>
                    <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                </div>
</div>
                <div class="col-md-4">
                    <label for="inputPassword6" class="col-form-label">Email</label>
                    <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Estado</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Habilitado</label>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label for="disabledSelect" class="form-label">Departamento</label>
                        <select id="disabledSelect" class="form-select">
                            <option>Lima</option>
                            <option>Ica</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label for="disabledSelect" class="form-label">Provincia</label>
                        <select id="disabledSelect" class="form-select">
                            <option>Lima</option>
                            <option>Cañete</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="disabledSelect" class="form-label">Distrito</label>
                        <select id="disabledSelect" class="form-select">
                            <option>Los Olivos</option>
                            <option>San Juan de Lurigancho</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="button" class="btn btn-primary me-2">Grabar</button>
                    <a name="" id="" class="btn btn-success me-2" href="#" role="button">Modificar</a>
                    <a name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a>
                </div>
            </form>
        </div>
        <br><br>
        <div class="container">
            <h1>Listado de Proveedores</h1>
            <div class="row">
                <div class="col-md-9">
                    <h5>Buscar por </h5>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="disabledSelect" class="form-label">Proveedor</label>
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="col-md-3">
                            <label for="disabledSelect" class="form-label">RUC</label>
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </div>
<br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table border=1">
                                    <thead>
                                        <tr>
                                            <th scope="col-md-1">Codigo</th>
                                            <th scope="col-1">Proveedor</th>
                                            <th scope="col-1">RUC</th>
                                            <th scope="col-1">Direccion</th>
                                            <th scope="col-2">Telefono</th>
                                            <th scope="col-2">Fax</th>
                                            <th scope="col-3">Email</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td scope="row">R1C1</td>
                                            <td>AlvaPlastic</td>
                                            <td>2030405060</td>
                                            <td>Los Olivos 250</td>
                                            <td>960113254</td>
                                            <td>98554545</td>
                                            <td>alva@seguimos.com</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">R1C1</td>
                                            <td>AlvaPlastic</td>
                                            <td>2030405060</td>
                                            <td>Los Olivos 250</td>
                                            <td>960113254</td>
                                            <td>98554545</td>
                                            <td>alva@seguimos.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
