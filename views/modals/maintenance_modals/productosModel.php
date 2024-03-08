<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/autoload.php');

        use Models\maintenance_models\Producto;
        use Models\maintenance_models\Linea;
        use Models\maintenance_models\Moneda;
        use Models\maintenance_models\Marca;
        use Models\maintenance_models\Unidad;
        ?>


        <div class="kardex__movement">
            <div class="kardex__left">
                <h5 style="background: black; color: white; text-align:center;">MANT. DE PRODUCTOS</h5>

                <hr style="margin-top: 3px;">
                <b>
                    <!-- <h6>DETALLES DE PRODUCTOS</h6> -->
                    <h5 style="background: teal; color: white; text-align:left;" class="titulo">DETALLE DE PRODUCTO</h5>
                </b>
                <div class="row">
                    <div class="col-md-6">
                        <span style="display:inline-block; width:40px; margin-bottom:8px;">Codigo:</span>
                        <input type="number" id="codigo" class="form-control" aria-describedby="passwordHelpInline" disabled>
                        <input type="hidden" id="metodo" value="">
                    </div>
                    <div class="col-md-6">
                        <label for="selectProcedencia" class="form-label">Procedencia</label>
                        <select id="procedencia" class="form-select" disabled>
                            <option value="NACIONAL">NACIONAL</option>
                            <option value="IMPORTADO">IMPORTADO</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="inputEstado" class="col-form-label">Estado</label>
                        <div class="form-check">
                            <input style="width: 15px; height:15px" class="form-check-input" type="checkbox" value="" id="estado" disabled>
                            <label style="font-size: 16px;" class="form-check-label" for="estado">
                                -Habilitado
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="inputNombre" class="col-form-label">Nombre</label>
                    <input type="text" id="nombre" class="form-control" aria-describedby="passwordHelpInline" disabled>
                </div>

                <div class="col-md-12">
                    <label for="inputPassword6" class="col-form-label">Descripción</label>
                    <textarea class="form-control" placeholder="Leave a comment here" id="descripcion" disabled></textarea>
                </div>


                <div class="row">
                    <div class="col-md-6" style="margin-top: 5px;">
                        <label for="selectMarca" class="form-label">Marca</label>
                        <select id="marca" class="form-select" disabled>
                            <?php
                            $marcas = Marca::getMarcas();
                            foreach ($marcas as $marca) { ?>
                                <option value="<?= $marca->id_marca ?>"><?= $marca->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-6" style="margin-top: 5px;">
                        <label for="selectUnidad" class="form-label">Unidad</label>
                        <select id="unidad" class="form-select" disabled>
                            <?php
                            $unidades = Unidad::getUnidades();
                            foreach ($unidades as $unidad) { ?>
                                <option value="<?= $unidad->id_unidad ?>"><?= $unidad->abreviatura ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6" style="margin-top: 5px;">
                        <!-- <div class="col-md-2"style="margin-top: 5px;"> -->
                        <label for="selectLinea" class="form-label">Linea</label>
                        <select id="linea" class="form-select" disabled>
                            <?php
                            $lineas = Linea::ListarLineas();
                            foreach ($lineas as $lin) { ?>
                                <option value="<?= $lin->id_linea ?>"><?= $lin->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="inputVolumen" class="col-form-label">Volumen</label>
                        <input type="text" id="volumen" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6" style="margin-top: 5px;">
                        <label for="selectMoneda" class="form-label">Moneda</label>
                        <select id="moneda" class="form-select" disabled>
                            <?php
                            $monedas = Moneda::getMonedas();
                            foreach ($monedas as $moneda) { ?>
                                <option value="<?= $moneda->id_moneda ?>"><?= $moneda->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="inputCompra" class="col-form-label">P. Compra</label>
                        <input type="text" id="precioCompra" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>



                    <div class="col-md-6">
                        <label for="inputStockMin" class="col-form-label">Stock Min</label>
                        <input type="text" id="stockMinimo" class="form-control" aria-describedby="passwordHelpInline" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="inputVenta" class="col-form-label">P. Venta</label>
                        <input type="text" id="precioVenta" class="form-control" aria-describedby="passwordHelpInline" placeholder="" disabled>
                    </div>



                    <div class="col-md-6">
                        <label for="inputStockMax" class="col-form-label">Stock Max</label>
                        <input type="text" id="stockMaximo" class="form-control" aria-describedby="passwordHelpInline" placeholder="" disabled>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="formFile" class="form-label">Imagen</label>
                    <input class="form-control" type="file" id="formFile" disabled>
                </div>

          
                <div class="col-md-12" style="margin-top: -10px;">
                    <br>
                    <button style="width: 80px;" id="btnNuevo" class="btn btn-primary" type="button" onclick="botónNuevoMantenimiento()">Nuevo</button>
                    <button style="width: 80px;" id="btnGrabar" class="btn btn-success order__btn--inactive product_submit" type="button" onclick="botónGrabarMantenimiento('1')">Grabar</button>
                    <button style="width: 80px;" id="btnEditar" class="btn btn-warning order__btn--inactive" type="button" onclick="botónEditarMantenimiento()">Editar</button>
                    <button style="width: 80px;" id="btnEliminar" class="btn btn-danger order__btn--inactive product_submit" type="button " onclick="botónEliminarMantenimiento('2')">Eliminar</button>
                </div>
            </div>
            <hr>
     

        <div class="kardex__right">
            <div style="display:flex; align-items:center;">
                <div style="display:flex; flex-direction:column; margin-top:10px">

                    <!-- <h6>LISTADO DE PRODUCTOS</h6> -->
                    <h5 style="background: teal; color: white; text-align:left;" class="titulo">LISTADO DE PRODUCTOS</h5>
                    <hr style="margin-top: -7px;">
                    <h6>Buscar por </h6>


                    <div class="row">
                        <div class="col-md-12">
                            <label for="disabledSelect" class="form-label">Nombre</label>
                            <input type="text" id="filtroProductos" class="form-control" aria-describedby="passwordHelpInline" onkeyup="FiltrarProductosMantenimiento(this.value)">
                        </div>

                        <div class="col-md-12">
                            <label for="disabledSelect" class="form-label">Linea de Productos</label>
                            <select name="" id="" class="form-select" onchange="FiltrarLineaProductosMantenimiento(this.value)">
                                <option value="0">Ingrese línea</option>
                                <?php
                                $listas = Linea::ListarLineas();
                                function compararPorDescripcion($a, $b)
                                {
                                    return strcmp($a->descripcion, $b->descripcion);
                                }
                                usort($listas, "compararPorDescripcion");
                                foreach ($listas as $linea) {
                                ?>
                                    <option value="<?= $linea->id_linea ?>"><?= $linea->descripcion ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                    </div>

                </div>
            </div>
            <hr>
            <div class="table--container">
                <!-- <table border="1" style="width:100%;" class="table" id="movimientosKardex"> -->
                <table class="tbl_venta" id="productsTable" style="width:95%;">
                    <thead>
                        <tr>
                            <th class="textcenter" width="50">Codigo</th>
                            <th class="textcenter" width="350">Producto</th>
                            <th class="textcenter" width="130">P. Venta</th>
                            <th class="textcenter" width="130">P. Compra</th>
                            <th class="textcenter" width="50">Moneda</th>
                            <th class="textcenter" width="120">Marca</th>
                            <th class="textcenter" width="70">Unidad</th>
                            <th class="textcenter" width="120">Volumen</th>

                            <th class="textcenter" width="120">Stock Min</th>
                            <th class="textcenter" width="120">Stock Max</th>
                            <th class="textcenter" width="120">Stock</th>
                        </tr>
                    </thead>
                    <tbody id="detalle_venta">
                        <?php
                        $data = Producto::getProductos();
                        foreach ($data as $product) {
                        ?>
                            <tr>
                                <td><?= $product->id_producto ?></td>
                                <td class="textleft"><?= $product->nombre_producto ?></td>
                                <td><?= $product->precio_venta ?></td>
                                <td><?= $product->precio_compra ?></td>
                                <td><?= $product->moneda ?></td>
                                <td><?= $product->marca ?></td>
                                <td><?= $product->unidad ?></td>
                                <td><?= $product->volumen ?></td>
                                <td><?= $product->stock_min ?></td>
                                <td><?= $product->stock_max ?></td>
                                <td><?= $product->stock ?></td>
                                <td style="display:none;"><?= $product->id_moneda ?></td>
                                <td style="display:none;"><?= $product->procedencia ?></td>
                                <td style="display:none;"><?= $product->id_marca ?></td>
                                <td style="display:none;"><?= $product->id_linea ?></td>
                                <td style="display:none;"><?= $product->imagen ?></td>
                                <td style="display:none;"><?= $product->descripcion ?></td>
                                <td style="display:none;"><?= $product->id_unidad ?></td>
                                <td style="display:none;"><?= $product->estado ?></td>
                            </tr>
                        <?php } ?>
                    <tbody style="font-size: 12px !important;">
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        </div>
    </header>

    <!-- Bootstrap JavaScript Libraries -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script> -->
</body>

</html>