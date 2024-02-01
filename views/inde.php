</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Producto;
        use Models\maintenance_models\Almacen;
        ?>
        <div class="contenedora">
            <div class="contenedaor">
                <form class="row g-3">
                    <b><span class="d-block p-1 col-12 bg-info text-white">Lista de Productos</span></b>


                    <div class="input">
                        <div class="" style="width: 300px;">
                            <label for="almacenSelect" class="col-form-label">Almacen</label>
                            <select id="almacenSelect" class="form-select">
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

                        <div class="" style="width:300px;">
                            <label for="filtroProductos" class="col-form-label">Filtro</label>
                            <input type="text" id="filtroProductos" class="form-control" aria-describedby="passwordHelpInline" onkeyup="FiltrarListaProductosKardex()">
                        </div>
                    </div>
                    <br>




                    <div class="table-responsive">
                        <table class="table" id="productosKardex" style="width: 300px;">
                            <thead>
                                <tr>
                                    <th scope="col-1">Producto</th>
                                    <th scope="col-1">Unidad</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $producto = Producto::getProductos();
                                foreach ($producto as $produc) {
                                ?>
                                    <tr>
                                        <td style="display:none;"><?= $produc->id_producto ?></td>
                                        <td class="textleft" width="320"><?= $produc->nombre_producto ?></td>
                                        <td><?= $produc->unidad ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </form>
                <br><br>


                <div class="contenendora">
                    <span class="d-block p-1 col-12 bg-info text-white">Detalles</span>
                    <div class="row">
                        <div class="" style="width:180px;">
                            <label for="productoSeleccionadoKardex" style="margin-top: 15px;" class="col-form-label"></label>
                            <input type="text" id="productoSeleccionadoKardex" class="form-control" aria-describedby="passwordHelpInline">
                        </div>


                        <div class="" style="width:160px;">
                            <label for="fecha1" class="col-form-label">Desde</label>
                            <input type="date" id="fecha1" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </div>

                    <div class="row">
                        <div class="" style="width:180px;">
                            <label for="stockfinal" class="col-form-label">Stockfisico final</label>
                            <input type="text" id="stockfinal" class="form-control" aria-describedby="passwordHelpInline">
                        </div>


                        <div class="" style="width:160px; margin-left:3px">
                            <label for="fecha2" class="col-form-label">Hasta:</label>
                            <input type="date" id="fecha2" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <a name="" id="" class="btn btn-primary" href="#" role="button" onclick="filtrarKardexPorFechas()">Consultar</a>
                        <a name="" id="" class="btn btn-success" href="#" role="button" onclick="exportarPDF()">Exportar</a>
                        <a name="" id="" class="btn btn-danger" href="#" onclick="loadContent('views/home.php')" role="button">Cancelar</a>
                    </div>

                    <!-- cont -->


                    <br>
                    <span class="d-block p-1 col-12 bg-info text-white">Detalles de Proveedores y productos</span>
                    <br>


                    <div class="table-responsive">
                        <table class="table" id="movimientosKardex" style="width: 600px;">
                            <thead>
                                <tr>
                                    <th scope="col-1">Fecha</th>
                                    <th scope="col-1">Proveedor / Cliente</th>
                                    <th scope="col-1">Motivo</th>
                                    <th scope="col-1">Documento</th>
                                    <th scope="col-1">Monto</th>
                                    <th scope="col-1">Inicio</th>
                                    <th scope="col-1">Ingreso</th>
                                    <th scope="col-1">Salida</th>
                                    <th scope="col-1">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="xd">
                                </tr>
                                <tr class="">
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </header>

    <main></main>

    <footer>
        <!-- place footer here -->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
</body>

</html>