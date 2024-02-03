</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Moneda;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">

                <div class="row">

                    <h5 style="background: grey; color: white; text-align:center;">MANTENIMIENTO DE MONEDA</h5>

                    <div class="row">
                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Codigo</label>
                            <fieldset disabled>
                                <input type="text" id="codigo" class="form-control" aria-describedby="passwordHelpInline">
                            </fieldset>
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Descripción</label>
                            <input type="text" id="descripcion" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Simbolo</label>
                            <input type="text" id="abreviatura" class="form-control" aria-describedby="passwordHelpInline">
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

                        <h6>LISTADO DE MONEDA</h6>
                        <hr style="margin-top: -7px;">

                        <br>
                        <div class="table--container">
                            <div class="table-responsive">
                                <table class="tbl_venta" id="currenciesTable" style="width: 650PX;">
                                    <thead>
                                        <tr>
                                            <th class="textcenter">Codigo</th>
                                            <th class="textleft">Descripción</th>
                                            <th class="textcenter">Simbolo</th>
                                        </tr>
                                    </thead>

                                    <tbody id="detalle_venta">
                                        <?php

                                        $data = Moneda::getMonedas();
                                        foreach ($data as $money) {
                                        ?>
                                            <tr>
                                                <td class="textcenter"><?= $money->id_moneda ?></td>
                                                <td class="textleft"><?= $money->descripcion ?></td>
                                                <td class="textcenter"><?= $money->simbolo ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>