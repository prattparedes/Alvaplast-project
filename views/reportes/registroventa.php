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

                    <h5 style="background: black; color: white; text-align:center;" class="titulo">REGISTRO DE VENTAS</h5>

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
                        <?php
                        date_default_timezone_set('America/Lima'); // Establecer la zona horaria de Perú
                        $currentDateTime = date('Y-m-d H:i');
                        ?>

                        <div class="col-md-6">
                            <label for="inputEndDate" class="col-form-label">Fecha de Inicio:</label>
                            <input type="datetime-local" id="fecha1" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $currentDateTime; ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="inputFilter" class="col-form-label">Fecha Fin:</label>
                            <input type="datetime-local" id="fecha2" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $currentDateTime; ?>">
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-top: 30px;"> </div>
                    <br><br>

                    <hr>
                </div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">

                        <!-- <h6>REPORTE DE VENTAS</h6> -->


                        <div class="col-md-12" style="margin-top: -15px;">
                            <br>
                            <button style="width: 90px;" class="btn btn-success" type="button" onclick="consultarReporteVentas()">Consultar</button>
                            <button style="width: 90px;" class="btn btn-primary" type="button">Exportar</button>
                            <button style="width: 90px;" class="btn btn-warning" type="button">Imprimir</button>
                            <button style="width: 90px;margin-top:1px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button>
                            <br><br>
                        </div>

                        <h5 style="background: teal; color: white; text-align:left;" class="titulo">REPORTE DE VENTAS</h5>
                        <hr style="margin-top: -7px;">
                        <div class="table--container">
                            <table class="tbl_venta" style="width: 850px;" id="reporte--table">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">ID</th> -->
                                        <th class="textcenter" width="150">Fecha Emision</th>
                                        <th class="textcenter" width="150">Comprobante</th>
                                        <th class="textcenter" width="150">Ruc / Dni</th>
                                        <th class="textcenter" width="250">Cliente</th>
                                        <th class="textcenter" width="150">Importe</th>
                                        <th class="textcenter" width="150">Moneda</th>
                                        <th class="textcenter" width="200">Tipo de Pago</th>
                                    </tr>
                                </thead>
                                <tbody id="detalle_venta">
                                    <!-- <tr class="">
                                        <td class="textcenter" scope="row">25-02-2023</td>
                                        <td class="textcenter" scope="row">10251545</td>
                                        <td class="textcenter" scope="row">10205565789</td>
                                        <td class="textleft" scope="row">Jose torre de la cruz toro </td>
                                        <td class="textcenter" scope="row">0.0</td>
                                        <td class="textcenter" scope="row">Alfa</td>
                                        <td class="textcenter" scope="row">0.0</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>