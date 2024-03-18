</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Almacen;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">

                <h5 style="background: black; color: white; text-align:center;" class="titulo">REPORTE DE VENTAS VS COSTO</h5>

                <div class="row">
                    <?php
                    date_default_timezone_set('America/Lima'); // Establecer la zona horaria de Perú
                    $currentDateTime = date('Y-m-d H:i');
                    $fechaSinHora = date('Y-m-d', strtotime($currentDateTime));
                    $fechaConHoraCero = $fechaSinHora . ' 23:59';
                    // Restar un mes a la fecha actual
                    $fechaAnterior = date('Y-m-d H:i', strtotime('-1 month', strtotime($currentDateTime)));
                    $fechaSinHora2 = date('Y-m-d', strtotime($fechaAnterior));
                    $fechaConHoraCero2 = $fechaSinHora . ' 00:00';
                    ?>

                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label">Almacen</label>
                        <select id="almacen" class="form-select">
                            <option value="">Seleccione</option>
                            <option value="1" selected>ALMACEN 1</option>
                            <?php
                            $almacenes = Almacen::getAlmacenes();
                            foreach ($almacenes as $almacen) { ?>
                                <option value="<?= $almacen->id_almacen ?>" style="display:none"><?= $almacen->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-8">
                        <label for="inputEndDate" class="col-form-label">Fecha de Inicio:</label>
                        <input type="datetime-local" id="fecha1" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $fechaConHoraCero2; ?>" onchange="cambiarFecha1('fechain',this.value)">
                    </div>

                    <div class="col-md-8">
                        <label for="inputFilter" class="col-form-label">Fecha Fin:</label>
                        <input type="datetime-local" id="fecha2" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $fechaConHoraCero; ?>" onchange="cambiarFecha1('fechafi',this.value)">
                    </div>
                </div>
                <br>


                <hr>
                <div class="col-md-12" style="margin-top: -15px;">
                    <br>
                    <button style="width: 100px;" class="btn btn-success" type="button" onclick="consultarDatosCosto()">Consultar</button>
                    <!-- <button style="width: 90px;" class="btn btn-primary" type="button">Exportar</button> -->

                    <button style="width: 100px;margin-top:1px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button>
                    <hr>
                    <p>Reporte de Utilidades por Fecha </p>
                    <button style="width: 120px;" class="btn btn-secondary" type="button" onclick="exportarCostoPDF()">ImprimirPDF</button>
                    <br>
                    <hr>

                    <br>
                </div>
            </div>

            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">
                        <?php
                        date_default_timezone_set('America/Lima'); // Establecer la zona horaria de Perú style="font-size: 28px; color:brown"
                        ?>
                        <b>
                            <p style="font-size: 32px;color:brown;margin-top:-10px">AlvaPlastic</p>
                        </b>
                        <h5>Fecha: <?= date('d/m/Y g:ia'); ?></h5>
                        <br>

                        <!-- <h6>REPORTE POR FECHAS</h6> -->
                        <label>SUMA DE UTILIDADES:</label>
                        <label style="font-size: 28px; color:brown" id="suma_utilidades">S/.0.00</label>
                        <br>


                        <label for="suma_utilidades_fecha_inicio" id="suma_utilidades_fecha_inicio">Suma de Utilidades (Fecha de Inicio): <b id="fechain"></b></label>

                        <br>
                        <label for="suma_utilidades_fecha_fin" id="suma_utilidades_fecha_fin">Suma de Utilidades (Fecha de Fin): <b id="fechafi"></b> </label>






                        <h5 style="background: teal; color: white; text-align:left;" class="titulo">REPORTE POR FECHAS</h5>
                        <hr style="margin-top: -7px;">


                        <div class="table--container">
                            <table class="tbl_venta" style="width: 850px;" id="ventaxCosto">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre Producto</th>
                                        <th scope="col">Abreviatura</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Costo</th>
                                        <th scope="col">Precio Unitario</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Utilidad</th>

                                    </tr>
                                </thead>
                                <tbody id="detalle_venta">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>