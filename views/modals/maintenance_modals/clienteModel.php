</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');


        use Models\maintenance_models\Ubigeo;
        use Models\maintenance_models\Cliente;


        ?>

        <div class="kardex__movement">
            <div class="kardex__left">
                <h5 style="background: gray; color: white; text-align:center;">MANTENIMIENTO DE CLIENTE</h5>
                <hr style="margin-top: 5px;">



                <b>
                    <h6>Datos del Cliente</h6>
                </b>

                <div class="col-md-5" style="margin-top: -5px;">
                    <label for="Codigo" class="col-form-label">Codigo</label>
                    <fieldset disabled>
                        <input type="number" id="codigo" class="form-control" aria-describedby="passwordHelpInline">
                        <input type="hidden" id="metodo" value="">
                    </fieldset>
                </div>

                <div class="col-md-10">
                    <label for="razonSocial" class="col-form-label">Razon Social</label>
                    <input type="text" id="razonSocial" class="form-control" aria-describedby="passwordHelpInline" disabled>
                </div>

                <div class="col-md-10">
                    <label for="tipoCliente" class="form-label">Tipo de Cliente</label>
                    <select id="tipoCliente" class="form-select" disabled>
                        <option value="J">Juridica</option>
                        <option value="N">Natural</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <label for="ruc" class="col-form-label">RUC</label>
                        <input type="text" id="ruc" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-5">
                        <label for="dni" class="col-form-label">DNI</label>
                        <input type="text" id="dni" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>
                </div>

                <div class="col-md-10">
                    <label for="direccion" class="col-form-label">Direccion</label>
                    <input type="text" id="direccion" class="form-control" aria-describedby="passwordHelpInline" disabled>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <label for="selectDepartamento" class="form-label">Departamento</label>
                        <select id="departamento" class="form-select" onchange="listarProvincia(this.value)" disabled>
                            <option value="0">Seleccionar un departamento</option>
                            <?php
                            $data = Ubigeo::getDepartamentos();
                            foreach ($data as $ubi) {
                            ?>
                                <option value="<?= $ubi->id_ubigeo ?>"><?= $ubi->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="col-md-5">
                        <label for="selectProvincia" class="form-label">Provincia</label>
                        <select id="provincia" class="form-select" onchange="listarDistrito(this.value)" disabled>
                            <option value="0">Seleccionar un Provincia</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-10">
                    <label for="selectDistrito" class="form-label">Distrito</label>
                    <select id="distrito" class="form-select" disabled>
                        <option value="0">Seleccionar un distrito</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <label for="telefono" class="col-form-label">Telefono</label>
                        <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-5">
                        <label for="celular" class="col-form-label">Celular</label>
                        <input type="text" id="celular" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>
                </div>

                <div class="col-md-5">
                    <label for="celular" class="col-form-label">Estado</label>
                    <select id="estado" class="form-select" disabled>
                        <option value="H">Habilitado</option>
                        <option value="D">Deshabilitado</option>
                    </select>
                </div>

                <hr>


                <div class="col-md-12">
                    <a style="width: 80px;" id="btnNuevo" class="btn btn-secondary me-2" href="#" role="button" onclick="botónNuevoMantenimiento()">Nuevo</a>
                    <button style="width: 80px; margin-left:-10px;" id="btnGrabar" type="button" class="btn btn-primary me-2 order__btn--inactive client_submit" onclick="botónGrabarMantenimiento('1')">Grabar</button>
                    <a style="width: 80px; margin-left:-10px;" id="btnEditar" name="" class="btn btn-success me-2 order__btn--inactive" href="#" role="button" onclick="botónEditarMantenimiento()">Editar</a>
                    <a style="width: 80px; margin-left:-10px;" id="btnEliminar" name="" class="btn btn-danger order__btn--inactive client_submit" href="#" role="button" onclick="botónEliminarMantenimiento('2')">Eliminar</a>
                </div>
            </div>


            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:4px">

                        <h6>LISTADO DE CLIENTES</h6>
                        <hr style="margin-top: -7px;">

                        <h6>Buscar por: </h6>

                        <div class="row">
                            <div class="col-md-4" style="margin-top: -7px;">
                                <label for="filtroClienteNombre" class="col-form-label">Razon Social</label>
                                <input type="text" id="filtroClienteNombre" class="form-control" aria-describedby="passwordHelpInline" onkeyup="FiltrarClientesNombre()">
                            </div>

                            <div class="col-md-4">
                                <label for="filtroClienteRuc" class="form-label">RUC</label>
                                <input type="text" id="filtroClienteRuc" class="form-control" aria-describedby="passwordHelpInline" onkeyup="FiltrarClientesNombre()">
                            </div>

                            <div class="col-md-4">
                                <label for="filtroClienteDNI" class="form-label">DNI</label>
                                <input type="text" id="filtroClienteDNI" class="form-control" aria-describedby="passwordHelpInline" onkeyup="FiltrarClientesNombre()">
                            </div>
                        </div>
                        <div><br></div>

                    </div>


                </div>
                <hr>
                <div class="table--container">
                    <table class="tbl_venta" id="clientsTable" style="width: 950px;">
                        <thead>
                            <tr>
                                <th scope="col-md-1">Codigo</th>
                                <th scope="col-md-1">Razón Social</th>
                                <th class="textcenter">RUC</th>
                                <th class="textcenter"> DNI</th>
                                <th class="textcenter" width="420">Direccion</th>
                                <th class="textcenter">Telefono</th>
                                <th class="textcenter">Celular</th>
                                <th class="textcenter">Distrito</th>
                            </tr>
                        </thead>


                        <tbody id="detalle_venta">
                            <?php
                            $data = Cliente::getClientes();
                            foreach ($data as $client) {
                            ?>
                                <tr>
                                    <td><?= $client->id_cliente ?></td>
                                    <td><?= $client->razon_social ?></td>
                                    <td><?= $client->ruc ?></td>
                                    <td class="textcenter"><?= $client->dni ?></td>
                                    <td><?= $client->direccion ?></td>
                                    <td class="textcenter"><?= $client->telefono ?></td>
                                    <td class="textcenter"><?= $client->celular ?></td>
                                    <td class="textcenter" width="300"><?= $client->distrito ?></td>
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