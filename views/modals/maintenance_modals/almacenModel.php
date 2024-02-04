</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Almacen;
        use Models\maintenance_models\Sucursal;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">

                <div class="row">

                    <h5 style="background: grey; color: white; text-align:center;">MANTENIMIENTO DE ALMACEN</h5>

                    <div class="row">
                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Codigo</label>
                            <fieldset disabled>
                                <input type="number" id="codigo" class="form-control" aria-describedby="passwordHelpInline">
                                <input type="hidden" id="metodo" value="">
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Sucursal</label>
                            <select id="sucursal" class="form-select">
                                <?php $sucursales = Sucursal::getSucursales();
                                foreach ($sucursales as $sucursal) { ?>
                                    <option value="<?= $sucursal->id_sucursal ?>"><?= $sucursal->descripcion ?></opt ion>
                                    <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Descripcion</label>
                            <input type="text" id="descripcion" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Código de Facturación</label>
                            <input type="number" id="facturacion" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                    </div>


                    <!-- <div class="col-md-12" style="margin-top: 30px;"> -->

                    <div class="col-md-12">
                        <br>
                        <button style="width: 80px;" id="btnNuevo" type="button" class="btn btn-secondary" onclick="botónNuevoMantenimiento()">Nuevo</button>
                        <button style="width: 80px;" id="btnGrabar" type="button" class="btn btn-primary order__btn--inactive store_submit" onclick="botónGrabarMantenimiento('1')">Grabar</button>
                        <button style="width: 80px;" id="btnEditar" type="button" class="btn btn-success order__btn--inactive" onclick="botónEditarMantenimiento()">Editar</button>
                        <button style="width: 80px;" id="btnEliminar" type="button" class="btn btn-danger order__btn--inactive store_submit " onclick="botónEliminarMantenimiento('2')">Eliminar</button>
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

                        <h6>LISTADO DE ALMACEN</h6>
                        <hr style="margin-top: -7px;">

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Almacen</label>
                            <input type="text" id="almacen" class="form-control" aria-describedby="passwordHelpInline">
                        </div>


                        <br>
                        <div class="table--container">
                            <div class="table-responsive">
                                <table class="tbl_venta" id="storestable" style="width: 600PX;">
                                    <thead>
                                        <tr>
                                            <th scope="col-md-1">Código</th>
                                            <th scope="col-md-4">Sucursal</th>
                                            <th scope="col-md-4">Almacén</th>
                                        </tr>
                                    </thead>

                                    <tbody id="detalle_venta">
                                        <?php

                                        $almacen = Almacen::getAlmacenes();
                                        foreach ($almacen as $alm) {
                                        ?>
                                            <tr>
                                                <td><?= $alm->id_almacen ?></td>
                                                <td><?= $alm->sucursal ?></td>
                                                <td><?= $alm->descripcion ?></td>
                                                <td style="display: none;"><?= $alm->id_sucursal ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>