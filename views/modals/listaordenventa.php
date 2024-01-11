<!-- <!DOCTYPE html>
<html lang="en"> -->

<head>
    <title>Listado de Orden de Venta</title>
<!-- 
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
<!--    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->
</head>

<body>
    <header>
        <!-- Navbar -->
        <!-- Si tienes un navbar, colócalo aquí -->

        <div class="container mt-4">
            <h3 class="text-center">LISTADO DE ORDEN DE VENTA</h3>

            <form>
                <b><span class="d-block p-2 col-12 bg-info text-white">Orden de Venta </span></b>

                <div class="row mt-3">
                    <div class="col-md-1"></div>

                    <div class="col-md-3">
                        <input type="radio" id="facturable" name="tipoOrden" value="facturable" checked />
                        <label for="facturable">Facturable</label>
                    </div>

                    <div class="col-md-3">
                        <input type="radio" id="noFacturable" name="tipoOrden" value="noFacturable" />
                        <label for="noFacturable">No Facturable</label>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-1"></div>

                    <div class="col-md-3">
                        <label for="inputPassword6" class="col-form-label">Cliente:</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-6 mt-2">
                        <a class="btn btn-primary" href="#" role="button">Consultar</a>

                        
                        
                         <button style="width: 100px;" class="btn btn-secondary" href="" onclick="loadContent('views/ventas/OrdenVenta.php')">Cancelar</button>
                         
                    </div>
                </div>

                <!-- Lista orden Venta -->
                <div class="container mt-4">
                    <b><span class="d-block p-2 col-12 bg-info text-white">Lista orden Venta</span></b>
<br>
                    <!-- <div class="row mt-3"> -->
                    <div class="row">
                <div class="col-md-9">
                    <div class="table-responsive">
                    <table class="table border=1">
                                    <thead>
                                        <tr>
                                            <th>Cliente</th>
                                            <th>Orden</th>
                                            <th>Fecha Emisión</th>
                                            <th>Tipo Pago</th>
                                            <th>Importe</th>
                                            <th>Moneda</th>
                                            <th>Vendedor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>A01</td>
                                            <td>Bolsa de Plastico Rey</td>
                                            <td>F</td>
                                            <td>Bolsas</td>
                                            <td>Alfa</td>
                                            <td>0.0</td>
                                            <td>0.0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </header>
</body>
