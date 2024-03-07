</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        ?>

        <div class="kardex__movement">
            <div class="kardex__left">



                <div class="row">
                    
                    <h5 style="background: grey; color: white; text-align:center;">REPORTE DE VENTAS POR PRODUCTO</h5>
                  
                    <div class="row">
                    <label for="inputPassword6" class="col-form-label">Productos</label>
                    <div class="input-group mb-3">
                            <input type="text" class="form-control" id="producto" placeholder="Seleccione producto" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <input type="hidden" id="idProducto">
                            <button class="btn btn-outline-secondary" style="width: 40px;height:35px" href="" onclick="loadContent('views/modals/listadoproductosReporte.php')" type="button" id="button-addon2">....</button>
                        </div>

                       
                    </div>

                   

                   
                    <br>
                </div>
                <hr>
                <div class="col-md-12"style="margin-top: -15px;">
                            <br>
                            <button style="width: 100px;" class="btn btn-success" type="button" onclick="consultarReportexProducto()">Consultar</button>
                            <button style="width: 100px;" class="btn btn-primary" type="button">Exportar</button>
                            <button style="width: 115px;" class="btn btn-secondary" type="button" onclick="exportarVProductoPDF()">ImprimirPDF</button>
                            <button style="width: 100px;margin-top:2px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button>
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
                            <table class="tbl_venta" style="width: 850px;" id="ventaxproducto">
                            <thead>
                                    <tr>
                                        <th scope="col">Cliente</th>
                                        <th class="textcenter">Cantidad</th>
                                        <th scope="col">Moneda</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Fecha de Emisión</th>
                                        <th class="textcenter">Comprobante</th>
                                    </tr>
                                </thead>
                                <tbody id="detalle_venta">
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>