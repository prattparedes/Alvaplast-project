</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

       
        use Models\maintenance_models\Producto;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">

                <div class="row">
                <h5 style="background: black; color: white; text-align:center;">PRODUCTOS</h5>
             
                   <b> <p>Buscar por:</p></b>
                    <hr>

                    <div class="row">
                        <div class="col-md-4" style="width: 400px;">
                        <label for="inputPassword6" class="col-form-label">Nombre</label>
                        <input type="text" id="disabledTextInput" class="form-control" aria-describedby="passwordHelpInline" onkeyup="filtrarProductosVenta(this.value)">
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                        <label for="inputPassword6" class="col-form-label">Codigo Producto</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>

                        <div class="col-md-4" style="width: 400px;">
                        <label for="inputPassword6" class="col-form-label">Procedencia</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
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

                        <h6 style="margin-top: -5ox;">LISTADO DE PRODUCTOS</h6>
                        <hr style="margin-top: -7px;">

                  


                        <br>
                        <div class="table--container" style="margin-top: -15px;">
                        <div class="table-responsive">
                        <table class="table border=1">
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
                                    $productos = Producto::getProductos();
                                    foreach ($productos as $producto) {
                                        // Verifica si el stock es mayor que 0
                                        if ($producto->stock > 0) { ?>
                                            <tr onclick="seleccionarProductoVenta(this)">
                                                <td><?= $producto->id_producto ?></td>
                                                <td><?= $producto->nombre_producto ?></td>
                                                <td><?= $producto->procedencia ?></td>
                                                <td><?= number_format($producto->precio_compra, 2) ?></td>
                                                <td><?= number_format($producto->precio_venta, 2) ?></td>
                                                <td style="display:none;"><?= $producto->id_unidad ?></td>
                                                <td><?= $producto->stock ?></td>
                                            </tr>
                                    <?php }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>