<h2 style="text-align:center">Mantenimiento de Productos</h2>
<h4>Código de producto: <span>17</span> </h4>
<div style="display: flex; gap: 20px; justify-content: space-between;">
    <!-- Columna izquierda -->
    <div style="display: flex; flex-direction: column; gap: 10px; width: 48%;">
        <div style="display: flex; flex-direction:column; gap: 10px;">
            <div style="display: flex; flex-direction: column;">
                <label for="procedencia">Procedencia:</label>
                <select id="procedencia" name="procedencia">
                    <option value="nacional">Nacional</option>
                    <option value="importado">Importado</option>
                </select>
            </div>

            <div style="display: flex; flex-direction: column;">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">
            </div>

            <div style="display: flex; flex-direction: column;">
                <label for="linea">Línea:</label>
                <select id="linea" name="linea">
                    <option value="rollos">Rollos</option>
                    <option value="bolsas">Bolsas</option>
                    <option value="cubiertos">Cubiertos</option>
                </select>
            </div>

            <div style="display: flex; flex-direction: column;">
                <label for="precioCompra">Precio de Compra:</label>
                <input type="number" id="precioCompra" name="precioCompra">
            </div>

            <div style="display: flex; flex-direction: column;">
                <label for="moneda">Moneda:</label>
                <select id="moneda" name="moneda">
                    <option value="soles">Soles</option>
                    <option value="dolares">Dólares</option>
                </select>
            </div>

            <div style="display: flex; flex-direction: column;">
                <label for="precioVenta">Precio de Venta:</label>
                <input type="number" id="precioVenta" name="precioVenta">
            </div>
        </div>
    </div>

    <!-- Columna derecha -->
    <div style="display: flex; flex-direction: column; gap: 10px; width: 48%;">
        <div style="display: flex; flex-direction: column;">
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion">
        </div>

        <div style="display: flex; flex-direction: column;">
            <label for="marca">Marca:</label>
            <select id="marca" name="marca">
                <option value="alfa">ALFA</option>
                <option value="plastimiq">PLASTIMIQ</option>
                <option value="rayo">RAYO</option>
                <option value="rey">REY</option>
            </select>
        </div>

        <div style="display: flex; flex-direction: column;">
            <label for="unidad">Unidad:</label>
            <input type="text" id="unidad" name="unidad">
        </div>

        <div style="display: flex; flex-direction: column;">
            <label for="volumen">Volumen:</label>
            <input type="number" id="volumen" name="volumen">
        </div>

        <div style="display: flex; flex-direction: column;">
            <label for="stockMinimo">Stock Mínimo:</label>
            <input type="number" id="stockMinimo" name="stockMinimo">
        </div>

        <div style="display: flex; flex-direction: column;">
            <label for="stockMaximo">Stock Máximo:</label>
            <input type="number" id="stockMaximo" name="stockMaximo">
        </div>
    </div>
</div>

<!-- Campo de Examinar -->
<div style="display: flex; gap: 10px; margin-top: 10px;">
    <div style="display: flex; flex-direction: column;">
        <label for="foto">Examinar:</label>
        <input type="file" id="foto" name="foto">
    </div>
    <div style="display: flex; flex-direction: column;">
        <label>Imagen:</label>
        <img id="imagenMostrada" style="max-width: 200px; max-height: 200px;" alt="Imagen">
    </div>
</div>

<!-- Botones -->
<div style="margin-top: 10px;">
    <button class="btn btn-primary" type="submit">Grabar</button>
    <button class="btn btn-primary" type="button">Modificar</button>
    <button class="btn btn-primary" type="button">Eliminar</button>
    <button class="btn btn-primary" type="button">Buscar</button>
</div>