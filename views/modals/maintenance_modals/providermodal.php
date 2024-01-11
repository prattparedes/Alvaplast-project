<h2 style="text-align:center">Mantenimiento de Proveedores</h2>

<div style="display: flex; gap: 20px; margin: 0 auto;">
    <div style="flex: 40%; display: flex; flex-direction: column; gap: 10px; width:300px">
        <div style="display: flex; flex-direction: row; gap: 20px;">
            <div style="display: flex; flex-direction: column;">
                <label for="codigo">Código:</label>
                <span id="codigo">-</span>
            </div>
            <div style="display: flex; flex-direction: column; flex-grow: 1;">
                <label for="razonSocial">Razón Social:</label>
                <input style="height:32px; width: 100%;" type="text" id="razonSocial" name="razonSocial">
            </div>
        </div>
        <div style="display: flex; flex-direction: row; gap: 20px;">
            <div style="display: flex; flex-direction: column;">
                <label for="ruc">RUC:</label>
                <input style="height:32px; width: 70%;" type="number" id="ruc" name="ruc">
            </div>
        </div>
        <div style="display: flex; flex-direction: column;">
            <label for="direccion">Dirección:</label>
            <input style="height:32px; width: 100%;" type="text" id="direccion" name="direccion">
        </div>
        <div style="display: flex; flex-direction: column;">
            <label for="direccion">Email:</label>
            <input style="height:32px; width: 100%;" type="text" id="email" name="email">
        </div>
        <div style="display: flex; flex-direction: row; gap: 20px;">
            <div style="display: flex; flex-direction: column;">
                <label for="telefono">Teléfono:</label>
                <input style="height:32px; width: 70%;" type="number" id="telefono" name="telefono">
            </div>
            <div style="display: flex; flex-direction: column;">
                <label for="telefono">Fax:</label>
                <input style="height:32px; width: 70%;" type="number" id="fax" name="fax">
            </div>
        </div>
        <div style="display: flex; flex-direction: column;">
            <label for="direccion">Contacto:</label>
            <input style="height:32px; width: 100%;" type="text" id="contacto" name="contacto">
        </div>
        <div style="display: flex; flex-direction: column;">
            <label for="departamento">Departamento:</label>
            <select style="height:32px; width: 50%;" id="departamento" name="departamento" onchange="listarProvincia(this.value)">
                <?php
                require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/maintenance_models/Ubigeo.php");
                $data = Ubigeo::getDepartamentos();
                foreach ($data as $ubi) {
                ?>
                    <option value="<?= $ubi->id_ubigeo?>"><?=$ubi->descripcion?></option>
                <?php } ?>
            </select>
        </div>
        <div style="display: flex;">
            <div style="display: flex; flex-direction: column; margin-right:64px;">
                <label for="provincia">Provincia:</label>
                <select style="height:32px; width: 260px;" id="provincia" name="provincia" onchange="listarDistrito(this.value)">
                </select>
            </div>
            <div style="display: flex; flex-direction: column;">
                <label for="distrito">Distrito:</label>
                <select style="height:32px; width: 298px;" id="distrito" name="distrito">
                </select>
            </div>
        </div>
        <div style="display: flex; flex-direction: column;">
            <label for="direccion">Descripcion:</label>
            <input style="height:64px; width: 100%;" type="text" id="descripcion" name="descripcion">
        </div>
        <div style="display: flex; flex-direction: column;">
            <label for="estado">Estado:</label>
            <select style="height:32px; width: 100%;" id="estado" name="estado">
                <option value="1">Habilitado</option>
                <option value="0">Deshabilitado</option>
            </select>
        </div>
        <div style="margin-top: 16px; display:flex; justify-content: space-around; max-width:440px;">
            <button class="btn btn-primary maintenanceform__btn" style="width: 90px;" type="submit">Nuevo</button>
<button class="btn btn-primary maintenanceform__btn" style="width: 90px;" type="submit">Grabar</button>
            <button class="btn btn-primary maintenanceform__btn" style="width: 100px;" type="button">Modificar</button>
            <button class="btn btn-primary maintenanceform__btn" style="width: 90px;" type="button">Eliminar</button>
        </div>
    </div>
    <div style="flex: 60%; border-left:1.25px solid lightgray; padding-left: 16px;">
        <h4 style="text-align:center;">Listado de Proveedores</h4>
        <div class="table--container" style="max-height:720px;">
            <table border="1" style="width:100%;" id="providersTable" class="table table__maintenance--big">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Proveedor</th>
                        <th>RUC</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>FAX</th>
                        <th>Email</th>
                        <th>Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/Proveedor.php");
                    $data = Proveedor::listarProveedores();
                    foreach ($data as $prov) {
                    ?>
                        <tr>
                            <td><?= $prov->id_proveedor ?></td>
                            <td><?= $prov->razon_social ?></td>
                            <td><?= $prov->ruc ?></td>
                            <td><?= $prov->direccion ?></td>
                            <td><?= $prov->telefono ?></td>
                            <td><?= $prov->fax ?></td>
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