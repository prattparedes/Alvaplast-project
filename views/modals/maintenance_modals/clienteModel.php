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
    <?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/Alvaplast-project/autoload.php");

    use Models\maintenance_models\Ubigeo;
    use Models\maintenance_models\Cliente; ?>
    <header>
        <div class="container">
            <h1>Mantenimiento de Clientes </h1>
            <form>
                <b><span class="d-block p-1 col-8 bg-info text-white">Datos del Cliente</span></b>
                <div class="row">
                    <div class="col-md-2">
                        <label for="inputCodigo" class="col-form-label">Codigo</label>
                        <fieldset disabled>
                            <input type="number" id="codigo" class="form-control" aria-describedby="passwordHelpInline">
                        </fieldset>
                    </div>
                    <div class="col-md-2">

                    </div>

                    <div class="col-md-6">
                        <br>
                        <button type="button" class="btn btn-secondary client_submit">Nuevo</button>
                        <button type="button" class="btn btn-primary client_submit">Grabar</button>
                        <button type="button" class="btn btn-success client_submit">Modificar</button>
                        <button type="button" class="btn btn-danger client_submit">Eliminar</button>
                    </div>





                    <div class="col-md-4">
                        <label for="inputRazonSocial" class="col-form-label">Razon Social</label>
                        <input type="text" id="razonSocial" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="selectTipoCliente" class="form-label">Tipo de Cliente</label>
                    <select id="tipoCliente" class="form-select">
                        <option value="J">Juridica</option>
                        <option value="N">Natural</option>
                    </select>
                </div>


                <div class="row">
                    <div class="col-md-2">
                        <label for="inputRuc" class="col-form-label">RUC</label>
                        <input type="text" id="ruc" class="form-control" aria-describedby="passwordHelpInline">
                    </div>


                    <div class="col-md-2">
                        <label for="inputDni" class="col-form-label">DNI</label>
                        <input type="text" id="dni" class="form-control" aria-describedby="passwordHelpInline">
                    </div>


                    <!-- <div class="row"> -->
                    <div class="col-md-4">
                        <label for="inputDireccion" class="col-form-label">Direccion</label>
                        <input type="text" id="direccion" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label for="selectDepartamento" class="form-label">Departamento</label>
                        <select id="departamento" class="form-select" onchange="listarProvincia(this.value)">
                            <option value="0">Seleccionar un departamento</option>
                            <?php
                            $data = Ubigeo::getDepartamentos();
                            foreach ($data as $ubi) {
                            ?>
                                <option value="<?= $ubi->id_ubigeo ?>"><?= $ubi->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="selectProvincia" class="form-label">Provincia</label>
                        <select id="provincia" class="form-select" onchange="listarDistrito(this.value)">
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="selectDistrito" class="form-label">Distrito</label>
                        <select id="distrito" class="form-select">
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label for="inputTelefono" class="col-form-label">Telefono</label>
                        <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-2">
                        <label for="inputCelular" class="col-form-label">Celular</label>
                        <input type="text" id="celular" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label for="selectEstado" class="form-label">Estado</label>
                        <select id="estado" class="form-select">
                            <option value="H">Habilitado</option>
                            <option value="D">Deshabilitado</option>
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
            <h1>Busqueda de cliente</h1>
            <div class="row">
                <div class="col-auto">
                    <h5>Buscar por </h5>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="disabledSelect" class="form-label">Razon Social</label>
                            <input type="text" id="filtroClienteNombre" class="form-control" aria-describedby="passwordHelpInline" onkeyup="FiltrarClientesNombre()">
                        </div>

                        <div class="col-md-3">
                            <label for="disabledSelect" class="form-label">RUC</label>
                            <input type="text" id="filtroClienteRuc" class="form-control" aria-describedby="passwordHelpInline" onkeyup="FiltrarClientesNombre()">
                        </div>

                        <div class="col-md-3">
                            <label for="disabledSelect" class="form-label">DNI</label>
                            <input type="text" id="filtroClienteDNI" class="form-control" aria-describedby="passwordHelpInline" onkeyup="FiltrarClientesNombre()">
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="tbl_venta" id="clientsTable">
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
                                <?php
                                $data = Cliente::getClientes();
                                foreach ($data as $client) {
                                ?>
                                    <tr>
                                        <td><?= $client->id_cliente ?></td>
                                        <td><?= $client->razon_social ?></td>
                                        <td><?= $client->ruc ?></td>
                                        <td><?= $client->dni ?></td>
                                        <td><?= $client->direccion ?></td>
                                        <td><?= $client->telefono ?></td>
                                        <td><?= $client->celular ?></td>
                                        <td><?= $client->distrito ?></td>
                                        <td style="display:none;"><?= $client->id_ubigeo ?></td>
                                        <td style="display:none;"><?= $client->tipo_cliente ?></td>
                                        <td style="display:none;"><?= $client->estado ?></td>
                                    </tr>
                                <?php } ?>
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