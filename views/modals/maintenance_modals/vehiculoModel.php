<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mantenimiento de Vehiculos</title>
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
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Vehiculo;
        ?>
        <div class="container">
            <h1>Mantenimiento de Vehiculos</h1>
            <form>
                <b><span class="d-block p-2 col-12 bg-info text-white">Datos de los Vehiculos</span></b>
                <br>
                <div class="row g-3">
                    <div class="col-md-2">
                        <label for="inputPassword6" class="col-form-label">Codigo</label>
                        <fieldset disabled>
                            <input type="number" id="codigo" class="form-control" aria-describedby="passwordHelpInline">
                        </fieldset>
                    </div>

                    <div class="col-md-4">
                        <label for="placa" class="col-form-label">Placa</label>
                        <input type="text" id="placa" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-4">
                        <label for="tipo" class="form-label">Combustible</label>
                        <select id="tipo" class="form-select">
                            <option value="Gasolina">Gasolina</option>
                            <option value="Petroleo">Petroleo</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="marca" class="form-label">Marca</label>
                        <select id="marca" class="form-select">
                            <option value="Lamborghini">Lamborghini</option>
                            <option value="Dodge">Dodge</option>
                            <option value="Hyundai">Hyundai</option>
                            <option value="KIA">KIA</option>
                            <option value="Ford">Ford</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="modelo" class="col-form-label">Modelo</label>
                        <input type="text" id="modelo" class="form-control" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col-md-12">
                        <button type="button" class="btn btn-secondary me-2">Nuevo</button>
                        <a name="" id="" class="btn btn-primary me-2 vehicle_submit" href="#" role="button">Grabar</a>
                        <a name="" id="" class="btn btn-success me-2 vehicle_submit" href="#" role="button">Modificar</a>
                        <a name="" id="" class="btn btn-danger vehicle_submit" href="#" role="button">Eliminar</a>
                    </div>
                </div>
            </form>

            <br><br>

            <div class="container">
                <h1>Listado de Vehiculos</h1>
                <div class="row">

                    <h5 class="col-12 col-md-2">Buscar por</h5>
                    <div class="col-12 col-md-4">
                        <label for="disabledSelect" class="form-label">Placa</label>
                        <input type="text" id="filtroVehiculos" class="form-control" aria-describedby="passwordHelpInline" onkeyup="FiltrarVehiculosMantenimiento()">
                        <br>
                    </div>
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table border=1" id="vehicletable">
                                <thead>
                                    <tr>
                                        <th scope="col-md-1">ID</th>
                                        <th scope="col-1">Placa</th>
                                        <th scope="col-1">Modelo</th>
                                        <th scope="col-1">Tipo</th>
                                        <th scope="col-1">Marca</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $vehiculos = Vehiculo::getVehiculos();
                                    foreach ($vehiculos as $vehiculo) {
                                    ?>
                                        <tr>
                                            <td><?= $vehiculo->id_vehiculo ?></td>
                                            <td><?= $vehiculo->placa ?></td>
                                            <td><?= $vehiculo->modelo ?></td>
                                            <td><?= $vehiculo->tipo_vehiculo ?></td>
                                            <td><?= $vehiculo->marca_vehiculo ?></td>
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