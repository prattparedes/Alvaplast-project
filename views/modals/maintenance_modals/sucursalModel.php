</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Moneda;
        use Models\maintenance_models\Sucursal;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">

                <div class="row">

                    <h5 style="background: grey; color: white; text-align:center;">MANTENIMIENTO DE SUCURSAL</h5>

                    <div class="row">
                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Codigo</label>
                            <fieldset disabled>
                                <input type="number" id="codigo" class="form-control" aria-describedby="passwordHelpInline">
                            </fieldset>
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Descripción</label>
                            <input type="text" id="descripcion" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Direccion</label>
                            <input type="text" id="direccion" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Telefono</label>
                            <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline">
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

                        <h6>LISTADO DE SUCURSAL</h6>
                        <hr style="margin-top: -7px;">

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Descripción</label>
                            <input type="text" id="descripcion" class="form-control" aria-describedby="passwordHelpInline">
                        </div>


                        <br>
                        <div class="table--container">
                            <div class="table-responsive">
                                <table class="tbl_venta" id="branchstable" style="width: 550px;">
                                    <thead>
                                        <tr>
                                            <th scope="col-md-1">Codigo</th>
                                            <th scope="col-md-1">Descripción</th>
                                            <th scope="col-1">Direccion</th>
                                            <th scope="col-1">Telefono</th>
                                        </tr>
                                    </thead>

                                    <tbody id="detalle_venta">
                                        <?php
                                        $sucursales = Sucursal::getSucursales();
                                        foreach ($sucursales as $sucursal) {
                                        ?>
                                            <tr>
                                                <td class="textcenter" width="120"><?= $sucursal->id_sucursal ?></td>
                                                <td class="textleft" width="320"><?= $sucursal->descripcion ?></td>
                                                <td class="textleft" width="320"><?= $sucursal->direccion ?></td>
                                                <td><?= $sucursal->telefono ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>