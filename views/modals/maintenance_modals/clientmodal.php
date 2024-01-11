<h2 style="text-align:center">Mantenimiento de Clientes</h2>

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
        <div style="display: flex; flex-direction: column;">
            <label for="tipoCliente">Tipo Cliente:</label>
            <select style="height:32px; width: 30%;" id="tipoCliente" name="tipoCliente">
                <option value="J">Juridica</option>
                <option value="N">Natural</option>
            </select>
        </div>
        <div style="display: flex; flex-direction: row; gap: 20px;">
            <div style="display: flex; flex-direction: column;">
                <label for="ruc">RUC:</label>
                <input style="height:32px; width: 70%;" type="number" id="ruc" name="ruc">
            </div>
            <div style="display: flex; flex-direction: column;">
                <label for="dni">DNI:</label>
                <input style="height:32px; width: 70%;" type="number" id="dni" name="dni">
            </div>
        </div>
        <div style="display: flex; flex-direction: column;">
            <label for="direccion">Dirección:</label>
            <input style="height:32px; width: 100%;" type="text" id="direccion" name="direccion">
        </div>
        <div style="display: flex; flex-direction: column;">
            <label for="departamento">Departamento:</label>
            <select style="height:32px; width: 50%;" id="departamento" name="departamento">
                <?php
                require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/maintenance_models/Ubigeo.php");
                $data = Ubigeo::getDepartamentos();
                foreach ($data as $ubi) {
                ?>
                    <option value="<?= $ubi->id_ubigeo ?>"><?= $ubi->descripcion ?></option>
                <?php } ?>
            </select>
        </div>
        <div style="display: flex; flex-direction: column;">
            <label for="provincia">Provincia:</label>
            <select style="height:32px; width: 50%;" id="provincia" name="provincia">
                <option value="huaral">Huaral</option>
                <option value="canete">Cañete</option>
            </select>
        </div>
        <div style="display: flex; flex-direction: column;">
            <label for="distrito">Distrito:</label>
            <select style="height:32px; width: 50%;" id="distrito" name="distrito">
                <option value="cercadoLima">Cercado de Lima</option>
                <option value="magdalenaMar">Magdalena del Mar</option>
            </select>
        </div>
        <div style="display: flex; flex-direction: row; gap: 20px;">
            <div style="display: flex; flex-direction: column;">
                <label for="telefono">Teléfono:</label>
                <input style="height:32px; width: 70%;" type="number" id="telefono" name="telefono">
            </div>
            <div style="display: flex; flex-direction: column;">
                <label for="celular">Celular:</label>
                <input style="height:32px; width: 70%;" type="number" id="celular" name="celular">
            </div>
        </div>
        <div style="display: flex; flex-direction: column;">
            <label for="estado">Estado:</label>
            <select style="height:32px; width: 50%;" id="estado" name="estado">
                <option value="H">Habilitado</option>
                <option value="D">Deshabilitado</option>
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
        <h4 style="text-align:center;">Listado de Clientes</h4>
        Filtrar por razon social: <input type="text" onkeyup="FiltrarClientesMantenimiento()" id="filtroClientes">
        <div class="table--container" style="max-height:692px; margin-top:8px;">
            <table border="1" style="width:100%;" id="clientsTable" class="table table__maintenance--big">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Razon Social</th>
                        <th>RUC</th>
                        <th>DNI</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Celular</th>
                        <th>Distrito</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/Cliente.php");
                    $data = Cliente::getClientes();
                    foreach ($data as $client) {
                    ?>
                        <tr>
                            <td><?= $client->id_cliente ?></td>
                            <td><?= $client->razon_social ?></td>
                            <td><?= $client->ruc ?></td>
                            <td><?= $client->dni ?></td>
                            <td><?= $client->direccion ?></td>
                            <td><?= $client->telefono ?></td>
                            <td><?= $client->celular ?></td>
                            <td><?= $client->distrito ?></td>
                            <td style="display:none;"><?= $client->id_ubigeo ?></td>
                            <td style="display:none;"><?= $client->tipo_cliente ?></td>
                            <td style="display:none;"><?= $client->estado ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>