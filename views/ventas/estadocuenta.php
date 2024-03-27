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

        use Models\ventas\estadoCuenta;



        ?>

        <div class="kardex__movement">
            <div class="kardex__left">



                <div class="row">
                    <!-- <h5 style="background: grey; color: white; text-align:center;"></h5> -->
                    <h5 style="background: black; color: white; text-align:center;">ESTADO DE CUENTA</h5>
                    <h6>Filtro de Registro</h6>
                    <hr>
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
                            <label for="almacen" class="col-form-label" id="tipodoc">Filtro de estado de cuenta:</label>
                            <!-- <select name="" id="tipodoc" class="form-select">
                                <option value="001">NOTA DE COBRANZA - A</option>
                                <option value="002">NOTA DE COBRANZA - B</option>
                                <option value="003">NOTA DE COBRANZA - C</option>
                                <option value="012">NOTA DE COBRANZA - D</option>
                                <option value="013">NOTA DE COBRANZA - E</option>
                            </select> -->
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputStartDate" class="col-form-label">Fecha de Inicio:</label>
                            <input type="datetime-local" id="fecha1" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $fechaConHoraCero2; ?>">
                        </div>



                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputEndDate" class="col-form-label">Fecha de Fin:</label>
                            <input type="datetime-local" id="fecha2" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $fechaConHoraCero; ?>">
                        </div>
                    </div>

                    <!-- <div class="col-md-12"> -->

                    <div class="col-md-12">
                        <br>
                        <a style="width: 100px;" class="btn btn-primary" type="button" onclick="listarEstadoCuenta()">Consultar</a>
                        <a style="width: 120px;" class="btn btn-success" type="button" onclick="exportarEstadoExcel()">ExportarExcel</a>
                        <a style="width: 100px;" class="btn btn-warning" type="button" onclick="exportarEstadoPDF()">Imprimir</a>
                        <!-- <button style="width: 80px;margin-top:1px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button> -->
                    </div>


                    <!-- </div> -->
                    <div class=""><br><br></div>
                </div>


            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:10px">
                        <?php
                        date_default_timezone_set('America/Lima'); // Establecer la zona horaria de Perú
                        ?>
                        <b>
                            <p style="font-size: 32px;color:brown;margin-top:-10px">AlvaPlastic</p>
                        </b>
                        <h5>Fecha: <?= date('d/m/Y g:ia'); ?></h5>

                        <div class="row">
                            <div class="" style="width: 270px;">
                                <label for="inputFilter" class="col-form-label">Filtrar por:</label>
                                <input type="text" id="filtrotable" class="form-control" aria-describedby="passwordHelpInline">
                            </div>
                            <button style="width: 90px; height:34px;margin-top:38px" class="btn btn-success" type="button">Buscar</button>
                        </div>
                    </div>

                </div>
                <h5 style="background: teal; color: white; text-align:left; margin-top:10px" class="titulo">DETALLE DEL ESTADO CUENTA</h5>
                <hr>

                <p style="font-size: 15px;color:teal;margin-top:-10px" id="totalTotalLabel">Suma de Totales:</p>
                <p style="font-size: 15px;color:teal;margin-top:-10px" id="totalDebeLabel">Suma de Deuda Total:</p>
                <p style="font-size: 15px;color:teal;margin-top:-10px" id="totalACuentaLabel">Acuenta suma Total:</p>
                <div class="table--container">

                    <!-- <table class="tbl_venta" id="ordertable"  style="width:100%;"> -->
                    <table class="tbl_venta" id="estadoCuenta--table" style="width: 850px;">
                        <thead>
                            <tr>
                                <th class="textcenter">Fecha Venta</th>
                                <th class="textcenter">Nro Documento</th>
                                <th class="textcenter" style="width:220px;">Razón Social</th>
                                <th class="textcenter">Vendedor</th>
                                <th class="textcenter">Estado</th>
                                <th class="textcenter">Total S/.</th>
                                <th class="textcenter">Debe S/.</th>
                                <th class="textcenter">A cuenta S/.</th>
                            </tr>
                        </thead>

                        <tbody id="detalle_venta">

                        </tbody>

                        <tfoot class="footer">
                            <!-- <tr>
                                <td colspan="7" class="textright">Total</td>
                                <td class="textright" id="productsubtotal1"></td>
                            </tr>

                            <tr>
                                <td colspan="7" class="textright">Debe</td>
                                <td class="textright" id="productDescuento"></td>
                            </tr>

                            <tr>
                                <td colspan="7" class="textright">A cuenta</td>
                                <td class="textright" id="productsubtotal2"></td>
                            </tr> -->


                        </tfoot>
                    </table>
                </div>
            </div>
        </div>