</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');


        use Models\maintenance_models\TipoCambio;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">

                <h6 style="background: black; color: white; text-align:center;" class="titulo">MANTENIMIENTO POR TIPO DE CAMBIO</h6>
                <hr>

                <div class="row">
                    <b>
                        <!-- <h6>Datos de Cambio de Moneda</h6> -->
                        <h5 style="background: teal; color: white; text-align:left;" class="titulo">DATOS DE CAMBIO DE MONEDA</h5>
                    </b>
                </div>

                <div class="row">
                    <div class="row">
                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Fecha de Inicio:</label>
                            <?php
                            date_default_timezone_set('America/Lima'); // Establecer la zona horaria de Perú
                            $currentDateTime = date('Y-m-d H:i');
                            ?>
                            <input type="datetime-local" id="fechaInicio" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $currentDateTime; ?>" disabled>
                        </div>

                        <?php
                        $url = 'https://api.apis.net.pe/v1/tipo-cambio-sunat';
                        $response = file_get_contents($url);
                        $data = json_decode($response);
                        $compra = $data->compra;
                        $venta = $data->venta;
                        ?>

                        <div class="row">
                            <div class="col-md-5">
                                <label for="inputPassword6" class="col-form-label">T. Compra:</label>
                                <fieldset disabled>
                                    <input type="number" id="tCompra" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $compra ?>">
                            </div>

                            <div class="col-md-5">
                                <label for="inputPassword6" class="col-form-label">T. Venta:</label>
                                <fieldset disabled>
                                    <input type="number" id="tVenta" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $venta ?>">
                            </div>
                        </div>
                    </div>

                        <!-- <div class="col-md-12" style="margin-top: 30px;"> -->

                        <div class="col-md-10">
                        <br>
                        <a  style="width:120px; height:35px" id="" class="btn btn-primary" href="#" role="button">Grabar</a>
                        <a style="width:120px; height:35px" name="" id="" class="btn btn-danger" href="#" role="button">Cancelar</a>
                        <br><br>
                    </div>
                    
                    <a style="width: 340px;height:25px; font-size:11px" name="" id="" class="btn btn-dark" href="https://e-consulta.sunat.gob.pe/cl-at-ittipcam/tcS01Alias" role="button">Si desea comprobar haga clic aqui - SUNAT</a>
                
                        <!-- </div> -->
                    </div>

                    <div class="" id=""></div>
                </div>
                <div class="kardex__right">
                    <div style="display:flex; align-items:center;">
                        <div style="display:flex; flex-direction:column; margin-top:5px">

                            <!-- <h6>LISTADO DE TIPO DE CAMBIO</h6> -->
                            <h5 style="background: teal; color: white; text-align:left;" class="titulo">LISTADO DE TIPO DE CAMBIO</h5>
                            <hr style="margin-top: -7px;">
                           
                          
                            <div class="table--container">
                                <div class="table-responsive">
                                <table class="tbl_venta" style="width: 600px;">
                                <thead>
                                    <tr>
                                        <th scope="col-md-1">Inicio</th>
                                        <th scope="col-1">Fin</th>
                                        <th scope="col-1">Pre Compra</th>
                                        <th scope="col-1">Pre Venta</th>
                                    </tr>
                                </thead>
                                <tbody id="detalle_venta">
                                    <?php
                                    $data = TipoCambio::getTipoCambio();
                                    foreach ($data as $exchange) {
                                    ?>
                                        <tr>
                                            <td><?= $exchange->fecha_inicio ?></td>
                                            <td><?= $exchange->fecha_fin === '1900-01-01 00:00:00' ? '' : $exchange->fecha_fin ?></td>
                                            <td><?= $exchange->cambio_compra ?></td>
                                            <td><?= $exchange->cambio_venta ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                                </div>
                            </div>
                        </div>