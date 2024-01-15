<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mantenimiento de Productos-P</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.3.2 -->
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" /> -->
</head>

<body>
    <header>
        <?php
        require_once($_SERVER["DOCUMENT_ROOT"] . "/Alvaplast-project/autoload.php");

        use Models\maintenance_models\Producto;
        use Models\maintenance_models\Linea;
        use Models\maintenance_models\Moneda;
        use Models\maintenance_models\Marca;
        use Models\maintenance_models\Unidad;
        ?>
        <div class="container">
            <h3>Mantenimiento de Productos-P</h3>
            <form>
                <b><span class="d-block p-1 col-9 bg-info text-white">Datos de los Productos</span></b>
                <div class="row">
                    <div class="col-sm-12 col-md-2">
                        <label for="inputCodigo" class="col-form-label">Codigo</label>
                        <fieldset disabled>
                            <input type="number" id="codigo" class="form-control" aria-describedby="passwordHelpInline">
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <label for="selectProcedencia" class="form-label">Procedencia</label>
                        <select id="procedencia" class="form-select">
                            <option value="NACIONAL">NACIONAL</option>
                            <option value="IMPORTADO">IMPORTADO</option>
                        </select>
                    </div>

                    <div class="col-sm-12 col-md-3">
                        <label for="inputEstado" class="col-form-label">Estado</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="estado">
                            <label class="form-check-label" for="estado">
                                Habilitado
                            </label>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <label for="inputNombre" class="col-form-label">Nombre</label>
                            <input type="text" id="nombre" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">Descripción</label>
                        <textarea style="height:50px;" class="form-control" placeholder="Leave a comment here" id="descripcion"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-2">
                        <label for="marca" class="form-label">Marca</label>
                        <select id="marca" class="form-select">
                            <?php
                            $marcas = Marca::getMarcas();
                            foreach ($marcas as $marca) { ?>
                                <option value="<?= $marca->id_marca ?>"><?= $marca->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-sm-12 col-md-2">
                        <label for="unidad" class="form-label">Unidad</label>
                        <select id="unidad" class="form-select">
                            <?php
                            $unidades = Unidad::getUnidades();
                            foreach ($unidades as $unidad) { ?>
                                <option value="<?= $unidad->id_unidad ?>"><?= $unidad->abreviatura ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-2">
                        <label for="linea" class="form-label">Linea</label>
                        <select id="linea" class="form-select">
                            <?php
                            $lineas = Linea::ListarLineas();
                            foreach ($lineas as $lin) { ?>
                                <option value="<?= $lin->id_linea ?>"><?= $lin->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-sm-12 col-md-2">
                        <label for="inputVolumen" class="col-form-label">Volumen</label>
                        <input type="text" id="volumen" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="row">
                    <div class="" style="width: 150px;">
                        <label for="inputCompra" class="col-form-label">P. Compra</label>
                        <input type="text" id="precioCompra" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="" style="width: 150px;">
                        <label for="selectMoneda" class="form-label">Moneda</label>
                        <select id="moneda" class="form-select">
                            <?php
                            $monedas = Moneda::getMonedas();
                            foreach ($monedas as $moneda) { ?>
                                <option value="<?= $moneda->id_moneda ?>"><?= $moneda->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="" style="width: 145px;">
                        <label for="inputStockMin" class="col-form-label">Stock Min</label>
                        <input type="text" id="stockMinimo" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div>

                <div class="row">
                    <div class="" style="width: 145px;">
                        <label for="inputVenta" class="col-form-label">P. Venta</label>
                        <input type="text" id="precioVenta" class="form-control" aria-describedby="passwordHelpInline" placeholder="">
                    </div>

                    <div class="" style="width: 153px;">
                        <div></div>
                    </div>

                    <div class="" style="width: 145px;">
                        <label for="inputStockMax" class="col-form-label">Stock Max</label>
                        <input type="text" id="stockMaximo" class="form-control" aria-describedby="passwordHelpInline" placeholder="">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <label for="formFile" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>

                <br>

                <a name="" id="" class="btn btn-secondary" href="#" role="button">Nuevo</a>
                <button type="button" class="btn btn-primary product_submit">Grabar</button>
                <a name="" id="" class="btn btn-success product_submit" href="#" role="button">Modificar</a>
                <a name="" id="" class="btn btn-danger product_submit" href="#" role="button">Eliminar</a>

            </form>

            <br><br>
        </div>

        <div class="container">
            <h1>Listado de Productos</h1>
            <div class="row">
                <div class="col-auto">
                    <h5>Buscar por </h5>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="disabledSelect" class="form-label">Nombre</label>
                            <input type="text" id="filtroProductos" class="form-control" aria-describedby="passwordHelpInline" onkeyup="FiltrarProductosMantenimiento(this.value)">
                        </div>

                        <div class="col-md-3">
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

                    </div><br>
                    <div class="table-responsive">
                        <table class="table border=1" id="productsTable">
                            <thead>
                                <tr>
                                    <th width="120">Codigo</th>
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

                            <tbody>
                                <?php
                                $data = Producto::getProductos();
                                foreach ($data as $product) {
                                ?>
                                    <tr>
                                        <td><?= $product->id_producto ?></td>
                                        <td><?= $product->nombre_producto ?></td>
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

                            </tbody>
                        </table>
                    </div>
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