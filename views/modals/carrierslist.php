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
    <div style="flex: 60%; width:500px;">
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
                <tr>
                    <td>1</td>
                    <td>Leonel Davis</td>
                    <td>Pascual</td>
                    <td>Lucas</td>
                    <td>43226401</td>
                    <td>1043226401</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>Smith</td>
                    <td>67226103</td>
                    <td>1067226103</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div style="margin-top: 16px; display:flex; justify-content: space-around;">
    <button class="btn btn-primary" style="width: 92px;" type="submit">Grabar</button>
    <button class="btn btn-primary" style="width: 92px;" type="button">Modificar</button>
    <button class="btn btn-primary" style="width: 92px;" type="button">Eliminar</button>
</div>