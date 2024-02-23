</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Unidad;
        use Models\compras\Compra;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">

            <div class="row">
                    
                    <h5 style="background: black; color: white; text-align:center;" class="titulo">REPORTE DE VENTAS POR MARCA</h5>
                    <div class="col-md-12"style="margin-top: -15px;">
                            <br>
                            <button style="width: 90px;" class="btn btn-success" type="button">Consultar</button>
                            <button style="width: 120px;" class="btn btn-primary" type="button">Exportar PDF</button>
                            <!-- <button style="width: 90px;" class="btn btn-warning" type="button">Imprimir</button> -->
                            <button style="width: 90px;margin-top:1px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button>
                            <br><br>
                        </div>
                    <div class="row">
                        <div class="" style="width: 355px;">
                            <label for="almacen" class="col-form-label">Marca:</label>
                            <select id="almacen" class="form-select">
                                <option>NO DEFINIDO</option>
                                
                            </select>
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
<!-- 
                    <h6>REPORTE POR MARCA</h6> -->
                    <h5 style="background: teal; color: white; text-align:left;" class="titulo">REPORTE POR MARCA</h5>
                        <hr style="margin-top: -7px;">

                       
                        <div class="table--container">
                            <table class="tbl_venta" style="width: 850px;">
                            <thead>
                                    <tr>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Marca</th>
                                        <th scope="col">Unidad</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Moneda</th>
                                        <th scope="col">Importe</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Almacen</th>
                                        <th scope="col">Comprobante</th>
                                    </tr>
                                </thead>
                                <tbody id="detalle_venta">
                                    <tr class="">
                                        <td scope="row">A01</td>
                                        <td scope="row">Bolsa de Plastico Rey</td>
                                        <td scope="row">Faaaaa  aaaas  ssssssaa</td>
                                        <td scope="row">Bolsas</td>
                                        <td scope="row">Alfa</td>
                                        <td scope="row">0.0</td>
                                        <td scope="row">0.0</td>
                                        <td scope="row">0.0</td>
                                        <td scope="row">0.0</td>
                                        <td scope="row">0.0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>