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

                    <h5 style="background: grey; color: white; text-align:center;">REGISTRO DE COMPRAS</h5>

                    <div class="row">
                        <div class="col-md-4" style="width: 400px;">
                            <label for="almacen" class="col-form-label">Almacen:</label>
                            <select id="almacen" class="form-select">
                                <option>NO DEFINIDO</option>
                                <option>San Juan de Lurigancho</option>
                            </select>
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="proveedor" class="col-form-label">Proveedor:</label>
                            <input type="text" id="proveedor" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <label for="inputEndDate" class="col-form-label">Desde:</label>
                                <input type="date" id="inputEndDate" class="form-control" aria-describedby="passwordHelpInline">
                            </div>

                            <div class="col-md-5">
                                <label for="inputFilter" class="col-form-label">Hasta:</label>
                                <input type="date" id="inputFilter" class="form-control" aria-describedby="passwordHelpInline">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-top: 30px;">

                        <!-- <div class="col-md-12">
                            <br>
                            <button style="width: 90px;" class="btn btn-success" type="button">Consultar</button>
                            <button style="width: 90px;" class="btn btn-primary" type="button">Exportar</button>
                            <button style="width: 90px;" class="btn btn-warning" type="button">Imprimir</button>
                            <button style="width: 90px;margin-top:1px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button>
                            <br><br>
                        </div> -->
                    </div>
                </div>

                <div class="" id=""></div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">

                        <h6>REPORTE DE COMPRAS</h6>
                        <hr style="margin-top: -7px;">

                        <div class="col-md-12"style="margin-top: -15px;">
                            <br>
                            <button style="width: 90px;" class="btn btn-success" type="button">Consultar</button>
                            <button style="width: 90px;" class="btn btn-primary" type="button">Exportar</button>
                            <button style="width: 90px;" class="btn btn-warning" type="button">Imprimir</button>
                            <button style="width: 90px;margin-top:1px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button>
                            <br><br>
                        </div>

                        <div class="table--container">
                            <table class="tbl_venta" style="width: 850px; ">
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
                                    <tr class="">
                                        <td scope="row">A01</td>
                                        <td scope="row">Bolsa de Plastico Rey</td>
                                        <td scope="row">30-08-1975:13:51:00</td>
                                        <td scope="row">Bolsas</td>
                                        <td scope="row">Alfa</td>
                                        <td scope="row">0.0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>