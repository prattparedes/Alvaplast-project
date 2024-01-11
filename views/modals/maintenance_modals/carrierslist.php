<h2 style="text-align:center;">Mantenimiento de Transportistas</h2>

<div style="display: flex; gap: 20px;">
    <div style="flex: 40%; display: flex; flex-direction: column; gap: 10px; width:300px">
        <div style="display: flex;">
            <span style="font-weight:600;">Código: &nbsp;</span>
            <span style="font-weight:600;" id="codigo">-</span>
        </div>
        <div style="display: flex; justify-content:space-between">
            <span>Nombres:</span>
            <input style="height:32px;" type="text" id="nombres" name="nombres">
        </div>
        <div style="display: flex; justify-content:space-between">
            <span>Ape. Paterno:</span>
            <input style="height:32px;" type="text" id="paterno" name="paterno">
        </div>
        <div style="display: flex; justify-content:space-between">
            <span>Ape. Materno:</span>
            <input style="height:32px;" type="text" id="materno" name="materno">
        </div>
        <div style="display: flex; justify-content:space-between">
            <span>RUC:</span>
            <input style="height:32px;" type="number" id="ruc" name="ruc">
        </div>
        <div style="display: flex; justify-content:space-between">
            <span>DNI:</span>
            <input style="height:32px;" type="number" id="dni" name="dni">
        </div>
        <div style="display: flex; justify-content:space-between">
            <span>Licencia N°:</span>
            <input style="height:32px;" type="text" id="licencia" name="licencia">
        </div>
        <div style="display: flex; justify-content:space-between">
            <span>Dirección:</span>
            <input style="height:32px;" type="text" id="direccion" name="direccion">
        </div>
        <div style="display: flex; justify-content:space-between">
            <span>Teléfono:</span>
            <input style="height:32px;" type="number" id="telefono" name="telefono">
        </div>
        <div style="display: flex; justify-content:space-between">
            <span>Celular:</span>
            <input style="height:32px;" type="number" id="celular" name="celular">
        </div>
    </div>

    <!-- Columna derecha: formulario -->
    <div style="flex: 60%; width:500px; border-left:1.25px solid lightgray; padding-left: 16px;">
        <h4 style="text-align:center;">Lista Transportistas</h4>
        <table border="1" style="width:100%; text-align:center;" id="carrierstable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>A. Paterno</th>
                    <th>A. Materno</th>
                    <th>DNI</th>
                    <th>RUC</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../../../Models/Transportistas.php');
                $transportista = Transportistas::getTransportistas();
                foreach ($transportista as $trans) {
                ?>
                    <tr>
                        <td><?= $trans->id_transportista ?></td>
                        <td><?= $trans->nombres ?></td>
                        <td><?= $trans->ap_paterno ?></td>
                        <td><?= $trans->ap_materno ?></td>
                        <td><?= $trans->dni ?></td>
                        <td><?= $trans->ruc ?></td>
                        <td style="display:none;"><?= $trans->licencia ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div style="margin-top: 16px; display:flex; justify-content: space-around; max-width:440px;">
    <button class="btn btn-primary" style="width: 90px;" type="submit">Nuevo</button><button class="btn btn-primary" style="width: 90px;" type="submit">Grabar</button>
    <button class="btn btn-primary" style="width: 90px;" type="button">Modificar</button>
    <button class="btn btn-primary" style="width: 90px;" type="button">Eliminar</button>
</div>