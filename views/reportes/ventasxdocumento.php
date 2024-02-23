</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Sucursal;
        use Models\maintenance_models\Almacen;
        use Models\maintenance_models\Moneda;
        use Models\maintenance_models\Unidad;
        use Models\compras\Compra;


        ?>

        <div class="kardex__movement">
            <div class="kardex__left">
                <div class="row">
                <?php
                        date_default_timezone_set('America/Lima'); // Establecer la zona horaria de Perú
                        $currentDateTime = date('Y-m-d H:i');
                        ?>

                    <h5 style="background: black; color: white; text-align:center;" class="titulo">REPORTE DE VENTAS POR DOCUMENTO</h5>
                    <div class="col-md-12">
                        <label for="almacen" class="col-form-label">Tipo de Documento:</label>
                        <select name="" id="tipodoc" class="form-select">
                            <option value="A">NOTA DE COBRANZA - A</option>
                            <option value="B">NOTA DE COBRANZA - B</option>
                            <option value="C">NOTA DE COBRANZA - C</option>
                            <option value="D">NOTA DE COBRANZA - D</option>
                            <option value="E">NOTA DE COBRANZA - E</option>
                        </select>
                    </div>


                    <div class="col-md-6">
                        <label for="inputEndDate" class="col-form-label">Desde:</label>
                        <input type="datetime-local" id="fecha1" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $currentDateTime; ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="inputFilter" class="col-form-label">Hasta:</label>
                        <input type="datetime-local" id="fecha2" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $currentDateTime; ?>">
                    </div>
                </div>
                <div class="col-md-12">
                            <br>
                            <button style="width: 90px;" class="btn btn-success" type="button" onclick="consultarReportexDocumento()">Consultar</button>
                            
                            <button style="width: 120px;" class="btn btn-primary" type="button">Exportar PDF</button>
                            <!-- <button style="width: 90px;" class="btn btn-warning" type="button">Imprimir</button> -->
                            <button style="width: 90px;margin-top:1px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button>
                            <br><br>
                        </div>
                <div class="col-md-12" style="margin-top: 30px;">

                    <br><br><br>
                    <hr>
                </div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column">
       
                        <!-- <h6>FILTRO - REPORTE DE VENTAS POR TIPO DE DOC.</h6> -->
                        <h5 style="background: teal; color: white; text-align:left;" class="titulo">FILTRO: VENTAS POR TIPO DE DOC.</h5>
                        <hr>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="inputPassword6" id="" class="col-form-label">NOTA DE COBRANZA-C</label>
                                
                                <fieldset disabled>
                                    <!-- <input type="text" style="font-size: 13px; height:38px" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="NOTA DE COBRANZA A"> -->
                                </fieldset>
                            </div>
                        </div>
                        <div class="">
                            <label for="inputPassword6" class="col-form-label">TOTAL: 0.00</label>
                            <fieldset disabled>
                                <!-- <input type="text" style="font-size: 13px; height:38px" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="NOTA DE COBRANZA A"> -->
                            </fieldset>
                        </div>

                     
                        <div class="table--container">
                            <table class="tbl_venta" style="width: 850px;" id="">
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