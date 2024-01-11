<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Listado de Clientes</title>
    <!-- Bootstrap CSS v5.3.2 -->
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->
</head>

<body>
    <header>
        <div class="container">
            <h1>LISTADO DE CLIENTES </h1>
            <form>
                <div class="row">
                    <div class="col-md-4">
                        <label for="inputRazonSocial" class="col-form-label">Razón Social</label>
                        <input type="text" id="inputRazonSocial" class="form-control" />
                    </div>

                    <div class="col-md-4">
                        <label for="inputRuc" class="col-form-label">RUC</label>
                        <input type="text" id="inputRuc" class="form-control" />
                    </div>

                    <div class="col-md-4">
                        <label for="inputDni" class="col-form-label">DNI</label>
                        <input type="text" id="inputDni" class="form-control" />
                    </div>
                </div>

                <br>

                <button type="button" class="btn btn-success" style="width: 150px;">Consultar</button>
              
                <a style="width: 150px;" high="50" name="" id="" class="btn btn-danger" href="#" onclick="loadContent('views/ventas/ordenventa.php')" role="button">Cancelar..</a>
            </form>
        </div>

        <br>

        <div class="container">
            <h1>Clientes</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                    <table class="table border=1">
                            <thead>
                                <tr>
                                    <th scope="col-md-1">Codigo</th>
                                    <th scope="col-md-1">Razón Social</th>
                                    <th scope="col-md-1">Ruc</th>
                                    <th scope="col-md-1">Dni</th>
                                    <th scope="col-md-1">Dirección</th>
                                    <th scope="col-md-1">Teléfono</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">R1C1</td>
                                    <td>AlvaPlastic</td>
                                    <td>10167754798</td>
                                    <td>16775473</td>
                                    <td>Jr. Los Olivos 166</td>
                                    <td>919186954</td>
                                </tr>
                                <tr>
                                    <td scope="row">R1C2</td>
                                    <td>OtroCliente</td>
                                    <td>12345678901</td>
                                    <td>98765432</td>
                                    <td>Avenida Principal 123</td>
                                    <td>987654321</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Bootstrap JavaScript Libraries -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjV/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
</body>

</html>
