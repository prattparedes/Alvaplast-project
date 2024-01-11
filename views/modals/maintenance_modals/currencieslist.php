<h2 style="text-align:center;">Mantenimiento de Monedas</h2>

<div style="display: flex; gap: 20px;">
    <div style="flex: 40%; display: flex; flex-direction: column; gap: 10px; width:300px">
        <div style="display: flex; flex-direction: row; gap: 20px;">
            <div style="display: flex; flex-direction: column;">
                <span>Código:</span>
                <input id="codigo" type="number" disabled>
            </div>
        </div>
        <div style="display: flex; flex-direction: column;">
            <span>Descripción:</span>
            <input style="height:32px; width: 100%;" type="text" id="descripcion" name="descripcion">
        </div>
        <div style="display: flex; flex-direction: column;">
            <span style="width: 100px;">Símbolo:</span>
            <input style="height:32px; width: 50%;" type="text" id="abreviatura" name="abreviatura">
            <input type="hidden" id="metodo" name="metodo" value="nuevo">
        </div>
        <div style="margin-top: 16px; display:flex; justify-content: space-around; max-width:440px;">
            <button class="btn btn-primary maintenanceform__btn" style="width: 90px;" type="submit" onclick="botonNuevo()">Nuevo</button>
            <button class="btn btn-primary maintenanceform__btn" style="width: 90px;" type="submit" onclick="botonesMantenimiento('Grabar')">Grabar</button>
            <button class="btn btn-primary maintenanceform__btn maintenanceform__btn--inactive" style="width: 100px;" type="button" onclick="botonModificar()">Modificar</button>
            <button class="btn btn-primary maintenanceform__btn maintenanceform__btn--inactive" style="width: 90px;" type="button" onclick="botonEliminar()">Eliminar</button>
        </div>
    </div>
    <div style="flex: 60%; width:500px; border-left:1.25px solid lightgray; padding-left: 16px;">
        <h4 style="text-align:center;">Listado de Monedas</h4>
        <table border="1" style="width:100%; text-align:center;" id="currenciesTable">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Símbolo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/Moneda.php");
                $data = Moneda::getMonedas();
                foreach ($data as $money) {
                ?>
                    <tr>
                        <td><?= $money->id_moneda ?></td>
                        <td><?= $money->descripcion ?></td>
                        <td><?= $money->simbolo ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>