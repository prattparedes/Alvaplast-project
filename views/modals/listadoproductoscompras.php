<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->
</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Producto;
        ?>
        <!-- place navbar here -->

        <div class="container">
            <h3>LISTADO DE PRODUCTOS </h3>
            <form>
                <b> <span class="d-block p-2 col-9 bg-info text-white">Datos de Productos</span></b>
                <br>
                <div class="row">

                    <b> <span class="">Buscar por:</span></b>
                    <div class="col-4">
                        <label for="inputPassword6" class="col-form-label">Nombre</label>

                        <input type="text" id="disabledTextInput" class="form-control" aria-describedby="passwordHelpInline" onkeyup="filtrarProductosCompra(this.value)">
                    </div>

                    <div class="" style="width: 280px;">
                        <label for="inputPassword6" class="col-form-label">Codigo del Producto</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="" style="width: 280px;">
                        <label for="inputPassword6" class="col-form-label">Procedencia</label>
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                </div>
                <br>

            </form>

            <br>
            <a style="width: 150px;" high="50" name="" id="" class="btn btn-success" href="#" role="button">Consultar</a>
            <a style="width: 150px;" high="50" name="" id="" class="btn btn-danger" href="#" onclick="loadContent('views/compras/ordencompra.php')" role="button">Cancelar</a>
            <div class="container">
                <h1>Productos</h1>
                <b> <span class="d-block p-2 col-9 bg-info text-white">Detalles de Productos</span></b>

                <br>
                <div class="row">
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table border=1" id="listaProductosCompra">
                                <thead>
                                    <tr>
                                        <th scope="col-md-1">Codigo</th>
                                        <th scope="col-md-1">Nombre</th>
                                        <th scope="col-1">Linea</th>
                                        <th scope="col-1">Unidad</th>
                                        <th scope="col-1">Descripcion</th>
                                        <th scope="col-1">Precio compra</th>
                                        <th scope="col-1">Precio venta</th>
                                        <!-- <th scope="col-1">Stock</th> -->


                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $productos = Producto::getProductos();
                                    foreach ($productos as $producto) { ?>
                                        <tr ondblclick="seleccionarProductoCompra(this)">
                                            <td><?= $producto->id_producto ?></td>
                                            <td><?= $producto->nombre_producto ?></td>
                                            <td><?= $producto->linea ?></td>
                                            <td><?= $producto->unidad ?></td>
                                            <td><?= $producto->descripcion ?></td>
                                            <td><?= number_format($producto->precio_compra, 2) ?></td>
                                            <td><?= number_format($producto->precio_venta, 2) ?></td>
                                            <td style="display:none;"><?= $producto->id_unidad ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>

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