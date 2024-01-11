<!DOCTYPE html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.2 -->
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->
</head>

<body>
    <header>
        <?php
        require_once($_SERVER["DOCUMENT_ROOT"] . "/Alvaplast-project/autoload.php");

        use Models\maintenance_models\TipoCambio; ?>
        <div class="container">
            <h1>MANTENIMIENTO TIPO DE CAMBIO </h1>
            <form>
                <b> <span class="d-block p-2 col-12 bg-info text-white">Tipos de cambios</span></b>

                <div class="row g-3">
                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Fecha de Inicio:</label>
                        <?php
                        date_default_timezone_set('America/Lima'); // Establecer la zona horaria de Perú
                        $currentDateTime = date('Y-m-d H:i');
                        ?>
                        <input type="datetime-local" id="fechaInicio" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $currentDateTime; ?>" disabled>
                    </div>

                    <?php
                    $url = 'https://api.apis.net.pe/v1/tipo-cambio-sunat';
                    $response = file_get_contents($url);
                    $data = json_decode($response);
                    $compra = $data->compra;
                    $venta = $data->venta;
                    ?>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">T. Compra:</label>
                        <input type="number" id="tCompra" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $compra ?>">
                    </div>

                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">T. Venta:</label>
                        <input type="number" id="tVenta" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $venta ?>">
                    </div>

                    <div class="col-md-6">
                        <br>
                        <a name="" id="" class="btn btn-primary" href="#" role="button">Grabar</a>
                        <a name="" id="" class="btn btn-danger" href="#" role="button">Cancelar</a>
                    </div>
                </div>
            </form>

            <br><br>

            <div class="container">
                <h1>Listado Tipo de Cambio</h1>

                <div class="row">
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table border=1">
                                <thead>
                                    <tr>
                                        <th scope="col-md-1">Inicio</th>
                                        <th scope="col-1">Fin</th>
                                        <th scope="col-1">Pre Compra</th>
                                        <th scope="col-1">Pre Venta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = TipoCambio::getTipoCambio();
                                    foreach ($data as $exchange) {
                                    ?>
                                        <tr>
                                            <td><?= $exchange->fecha_inicio ?></td>
                                            <td><?= $exchange->fecha_fin === '1900-01-01 00:00:00' ? '' : $exchange->fecha_fin ?></td>
                                            <td><?= $exchange->cambio_compra ?></td>
                                            <td><?= $exchange->cambio_venta ?></td>
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

    <main></main>

    <footer>
        <!-- place footer here -->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
</body>

</html>