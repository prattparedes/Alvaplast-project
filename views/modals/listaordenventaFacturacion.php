</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');


        use Models\maintenance_models\Cliente;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">

                <div class="row">
                    <h5 style="background: black; color: white; text-align:center;">LISTADO ORDEN DE VENTA</h5>



                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <input type="radio" style="width: 18px; height:18px" name="tipoOrden" value="facturable" onclick="mostrarFacturacion(this.value)" checked />
                            <label for="facturable">Facturable</label>
                        </div>

                        <div class="col-md-5">
                            <input type="radio" style="width: 18px; height:18px" name="tipoOrden" value="noFacturable" onclick="mostrarFacturacion(this.value)" />
                            <label for="noFacturable">No Facturable</label>
                        </div>

                        <b style="margin-top: 30px;">
                            <p>BUSCAR POR:</p>
                        </b>
                        <hr style="margin-top: -10px;">
                        <div class="col-md-4" style="width: 400px;">

                            <label for="inputDni" class="col-form-label">Cliente</label>
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" onkeyup="filtrarOrdenVentaXCliente(this.value)">
                        </div>

                    </div>



                    <div class="col-md-12">
                        <br>

                        <button type="button" class="btn btn-success" style="width: 100px;">Consultar</button>

                        <!-- <button style="width: 150px;" class="btn btn-danger" onclick="CancelarYRestaurarVenta()" type="button" id="">Cancelar</button> -->
                        <button style="width: 100px;" class="btn btn-danger" href="" onclick="loadContent('views/ventas/facturacion.php')">Cancelar</button>

                        <br><br>
                    </div>
                </div>

                <div class="" id=""></div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">

                        <h6 style="margin-top: -5ox;">LISTA ORDEN DE VENTA</h6>
                        <hr style="margin-top: -7px;">

                        <br>
                        <div class="table--container" style="margin-top: -15px;">
                            <div class="table-responsive">
                                <table class="table border=1" id="listaordenventa">
                                    <thead>
                                        <tr>
                                            <th>Cliente</th>
                                            <th>Orden</th>
                                            <th>Fecha Emisión</th>
                                            <th>Tipo Pago</th>
                                            <th>Importe</th>
                                            <th>Moneda</th>
                                            <th>Vendedor</th>
                                        </tr>
                                    </thead>
                                    <tbody id="facturable">
                                        <?php

                                        use Models\ventas\Venta;

                                        $ventas = Venta::getVentas();
                                        foreach ($ventas as $ven) {
                                        ?>
                                            <tr onclick="seleccionarOrdenVentaFacturación(this)">
                                                <td><?= $ven->razon_social ?></td>
                                                <td><?= 'OV/' . $ven->numero_documento . '-' . $ven->serie_documento ?></td>
                                                <td><?= explode(' ', $ven->fecha_emision)[0] ?></td>
                                                <td><?= ($ven->tipo_pago == "E") ? "Efectivo" : "Credito" ?></td>
                                                <td><?= $ven->total ?></td>
                                                <td><?= $ven->Moneda ?></td>
                                                <td><?= $ven->nombres . ' ' . $ven->ap_paterno . ' ' . $ven->ap_materno ?></td>
                                                <td style="display:none;"><?= $ven->id_venta ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tbody id="noFacturable" style="display:none">
                                        <?php

                                        $ventas = Venta::getVentasNoFacturables();
                                        foreach ($ventas as $ven) {
                                        ?>
                                            <tr onclick="seleccionarOrdenVentaFacturación(this)">
                                                <td><?= $ven->razon_social ?></td>
                                                <td><?= 'OV/' . $ven->numero_documento . '-' . $ven->serie_documento ?></td>
                                                <td><?= explode(' ', $ven->fecha_emision)[0] ?></td>
                                                <td><?= ($ven->tipo_pago == "E") ? "Efectivo" : "Credito" ?></td>
                                                <td><?= $ven->total ?></td>
                                                <td><?= $ven->Moneda ?></td>
                                                <td><?= $ven->nombres . ' ' . $ven->ap_paterno . ' ' . $ven->ap_materno ?></td>
                                                <td style="display:none;"><?= $ven->id_venta ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>