<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mantenimiento de Unidad</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.3.2 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->
</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/autoload.php");

        use Models\maintenance_models\Unidad;
        ?>
        <div class="container">
            <h1>Mantenimiento de Unidad</h1>
            <form>
                <b><span class="d-block p-2 col-12 bg-info text-white">Datos de las Unidades</span></b>
                <div class="row g-3">
                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Codigo</label>
                        <fieldset disabled>
                            <input type="text" id="codigo" class="form-control" aria-describedby="passwordHelpInline">
                        </fieldset>
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword6" class="col-form-label">Abreviatura</label>
                        <input type="text" id="abreviatura" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword6" class="col-form-label">Descripción</label>
                        <input type="text" id="descripcion" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-12">
                        <button type="button" class="btn btn-secondary me-2">Nuevo</button>
                        <a name="" id="" class="btn btn-primary me-2 unit_submit" href="#" role="button">Grabar</a>
                        <a name="" id="" class="btn btn-success me-2 unit_submit" href="#" role="button">Modificar</a>
                        <a name="" id="" class="btn btn-danger unit_submit" href="#" role="button">Eliminar</a>
                    </div>
                </div>
            </form>

            <br><br>

            <div class="container">
                <h1>Listado de Unidades</h1>
                <div class="row">
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table border=1" id="unitsTable">
                                <thead>
                                    <tr>
                                        <th scope="col-md-1">ID</th>
                                        <th scope="col-md-1">Codigo de unidad</th>
                                        <th scope="col-1">Descripción</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    $data = Unidad::getUnidades();
                                    foreach ($data as $unit) {
                                    ?>
                                        <tr>
                                            <td><?= $unit->id_unidad ?></td>
                                            <td><?= $unit->abreviatura ?></td>
                                            <td><?= $unit->descripcion ?></td>
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