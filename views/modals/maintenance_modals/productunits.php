<h2 style="text-align:center;">Mantenimiento de Unidad de Productos</h2>
<div style="display: flex; gap: 20px;">
    <div style="flex: 40%; display: flex; flex-direction: column; gap: 10px; width:300px">
        <div style="display: flex; flex-direction: row; gap: 20px;">
            <div style="display: flex; flex-direction: column;">
                <label for="codigo">Código:</label>
                <span id="codigo">-</span>
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
        <div style="margin-top: 16px; display:flex; justify-content: space-around; max-width:440px;">
            <button class="btn btn-primary maintenanceform__btn" style="width: 90px;" type="submit">Nuevo</button>
<button class="btn btn-primary maintenanceform__btn" style="width: 90px;" type="submit">Grabar</button>
            <button class="btn btn-primary maintenanceform__btn" style="width: 100px;" type="button">Modificar</button>
            <button class="btn btn-primary maintenanceform__btn" style="width: 90px;" type="button">Eliminar</button>
        </div>
    </div>
    <div style="flex: 60%; width:500px; border-left:1.25px solid lightgray; padding-left: 16px;">
        <h4 style="text-align:center;">Listado de Unidades de Productos</h4>
        <table border="1" style="width:100%; text-align:center;" id="unitsTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código de Unidad</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/Unidad.php");
                $data = Unidad::getUnidades();
                foreach ($data as $unit) {
                ?>
                    <tr>
                        <td><?= $unit->id_unidad ?></td>
                        <td><?= $unit->abreviatura ?></td>
                        <td><?= $unit->descripcion ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>