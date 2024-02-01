</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');


        use Models\maintenance_models\Personal;


        ?>

        <div class="kardex__movement">
            <div class="kardex__left">
                <h5 style="background: black; color: white; text-align:center;">MANTENIMIENTO DE PERSONAL</h5>

                <div class="row">
                    <div class="col-md-4">
                        <label for="number" class="col-form-label">Codigo</label>
                        <fieldset disabled>
                            <input type="number" id="codigo" class="form-control" aria-describedby="passwordHelpInline"disabled>
                        </fieldset>
                    </div>
                </div>
                <hr>
                <!--Buttoms  -->
                <!-- <span style="margin-top: -5px;" class="d-block p-1 col-md-12 bg-danger text-white">Datos del Proveedor</span> -->


                <div class="row">
                    <b>
                        <h6>Datos del Cliente</h6>
                    </b>

                    <div class="col-md-10">
                        <label for="inputPassword6" class="col-form-label">Nombre</label>
                        <input type="text" id="nombres" class="form-control" aria-describedby="passwordHelpInline"disabled>
                    </div>
                </div>


                <div class="col-md-10">
                    <label for="inputPassword6" class="col-form-label">Apellido Paterno</label>
                    <input type="text" id="paterno" class="form-control" aria-describedby="passwordHelpInline"disabled>
                </div>

                <div class="col-md-10">
                    <label for="inputPassword6" class="col-form-label">Apellido Materno</label>
                    <input type="text" id="materno" class="form-control" aria-describedby="passwordHelpInline"disabled>
                </div>


                <div class="row">
                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">DNI</label>
                        <input type="text" id="dni" class="form-control" aria-describedby="passwordHelpInline"disabled>
                    </div>

                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">Cargo</label>
                        <select name="" id="cargo" class="form-select"disabled>
                            <option value="" default>Elija una opción</option>
                            <option value="A">Administrador</option>
                            <option value="V">Vendedor</option>
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-10">
                        <label for="inputPassword6" class="col-form-label">Direccion</label>
                        <input type="text" id="direccion" class="form-control" aria-describedby="passwordHelpInline"disabled>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">Telefono</label>
                        <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline"disabled>
                    </div>

                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">Celular</label>
                        <input type="text" id="celular" class="form-control" aria-describedby="passwordHelpInline"disabled>
                    </div>
                </div>

                <div class="col-md-2">
                    <label for="inputPassword6" class="col-form-label">Estado</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="estado"disabled>
                        <label class="form-check-label" for="estado">Habilitado</label>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">Usuario</label>
                        <input type="text" id="usuario" class="form-control" aria-describedby="passwordHelpInline"disabled>
                    </div>

                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">Contraseña</label>
                        <input type="text" id="clave" class="form-control" aria-describedby="passwordHelpInline"disabled>
                    </div>
                </div>

                <div class="col-md-10" style="margin-top:5px">
                    <label for="inputPassword6" class="col-form-label">Repetir contraseña</label>
                    <input type="text" id="clave2" class="form-control" aria-describedby="passwordHelpInline"disabled>
                </div>
                <br>
                <button style="width: 180px; height:35px" type="button" class="btn btn-secondary" onclick="cargarPermisosPersonal()"><i class="bi bi-person-vcard"></i><span>Permisos de Almacén</span></button>
                  
                <br>
                <div class="col-md-12">
                    <a name="" id="" class="btn btn-primary provider_submits" href="#" role="button">Nuevo</a>
                    <a name="" id="" class="btn btn-success provider_submits" href="#" role="button">Grabar</a>
                    <!-- <button type="button" class="btn btn-success me-2 provider_submit">Grabar</button> -->
                    <a name="" id="" class="btn btn-info  provider_submits" href="#" role="button">Modificar</a>
                    <a name="" id="" class="btn btn-danger provider_submits" href="#" role="button">Eliminar</a>
                </div>
                <hr>
               
            </div>

            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:4px">

                        <b>
                            <h6>LISTADO DE PERSONAL</h6>
                        </b>
<hr>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="inputPassword6" class="col-form-label">Apellido Paterno</label>
                                <input type="text" id="paterno" class="form-control" aria-describedby="passwordHelpInline">
                            </div>

                            <div class="col-md-4">
                                <label for="inputPassword6" class="col-form-label">Apellido Materno</label>
                                <input type="text" id="materno" class="form-control" aria-describedby="passwordHelpInline">
                            </div>

                            <div class="col-md-4">
                                <label for="inputPassword6" class="col-form-label">Dni</label>
                                <input type="text" id="materno" class="form-control" aria-describedby="passwordHelpInline">
                            </div>
                        </div>

                        <div><br></div>
                    <hr>
                <div class="table--container">
                <table class="tbl_venta" style="width:760px;">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombres</th>
                                        <th class="textleft" width="380px">Ap. Paterno</th>
                                        <th class="textleft" width="380px">Ap. Materno</th>
                                        <th>Dni</th>
                                        <th>Direccion</th>
                                        <th>Teléfono</th>
                                        <th>Cargo</th>
                                    </tr>
                                </thead>
                                <tbody id="detalle_venta">
                                    <?php
                                    $data = Personal::getPersonal();
                                    foreach ($data as $pers) {
                                    ?>
                                        <tr onclick="llenarFormularioStaff(this)">
                                            <td><?= $pers->id_personal ?></td>
                                            <td class="textleft"><?= $pers->nombres ?></td>
                                            <td class="textleft"><?= $pers->ap_paterno ?></td>
                                            <td class="textleft"><?= $pers->ap_materno ?></td>
                                            <td><?= $pers->dni ?></td>
                                            <td><?= $pers->direccion ?></td>
                                            <td><?= $pers->telefono ?></td>
                                            <td><?= $pers->cargo ?></td>
                                            <td style="display:none;"><?= $pers->estado ?></td>
                                            <td style="display:none;"><?= $pers->usuario ?></td>
                                            <td style="display:none;"><?= $pers->clave ?></td>
                                            <td style="display:none;"><?= $pers->celular ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                </div>
            </div>
        </div>