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
                <tr>
                    <td>2</td>
                    <td>ADS-878</td>
                    <td>Camion</td>
                    <td>Gasolina</td>
                    <td>Hyunday</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>B5T-889</td>
                    <td>Furgoneta</td>
                    <td>Petroleo</td>
                    <td>KIA</td>
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