</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/autoload.php');

        ?>

        <div class="kardex__movement">
            <div class="kardex__left">
                <div class="row">
                    <?php
                    date_default_timezone_set('America/Lima'); // Establecer la zona horaria de Perú
                    $currentDateTime = date('Y-m-d H:i');
                    // Restar un mes a la fecha actual
                    $fechaAnterior = date('Y-m-d H:i', strtotime('-1 month', strtotime($currentDateTime)));
                    ?>

                    <h5 style="background: black; color: white; text-align:center;" class="titulo">REPORTE DE VENTAS POR DOCUMENTO</h5>
                    <div class="col-md-12">
                        <label for="almacen" class="col-form-label">Tipo de Documento:</label>
                        <select name="" id="tipodoc" class="form-select">
                                <option value="001">NOTA DE COBRANZA - A</option>
                                <option value="002">NOTA DE COBRANZA - B</option>
                                <option value="003">NOTA DE COBRANZA - C</option>
                                <option value="012">NOTA DE COBRANZA - D</option>
                                <option value="013">NOTA DE COBRANZA - E</option>
                            </select>
                    </div>


                    <div class="col-md-8">
                        <label for="inputEndDate" class="col-form-label">Desde:</label>
                        <input type="datetime-local" id="fecha1" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $fechaAnterior; ?>">
                    </div>

                    <div class="col-md-8">
                        <label for="inputFilter" class="col-form-label">Hasta:</label>
                        <input type="datetime-local" id="fecha2" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $currentDateTime; ?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <br>
                    <button style="width: 100px;" class="btn btn-primary" type="button" onclick="consultarReportexDocumento()">Consultar</button>
                    <button style="width: 120px;" class="btn btn-success" type="button">ExportarExcel</button>
                    <button style="width: 100px;margin-top:1px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button>
                    <hr>
                    <button style="width: 120px;" class="btn btn-secondary" type="button" onclick="exportarVDocumentoPDF()">ImprimirPDF</button>
                    <br><br>
                </div>
           
        </div>
        <div class="kardex__right">
            <div style="display:flex; align-items:center;">
                <div style="display:flex; flex-direction:column">
                    <?php
                    date_default_timezone_set('America/Lima'); // Establecer la zona horaria de Perú
                    ?>
                    <b>
                        <p style="font-size: 32px;color:brown;margin-top:-10px">AlvaPlastic</p>
                    </b>
                    <h5>Fecha: <?= date('d/m/Y g:ia'); ?></h5>
                    <br>
                    <!-- <h6>FILTRO - REPORTE DE VENTAS POR TIPO DE DOC.</h6> -->
                    <h5 style="background: teal; color: white; text-align:left;" class="titulo">FILTRO: VENTAS POR TIPO DE DOC.</h5>
                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="inputPassword6" id="label_tipodoc" class="col-form-label">NOTA DE COBRANZA:</label>

                            <fieldset disabled>
                                <!-- <input type="text" style="font-size: 13px; height:38px" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="NOTA DE COBRANZA A"> -->
                            </fieldset>
                        </div>
                    </div>
                    <div class="">
                        <label for="inputPassword6" class="col-form-label" id="total_importe">TOTAL: 0.00</label>
                        <fieldset disabled>
                            <!-- <input type="text" style="font-size: 13px; height:38px" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="NOTA DE COBRANZA A"> -->
                        </fieldset>
                    </div>


                    <div class="table--container">
                        <table class="tbl_venta" style="width: 850px;" id="ventaxdocumento">
                            <thead>
                                <tr>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Comprobante</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Moneda</th>
                                    <th scope="col">Importe</th>
                                </tr>
                            </thead>
                            <tbody id="detalle_venta">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>