<h2 style="text-align:center;">Mantenimiento de Sucursales</h2>

<div style="display: flex; gap: 20px;">
    <div style="flex: 40%; display: flex; flex-direction: column; gap: 10px; width:300px">
        <div style="display: flex; flex-direction: row; gap: 20px;">
            <div style="display: flex; flex-direction: column;">
                <label for="codigo">Código:</label>
                <span id="codigo">-</span>
            </div>
        </div>
        <div style="display: flex; flex-direction: column;">
            <label for="descripcion">Descripcion:</label>
            <input style="height:32px; width: 100%;" type="text" id="descripcion" name="descripcion">
        </div>
        <div style="display: flex; flex-direction: column;">
            <label for="descripcion">Dirección:</label>
            <input style="height:32px; width: 100%;" type="text" id="direccion" name="descripcion">
        </div>
        <div style="display: flex; flex-direction: column;">
            <label for="telefono">Teléfono:</label>
            <input style="height:32px; width: 50%;" type="number" id="telefono" name="telefono">
        </div>
        <div style="margin-top: 16px; display:flex; justify-content: space-around; max-width:360px;">
            <button class="btn btn-primary" style="width: 92px;" type="submit">Grabar</button>
            <button class="btn btn-primary" style="width: 92px;" type="button">Modificar</button>
            <button class="btn btn-primary" style="width: 92px;" type="button">Eliminar</button>
        </div>
    </div>
    <div style="flex: 60%; width:500px; border-left:1.25px solid lightgray; padding-left: 16px;">
        <h4 style="text-align:center;">Listado de Sucursales</h4>
        <table border="1" style="width:100%; text-align:center;" id="branchstable">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../../../Models/Sucursal.php');
                $sucursal = Sucursal::getSucursales();
                ?>
                <tr>
                    <td><?= $sucursal->id_sucursal ?></td>
                    <td><?= $sucursal->descripcion ?></td>
                    <td><?= $sucursal->direccion ?></td>
                    <td><?= $sucursal->telefono ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>