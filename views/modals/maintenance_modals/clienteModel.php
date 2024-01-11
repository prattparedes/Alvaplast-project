<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Mantenimiento de Clientes</title>
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
    <!-- Bootstrap CSS v5.3.2 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->
</head>

<body>
    <header>
        <div class="container">
            <h1>Mantenimiento de Clientes </h1>
            <form>
                <b><span class="d-block p-1 col-8 bg-info text-white">Datos del Cliente</span></b>
                <div class="row">
                    <div class="col-md-2">
                        <label for="inputCodigo" class="col-form-label">Codigo</label>
                        <fieldset disabled>
                            <input type="text" id="inputCodigo" class="form-control" aria-describedby="passwordHelpInline">
                        </fieldset>
                    </div>
                    <div class="col-md-2">
                        
                    </div>

                    <div class="col-md-6">
                    <br>
                        <button type="button" class="btn btn-secondary">Nuevo</button>
                        <button type="button" class="btn btn-primary">Grabar</button>
                        <button type="button" class="btn btn-success">Modificar</button>
                        <button type="button" class="btn btn-danger">Eliminar</button>
                    </div>





                    <div class="col-md-4">
                        <label for="inputRazonSocial" class="col-form-label">Razon Social</label>
                        <input type="text" id="inputRazonSocial" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                    </div>
                    <div class="col-md-2">
                        <label for="selectTipoCliente" class="form-label">Tipo de Cliente</label>
                        <select id="selectTipoCliente" class="form-select">
                            <option>Elejir una opción</option>
                            <option>Ica</option>
                        </select>
                    </div>
                

                <div class="row">
                    <div class="col-md-2">
                        <label for="inputRuc" class="col-form-label">RUC</label>
                        <input type="text" id="inputRuc" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                

                <div class="col-md-2">
                    <label for="inputDni" class="col-form-label">DNI</label>
                    <input type="text" id="inputDni" class="form-control" aria-describedby="passwordHelpInline">
                </div>


                <!-- <div class="row"> -->
                <div class="col-md-4">
                    <label for="inputDireccion" class="col-form-label">Direccion</label>
                    <input type="text" id="inputDireccion" class="form-control" aria-describedby="passwordHelpInline">
                </div>
                </div>

                <div class="row">
                <div class="col-md-2">
                    <label for="selectDepartamento" class="form-label">Departamento</label>
                    <select id="selectDepartamento" class="form-select">
                        <option>Elejir una opción</option>
                        <option>Ica</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="selectProvincia" class="form-label">Provincia</label>
                    <select id="selectProvincia" class="form-select">
                        <option>Elejir una opción</option>
                        <option>Ica</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="selectDistrito" class="form-label">Distrito</label>
                    <select id="selectDistrito" class="form-select">
                        <option>Elejir una opción</option>
                        <option>Ica</option>
                    </select>
                </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label for="inputTelefono" class="col-form-label">Telefono</label>
                        <input type="text" id="inputTelefono" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-2">
                        <label for="inputCelular" class="col-form-label">Celular</label>
                        <input type="text" id="inputCelular" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label for="selectEstado" class="form-label">Estado</label>
                        <select id="selectEstado" class="form-select">
                            <option>Habilitado</option>
                            <option>Cañete</option>
                        </select>
                    </div>
                </div>

               
                <!-- <button type="button" class="btn btn-secondary">Nuevo</button>
                <button type="button" class="btn btn-primary">Grabar</button>
                <button type="button" class="btn btn-success">Modificar</button>
                <button type="button" class="btn btn-danger">Eliminar</button> -->
            </form>
        </div>

        <br><br>

        <div class="container">
            <h1>Busquedad de cliente</h1>
            <div class="row">
                <div class="col-auto">
                    <div class="table-responsive">
                        <table class="tbl_venta">
                            <thead>
                                <tr>
                                    <th scope="col-md-1">Codigo</th>
                                    <th scope="col-md-1">Razón Social</th>
                                    <th scope="col-md-1">RUC</th>
                                    <th scope="col-md-1">DNI</th>
                                    <th scope="col-md-1">Direccion</th>
                                    <th scope="col-md-1">Telefono</th>
                                    <th scope="col-md-1">Celular</th>
                                    <th scope="col-md-1">Distrito</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td scope="row">R1C1</td>
                                    <td>AlvaPlastic</td>
                                    <td>2030405060</td>
                                    <td>16775473</td>
                                    <td>Los Olivos 250</td>
                                    <td>960113254</td>
                                    <td>98554545</td>
                                    <td>alva@seguimos.com</td>
                                </tr>
                                <tr>
                                    <td scope="row">R1C2</td>
                                    <td>OtroCliente</td>
                                    <td>1234567890</td>
                                    <td>98765432</td>
                                    <td>Avenida Principal 123</td>
                                    <td>987654321</td>
                                    <td>correo@otrocliente.com</td>
                                    <td>Ciudad</td>
                                </tr>
                                <!-- Puedes agregar más filas según sea necesario -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Bootstrap JavaScript Libraries -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
</body>

</html>