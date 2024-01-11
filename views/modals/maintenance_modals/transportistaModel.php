<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mantenimiento de Transportista</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.2 -->
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->
</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Transportistas;
        ?>
        <div class="container">
            <h1>Mantenimiento de Transportista</h1>
            <form>
                <b><span class="d-block p-2 col-12 bg-info text-white">Datos de los Transportista</span></b>

                <div class="row g-3">
                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Codigo</label>
                        <fieldset disabled>
                            <input type="text" id="disabledTextInput" class="form-control" aria-describedby="passwordHelpInline">
                        </fieldset>
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">RUC</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword6" class="col-form-label">Nombre</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword6" class="col-form-label">Apellido Paterno</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword6" class="col-form-label">Apellido Materno</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">DNI</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Licencia Nro.</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword6" class="col-form-label">Dirección</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">Telefono</label>
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">Celular</label>
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </div>


                    <br>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-secondary">Nuevo</button>
                        <a name="" id="" class="btn btn-primary" href="#" role="button">Grabar</a>
                        <a name="" id="" class="btn btn-success" href="#" role="button">Modificar</a>
                        <a name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a>
                    </div>
                </div>
            </form>

            <br><br>

            <div class="container">
                <h1>Listado de Transportista</h1>

                <div class="row">
                    <div class="col-md-6">
                        <h5>Buscar por </h5>
                        <div class="row">
                            <div class="col-12">
                                <label for="disabledSelect" class="form-label">Descripción</label>
                                <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table border=1">
                                <thead>
                                    <tr>
                                        <th scope="col-md-1">Codigo</th>
                                        <th scope="col-1">RUC</th>
                                        <th scope="col-1">Nombre</th>
                                        <th scope="col-1">Apellido paterno</th>
                                        <th scope="col-1">Apellido materno</th>
                                        <th scope="col-1">DNI</th>
                                        <th scope="col-1">Nro. Licencia</th>
                                        <th scope="col-1">Dirección</th>
                                        <th scope="col-1">Telefono</th>
                                        <th scope="col-1">Celular</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $transportista = Transportistas::getTransportistas();
                                    foreach ($transportista as $trans) {
                                    ?>
                                        <tr>
                                            <td><?= $trans->id_transportista ?></td>
                                            <td><?= $trans->nombres ?></td>
                                            <td><?= $trans->ap_paterno ?></td>
                                            <td><?= $trans->ap_materno ?></td>
                                            <td><?= $trans->dni ?></td>
                                            <td><?= $trans->ruc ?></td>
                                            <td style="display:none;"><?= $trans->licencia ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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