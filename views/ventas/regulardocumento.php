
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <title>Title</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
 
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->
</head>

<body>
    <header>
        <div class="container">
            <h1 class="mt-4 mb-4">REGULAR DOCUMENTO</h1>

            <form>
                <div class="bg-info text-white p-2 mb-3">Reporte de ventas por correlativos</div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="inputStartDate" class="form-label">Fecha de Inicio:</label>
                        <input type="date" id="inputStartDate" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-3">
                        <label for="inputEndDate" class="form-label">Fecha de Fin:</label>
                        <input type="date" id="inputEndDate" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-4 mt-3 mt-md-0">
                        <button class="btn btn-success me-2" type="button">Consultar</button>
                        <button class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <!-- Empty column for spacing -->
                    </div>
                </div>
            </form>

            <!-- Tabla 01 -->
            <div class="bg-info text-white p-2 mt-4">Detalles de Producto</div>
            <div class="table-responsive">
            <table class="table border=1">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Unidad</th>
                            <th scope="col">Linea</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">A01</td>
                            <td scope="row">Bolsa de Plastico Rey</td>
                            <td scope="row">F</td>
                            <td scope="row">Bolsas</td>
                            <td scope="row">Alfa</td>
                            <td scope="row">0.0</td>
                        </tr>
                    </tbody>
                </table>
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
