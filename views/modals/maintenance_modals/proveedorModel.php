<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

        use Models\maintenance_models\Ubigeo;
        use Models\maintenance_models\Proveedor;
        ?>


        <div class="kardex__movement">
            <div class="kardex__left">
                <h5 style="background: black; color: white; text-align:center;">MANTENIMIENTO DE PROVEEDORES</h5>
                <hr>
                <b>
                    <h6>Datos del Proveedor</h6>
                </b>

                <div class="col-md-5" style="margin-top: -5px;">
                    <label for="Codigo" class="col-form-label">Codigo</label>
                    <fieldset disabled>
                        <input type="number" id="codigo" class="form-control" aria-describedby="passwordHelpInline"disabled>
                    </fieldset>
                </div>

                <div class="row">
                    <div class="col-md-10">
                        <label for="razonSocial" class="col-form-label">Razon Social</label>
                        <input type="text" id="razonSocial" class="form-control" aria-describedby="passwordHelpInline"disabled>
                    </div>

                    <div class="col-md-10">
                        <label for="inputPassword6" class="col-form-label">RUC</label>
                        <input type="text" id="ruc" class="form-control" aria-describedby="passwordHelpInline"disabled>
                    </div>
                </div>

                <div class="col-md-10">
                    <label for="inputPassword6" class="col-form-label">Direccion</label>
                    <input type="text" id="direccion" class="form-control" aria-describedby="passwordHelpInline"disabled>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">Telefono</label>
                        <input type="text" id="telefono" class="form-control" aria-describedby="passwordHelpInline"disabled>
                    </div>

                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">Fax</label>
                        <input type="text" id="fax" class="form-control" aria-describedby="passwordHelpInline"disabled>
                    </div>
                </div>

                <div class="col-md-10">
                    <label for="inputPassword6" class="col-form-label">Contacto</label>
                    <input type="text" id="contacto" class="form-control" aria-describedby="passwordHelpInline"disabled>
                </div>

                <div class="col-md-10">
                    <label for="inputPassword6" class="col-form-label">Email</label>
                    <input type="text" id="email" class="form-control" aria-describedby="passwordHelpInline"disabled>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <label for="inputPassword6" class="col-form-label">Estado</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="estado"disabled>
                            <label class="form-check-label" for="estado">Habilitado</label>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <label for="disabledSelect" class="form-label">Departamento</label>
                        <select id="departamento" class="form-select" onchange="listarProvincia(this.value)"disabled>
                            <?php
                            $data = Ubigeo::getDepartamentos();
                            foreach ($data as $ubi) {
                            ?>
                                <option value="<?= $ubi->id_ubigeo ?>"><?= $ubi->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <label for="disabledSelect" class="form-label">Provincia</label>
                        <select id="provincia" class="form-select" onchange="listarDistrito(this.value)"disabled>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label for="selectDistrito" class="form-label">Distrito</label>
                        <select id="distrito" class="form-select"disabled>
                        </select>
                    </div>
                </div>

                <div class="col-md-10">
                    <label for="inputPassword6" class="col-form-label">Descripción</label>
                    <input type="text" id="email" class="form-control" aria-describedby="passwordHelpInline"disabled>
                </div>




                <div class="col-md-12" style="margin-top: -10px;">
                    <br>
                    <button style="width: 80px;" type="button" class="btn btn-secondary client_submit">Nuevo</button>
                    <button style="width: 80px;" type="button" class="btn btn-primary client_submit">Grabar</button>
                    <button style="width: 80px;" type="button" class="btn btn-success client_submit">Editar</button>
                    <button style="width: 80px;" type="button" class="btn btn-danger client_submit">Eliminar</button>
                </div>




                <hr>
                <div class="table--container" id="productosKardex">
                    <!-- <table border="1" style="width:90%;" class="table" id=""> -->

                    <!-- </table> -->
                </div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:10px">

                    <h6>LISTADO DE PROVEEDORES</h6>
                    <hr style="margin-top: -7px;">
                       
                            <h6>Buscar por </h6>
                   

                        <div class="row">
                            <div class="col-md-5">
                                <label for="disabledSelect" class="form-label">Proveedor</label>
                                <input type="text" id="filtroProveedorNombre" class="form-control" aria-describedby="passwordHelpInline" onkeyup="FiltrarProveedoresNombre()">
                            </div>

                            <div class="col-md-5">
                                <label for="disabledSelect" class="form-label">RUC</label>
                                <input type="text" id="filtroProveedorRuc" class="form-control" aria-describedby="passwordHelpInline" onkeyup="FiltrarProveedoresNombre()">
                            </div>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="table--container">
                    <!-- <table border="1" style="width:100%;" class="table" id="movimientosKardex"> -->
                    <table class="tbl_venta" id="providersTable" style="width: 95%;">
                        <thead>
                            <tr>
                                <th class="textcenter" width="50">Codigo</th>
                                <th class="textcenter" width="450">Proveedor</th>
                                <th class="textcenter" width="130">RUC</th>
                                <th class="textcenter" width="450">Direccion</th>
                                <th class="textcenter" width="90">Telefono</th>
                                <th class="textcenter" width="120">Fax</th>
                                <th class="textcenter" width="220">Email</th>
                                <th class="textcenter" width="220">Descripción</th>
                            </tr>
                        </thead>


                        <tbody id="detalle_venta">
                            <?php
                            $data = Proveedor::listarProveedores();
                            foreach ($data as $prov) {
                            ?>
                                <tr>
                                    <td class="textcenter"><?= $prov->id_proveedor ?></td>
                                    <td class="textcenter"><?= $prov->razon_social ?></td>
                                    <td class="textcenter"><?= $prov->ruc ?></td>
                                    <td class="textleft"><?= $prov->direccion ?></td>
                                    <td><?= $prov->telefono ?></td>
                                    <td class="textcenter"><?= $prov->fax ?></td>
                                    <td><?= $prov->email ?></td>
                                    <td><?= $prov->descripcion ?></td>
                                    <td style="display:none;"><?= $prov->contacto ?></td>
                                    <td style="display:none;"><?= $prov->estado ?></td>
                                    <td style="display:none;"><?= $prov->id_ubigeo ?></td>
                                </tr>
                            <?php } ?>
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