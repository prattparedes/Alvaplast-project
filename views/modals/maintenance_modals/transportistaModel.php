</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Transportistas;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">
                <h5 style="background: gray; color: white; text-align:center;">MANTENIMIENTO DE TRASPORTISTA</h5>
                <hr>

                <div class="row">
                    <b>
                        <h6>Datos de Transportista</h6>
                    </b>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <label for="number" class="col-form-label">Codigo</label>
                        <fieldset disabled>
                            <input type="number" id="codigo" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </fieldset>
                    </div>
                </div>





                <div class="col-md-10">
                    <label for="nombres" class="col-form-label">Nombre</label>
                    <input type="text" id="nombres" class="form-control" aria-describedby="passwordHelpInline"disabled>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">Apellido Paterno</label>
                        <input type="text" id="paterno" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">Apellido Materno</label>
                        <input type="text" id="materno" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>
                </div>

                <div class="col-md-10">
                    <label for="ruc" class="col-form-label">RUC</label>
                    <input type="text" id="ruc" class="form-control" aria-describedby="passwordHelpInline"disabled>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">DNI</label>
                        <input type="text" id="dni" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>

                    <div class="col-md-5">
                        <label for="licencia" class="col-form-label">Licencia Nro.</label>
                        <input type="text" id="licencia" class="form-control" aria-describedby="passwordHelpInline"disabled>
                    </div>

                    <div class="col-md-10">
                        <label for="inputPassword6" class="col-form-label">Dirección</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline"disabled>
                    </div>

                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">Telefono</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline"disabled>
                    </div>

                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">Celular</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline"disabled>
                    </div>

                </div>

                <br>
                <div class="col-md-12">
                    <a name="" id="" class="btn btn-primary provider_submits" href="#" role="button">Nuevo</a>
                    <a name="" id="" class="btn btn-success provider_submits" href="#" role="button">Grabar</a>
                    <!-- <button type="button" class="btn btn-success me-2 provider_submit">Grabar</button> -->
                    <a name="" id="" class="btn btn-warning  provider_submits" href="#" role="button">Modificar</a>
                    <a name="" id="" class="btn btn-danger provider_submits" href="#" role="button">Eliminar</a>
                </div>
                <hr>

            </div>

            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:4px">

                        <b>
                            <h6>LISTADO DE TRASPORTISTAS</h6>
                        </b>
                        <hr>

                        <div class="table--container">
                            <table class="tbl_venta" id="carrierstable">
                                <thead>
                                    <tr>
                                        <th scope="col-md-1">ID</th>
                                        <th scope="col-1">Nombres</th>
                                        <th class="textcenter" width="180">A_Paterno</th>
                                        <th class="textcenter" width="180">A_Materno</th>
                                        <th scope="col-1">DNI</th>
                                        <th scope="col-1">RUC</th>
                                        <th scope="col-1">Nro. Licencia</th>
                                        <th scope="col-1">Dirección</th>
                                        <th scope="col-1">Telefono</th>
                                        <th scope="col-1">Celular</th>
                                    </tr>
                                </thead>
                                <tbody id="detalle_venta">
                                    <?php
                                    $transportista = Transportistas::getTransportistas();
                                    foreach ($transportista as $trans) {
                                    ?>
                                        <tr>
                                            <td><?= $trans->id_transportista ?></td>
                                            <td><?= $trans->nombres ?></td>
                                            <td><?= $trans->ap_paterno ?></td>
                                            <td><?= $trans->ap_materno ?></td>
                                            <td><?= $trans->dni ?></td>
                                            <td><?= $trans->ruc ?></td>
                                            <td><?= $trans->licencia ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>