</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/autoload.php');


        use Models\maintenance_models\Marca;
        use Models\maintenance_models\Unidad;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">

                <div class="row">

                    <h5 style="background: black; color: white; text-align:center;" class="titulo">MANTENIMIENTO DE UNIDAD</h5>

                    <div class="row">
                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Codigo</label>
                            <fieldset disabled>
                                <input type="text" id="codigo" class="form-control" aria-describedby="passwordHelpInline">
                                <input type="hidden" id="metodo" value="">
                            </fieldset>
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Abreviatura</label>
                            <input type="text" id="abreviatura" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Descripción</label>
                            <input type="text" id="descripcion" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        </div>

                    </div>


                    <!-- <div class="col-md-12" style="margin-top: 30px;"> -->

                    <div class="col-md-12">
                        <br>
                        <button style="width: 80px;" id="btnNuevo" type="button" class="btn btn-secondary" onclick="botónNuevoMantenimiento()">Nuevo</button>
                        <button style="width: 80px;" id="btnGrabar" type="button" class="btn btn-primary order__btn--inactive unit_submit" onclick="botónGrabarMantenimiento('1')">Grabar</button>
                        <button style="width: 80px;" id="btnEditar" type="button" class="btn btn-success order__btn--inactive" onclick="botónEditarMantenimiento()">Editar</button>
                        <button style="width: 80px;" id="btnEliminar" type="button" class="btn btn-danger order__btn--inactive unit_submit" onclick="botónEliminarMantenimiento('2')">Eliminar</button>
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

                        <!-- <h6>LISTADO DE UNIDAD</h6> -->
                        <h5 style="background: teal; color: white; text-align:left;" class="titulo">LISTADO DE UNIDAD</h5>
                        <hr style="margin-top: -7px;">
                        <p>Buscar por:</p>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="form-label">Buscar por Descripción</label>
                            <input type="text" id="descripcion" class="form-control" aria-describedby="passwordHelpInline" onkeyup="FiltrarLineasMantenimiento()">

                        </div>
                        <br>
                        <div class="table--container">
                            <div class="table-responsive">
                                <table class="tbl_venta" id="unitsTable">
                                    <thead>
                                        <tr>
                                            <th scope="col-md-1">ID</th>
                                            <th scope="col-md-1">Codigo de unidad</th>
                                            <th scope="col-1">Descripción</th>
                                        </tr>
                                    </thead>

                                    <tbody id="detalle_venta">
                                        <?php

                                        $data = Unidad::getUnidades();
                                        foreach ($data as $unit) {
                                        ?>
                                            <tr>
                                                <td><?= $unit->id_unidad ?></td>
                                                <td><?= $unit->abreviatura ?></td>
                                                <td class="textleft" width="200px"><?= $unit->descripcion ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>