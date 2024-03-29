</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');


        use Models\maintenance_models\TipoDocumento;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">

                <h5 style="background: black; color: white; text-align:center;" class="titulo">MANTENIMIENTO POR DOCUMENTO</h5>
                <hr>

                <div class="row">
                    <b>
                        <h6>Datos de Documentos</h6>
                    </b>
                </div>

                <div class="row">
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
                            <input type="text" id="abreviatura" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Descripción</label>
                            <input type="text" id="descripcion" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                    </div>


                    <!-- <div class="col-md-12" style="margin-top: 30px;"> -->

                    <div class="col-md-12">
                        <br>
                        <button style="width: 80px;" id="btnNuevo" type="button" class="btn btn-secondary" onclick="botónNuevoMantenimiento()">Nuevo</button>
                        <button style="width: 80px;" id="btnGrabar" type="button" class="btn btn-primary order__btn--inactive document_submit" onclick="botónGrabarMantenimiento('1')">Grabar</button>
                        <button style="width: 80px;" id="btnEditar" type="button" class="btn btn-success order__btn--inactive" onclick="botónEditarMantenimiento()">Editar</button>
                        <button style="width: 80px;" id="btnEliminar" type="button" class="btn btn-danger order__btn--inactive document_submit" onclick="botónEliminarMantenimiento('2')">Eliminar</button>
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

                        <!-- <h6>LISTADO POR TIPO DE DOCUMENTO</h6> -->
                        <h5 style="background: teal; color: white; text-align:left;" class="titulo">LISTADO POR TIPO DE DOCUMENTO</h5>
                        <hr style="margin-top: -7px;">
                        <p>Buscar por:</p>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="form-label">Buscar por Descripción</label>
                            <input type="text" id="descripcion" class="form-control" aria-describedby="passwordHelpInline" onkeyup="">

                        </div>
                        <br>
                        <div class="table--container">
                            <div class="table-responsive">
                                <table class="tbl_venta" id="documentsTable" style="width:500px;">
                                    <thead>
                                        <tr>
                                            <th class="textcenter" width="120">Codigo</th>
                                            <th class="textcenter" width="120">Abreviatura</th>
                                            <th class="textcenter" width="120">Descripción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detalle_venta">
                                        <?php
                                        $documento = TipoDocumento::getDocumentos();
                                        foreach ($documento as $doc) {
                                        ?>
                                            <tr>
                                                <td class="textcenter" width="120"><?= $doc->id_tipodocumento ?></td>
                                                <td class="textcenter" width="220"><?= $doc->abreviatura ?></td>
                                                <td class="textleft" width="320"><?= $doc->descripcion ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>