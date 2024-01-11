<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mantenimiento de Documentos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
    <!-- Bootstrap CSS v5.3.2 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->
</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\TipoDocumento;
        ?>
        <div class="container">
            <h1>Mantenimiento de Documentos</h1>
            <form>
                <b><span class="d-block p-2 col-12 bg-info text-white">Datos de los Documentos</span></b>

                <div class="row g-3">
                    <div class="col-12 col-md-2">
                        <label for="inputPassword6" class="col-form-label">Codigo</label>
                        <fieldset disabled>
                            <input type="number" id="codigo" class="form-control" aria-describedby="passwordHelpInline">
                        </fieldset>
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="abreviatura" class="col-form-label">Abreviatura</label>
                        <input type="text" id="abreviatura" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="descripcion" class="col-form-label">Descripción</label>
                        <input type="text" id="descripcion" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-12 col-md-2">
                        <label for="inputPassword6" class="col-form-label"></label>
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-secondary">Nuevo</button>
                        </div>
                    </div>

                    <div class="col-12 col-md-2">
                        <label for="inputPassword6" class="col-form-label"></label>
                        <div class="d-grid gap-2">
                            <a name="" id="" class="btn btn-primary" href="#" role="button">Grabar</a>
                        </div>
                    </div>

                    <div class="col-12 col-md-2">
                        <label for="inputPassword6" class="col-form-label"></label>
                        <div class="d-grid gap-2">
                            <a name="" id="" class="btn btn-success" href="#" role="button">Modificar</a>
                        </div>
                    </div>

                    <div class="col-12 col-md-2">
                        <label for="inputPassword6" class="col-form-label"></label>
                        <div class="d-grid gap-2">
                            <a name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a>
                        </div>
                    </div>
                </div>
            </form>

            <br><br>

            <div class="container">
                <h1>Listado de Documentos</h1>

                <div class="row">
                    <h5>Buscar por </h5>
                    <div class="row">
                        <div class="col-6">
                            <label for="disabledSelect" class="form-label">Descripción</label>
                            <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table border=1" id="documentsTable">
                                <thead>
                                    <tr>
                                        <th scope="col-md-1">Codigo</th>
                                        <th scope="col-1">Abreviatura</th>
                                        <th scope="col-1">Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $documento = TipoDocumento::getDocumentos();
                                    foreach ($documento as $doc) {
                                    ?>
                                        <tr>
                                            <td><?= $doc->id_tipodocumento ?></td>
                                            <td><?= $doc->abreviatura ?></td>
                                            <td><?= $doc->descripcion ?></td>
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