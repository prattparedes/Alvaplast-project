<h2 style="text-align:center;">Mantenimiento de Tipos de Documento</h2>
<div style="display: flex; flex-direction: column; gap: 10px;">
    <div style="display: flex; flex-direction: row; gap: 20px;">
        <div style="display: flex; flex-direction: column;">
            <label for="codigo">Código:</label>
            <span>-</span>
        </div>
    </div>
    <div style="display: flex; flex-direction: column;">
        <label for="abreviatura">Abreviatura:</label>
        <input style="height:32px; width: 50%;" type="text" id="abreviatura" name="abreviatura">
    </div>
    <div style="display: flex; flex-direction: column;">
        <label for="descripcion">Descripcion:</label>
        <input style="height:32px; width: 100%;" type="text" id="descripcion" name="descripcion">
    </div>
    <div style="margin-top: 16px; display:flex; justify-content: space-around;">
        <button class="btn btn-primary" style="width: 92px;" type="submit">Grabar</button>
        <button class="btn btn-primary" style="width: 92px;" type="button">Modificar</button>
        <button class="btn btn-primary" style="width: 92px;" type="button">Eliminar</button>
        <button class="btn btn-primary" style="width: 92px;" type="button">Buscar</button>
    </div>
</div>