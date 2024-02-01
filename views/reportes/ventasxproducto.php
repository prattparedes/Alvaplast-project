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
                    
                    <h5 style="background: grey; color: white; text-align:center;">REPORTE DE VENTAS POR PRODUCTO</h5>
                  
                    <div class="row">
                    <label for="inputPassword6" class="col-form-label">Productos</label>
                    <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" style="width: 40px;height:35px" href="" onclick="loadContent('views/modals/listadoproductoscompras.php')" type="button" id="button-addon2">....</button>
                        </div>

                       
                    </div>

                

                    <div class="col-md-12" style="margin-top: 30px;">

                     
                    </div>
                    <br><br>
                </div>
                <hr>
                <div class="" id="">

                </div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">

                    <h6>REPORTE DE VENTAS</h6>
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
                            <table class="tbl_venta" style="width: 850px;">
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
                                    <tr class="">
                                        <td scope="row">VASO Nº 6 SOL TRANSP.</td>
                                        <td class="textcenter">10,00</td>
                                        <td scope="row">SOLES</td>
                                        <td scope="row"> 1 050,00</td>
                                        <td scope="row">26/04/2023 7:48:00</td>
                                        <td scope="row">NC-B/001-0005451</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>