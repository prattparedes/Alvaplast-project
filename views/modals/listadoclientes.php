</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');


        use Models\maintenance_models\Cliente;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">

                <div class="row">
                    <h5 style="background: black; color: white; text-align:center;">CLIENTES</h5>

                    <b>
                        <p>Buscar por:</p>
                    </b>
                    <hr>

                    <div class="row">
                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputRazonSocial" class="col-form-label">Razón Social</label>
                            <input type="text" id="inputRazonSocial" class="form-control" onkeyup="filtrarClienteVenta(this.value)"/>
                        </div>


                    </div>

                    <div class="col-md-12">
                        <br>

                        <br>

                        <button type="button" class="btn btn-success" style="width: 150px;">Consultar</button>

                        <!-- <a style="width: 100px;" high="50" name="" id="" class="btn btn-danger" href="#" onclick="loadContent('views/ventas/ordenventa.php')" role="button">Cancelar..</a> -->


                        <button style="width: 150px;" class="btn btn-danger" onclick="CancelarYRestaurarVenta()" type="button" id="">Cancelar</button>

                        <br><br>
                    </div>
                </div>

                <div class="" id=""></div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">

                        <h6 style="margin-top: -5ox;">LISTADO DE CLIENTES</h6>
                        <hr style="margin-top: -7px;">




                        <br>
                        <div class="table--container" style="margin-top: -15px;">
                            <div class="table-responsive">
                                <table class="table border=1" id="clienttable">
                                    <thead>
                                        <tr>
                                            <th scope="col-md-1">Codigo</th>
                                            <th scope="col-md-1">Razón Social</th>
                                            <th scope="col-md-1">Ruc</th>
                                            <th scope="col-md-1">Dni</th>
                                            <th scope="col-md-1">Dirección</th>
                                            <th scope="col-md-1">Teléfono</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $clients = Cliente::getClientes();
                                        foreach ($clients as $client) { ?>
                                            <tr onclick="seleccionarCliente(this)">
                                                <td><?= $client->id_cliente ?></td>
                                                <td><?= $client->razon_social ?></td>
                                                <td><?= $client->ruc ?></td>
                                                <td><?= $client->dni ?></td>
                                                <td><?= $client->direccion ?></td>
                                                <td><?= $client->telefono ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>