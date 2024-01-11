<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mantenimiento de Conceptos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
    <!-- Bootstrap CSS v5.3.2 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->
</head>

<body>
    <header>
        <div class="container">
            <br>
            <h3>MANTENIMIENTO DE CONCEPTOS</h3>
            <br>
            <form>
                <b><span class="d-block p-2 col-12 bg-info text-white">Datos de los Conceptos</span></b>

                <div class="row g-3">
                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Codigo</label>
                        <fieldset disabled>
                            <input type="text" id="disabledTextInput" class="form-control" aria-describedby="passwordHelpInline">
                        </fieldset>
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword6" class="col-form-label">Descripción</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-12">
                        <button type="button" class="btn btn-secondary me-2">Nuevo</button>
                        <a name="" id="" class="btn btn-primary me-2" href="#" role="button">Grabar</a>
                        <a name="" id="" class="btn btn-success me-2" href="#" role="button">Modificar</a>
                        <a name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a>
                    </div>
                </div>
            </form>

            <br><br>

            <div class="container">
                <h1>Listado de Conceptos</h1>

                <div class="row">
                    <h5 class="col-12 col-md-2">Buscar por</h5>
                </div>
                    <div class="col-12 col-md-4">
                        <label for="disabledSelect" class="form-label">Descripción</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        <br>
                    </div>

                </div>

                <div class="table-responsive">
                <table class="table border=1">
                        <thead>
                            <tr>
                                <th scope="col-md-1">Codigo</th>
                                <th scope="col-1">Marca</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="">
                                <td scope="row">R1C1</td>
                                <td>AlvaPlasticxxxxx</td>
                            </tr>
                            <tr class="">
                                <td scope="row">R1C1</td>
                                <td>AlvaPlastic</td>
                            </tr>
                        </tbody>
                    </table>
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