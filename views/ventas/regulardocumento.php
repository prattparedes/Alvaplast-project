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
                    <h5 style="background: Black; color: white; text-align:center;">REGULADOR DE NRO. DOCUMENTO</h5>
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
                <h5 style="background: teal; color: white; text-align:left; margin-top:10px" class="titulo">DETALLE</h5>
                        <hr>
                        <div class="table--container">
                            
                            <!-- <table class="tbl_venta" id="ordertable"  style="width:100%;"> -->
                            <table class="tbl_venta" id="ordertable" style="width: 850px;">
                    <thead>
                    <tr>
                                    <th class="textcenter" width="50">-</th>
                                    <th class="textcenter" width="200">Movimiento</th>
                                    <th class="textcenter" width="100">Documento</th>
                                    <th class="textcenter" width="100">Correlativo</th>
                                    <th class="textcenter" width="200">Razón Social</th>
                                    <th class="textright" width="100">Monto</th>

                                </tr>
                                    </thead>
                                    
                                    <tbody id="detalle_venta">
                                <tr>
                                    <td class="no-pad-top no-pad-bot align-middle">
                                        <div class="margin-l-15 checkbox checkboxStyle-table checkColorGreenLight">
                                            <input type="checkbox" class="tableid" name="tableid" id="tableid" class="click">
                                            <label class="s18 text-normal"></label>
                                    <td scope="row">olsa de Plastico Rey</td>
                                    <td class="textcenter">1020304050</td>
                                    <td class="textcenter">00000001</td>
                                    <td class="textcenter">La Casita Alva</td>
                                    <td class="textright">00.00</td>


                                </tr>
                                </tbody>


                                        <tfoot class="footer">

                                      
                                        </tfoot>
                    </table>
                        </div>
                    </div>
                </div>