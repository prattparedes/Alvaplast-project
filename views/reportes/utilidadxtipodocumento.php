<!DOCTYPE html>
<html lang="en">

<head>
    <title>REPORTE DE UTILIDADES</title>
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
            <h3>REPORTE DE UTILIDADES</h3>
            <form>

                <b><span class="d-block p-2 col-12 bg-info text-white">Registro de utilidades por tipo de documento</span></b>
                <br>

                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="tipoDocumento" class="col-form-label">Documento:</label>
                        <select id="tipoDocumento" class="form-select">
                            <option>NOTA DE COBRANZA -A</option>
                            <option>San Juan de Lurigancho</option>
                        </select>
                    </div>

                    <div class="col-6 col-md-3 mb-3">
                        <label class="col-form-label">Imprimir:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="imprimirTipo" id="detalle" value="detalle" checked>
                            <label class="form-check-label" for="detalle">Detalle</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="imprimirTipo" id="resumen" value="resumen">
                            <label class="form-check-label" for="resumen">Resumen</label>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 mb-3">
                        <label for="fechaInicial" class="col-form-label">Fecha Inicial:</label>
                        <input type="date" id="fechaInicial" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-12 col-md-3 mb-3">
                        <label for="fechaFinal" class="col-form-label">Fecha Final:</label>
                        <input type="date" id="fechaFinal" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-12 col-md-4">
                        <button class="btn btn-primary" type="button">Consultar</button>
                        <button class="btn btn-success" type="button">Exportar</button>
                        <button class="btn btn-warning" type="button">Imprimir</button>
                        <button class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Cancelar</button>
                    </div>

                    <div class="col-6 col-md-2 mb-3">
                        <label for="documentoDetalle" class="col-form-label"><br></label>
                        <input type="text" id="documentoDetalle" class="form-control" aria-describedby="passwordHelpInline" placeholder="NOTA DE COBANZA -A" disabled>
                    </div>

                    <div class="col-6 col-md-3 mb-3">
                        <label for="totalUtilidad" class="col-form-label">Total de Utilidad:</label>
                        <input type="text" id="totalUtilidad" class="form-control" aria-describedby="passwordHelpInline" placeholder="00.00" disabled>
                    </div>

                </div>
            </form>

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
                                        <th scope="col-1">Fecha</th>
                                        <th scope="col-1">Producto</th>
                                        <th scope="col-1">UM</th>
                                        <th scope="col-1">Linea</th>
                                        <th scope="col-1">Costo</th>
                                        <th scope="col-1">P. Unitario</th>
                                        <th scope="col-1">Cantidad</th>
                                        <th scope="col-1">Utilidad</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td scope="row">A01</td>
                                        <td scope="row">Bolsa de Plastico Rey</td>
                                        <td scope="row">F</td>
                                        <td scope="row">Bolsas</td>
                                        <td scope="row">Alfa</td>
                                        <td scope="row">0.0</td>
                                        <td scope="row">10</td>
                                        <td scope="row">1200.00</td>

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
