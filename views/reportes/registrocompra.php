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



                <h5 style="background: black; color: white; text-align:center;">REGISTRO DE COMPRAS</h5>

                <div class="row">

                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label">Sucursal</label>
                        <select id="sucursal" class="form-select" onchange="listarAlmacenes(this.value)">
                            <option value="">Seleccionar </option>
                            <?php
                            $data = Sucursal::getSucursales();
                            foreach ($data as $dat) {
                            ?>
                                <option value="<?= $dat->id_sucursal ?>"><?= $dat->descripcion ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="inputPassword6" class="col-form-label">Almacen</label>
                        <select id="almacen" class="form-select">
                            <option value="">Seleccione</option>
                            <?php
                            $almacenes = Almacen::getAlmacenes();
                            foreach ($almacenes as $almacen) { ?>
                                <option value="<?= $almacen->id_almacen ?>" style="display:none"><?= $almacen->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="col-md-4" style="width: 400px;">
                    <label for="proveedor" class="col-form-label">Proveedor:</label>
                    <input type="text" id="proveedor" class="form-control" aria-describedby="passwordHelpInline">
                </div>
                <div class="row">
                    <?php
                    date_default_timezone_set('America/Lima'); // Establecer la zona horaria de Perú
                    $currentDateTime = date('Y-m-d H:i');
                    ?>

                    <div class="col-md-6">
                        <label for="inputEndDate" class="col-form-label">Desde:</label>
                        <input type="datetime-local" id="fecha1" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $currentDateTime; ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="inputFilter" class="col-form-label">Hasta:</label>
                        <input type="datetime-local" id="fecha2" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $currentDateTime; ?>">
                    </div>


                    <div class="col-md-12" style="margin-top: 30px;">


                    </div>
                </div>

                <div class="" id=""></div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">

                        <!-- <h6>REPORTE DE COMPRAS</h6> -->


                        <div class="col-md-12" style="margin-top: -15px;">
                            <br>
                            <button style="width: 90px;" class="btn btn-success" type="button" onclick="consultarReporteCompras()">Consultar</button>
                            <button style="width: 90px;" class="btn btn-primary" type="button">Exportar</button>
                            <button style="width: 90px;" class="btn btn-warning" type="button">Imprimir</button>
                            <button style="width: 90px;margin-top:1px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button>
                            <br><br>
                        </div>


                        <h5 style="background: teal; color: white; text-align:left;" class="titulo">REPORTE DE COMPRAS</h5>
                        <hr style="margin-top: -7px;">
                        <div class="table--container">
                            <table class="tbl_venta" style="width: 850px;" id="reporte--table">
                                <thead>
                                    <tr>
                                        <th width="180">Proveedor</th>
                                        <th width="180">Comprobante</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Moneda</th>
                                        <th scope="col">Importe</th>
                                        <th scope="col">Almacén</th>
                                    </tr>
                                </thead>
                                <tbody id="detalle_venta">
                                    <!-- <tr class="">
                                        <td scope="row">A01</td>
                                        <td scope="row">Bolsa de Plastico Rey</td>
                                        <td scope="row">30-08-1975:13:51:00</td>
                                        <td scope="row">Bolsas</td>
                                        <td scope="row">Alfa</td>
                                        <td scope="row">0.0</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>