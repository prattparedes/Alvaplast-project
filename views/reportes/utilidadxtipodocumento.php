</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');


        ?>

        <div class="kardex__movement">
            <div class="kardex__left">



                <div class="row">

                    <h5 style="background: black; color: white; text-align:center;" class="titulo">UTILIDAD POR TIPO DE DOCUMENTO</h5>
                    <div class="col-md-12" style="margin-top: -20px;">
                        <br>
                        <button style="width: 100px;" class="btn btn-primary" type="button" onclick="consultarReportexUtilidad()">Consultar</button>
                        <button style="width: 115px;" class="btn btn-success" type="button">ExportarExcel</button>
                        <button style="width: 115px;" class="btn btn-secondary" type="button" onclick="exportarVUtilidadesPDF()">ImprimirPDF</button>
                        <button style="width: 100px;margin-top:2px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button>
                        <br><br>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="almacen" class="col-form-label">Documento:</label>
                            <select name="" id="tipoDocumento" class="form-select">
                                <option value="001">NOTA DE COBRANZA - A</option>
                                <option value="002">NOTA DE COBRANZA - B</option>
                                <option value="003">NOTA DE COBRANZA - C</option>
                                <option value="012">NOTA DE COBRANZA - D</option>
                                <option value="013">NOTA DE COBRANZA - E</option>
                            </select>
                        </div>

                        <?php
                        date_default_timezone_set('America/Lima'); // Establecer la zona horaria de Perú
                        $currentDateTime = date('Y-m-d H:i');
                        // Restar un mes a la fecha actual
                        $fechaAnterior = date('Y-m-d H:i', strtotime('-1 month', strtotime($currentDateTime)));
                        ?>
                        <div class="col-md-6" style="margin-top: 10px;">
                            <label for="inputEndDate" class="col-form-label">Fecha de Inicio:</label>
                            <input type="datetime-local" id="fecha1" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $fechaAnterior; ?>">
                        </div>

                        <div class="col-md-6" style="margin-top: 10px;">
                            <label for="inputFilter" class="col-form-label">Fecha Fin:</label>
                            <input type="datetime-local" id="fecha2" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $currentDateTime; ?>">
                        </div>
                    </div>


                </div>
                <br><br>
                <hr><br>
                <div class="" id="">

                </div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">


                        <!-- <h6>REPORTE DE VENTAS</h6> -->
                        <h5 style="background: teal; color: white; text-align:left;" class="titulo">REPORTE DE VENTAS</h5>
                        <hr style="margin-top: -7px;">

                        <div class="row" style="margin-top: -15px;">
                            <div class="" style="width: 200px;">
                                <label for="documentoDetalle" class="col-form-label"><br></label>
                                <input type="text" id="documentoDetalle" class="form-control" aria-describedby="passwordHelpInline" placeholder="NOTA DE COBANZA -A" disabled>
                            </div>

                            <div class="" style="width: 200px;">
                                <label for="totalUtilidad" class="col-form-label">Total de Utilidad:</label>
                                <input type="text" id="totalUtilidad" class="form-control" aria-describedby="passwordHelpInline" placeholder="00.00" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">

                            <div class="col-6 col-md-3 mb-3">
                                <label class="col-form-label">Imprimir:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="imprimirTipo" id="detalle" value="detalle" checked>
                                    <label class="form-check-label" for="detalle">Detalle</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="imprimirTipo" id="resumen" value="resumen">
                                    <label class="form-check-label" for="resumen">Resumen</label>
                                </div>
                            </div>


                            <div class="table--container">
                                <table class="tbl_venta" style="width: 850px;" id="ventaxutilidades">
                                    <thead>
                                        <tr>
                                            <th scope="col-1">Fecha</th>
                                            <th scope="col-1">Producto</th>
                                            <th scope="col-1">UM</th>
                                            <th scope="col-1">Linea</th>
                                            <th scope="col-1">Costo</th>
                                            <th scope="col-1">P. Unitario</th>
                                            <th scope="col-1">Cantidad</th>
                                            <th scope="col-1">Utilidad</th>

                                        </tr>
                                    </thead>
                                    <tbody id="detalle_venta">
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>