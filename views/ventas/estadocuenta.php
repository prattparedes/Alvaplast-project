
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <title>Title</title>
    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
  
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->
</head>

<body>
    <header>
        <div class="container">
            <h3>ESTADO DE CUENTA</h3>

            <form>
                <b> <span class="d-block p-2 col-12 bg-info text-white">Reporte de Estado de cuenta</span></b>

                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="inputStartDate" class="col-form-label">Fecha de Inicio:</label>
                        <input type="date" id="inputStartDate" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-3">
                        <label for="inputEndDate" class="col-form-label">Fecha de Fin:</label>
                        <input type="date" id="inputEndDate" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-3">
                        <label for="inputFilter" class="col-form-label">Filtrar por:</label>
                        <input type="text" id="inputFilter" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-3">
                        <br>
                        <button class="btn btn-success" type="button">Consultar</button>
                        <button class="btn btn-primary" type="button">Exportar</button>
                        <button class="btn btn-warning" type="button">Imprimir</button>
                        <button style="width: 100px;" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button>
                    </div>
                </div>
            </form>
<br>
            <!-- Table 01 -->
            <div class="container">
                <b><span class="d-block p-2 col-12 bg-info text-white">Detalles de Producto</span></b>
                <br>

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                        <table class="table border=1">
                                <thead>
                                    <tr>
                                        <th scope="col">Fecha de Venta</th>
                                        <th scope="col">Numeo de Documento</th>
                                        <th scope="col">Razón Social</th>
                                        <th scope="col">Vendedor</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Total S/.</th>
                                        <th scope="col">Debe S/.</th>
                                        <th scope="col">Acuenta S/.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">04-01-2024</td>
                                        <td scope="row">Bolsa de Plastico Rey</td>
                                        <td scope="row">F</td>
                                        <td scope="row">Bolsas</td>
                                        <td scope="row">Alfa</td>
                                        <td scope="row">0.0</td>
                                        <td scope="row">0.0</td>
                                        <td scope="row">0.0</td>
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
        <!-- Footer content -->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
</body>

</html>
