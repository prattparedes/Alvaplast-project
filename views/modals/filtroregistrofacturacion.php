<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
 
    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->

</head>

<body>
    <header>
        <!-- place navbar here -->

        <div class="container">
            <h3>REGISTRO FACTURACIÓN</h3>

            <form>

                <b> <span class="d-block p-2 col-12 bg-info text-white">Filtro de registro</span></b>

                <div class="row">
                   

                    <div class="col-3">
                        <label for="inputPassword6" class="col-form-label">Inicio:</label>
                        <input type="date" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                

            
                   
                    <div class="col-3">
                        <label for="inputPassword6" class="col-form-label">Fin:</label>
                        
                            <input type="date" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>


                    <div class="col-4">
                       <br><br>
                        <a name="" id="" class="btn btn-success" href="#" role="button">Limpiar</a>
                        <a name="" id="" class="btn btn-danger" href="#" onclick="loadContent('views/facturacion.php')" role="button">Cancelar</a>

                    </div>
                    </div>
                    <div class="col-6">
                        <label for="inputPassword6" class="col-form-label"><div></div></label>
                        <select id="disabledSelect" class="form-select">
                            <option>NO DEFINIDO</option>
                            <option>San Juan de Lurigancho</option>
                        </select>
                    </div>

                   

                    <div class="col-1">
                        <div></div>
                    </div>
                    </div>
<br>

                    <!-- <div class="col-2">
                    <label for="inputPassword6" class="col-form-label">Hasta:</label>
                    <input type="date" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                </div> -->

                   


                </div>
        </div>
        <br>
        <!-- Tabla 01 -->
        <div class="container">
            <b> <span class="d-block p-2 col-12 bg-info text-white">Detalles de Venta</span></b>
            <br>

            <div class="row">

                <div class="col-12">
                    <div class="table-responsive">
                    <table class="table border=1">
                            <thead>
                                <tr>
                                <th scope="col-1">ID</th>
                                    <th scope="col-1">Fecha Emision</th>
                                    <th scope="col-1">Comprobante</th>
                                    <th scope="col-1">Ruc / Dni</th>
                                    <th scope="col-1">Cliente</th>
                                    <th scope="col-1">Importe</th>
                                    <th scope="col-1">Moneda</th>
                                    <th scope="col-1">Tipo de Pago</th>
                                   
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

                                </tr>

                               

                               


                            </tbody>
                        </table>
                    </div>

                </div>


                <!-- Tabla 02 -->
                <!-- <b> <span class="d-block p-2 col-4 bg-info text-white">Detalles de Producto</span></b> -->
                <br>



            </div>
            </form>
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