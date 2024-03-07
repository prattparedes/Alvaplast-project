</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');
        use Models\maintenance_models\Unidad;
        use Models\compras\Compra;
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
                    <h5 style="background: black; color: white; text-align:center;" class="titulo">REPORTE DE VENTAS POR SERIE</h5>

                    <div class="row">
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

                    
                        <div class="col-md-8">
                            <label for="inputEndDate" class="col-form-label">Fecha de Inicio:</label>
                            <input type="datetime-local" id="fecha1" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $fechaAnterior; ?>">
                        </div>

                        <div class="col-md-8">
                            <label for="inputFilter" class="col-form-label">Fecha Fin:</label>
                            <input type="datetime-local" id="fecha2" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $currentDateTime; ?>">
                        </div>
                        </div>
                       
                 
                    <br><br>
                </div>
                <hr>
                <div class="col-md-12"style="margin-top: -15px;">
                            <br>
                            <button style="width: 100px;" class="btn btn-success" type="button" onclick="consultarReportexSerie()">Consultar</button>
                            <button style="width: 115px;" class="btn btn-secondary" type="button" onclick="exportarVSeriePDF()">ImprimirPDF</button>
                            <button style="width: 100px;margin-top:1px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button>
                            <br><br>
                        </div>
                <div class="" id="">

                </div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">


                  
                        <!-- <h6>REPORTE POR SERIE</h6> -->
                        <h5 style="background: teal; color: white; text-align:left;" class="titulo">REPORTE POR SERIE</h5>
                        <hr style="margin-top: -7px;">

                       
                        <div class="table--container">
                            <table class="tbl_venta" style="width: 850px;" id="ventaxserie">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Codigo</th>
                                        <th scope="col-1">Producto</th>
                                        <th scope="col-1">Cantidad</th>
                                        <th scope="col-1">Unidad</th>
                                    </tr>
                                </thead>
                                <tbody id="detalle_venta">
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>