<h2 style="text-align:center">Mantenimiento de Proveedores</h2>
<div style="display: flex; flex-direction: column; gap: 10px;">
    <div style="display: flex; flex-direction: row; gap: 20px;">
        <div style="display: flex; flex-direction: column;">
            <label for="codigo">Código:</label>
            <span>-</span>
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
        <label for="departamento">Departamento:</label>
        <select style="height:32px; width: 100%;" id="departamento" name="departamento">
            <option value="lima">LIMA</option>
            <option value="callao">CALLAO</option>
        </select>
    </div>
    <div style="display: flex; flex-direction: column;">
        <label for="provincia">Provincia:</label>
        <select style="height:32px; width: 100%;" id="provincia" name="provincia">
            <option value="huaral">Huaral</option>
            <option value="canete">Cañete</option>
        </select>
    </div>
    <div style="display: flex; flex-direction: column;">
        <label for="distrito">Distrito:</label>
        <select style="height:32px; width: 100%;" id="distrito" name="distrito">
            <option value="cercadoLima">Cercado de Lima</option>
            <option value="magdalenaMar">Magdalena del Mar</option>
        </select>
    </div>
    <div style="display: flex; flex-direction: column;">
        <label for="direccion">Descripcion:</label>
        <input style="height:64px; width: 100%;" type="text" id="descripcion" name="descripcion">
    </div>
    <div style="display: flex; flex-direction: column;">
        <label for="estado">Estado:</label>
        <select style="height:32px; width: 100%;" id="estado" name="estado">
            <option value="habilitado">Habilitado</option>
            <option value="deshabilitado">Deshabilitado</option>
        </select>
    </div>
    <div style="margin-top: 16px; display:flex; justify-content: space-around;">
        <button class="btn btn-primary" style="width: 92px;" type="submit">Grabar</button>
        <button class="btn btn-primary" style="width: 92px;" type="button">Modificar</button>
        <button class="btn btn-primary" style="width: 92px;" type="button">Eliminar</button>
        <button class="btn btn-primary" style="width: 92px;" type="button">Buscar</button>
    </div>
</div>