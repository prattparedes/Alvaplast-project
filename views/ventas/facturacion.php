
<!-- <!DOCTYPE html> -->
<!-- <html lang="en">

<head>
    <title>Facturación</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
</head>

<body>
    <header>
        <div class="container">
      
            <h3 class="mt-3">FACTURACIÓN</h3>
            <b><span class="d-block p-1 col-md-12 bg-info text-white">Factura</span></b>
            <form>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="disabledSelect" class="form-label">Tipo de Documento</label>
                        <select id="disabledSelect" class="form-select" disabled>
                            <option>NOTA DE COBRANZA -A</option>
                            <option></option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="disabledTextInput" class="form-label">Número</label>
                        <input type="text" id="disabledTextInput" class="form-control" aria-describedby="passwordHelpInline" placeholder="001" disabled>
                    </div>

                    <div class="col-md-2">
                        <label for="disabledTextInput" class="form-label">Serie</label>
                        <input type="text" id="disabledTextInput" class="form-control" aria-describedby="passwordHelpInline" placeholder="0015838" disabled>
                    </div>

                    <div class="col-md-5">
                        <div class="row mt-3">
                            <div class="col-md-10">



                        <a style="width: 100px;" name="" id="" class="btn btn-primary" href="#" role="button">Nuevo</a>
                        <a style="width: 100px;" name="" id="" class="btn btn-success" href="#" role="button">Grabar</a>
                        <a style="width: 100px;" name="" id="" class="btn btn-success" href="#" role="button">Anular</a>
                        <a style="width: 100px;" name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a>
                        <a style="width: 100px;" name="" id="" class="btn btn-warning" href="#" role="button">Modificar</a>
                        <button style="width: 100px;" class="btn btn-secondary me-2" href="#" onclick="loadContent('views/modals/filtroregistrofacturacion.php')" role="button">Buscar</button>
                        <a style="width: 100px;" name="" id="" class="btn btn-warning" href="#" role="button">Imprimir</a>
                        <!-- <button style="width: 100px;" class="btn btn-danger" href="#" onclick="loadContent('views/home.php')" role="button">Salir</button> -->
 


                        


                            </div>
                            
                        </div>
                    </div>
                </div>
                <b><span class="d-block p-1 col-md-12 bg-info text-white">Datos de la venta</span></b>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="inputPassword6" class="form-label">Orden de Venta</label>
                        <div class="input-group">
                            <input type="text" class="form-control" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="loadContent('views/modals/listaordenventa.php')">....</button>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="form-label">Emisión</label>
                        <input type="date" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                    </div>

                    <div class="col-md-2">
                        <label for="flexCheckDefault" class="form-label">Incluye IGV</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Habilitado</label>
                        </div>
                    </div>

                    <
                    <div class="col-md-8">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="inputPassword6" class="form-label">Almacén</label>
                                <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                            </div>

                            <div class="col-md-6">
                                <label for="inputPassword6" class="form-label">Caja</label>
                                <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="inputPassword6" class="form-label">RUC / DNI</label>
                        <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="form-label">.</label>
                        <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-2">
                        <label for="disabledSelect" class="form-label">Moneda</label>
                        <select id="disabledSelect" class="form-select">
                            <option>Soles</option>
                            <option>San Juan de Lurigancho</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="inputPassword6" class="form-label">Cliente</label>
                        <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="form-label">Inicial</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="form-label">Cuotas</label>
                        <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="inputPassword6" class="form-label">Dirección</label>
                        <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="form-label">Financiado</label>
                        <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="form-label">Monto Cuota</label>
                        <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>






                <b><span class="d-block p-1 col-md-8 bg-info text-white">Datos del Vendedor</span></b>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="disabledSelect" class="form-label">Vendedor</label>
                        <select id="disabledSelect" class="form-select">
                            <option>ADMINISTRADOR</option>
                            <option>Extranjera</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="form-label">Marca Unidad</label>
                        <input type="password" id="disabledTextInput" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-2">
                        <label for="disabledSelect" class="form-label">Placa</label>
                        <select id="disabledSelect" class="form-select">
                            <option>ADS845</option>
                            <option>Extranjera</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="inputPassword6" class="form-label">Transportista / RUC</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Habilitado</label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="disabledSelect" class="form-label">Transportista</label>
                        <select id="disabledSelect" class="form-select">
                            <option>Leonel Messi Pascual Lucas</option>
                            <option>Extranjera</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="inputPassword6" class="form-label">Punto de Partida</label>
                        <input type="text" id="disabledTextInput" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="inputPassword6" class="form-label">Chofer / Licencia</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">Habilitado</label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="disabledSelect" class="form-label">Chofer</label>
                        <select id="disabledSelect" class="form-select">
                            <option>Leonel Messi Pascual Lucas</option>
                            <option>Extranjera</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="inputPassword6" class="form-label">Nro Factura / Nro Guía</label>
                        <input type="password" id="disabledTextInput" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <b> <span class="d-block p-2 bg-secondary text-white">Detalles de Producto</span></b>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <a name="" id="" class="btn btn-primary me-2" href="#" role="button">Agregar</a>
                        <a name="" id="" class="btn btn-warning" href="#" role="button">Cancelar</a>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
            <table class="table border=1">
                    <thead>
                        <tr>
                            <th scope="col-1">Producto</th>
                            <th scope="col-1">Cantidad</th>
                            <th scope="col-1">Unidad</th>
                            <th scope="col-1">Precio venta</th>
                            <th scope="col-2">Precio real</th>
                            <th scope="col-2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td scope="row">R1Caaaaaaaaaaaaaa1</td>
                            <td>AlvaPlastic</td>
                            <td>2030405060</td>
                            <td>Los Olivos 250</td>
                            <td>960113254</td>
                            <td>98554545</td>
                        </tr>
                        <tr class="">
                            <td scope="row">R1C1</td>
                            <td>AlvaPlastic</td>
                            <td>2030405060</td>
                            <td>Los Olivos 250</td>
                            <td>960113254</td>
                            <td>98554545</td>
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
