</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Proveedor;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">

                <div class="row">
                <h5 style="background: black; color: white; text-align:center;">PROVEEDORES</h5>
             
                   <b> <p>Buscar por:</p></b>
                    <hr>

                    <div class="row">
                        <div class="col-md-4" style="width: 400px;">
                        <label for="inputPassword6" class="col-form-label">Proveedor</label>
                        <input type="text" id="disabledTextInput" class="form-control" aria-describedby="passwordHelpInline" onkeyup="filtrarProveedorCompra(this.value)">
                        </div>

                    </div>
               
                   <div class="col-md-12">
                            <br>
                            <button style="width: 150px;" class="btn btn-danger" onclick="CancelarYRestaurarCompra()" type="button" id="">Cancelar</button> 
                                                   
                            <br><br>
                       </div>
                </div>

                <div class="" id=""></div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">

                        <h6 style="margin-top: -5ox;">LISTADO DE PROVEEDORES</h6>
                        <hr style="margin-top: -7px;">

                  


                        <br>
                        <div class="table--container" style="margin-top: -15px;">
                        <div class="table-responsive">
                        <table class="table border=1" id="providertable">
                                <thead>
                                    <tr>
                                        <th scope="col-md-1">Codigo</th>
                                        <th scope="col-md-1">Proveedor</th>
                                        <th scope="col-1">Ruc</th>
                                        <th scope="col-1">Direccion</th>
                                        <th scope="col-1">Teléfono</th>
                                        <th scope="col-1">Fax</th>
                                        <th scope="col-1">Email</th>


                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $providers = Proveedor::listarProveedores();
                                    foreach ($providers as $provider) { ?>
                                        <tr onclick="seleccionarProveedor(this)">
                                            <td><?= $provider->id_proveedor ?></td>
                                            <td><?= $provider->razon_social ?></td>
                                            <td><?= $provider->ruc ?></td>
                                            <td><?= $provider->direccion ?></td>
                                            <td><?= $provider->telefono ?></td>
                                            <td><?= $provider->fax ?></td>
                                            <td><?= $provider->email ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>