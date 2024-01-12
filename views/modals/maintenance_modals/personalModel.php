<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mantenimiento de Personal</title>
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

        use Models\maintenance_models\Personal;
        ?>
        <div class="container">
            <h1>Mantenimiento de Personal</h1>
            <form>
                <b><span class="d-block p-2 col-12 bg-info text-white">Datos del Personal</span></b>

                <div class="row g-3">
                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Codigo</label>
                        <fieldset disabled>
                            <input type="number" id="codigo" class="form-control" aria-describedby="passwordHelpInline">
                        </fieldset>
                    </div>

                    <div class="col-md-4">
                        <label for="nombres" class="col-form-label">Nombres</label>
                        <input type="text" id="nombres" class="form-control" aria-describedby="passwordHelpInline">
                    </div>


                    <div class="col-md-4">
                        <label for="paterno" class="col-form-label">Apellido Paterno</label>
                        <input type="text" id="paterno" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-4">
                        <label for="materno" class="col-form-label">Apellido Materno</label>
                        <input type="text" id="materno" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-2">
                        <label for="dni" class="col-form-label">DNI</label>
                        <input type="text" id="dni" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-2">
                        <label for="dni" class="col-form-label">Cargo</label>
                        <select name="" id="cargo" class="form-select">
                            <option value="" default>Elija una opción</option>
                            <option value="A">Administrador</option>
                            <option value="V">Vendedor</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword6" class="col-form-label">Dirección</label>
                        <input type="text" id="direccion" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">Telefono</label>
                            <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">Celular</label>
                            <input type="text" id="celular" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">Estado</label>
                            <select name="" id="estado" class="form-select">
                                <option value="A">Activo</option>
                                <option value="C">Cesante</option>
                                <option value="V">Vacaciones</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">Usuario</label>
                            <input type="text" id="usuario" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">Clave</label>
                            <input type="password" id="clave" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                        <div class="col-md-2">
                            <label for="inputPassword6" class="col-form-label">Repetir Clave</label>
                            <input type="password" id="clave2" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <button style="width:auto; margin-left: 8px;" onclick="cargarPermisosPersonal()"><i class="bi bi-person-vcard"></i><span>Permisos de Almacén</span></button>


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
                <h1>Listado de Personal</h1>

                <div class="row">
                    <!-- <div class="col-md-6">
                        <h5>Buscar por </h5>
                        <div class="row">
                            <div class="col-12">
                                <label for="disabledSelect" class="form-label">Descripción</label>
                                <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                            </div>
                        </div>
                    </div> -->

                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table border=1">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombres</th>
                                        <th>Ap. Paterno</th>
                                        <th>Ap. Materno</th>
                                        <th>Dni</th>
                                        <th>Direccion</th>
                                        <th>Teléfono</th>
                                        <th>Cargo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = Personal::getPersonal();
                                    foreach ($data as $pers) {
                                    ?>
                                        <tr ondblclick="llenarFormularioStaff(this)">
                                            <td><?= $pers->id_personal ?></td>
                                            <td><?= $pers->nombres ?></td>
                                            <td><?= $pers->ap_paterno ?></td>
                                            <td><?= $pers->ap_materno ?></td>
                                            <td><?= $pers->dni ?></td>
                                            <td><?= $pers->direccion ?></td>
                                            <td><?= $pers->telefono ?></td>
                                            <td><?= $pers->cargo ?></td>
                                            <td style="display:none;"><?= $pers->estado ?></td>
                                            <td style="display:none;"><?= $pers->usuario ?></td>
                                            <td style="display:none;"><?= $pers->clave ?></td>
                                            <td style="display:none;"><?= $pers->celular ?></td>
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