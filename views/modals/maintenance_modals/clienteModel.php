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
                <h5 style="background: black; color: white; text-align:center;" class="titulo">MANTENIMIENTO DE CLIENTE</h5>
                <hr style="margin-top: -3px;">



                <b>
                    <!-- <h6>Datos del Cliente</h6> -->
                    <h5 style="background: teal; color: white; text-align:left;" class="titulo">DATOS DEL CLIENTE</h5>
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
                    <div class="col-md-12">
                        <label for="ruc" class="col-form-label">RUC</label>
                        <input type="text" id="ruc" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-12">
                        <!-- Botón para activar el primer modal -->
                        <button type="button" class="btn btn-success col-md-12" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="margin-top:5px">
                            Verificar RUC
                        </button>

                        <!-- Primer Modal -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <hr>

                                    <div class="container">
                                        <label style="color: purple;">SUNAT (Superintendencia Nacional de Aduanas y de Administración Tributaria)</label>
                                        <div class="col-md-6">
                                            <label for="" class="form-label" style="margin-top: 5px;">Ingrese RUC a consultar</label>
                                            <input type="text" autocomplete="off" id="ruc" name="ruc" class="form-control" placeholder="">
                                            <br>
                                            <button id="pruebaruc" class="btn btn-primary">Consultar Información</button>
                                            <br><br>

                                            <h6 style="background: teal; color: white; text-align: center; height: 30px; line-height: 30px;" class="titulo" id="titulo">DETALLE DE LA INFORMACIÓN</h6>
                                            <hr>
                                            <div>RUC: <label id="rucNumero"> </label></div>
                                            <div>Nombre o Razón social: <label id="razonsocial"> </label></div>
                                            <div> Estado: <label id="estado"> </label> </div>
                                            <div> Dirección: <label id="direccion"> </label> </div>
                                            <div> Departamento: <label id="departamento"> </label> </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for="dni" class="col-form-label">DNI</label>
                        <input type="text" id="dni" class="form-control" aria-describedby="passwordHelpInline" disabled>

                        <div class="col-md-12">

                            <!-- Botón para activar el segundo modal -->
                            <button type="button" class="btn btn-success col-md-12" style="margin-top:5px" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                Verificar DNI
                            </button>
                            <a href="./views/modals/dni.php" type="button" class="btn btn-primary col-md-12"  style="margin-top:5px">Verificar Datos
                            </a>
                            
                        </div>
                        <!-- Segundo Modal -->
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <hr>

                                    <div class="container">
                                        <!-- <a name="" id="" class="btn btn-success" href="#" role="button" disabled>Consulta RUC</a> -->
                                        <label style="color: purple;">RENIEC (Registro Nacional de Identificación y Estado Civil)</label>

                                        <br>
                                        <div class="col-md-8">
                                            <label for="" class="form-label" style="margin-top: 5px;">Ingrese DNI a consultar</label>
                                            <input type="text" id="dni" autocomplete="off" name="dni" class="form-control">
                                            <br>
                                            
                                            <a name="" id="" class="btn btn-primary"href="dni.php"role="button">Consultar Información</a>
                                            


                                            <br>
                                            <br>

                                            <h6 style="background: teal; color: white; text-align: center; height: 30px; line-height: 30px;" class="titulo" id="titulo">DETALLE DE LA INFORMACIÓN</h6>
                                            <hr>
                                            <div>Nombres:<label id="nombre"> </label></div>
                                            <div>Apellido Paterno:<label id="apellidop"> </label></div>
                                            <div>Apellido Materno:<label id="apellidom"> </label></div>


                                        </div>

                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>


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

                        <!-- <h6>LISTADO DE CLIENTES</h6> -->
                        <h5 style="background: teal; color: white; text-align:left;" class="titulo">LISTADO DE CLIENTES</h5>
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