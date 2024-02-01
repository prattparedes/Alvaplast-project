</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');


        use Models\maintenance_models\Marca;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">

                <div class="row">

                    <h5 style="background: grey; color: white; text-align:center;">MANTENIMIENTO DE LINEA</h5>

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

                    </div>


                    <!-- <div class="col-md-12" style="margin-top: 30px;"> -->

                   <div class="col-md-12">
                            <br>
                            <button style="width: 75px;" class="btn btn-primary" type="button">Nuevo</button>
                            <button style="width: 75px;" class="btn btn-success" type="button">Grabar</button>
                            <button style="width: 75px;" class="btn btn-warning" type="button">Editar</button>
                            <button style="width: 75px;" class="btn btn-danger" type="button">Eliminar</button>
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

                        <h6>LISTADO DE MARCA</h6>
                        <hr style="margin-top: -7px;">
                        <p>Buscar por:</p>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Descripción por CORREGIR</label>
                            <input type="text" id="filtroLineas" class="form-control" aria-describedby="passwordHelpInline" onkeyup="FiltrarLineasMantenimiento()">
                            
                        </div>
<br>
                        <div class="table--container">
                        <div class="table-responsive">
                        <table class="tbl_venta" id="brandsTable" style="width: 550px;">
                                <thead>
                                    <tr>
                                        <th class="textcenter">Codigo</th>
                                        <th scope="col-1">Marca</th>
                                    </tr>
                                </thead>

                                <tbody id="detalle_venta">
                                    <?php
                                    $data = Marca::getMarcas();
                                    foreach ($data as $marca) {
                                    ?>
                                        <tr>
                                            <td class="textcenter"><?= $marca->id_marca ?></td>
                                            <td class="textleft"><?= $marca->descripcion ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>