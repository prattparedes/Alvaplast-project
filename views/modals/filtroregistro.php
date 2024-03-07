<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    
    <!-- Bootstrap CSS v5.2.1 -->
    
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->

</head>

<body>
    <header>
        <!-- place navbar here -->

        <div class="container">
            <h1>REGISTRO</h1>

            <form>

                <b> <span class="d-block p-2 col-12 bg-info text-white">Filtro de Registro </span></b>

                <div class="row">
                    <div class="col-3">
                        <label for="inputPassword6" class="col-form-label">Fecha de Inicio:</label>
                        <input type="date" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-3">
                        <label for="inputPassword6" class="col-form-label">Fecha de Fin:</label>
                        <input type="date" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-1">
                        <div></div>
                    </div>

                </div>
                    <div class="">
                   <br>
                        <a style="width: 280px;" name="" id="" class="btn btn-primary" href="#" role="button">Consultar</a>
                        <a style="width: 280px;" high="50" name="" id="" class="btn btn-success" href="#" onclick="loadContent('views/facturacion.php')" role="button">Cancelar</a>
                        

                    </div>   
                </div>

                <div class="row">
                   

                    <div class="col-2">
                        <div></div>
                    </div>


                </div>
        </div>
        <br>
        <!-- Tabla 01 -->
        <div class="container">
            <b> <span class="d-block p-2 col-12 bg-info text-white">Detalles de Producto</span></b>
           


             <div class="col-4">
                        <label for="inputPassword6" class="col-form-label"></label>
                        
                            <select id="disabledSelect" class="form-select">
                                <option></option>
                                <option></option>
                            </select>
                    </div> 
<br>

            <div class="row">

                <div class="col-12">
                    <div class="table-responsive">
                    <table class="table border=1">
                            <thead>
                                <tr>
                                <th scope="col-1">ID</th>
                                    <th scope="col-1">Producto</th>
                                    <th scope="col-1">Unidad</th>
                                    <th scope="col-1">Linea</th>
                                    <th scope="col-1">Marca</th>
                                    <th scope="col-1">Stock</th>
                                   
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