</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');


        use Models\maintenance_models\Linea;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">

                <div class="row">

                    <h5 style="background: black; color: white; text-align:center;" class="titulo">MANTENIMIENTO DE LINEA</h5>

                    <div class="row">
                        <div class="col-md-6" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Codigo</label>
                            <fieldset disabled>
                                <input type="number" id="codigo" class="form-control" aria-describedby="passwordHelpInline">
                                <input type="hidden" id="metodo" value="">
                            </fieldset>
                        </div>

                        <div class="col-md-6" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Descripción</label>
                            <input type="text" id="descripcion" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                    </div>


                    <!-- <div class="col-md-12" style="margin-top: 30px;"> -->

                    <div class="col-md-12">
                        <br>
                        <button style="width: 80px;" id="btnNuevo" class="btn btn-primary" type="button" onclick="botónNuevoMantenimiento()">Nuevo</button>
                        <button style="width: 80px;" id="btnGrabar" class="btn btn-success order__btn--inactive line_submit" type="button" onclick="botónGrabarMantenimiento('1')">Grabar</button>
                        <button style="width: 80px;" id="btnEditar" class="btn btn-warning order__btn--inactive" type="button" onclick="botónEditarMantenimiento()">Editar</button>
                        <button style="width: 80px;" id="btnEliminar" class="btn btn-danger order__btn--inactive line_submit" type="button" onclick="botónEliminarMantenimiento('2')">Eliminar</button>
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

                        <!-- <h6>LISTADO DE LINEA</h6> -->
                        <h5 style="background: teal; color: white; text-align:left;" class="titulo">LISTADO DE LINEA</h5>
                        <hr style="margin-top: -7px;">
                        <p>Buscar por:</p>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Descripción</label>
                            <input type="text" id="filtroLineas" class="form-control" aria-describedby="passwordHelpInline" onkeyup="FiltrarLineasMantenimiento()">
                        </div>
                        <br>
                        <div class="table--container">
                            <div class="table-responsive">
                                <table class="tbl_venta" id="productlinesTable">
                                    <thead>
                                        <tr>
                                            <th class="textcenter" width="120">Codigo</th>
                                            <th class="textleft" width="300">Descripción</th>
                                        </tr>
                                    </thead>

                                    <tbody id="detalle_venta">
                                        <?php
                                        $data = Linea::ListarLineas();
                                        foreach ($data as $linea) {
                                        ?>
                                            <tr>
                                                <td><?= $linea->id_linea ?></td>
                                                <td class="textleft"><?= $linea->descripcion ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>