</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/autoload.php');

        use Models\maintenance_models\Sucursal;
        use Models\maintenance_models\Almacen;
        use Models\maintenance_models\Moneda;
        use Models\maintenance_models\Unidad;
        use Models\compras\Compra;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">

                <h5 style="background: black; color: white; text-align:center;" class="titulo">REPORTE DE VENTAS POR FECHA</h5>
                       
                <div class="row">
                <?php
                    date_default_timezone_set('America/Lima'); // Establecer la zona horaria de Perú
                    $currentDateTime = date('Y-m-d H:i');
                     // Restar un mes a la fecha actual
                     $fechaAnterior = date('Y-m-d H:i', strtotime('-1 month', strtotime($currentDateTime)));
                    ?>
                    <div class="col-md-8">
                        <label for="inputEndDate" class="col-form-label">Fecha de Inicio:</label>
                        <input type="datetime-local" id="fecha1" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $fechaAnterior; ?>">
                    </div>

                    <div class="col-md-8">
                        <label for="inputFilter" class="col-form-label">Fecha Fin:</label>
                        <input type="datetime-local" id="fecha2" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $currentDateTime; ?>">
                    </div>
                </div>
                <br>
               
              
                <hr>
                <div class="col-md-12" style="margin-top: -15px;">
                            <br>
                            <button style="width: 90px;" class="btn btn-success" type="button" onclick="consultarReportexFechas()">Consultar</button>
                            <button style="width: 90px;" class="btn btn-primary" type="button">Exportar</button>
                            <button style="width: 115px;" class="btn btn-secondary" type="button" onclick="exportarVFechaPDF()">ImprimirPDF</button>
                            <button style="width: 90px;margin-top:1px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button>
                            <br><br>
                        </div>
            </div>
            
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">
                    <?php
                date_default_timezone_set('America/Lima'); // Establecer la zona horaria de Perú
                ?>
                <b>
                    <p style="font-size: 32px;color:brown;margin-top:-10px">AlvaPlastic</p>
                </b>
                <h5>Fecha: <?= date('d/m/Y g:ia'); ?></h5>
<br>
                       
                        <!-- <h6>REPORTE POR FECHAS</h6> -->
                        <h5 style="background: teal; color: white; text-align:left;" class="titulo">REPORTE POR FECHAS</h5>
                        <hr style="margin-top: -7px;">


                        <div class="table--container">
                            <table class="tbl_venta" style="width: 850px;" id="ventaxFecha">
                                <thead>
                                    <tr>
                                        <th scope="col">Proveedor</th>
                                        <th scope="col">Comprobante</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Moneda</th>
                                        <th scope="col">Importe</th>
                                        <th scope="col">Almacen</th>
                                    </tr>
                                </thead>
                                <tbody id="detalle_venta">
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>