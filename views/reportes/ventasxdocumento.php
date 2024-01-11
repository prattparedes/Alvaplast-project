<!DOCTYPE html>
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
            <h3>REPORTE DE VENTAS POR DOCUMENTO</h3>

            <form>
                <b><span class="d-block p-2 col-12 bg-info text-white">Registro de ventas por documento</span></b>

                <div class="row">
                    <div class="col-md-4">
                        <label for="tipoDocumento" class="col-form-label">Tipo de Documento:</label>
                        <select id="tipoDocumento" class="form-select">
                            <option>NO DEFINIDO</option>
                            <option>San Juan de Lurigancho</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword6" class="col-form-label">Número de Documento:</label>
                        <fieldset disabled>
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="NOTA DE COBRANZA A">
                        </fieldset>
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword6" class="col-form-label">Total:</label>
                        <fieldset disabled>
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="98545454">
                        </fieldset>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="fechaDesde" class="col-form-label">Desde:</label>
                        <input type="date" id="fechaDesde" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-4">
                        <label for="fechaHasta" class="col-form-label">Hasta:</label>
                        <input type="date" id="fechaHasta" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-8">
                                <a name="" id="" class="btn btn-primary" href="#" role="button">Consultar</a>
                                <a name="" id="" class="btn btn-success" href="#" role="button">Exportar</a>
                                <a name="" id="" class="btn btn-warning" href="#" role="button">Imprimir</a>
                                <a name="" id="" class="btn btn-danger" href="#" onclick="loadContent('views/home.php')" role="button">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <!-- Tabla 01 -->
        <div class="container">
            <b><span class="d-block p-2 col-12 bg-info text-white">Detalles de Compra</span></b>
            <br>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                    <table class="table border=1">
                            <thead>
                                <tr>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Comprobante</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Moneda</th>
                                    <th scope="col">Importe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>A01</td>
                                    <td>Bolsa de Plastico Rey</td>
                                    <td>F</td>
                                    <td>Bolsas</td>
                                    <td>Alfa</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
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
