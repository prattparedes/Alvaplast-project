<h2 style="text-align:center">Mantenimiento de Productos</h2>
<h4>Código de producto: <span>-</span> </h4>
<div style="display: flex; gap: 20px; justify-content: space-between;">
    <!-- Columna izquierda -->
    <div style="display: flex; flex-direction: column; gap: 10px; width: 48%;">
        <div style="display: flex; flex-direction:column; gap: 10px;">
            <div style="display: flex; flex-direction: column;">
                <label for="procedencia">Procedencia:</label>
                <select style="height:32px;" id="procedencia" name="procedencia">
                    <option value="nacional">Nacional</option>
                    <option value="importado">Importado</option>
                </select>
            </div>

            <div style="display: flex; flex-direction: column;">
                <label for="nombre">Nombre:</label>
                <input style="height:32px;" type="text" id="nombre" name="nombre">
            </div>

            <div style="display: flex; flex-direction: column;">
                <label for="linea">Línea:</label>
                <select style="height:32px;" id="linea" name="linea">
                    <option value="rollos">Rollos</option>
                    <option value="bolsas">Bolsas</option>
                    <option value="cubiertos">Cubiertos</option>
                </select>
            </div>

            <div style="display: flex; flex-direction: column;">
                <label for="moneda">Moneda:</label>
                <select style="height:32px; width:100px" id="moneda" name="moneda">
                    <option value="soles">Soles</option>
                    <option value="dolares">Dólares</option>
                </select>
            </div>

            <div style="display: flex; flex-direction: column;">
                <label for="precioCompra">Precio de Compra:</label>
                <input style="height: 32px;  width:100px" type="number" id="precioCompra" name="precioCompra">
            </div>


            <div style="display: flex; flex-direction: column;">
                <label for="precioVenta">Precio de Venta:</label>
                <input style="height: 32px;  width:100px" type="number" id="precioVenta" name="precioVenta">
            </div>
        </div>
    </div>

    <!-- Columna derecha -->
    <div style="display: flex; flex-direction: column; gap: 10px; width: 48%;">
        <div style="display: flex; flex-direction: column;">
            <label for="descripcion">Descripción:</label>
            <input style="height:32px;" type="text" id="descripcion" name="descripcion">
        </div>

        <div style="display: flex; flex-direction: column;">
            <label for="marca">Marca:</label>
            <select style="height:32px;" id="marca" name="marca">
                <option value="alfa">ALFA</option>
                <option value="plastimiq">PLASTIMIQ</option>
                <option value="rayo">RAYO</option>
                <option value="rey">REY</option>
            </select>
        </div>

        <div style="display: flex; flex-direction: row;">
            <div>
                <label for="unidad">Unidad:</label>
                <input style="height:32px; width:100px" type="text" id="unidad" name="unidad">
            </div>
            <div>
                <label for="volumen">Volumen:</label>
                <input style="height:32px; width:100px" type="number" id="volumen" name="volumen">
            </div>
        </div>

        <div style="display: flex; flex-direction: row;">
            <div>
                <label for="stockMinimo">Stock Mínimo:</label>
                <input style="height:32px; width:100px" type="number" id="stockMinimo" name="stockMinimo">
            </div>
            <div>
                <label for="stockMaximo">Stock Máximo:</label>
                <input style="height:32px; width:100px" type="number" id="stockMaximo" name="stockMaximo">
            </div>
        </div>

        <div style="display: flex; flex-direction: column; text-align: left;">
            <label for="descripcion">Estado:</label>
            <div style="display:flex; align-items:center;">
                <input style="height:32px; width:24px;" type="checkbox" id="descripcion" name="descripcion">
                <span style="margin-left:8px; font-weight:600;">Habilitado</span>
            </div>
        </div>

    </div>
</div>

<!-- Campo de Examinar -->
<div style="display: flex; gap: 10px; margin-top: 16px;">
    <div style="display: flex; flex-direction: column; margin-right:40px;">
        <label>Subir Imagen:</label>
        <input type="file" id="foto" name="foto" style="display: none;">
        <button id="selectImageButton">Seleccionar archivo</button>
    </div>
    <div style="display: flex; flex-direction: column;">
        <img id="imagenMostrada" src="assets/img/img-placeholder.png" style="border: 1.5px solid black; max-width: 200px; max-height: 200px;" alt="Imagen">
    </div>
</div>

<!-- Botones -->
<div style="margin-top: 16px; display:flex; justify-content: space-around;">
    <button class="btn btn-primary" style="width: 92px;" type="submit">Grabar</button>
    <button class="btn btn-primary" style="width: 92px;" type="button">Modificar</button>
    <button class="btn btn-primary" style="width: 92px;" type="button">Eliminar</button>
    <button class="btn btn-primary" style="width: 92px;" type="button">Buscar</button>
</div>