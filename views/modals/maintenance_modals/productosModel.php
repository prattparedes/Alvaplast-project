<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mantenimiento de Productos-P</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.3.2 -->
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" /> -->
</head>

<body>
    <header>
        <div class="container">
            <h3>Mantenimiento de Productos-P</h3>
            <form>
                <b><span class="d-block p-1 col-9 bg-info text-white">Datos de los Productos</span></b>
                <div class="row">
                    <div class="col-sm-12 col-md-2">
                        <label for="inputCodigo" class="col-form-label">Codigo</label>
                        <fieldset disabled>
                            <input type="text" id="inputCodigo" class="form-control" aria-describedby="passwordHelpInline">
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <label for="selectProcedencia" class="form-label">Procedencia</label>
                        <select id="selectProcedencia" class="form-select">
                            <option>Nacional</option>
                            <option>Extranjera</option>
                        </select>
                    </div>

                    <div class="col-sm-12 col-md-3">
                        <label for="inputEstado" class="col-form-label">Estado</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Habilitado
                            </label>
                        </div>
                    </div>
                

                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <label for="inputNombre" class="col-form-label">Nombre</label>
                        <input type="text" id="inputNombre" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">Descripción</label>
                        <textarea style="height:50px;" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-2">
                        <label for="selectMarca" class="form-label">Marca</label>
                        <select id="selectMarca" class="form-select">
                            <option>Realcito</option>
                            <option>Cañete</option>
                        </select>
                    </div>

                    <div class="col-sm-12 col-md-2">
                        <label for="selectUnidad" class="form-label">Unidad</label>
                        <select id="selectUnidad" class="form-select">
                            <option>CJ</option>
                            <option>San Juan de Lurigancho</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-2">
                        <label for="selectLinea" class="form-label">Linea</label>
                        <select id="selectLinea" class="form-select">
                            <option>Royos</option>
                            <option>San Juan de Lurigancho</option>
                        </select>
                    </div>

                    <div class="col-sm-12 col-md-2">
                        <label for="inputVolumen" class="col-form-label">Volumen</label>
                        <input type="text" id="inputVolumen" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="row">
                    <div class="" style="width: 150px;">
                        <label for="inputCompra" class="col-form-label">P. Compra</label>
                        <input type="text" id="inputCompra" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="" style="width: 150px;">
                        <label for="selectMoneda" class="form-label">Moneda</label>
                        <select id="selectMoneda" class="form-select">
                            <option>Soles</option>
                            <option>Dolares</option>
                        </select>
                    </div>

                    <div class=""style="width: 145px;">
                        <label for="inputStockMin" class="col-form-label">Stock Min</label>
                        <input type="password" id="inputStockMin" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="row">
                    <div class=""style="width: 145px;">
                        <label for="inputVenta" class="col-form-label">P. Venta</label>
                        <input type="password" id="inputVenta" class="form-control" aria-describedby="passwordHelpInline"
                            placeholder="980.50">
                    </div>

                    <div class=""style="width: 153px;">
                        <div></div>
                    </div>

                    <div class=""style="width: 145px;">
                        <label for="inputStockMax" class="col-form-label">Stock Max</label>
                        <input type="password" id="inputStockMax" class="form-control" aria-describedby="passwordHelpInline"
                            placeholder="25">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <label for="formFile" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>

                <br>

                <a name="" id="" class="btn btn-secondary" href="#" role="button">Nuevo</a>
                <button type="button" class="btn btn-primary">Grabar</button>
                <a name="" id="" class="btn btn-success" href="#" role="button">Modificar</a>
                <a name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a>

            </form>

            <br><br>
        </div>

        <div class="container">
            <h1>Listado de Productos</h1>
            <div class="row">
                <h5>Datos registrados</h5>
                <br><br>

                
                    <div class="table-responsive">
                        <table class="table border=1">
                            <thead>
                                <tr>
                                    <th width="120">Codigo</th>
                                    <th class="textcenter" width="350">Producto</th>
                                    <th class="textcenter" width="130">P. Venta</th>
                                    <th class="textcenter" width="130">P. Compra</th>
                                    <th class="textcenter" width="50">Moneda</th>
                                    <th class="textcenter" width="120">Marca</th>
                                    <th class="textcenter" width="70">Unidad</th>
                                    <th class="textcenter" width="120">Volumen</th>

                                    <th class="textcenter" width="120">Stock Min</th>
                                    <th class="textcenter" width="120">Stock Max</th>
                                    <th class="textcenter" width="120">Stock</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>R1C1</td>
                                    <td class="textcenter">Charola redonda Nº30 San Gabriel</td>
                                    <td class="textcenter">500.00</td>
                                    <td class="textcenter">1500.00</td>
                                    <td class="textcenter">S/.</td>
                                    <td class="textcenter">Alfa</td>
                                    <td class="textcenter">F</td>
                                    <td class="textcenter">10.00</td>

                                    <td class="textcenter">10.00</td>
                                    <td class="textcenter">5.00</td>
                                    <td class="textcenter">12.00</td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Bootstrap JavaScript Libraries -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script> -->
</body>

</html>
