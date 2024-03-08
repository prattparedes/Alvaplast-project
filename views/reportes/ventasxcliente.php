</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/autoload.php');

        use Models\maintenance_models\Unidad;
        use Models\compras\Compra;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">
                <div class="row">

                    <h5 style="background: black; color: white; text-align:center;" class="titulo">REPORTE DE VENTAS POR CLIENTE</h5>
                   
                    <div class="row">
                        <label for="inputPassword6" class="col-form-label">Cliente</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="cliente" placeholder="Seleccionar Cliente" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <input type="hidden" id="idCliente">
                            <button class="btn btn-outline-secondary" style="width: 40px;height:35px" href="" onclick="loadContent('views/modals/listadoclientesReporte.php')" type="button" id="button-addon2">....</button>
                        </div>
                    </div>
                   
                  
                    <br>
                </div>
                <hr>
                <div class="col-md-12" style="margin-top: -15px;">
                        <br>
                        <button style="width: 100px;" class="btn btn-success" type="button" onclick="consultarReportexCliente()">Consultar</button>
                        <button style="width: 115px;" class="btn btn-secondary" type="button" onclick="exportarVClientePDF()">ImprimirPDF</button>
                        <!-- <button style="width: 90px;" class="btn btn-warning" type="button">Imprimir</button> -->
                        <button style="width: 100px;margin-top:1px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button>
                        <br><br>
                    </div>
                <div class="" id="">

                </div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">


                        <!-- <h6>REPORTE DE VENTAS</h6> -->
                        <h5 style="background: teal; color: white; text-align:left;" class="titulo">REPORTE DE VENTAS</h5>
                        <hr style="margin-top: -7px;">


                        <div class="table--container">
                            <table class="tbl_venta" style="width: 850px;" id="ventaxcliente">
                                <thead>
                                    <tr>
                                        <th scope="col">Producto</th>
                                        <th class="textcenter">Cantidad</th>
                                        <th scope="col">Moneda</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Fecha de Emisión</th>
                                        <th class="textcenter">Comprobante</th>
                                    </tr>
                                </thead>
                                <tbody id="detalle_venta">
                                    <tr class="">
                                      
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>