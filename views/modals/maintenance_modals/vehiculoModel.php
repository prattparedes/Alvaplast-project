</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Vehiculo;
        use Models\maintenance_models\Unidad;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">

                <div class="row">

                    <h5 style="background: grey; color: white; text-align:center;">MANTENIMIENTO DE VEHICULOS</h5>

                    <div class="row">
                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Codigo</label>
                            <fieldset disabled>
                                <input type="number" id="codigo" class="form-control" aria-describedby="passwordHelpInline">
                            </fieldset>
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="placa" class="col-form-label">Placa</label>
                            <input type="text" id="placa" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="tipo" class="form-label">Combustible</label>
                            <select id="tipo" class="form-select">
                                <option value="Gasolina">Gasolina</option>
                                <option value="Petroleo">Petroleo</option>
                            </select>
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="marca" class="form-label">Marca</label>
                            <select id="marca" class="form-select">
                                <option value="Lamborghini">Lamborghini</option>
                                <option value="Dodge">Dodge</option>
                                <option value="Hyundai">Hyundai</option>
                                <option value="Kia">KIA</option>
                                <option value="Ford">Ford</option>
                                <option value="JAC">JAC</option>
                                <option value="FAW">Faw</option>
                                <option value="Honda">Honda</option>
                                <option value="Isuzu">Isuzu</option>
                            </select>
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="modelo" class="col-form-label">Modelo</label>
                            <input type="text" id="modelo" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                    </div>


                    <!-- <div class="col-md-12" style="margin-top: 30px;"> -->

                    <div class="col-md-12">
                        <br>
                        <button style="width: 80px;" id="btnNuevo" class="btn btn-primary" type="button" onclick="botónNuevoMantenimiento()">Nuevo</button>
                        <button style="width: 80px;" id="btnGrabar" class="btn btn-success order__btn--inactive" type="button" onclick="botónGrabarMantenimiento('1')">Grabar</button>
                        <button style="width: 80px;" id="btnEditar" class="btn btn-warning order__btn--inactive" type="button" onclick="botónEditarMantenimiento()">Editar</button>
                        <button style="width: 80px;" id="btnEliminar" class="btn btn-danger order__btn--inactive" type="button" onclick="botónEliminarMantenimiento('2')">Eliminar</button>
                        <!-- <button style="width: 40px;margin-top:1px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">X</button> -->
                        <br><br>
                    </div>
                    <!-- </div> -->
                </div>

                <div class="" id=""></div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">

                        <h6>LISTADO DE VEHICULOS</h6>
                        <hr style="margin-top: -7px;">

                        <br>
                        <div class="table--container">
                            <div class="table-responsive">
                                <table class="tbl_venta" id="vehicletable" style="width: 650px;">
                                    <thead>
                                        <tr>
                                            <th class="textcenter" width="80">ID</th>
                                            <th class="textleft" width="100">Placa</th>
                                            <th scope="col-1">Modelo</th>
                                            <th class="textcenter">Tipo</th>
                                            <th class="textcenter">Marca</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detalle_venta">
                                        <?php

                                        $vehiculos = Vehiculo::getVehiculos();
                                        foreach ($vehiculos as $vehiculo) {
                                        ?>
                                            <tr>
                                                <td><?= $vehiculo->id_vehiculo ?></td>
                                                <td class="textleft"><?= $vehiculo->placa ?></td>
                                                <td class="textleft"><?= $vehiculo->modelo ?></td>
                                                <td><?= $vehiculo->tipo_vehiculo ?></td>
                                                <td><?= $vehiculo->marca_vehiculo ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>