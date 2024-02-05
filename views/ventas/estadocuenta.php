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
                    <!-- <h5 style="background: grey; color: white; text-align:center;"></h5> -->
                    <h5 style="background: black; color: white; text-align:center;">ESTADO DE CUENTA</h5>
                    <h6>Filtro de Registro</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputStartDate" class="col-form-label">Fecha de Inicio:</label>
                            <input type="date" id="inputStartDate" class="form-control" aria-describedby="passwordHelpInline">
                        </div>



                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputEndDate" class="col-form-label">Fecha de Fin:</label>
                            <input type="date" id="inputEndDate" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </div>

                    <!-- <div class="col-md-12"> -->

                        <div class="col-md-12">
                            <br>
                            <a style="width: 90px;" class="btn btn-primary" type="button">Consultar</a>
                            <a style="width: 90px;" class="btn btn-success" type="button">Exportar</a>
                            <a style="width: 90px;" class="btn btn-warning" type="button">Imprimir</a>
                            <!-- <button style="width: 80px;margin-top:1px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button> -->
                        </div>


                    <!-- </div> -->
                    <div class=""><br><br></div>
                </div>

               
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">


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
                        <div class="table--container">
                            
                            <!-- <table class="tbl_venta" id="ordertable"  style="width:100%;"> -->
                            <table class="tbl_venta" id="ordertable" style="width: 850px;">
                                <thead>
                                    <tr>
                                        <th class="textcenter">Fecha Venta</th>
                                        <th class="textcenter">Nro Documento</th>
                                        <th class="textcenter">Razón Social</th>
                                        <th class="textcenter">Vendedor</th>
                                        <th class="textcenter">Estado</th>
                                        <th class="textcenter">Total S/.</th>
                                        <th class="textcenter">Debe S/.</th>
                                        <th class="textcenter">A cuenta S/.</th>
                                    </tr>
                                </thead>

                                <tbody id="detalle_venta">
                                    <tr>
                                        <td class="textcenter">04-01-2024</td>
                                        <td class="textcenter">2030405060</td>
                                        <td class="textcenter">Los Caballeos de Fortaleza</td>
                                        <td class="textcenter">Jose Perales</td>
                                        <td class="textcenter">Pendiente</td>
                                        <td class="textcenter">150,200</td>
                                        <td class="textcenter">0.0</td>
                                        <td class="textright">1250.000</td> 
                                    </tr>
                                </tbody>

                                <tfoot class="footer">
                                    <tr>
                                        <td colspan="7" class="textright">Total</td>
                                        <td class="textright" id="productsubtotal1">0</td>
                                    </tr>

                                    <tr>
                                        <td colspan="7" class="textright">Debe</td>
                                        <td class="textright" id="productDescuento">0</td>
                                    </tr>

                                    <tr>
                                        <td colspan="7" class="textright">A cuenta</td>
                                        <td class="textright" id="productsubtotal2">0</td>
                                    </tr>


                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>