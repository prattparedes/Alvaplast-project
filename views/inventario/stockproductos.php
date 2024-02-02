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
                    <h5 style="background: grey; color: white; text-align:center;">STOCK DE PRODUCTOS</h5>


                    <div class="row">
                        <div class="col-md-6">
                            <label for="number" class="col-form-label">Almacen</label>
                            <select name="" id="cargo" class="form-select">
                                <option value="" default>Elija una opción</option>
                                <option value="" default>ALMACEN 1</option>
                            </select>
                        </div>



                        <div class="col-md-6">
                            <label for="inputEndDate" class="col-form-label">Linea:</label>
                            <input type="text" id="inputEndDate" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="inputFilter" class="col-form-label">Producto:</label>
                            <input type="text" id="inputFilter" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-top: 30px;">

                        <div class="col-md-12">
                            <br>
                            <button style="width: 90px;" class="btn btn-success" type="button">Consultar</button>
                            <button style="width: 80px;" class="btn btn-primary" type="button">Exportar</button>
                            <button style="width: 80px;" class="btn btn-warning" type="button">Imprimir</button>
                            <button style="width: 80px;margin-top:1px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button>
                        </div>
                    </div>
                    <br><br>
                </div>

                <div class="" id="">

                </div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">

                        <h5>Detalles de Stock de Productos</h5>
                        <hr>
                        <div class="table--container">
                            <table class="tbl_venta" style="width: 750px;">
                                <thead>
                                    <tr>
                                        <th scope="col-3">ID</th>
                                        <th class="textleft">Producto</th>
                                        <th class="textcenter">Unidad</th>
                                        <th class="textcenter">Linea</th>
                                        <th class="textcenter">Marca</th>
                                        <th class="textcenter">Stock</th>
                                    </tr>
                                </thead>
                                <tbody id="detalle_venta">
                                    <tr class="">
                                        <td scope="row">A01</td>
                                        <td class="textleft">Bolsa de Plastico Rey</td>
                                        <td class="textcenter">F</td>
                                        <td class="textcenter">Bolsas</td>
                                        <td class="textcenter">Alfa</td>
                                        <td class="textcenter">0.0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>