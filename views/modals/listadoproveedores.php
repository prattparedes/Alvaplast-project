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
        <h3>LISTADO DE PROVEEDORES </h3>
        <form>
        <b> <span class="d-block p-2 col-9 bg-info text-white">Datos de Proveedor</span></b>  
        <br>
            <div class="row">
          
            <b> <span class="">Buscar por:</span></b>  
            <div class="col-4">
                <label for="inputPassword6" class="col-form-label">Proveedor</label>
                
                    <input type="password" id="disabledTextInput" class="form-control" aria-describedby="passwordHelpInline">
            </div>

            <div class="" style="width: 280px;">
                <label for="inputPassword6" class="col-form-label">RUC</label>
                <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
            </div>

          
            </div>   
            <br>
          
        </form>

        <br>
        <a style="width: 150px;" high="50" name="" id="" class="btn btn-success" href="#" role="button">Consultar</a>
        <button style="width: 150px;" class="btn btn-danger" href=""  onclick="loadContent('views/compras/ordencompra.php')" type="button" id="button-addon2">Cancelar</button> 

        <div class="container">
            <h1>Proveedores</h1>
            <b> <span class="d-block p-2 col-9 bg-info text-white">Detalles de Proveedores</span></b>  
            
            <br>
            <div class="row">
                <div class="col-md-9">
                    <div class="table-responsive">
                    <table class="table border=1">
                            <thead>
                                <tr>
                                    <th scope="col-md-1">Codigo</th>
                                    <th scope="col-md-1">Proveedor</th>
                                    <th scope="col-1">Ruc</th>
                                    <th scope="col-1">Direccion</th>
                                    <th scope="col-1">Teléfono</th>
                                    <th scope="col-1">Fax</th>
                                    <th scope="col-1">Email</th>
                                   
                                    
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="">
                                    <td scope="row">R1C1</td>
                                    <td>AlvaPlastic</td>
                                    <td>10167754798</td>
                                    <td>16775473</td>
                                    <td>Jr. Los Olivos 166</td>
                                    <td>919186954</td>
                                    <td>919186954</td>
                                   

                                </tr>
                                <tr class="">
                                    <td scope="row">R1C1</td>
                                    <td>AlvaPlastic</td>
                                    <td>10167754798</td>
                                    <td>16775473</td>
                                    <td>Jr. Los Olivos 166</td>
                                    <td>919186954</td>
                                    <td>919186954</td>
                                   
                                </tr>
                            </tbody>
                        </table>
                        
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