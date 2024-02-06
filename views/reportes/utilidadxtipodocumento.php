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
                    
                    <h5 style="background: black; color: white; text-align:center;" class="titulo">UTILIDAD POR TIPO DE DOCUMENTO</h5>
                  
                    <div class="row">
                        <div class="col-md-12">
                            <label for="almacen" class="col-form-label">Documento:</label>
                            <select name="" id="tipoDocumento" class="form-select">
                            <option value="A">NOTA DE COBRANZA - A</option>
                            <option value="B">NOTA DE COBRANZA - B</option>
                            <option value="C">NOTA DE COBRANZA - C</option>
                            <option value="D">NOTA DE COBRANZA - D</option>
                            <option value="E">NOTA DE COBRANZA - E</option>
                        </select>
                        </div>

                       
                        <div class="col-md-6" style="margin-top: 10px;">
                            <label for="inputEndDate" class="col-form-label">Fecha de Inicio:</label>
                            <input type="date" id="inputEndDate" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                      
                            <div class="col-md-6"style="margin-top: 10px;">
                                <label for="inputFilter" class="col-form-label">Fecha Fin:</label>
                                <input type="date" id="inputFilter" class="form-control" aria-describedby="passwordHelpInline">
                            </div>
                        </div>
                   
                   
                </div>
                <br><br>
                <hr><br>
                <div class="" id="">

                </div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">

                    <div class="col-md-12" style="margin-top: -20px;">
                            <br>
                            <button style="width: 90px;" class="btn btn-success" type="button">Consultar</button>
                            <button style="width: 90px;" class="btn btn-primary" type="button">Exportar</button>
                            <button style="width: 90px;" class="btn btn-warning" type="button">Imprimir</button>
                            <button style="width: 90px;margin-top:1px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button>
                            <br><br>
                        </div>
                    <!-- <h6>REPORTE DE VENTAS</h6> -->
                    <h5 style="background: teal; color: white; text-align:left;" class="titulo">REPORTE DE VENTAS</h5>
                        <hr style="margin-top: -7px;">

                        <div class="row" style="margin-top: -15px;">
                            <div class="" style="width: 200px;">
                                <label for="documentoDetalle" class="col-form-label"><br></label>
                                <input type="text" id="documentoDetalle" class="form-control" aria-describedby="passwordHelpInline" placeholder="NOTA DE COBANZA -A" disabled>
                            </div>

                            <div class="" style="width: 200px;">
                                <label for="totalUtilidad" class="col-form-label">Total de Utilidad:</label>
                                <input type="text" id="totalUtilidad" class="form-control" aria-describedby="passwordHelpInline" placeholder="00.00" disabled>
                            </div>
                        </div>
                    <div class="col-md-12" >

                       <div class="col-6 col-md-3 mb-3">
                        <label class="col-form-label">Imprimir:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="imprimirTipo" id="detalle" value="detalle" checked>
                            <label class="form-check-label" for="detalle">Detalle</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="imprimirTipo" id="resumen" value="resumen">
                            <label class="form-check-label" for="resumen">Resumen</label>
                        </div>
                    </div>

                         
                        <div class="table--container">
                            <table class="tbl_venta" style="width: 850px;">
                            <thead>
                                        <tr>
                                            <th scope="col-1">Fecha</th>
                                            <th scope="col-1">Producto</th>
                                            <th scope="col-1">UM</th>
                                            <th scope="col-1">Linea</th>
                                            <th scope="col-1">Costo</th>
                                            <th scope="col-1">P. Unitario</th>
                                            <th scope="col-1">Cantidad</th>
                                            <th scope="col-1">Utilidad</th>

                                        </tr>
                                    </thead>
                                    <tbody id="detalle_venta">
                                        <tr class="">
                                            <td scope="row">A01</td>
                                            <td scope="row">Bolsa de Plastico Rey</td>
                                            <td scope="row">F</td>
                                            <td scope="row">Bolsas</td>
                                            <td scope="row">Alfa</td>
                                            <td scope="row">0.0</td>
                                            <td scope="row">10</td>
                                            <td scope="row">1200.00</td>

                                        </tr>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>