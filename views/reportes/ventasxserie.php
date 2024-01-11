<!DOCTYPE html>
<html lang="en">

<head>
    <title>REPORTE DE VENTAS POR SERIE</title>
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
            <h3>REPORTE DE VENTAS POR SERIE</h3>
            <form>
                <b><span class="d-block p-2 col-12 bg-info text-white">Registro de ventas por Correlativos</span></b>

                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="tipoDocumento" class="col-form-label">Tipo de Documento:</label>
                        <select id="tipoDocumento" class="form-select">
                            <option>NOTA DE COBRANZA - A</option>
                            <option>San Juan de Lurigancho</option>
                        </select>
                    </div>

                    <div class="col-6 col-md-3 mb-3">
                        <label for="fechaInicio" class="col-form-label">Inicio:</label>
                        <input type="date" id="fechaInicio" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-6 col-md-3 mb-3">
                        <label for="fechaFin" class="col-form-label">Fin:</label>
                        <input type="date" id="fechaFin" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="button">Consultar</button>
                        <button class="btn btn-warning" type="button">Imprimir</button>
                        <button class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Cancelar</button>
                    </div>
                </div>
            </form>

            <br>
            <!-- Tabla 01 -->
            <div class="container">
                <b><span class="d-block p-2 col-12 bg-info text-white">Detalles de Venta</span></b>
                <br>

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                        <table class="table border=1">
                                <thead>
                                    <tr>
                                        <th scope="col-1">Codigo</th>
                                        <th scope="col-1">Producto</th>
                                        <th scope="col-1">Cantidad</th>
                                        <th scope="col-1">Unidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td scope="row">A01</td>
                                        <td scope="row">Bolsa de Plastico Rey</td>
                                        <td scope="row">F</td>
                                        <td scope="row">Bolsas</td>
                                    </tr>
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
