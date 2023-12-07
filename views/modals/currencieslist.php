<h2 style="text-align:center;">Mantenimiento de Monedas</h2>
<div style="display: flex; gap: 20px;">
    <!-- Columna izquierda: tabla de monedas -->
    <div style="flex: 1; width:500px;">
        <h4 style="text-align:center;">Monedas</h4>
        <table border="1" style="width:100%;">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Símbolo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>SOLES</td>
                    <td>S/.</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>DOLARES</td>
                    <td>$</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Columna derecha: formulario -->
    <div style="flex: 1; display: flex; flex-direction: column; gap: 10px;">
        <div style="display: flex; flex-direction: column;">
            <span>Código:</span>
            <span>-</span>
        </div>
        <div style="display: flex; flex-direction: column;">
            <span>Descripción:</span>
            <input style="height:32px; width: 100%;" type="text" id="descripcion" name="descripcion">
        </div>
        <div style="display: flex; flex-direction: column;">
            <span style="width: 100px;">Símbolo:</span>
            <input style="height:32px; width: 50%;" type="text" id="abreviatura" name="abreviatura">
        </div>
    </div>
</div>
<div style="margin-top: 16px; display:flex; justify-content: space-around;">
    <button class="btn btn-primary" style="width: 92px;" type="submit">Grabar</button>
    <button class="btn btn-primary" style="width: 92px;" type="button">Modificar</button>
    <button class="btn btn-primary" style="width: 92px;" type="button">Eliminar</button>
    <button class="btn btn-primary" style="width: 92px;" type="button">Buscar</button>
</div>