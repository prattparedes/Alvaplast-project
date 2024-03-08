</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/autoload.php');

        use Models\maintenance_models\Producto;
        use Models\maintenance_models\Almacen;
        use Models\maintenance_models\Linea;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">



                <div class="row">
                    <h5 style="background: black; color: white; text-align:center;" class="titulo">STOCK DE PRODUCTOS</h5>


                    <div class="row">
                        <div class="col-md-8">
                            <label for="number" class="col-form-label">Almacen</label>
                            <select name="" id="cargo" class="form-select" onchange="listarProductosStockXAlmacen(this.value)">
                                <option value="" default>Elija una opción</option>
                                <option value="1" selected>ALMACEN 1</option>
                                <?php
                                $almacenes = Almacen::getAlmacenes();
                                foreach ($almacenes as $almac) {
                                ?>
                                    <option value="<?= $almac->id_almacen ?>"><?= $almac->descripcion ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>



                        <div class="col-md-8">
                            <label for="inputEndDate" class="col-form-label">Seleccione una Linea de Producto:</label>
                            <select name="" class="form-select" id="" onchange="FiltrarLineaProductosStockKardex(this.value)">
                                <option value="">Todas las Lineas</option>
                                <?php
                                $lineas = Linea::ListarLineas();
                                foreach ($lineas as $linea) {
                                ?>
                                    <option value="<?= $linea->descripcion ?>"><?= $linea->descripcion ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="inputFilter" class="col-form-label">Buscar por Producto:</label>
                            <input type="text" id="inputFilter" class="form-control" aria-describedby="passwordHelpInline" onkeyup="FiltrarProductosStockKardex(this.value)">
                        </div>
                    

                        <div class="col-md-12" style="margin-top: 10px;">
                            
                            <!-- <button style="width: 90px;" class="btn btn-primary" type="button">Consultar</button> -->
                            <button style="width: 120px;" class="btn btn-success" type="button"onclick="exportarStockExcel()">ExportarExcel</button>
                            <button style="width: 100px;margin-top:1px" class="btn btn-danger" type="button" onclick="loadContent('views/home.php')">Salir</button>
                            <hr>
                            <a style="width: 120px;" class="btn btn-secondary" type="button" onclick="exportarStockPDF()">ImprimirPDF</a>
                            <br><br><br>
                        </div>
                    </div>
                    <br><br>
                </div>

                <div class="" id="">

                </div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:15px">
                    <?php
                date_default_timezone_set('America/Lima'); // Establecer la zona horaria de Perú
                ?>
                <b>
                    <p style="font-size: 32px;color:brown;margin-top:-10px">AlvaPlastic</p>
                </b>
                <h5>Fecha: <?= date('d/m/Y g:ia'); ?></h5>
                        <!-- <h5>Detalles de Stock de Productos</h5> -->
                        <h5 style="background: teal; color: white; text-align:left; margin-top:10px" class="titulo">DETALLE DEL STOCK DE PRODUCTOS</h5>
                        <hr>
                        <div class="table--container">

                            <table class="tbl_venta" id="stock__products--table" style="width: 850px;">
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
                                    <?php
                                    $producto = Producto::getProductos();
                                    foreach ($producto as $produc) {
                                    ?>
                                        <tr>
                                            <td scope="row"><?= $produc->id_producto ?></td>
                                            <td class="textleft"><?= $produc->nombre_producto ?></td>
                                            <td class="textcenter"><?= $produc->unidad ?></td>
                                            <td class="textcenter"><?= $produc->linea ?></td>
                                            <td class="textcenter"><?= $produc->marca ?></td>
                                            <td class="textcenter"><?= $produc->stock == 0 ? '0.0' : $produc->stock ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>