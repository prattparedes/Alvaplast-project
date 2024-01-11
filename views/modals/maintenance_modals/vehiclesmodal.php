<h2 style="text-align:center;">Mantenimiento de Vehículos</h2>
<div style="display: flex; gap: 20px;">
    <!-- Columna izquierda: tabla de monedas -->
    <div style="flex: 40%; display: flex; flex-direction: column; gap: 10px; width:300px">
        <div style="display: flex; flex-direction: column;">
            <span>Código:</span>
            <span id="codigo">-</span>
        </div>
        <div style="display: flex; flex-direction: column;">
            <span>Placa:</span>
            <input style="height:32px; width: 100%;" type="text" id="placa" name="placa">
        </div>
        <div style="display: flex; flex-direction: column;">
            <span>Combustible:</span>
            <select name="" id="tipo">
                <option value="Gasolina">Gasolina</option>
                <option value="Petroleo">Petroleo</option>
            </select>
        </div>

        <div style="display: flex; flex-direction: column;">
            <span>Marca:</span>
            <select name="" id="marca" value="">
                <option value="Lamborghini">Lamborghini</option>
                <option value="Dodge">Dodge</option>
                <option value="Hyunday">Hyunday</option>
                <option value="KIA">KIA</option>
            </select>
        </div>
        <div style="display: flex; flex-direction: column;">
            <span>Modelo:</span>
            <input style="height:32px; width: 100%;" type="text" id="modelo" name="modelo">
        </div>
        <div style="margin-top: 16px; display:flex; justify-content: space-around; max-width:440px;">
            <button class="btn btn-primary maintenanceform__btn" style="width: 90px;" type="submit">Nuevo</button>
<button class="btn btn-primary maintenanceform__btn" style="width: 90px;" type="submit">Grabar</button>
            <button class="btn btn-primary maintenanceform__btn" style="width: 100px;" type="button">Modificar</button>
            <button class="btn btn-primary maintenanceform__btn" style="width: 90px;" type="button">Eliminar</button>
        </div>
    </div>
    <!-- Columna derecha: formulario -->
    <div style="flex: 60%; width:500px;">
        <h4 style="text-align:center;">Vehículos</h4>
        <table border="1" style="width:100%; text-align:center;" id="vehicletable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Placa</th>
                    <th>Modelo</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/Models/Vehiculo.php');
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