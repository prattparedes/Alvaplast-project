</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/autoload.php');


        use Models\maintenance_models\Producto;
        use Models\maintenance_models\TipoCambio;

        ?>

        <div class="kardex__movement">
            <div class="kardex__left">

                <div class="row">
                    <h5 style="background: black; color: white; text-align:center;">PRODUCTOS</h5>

                    <b>
                        <p>Buscar por:</p>
                    </b>
                    <hr>

                    <div class="row">
                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputPassword6" class="col-form-label">Nombre</label>
                            <input type="text" id="disabledTextInput" class="form-control" aria-describedby="passwordHelpInline" onkeyup="filtrarProductosVenta(this.value)">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <br>
                        <button style="width: 150px;" class="btn btn-danger" onclick="CancelarYRestaurarVenta()" type="button" id="">Cancelar</button>

                        <br><br>
                    </div>
                </div>

                <div class="" id=""></div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">

                        <h6 style="margin-top: -5ox;">LISTADO DE PRODUCTOS - VENTA</h6>
                        <hr style="margin-top: -7px;">




                        <br>
                        <div class="table--container" style="margin-top: -15px;">
                            <div class="table-responsive">
                                <table class="table border=1" id="listaProductosVenta">
                                    <thead>
                                        <tr>
                                            <th scope="col-md-1">Codigo</th>
                                            <th scope="col-md-1">Nombre</th>
                                            <th scope="col-1">Procedencia</th>
                                            <th scope="col-1">Precio Real</th>
                                            <th scope="col-1">Precio venta</th>
                                            <th scope="col-1">Stock</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $TipoCambioFila = TipoCambio::obtenerTC();
                                        $cambio = $TipoCambioFila->cambio_venta;
                                        if (isset($_GET["idAlmacen"]) && isset($_GET["idCliente"])) {
                                            $cliente = (int) $_GET["idCliente"];
                                            $almacen = (int) $_GET["idAlmacen"];
                                            $productos = Producto::mostrarStockProducto($almacen, $cliente);
                                            foreach ($productos as $product) {
                                        ?>
                                                <tr onclick="seleccionarProductoVenta(this)">
                                                    <td><?= $product->id_producto?></td>
                                                    <td><?= $product->nombre_producto?></td>
                                                    
                                                    <td><?= $product->procedencia?></td>
                                                    <td><?= number_format($product->precio_compra, 2)*$cambio ?></td>
                                                    <td><?= number_format($product->precio_venta, 2) ?></td>
                                                    <td style="display:none;"><?= $product->id_unidad ?></td>
                                                    <td><?= $product->stock ?></td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>