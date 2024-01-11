<h2 style="text-align:center;">Mantenimiento de Marcas de Producto</h2>

<div style="display: flex; gap: 20px; max-width:1200px; margin: 0 auto; padding-left:120px;">
    <div style="flex: 40%; display: flex; flex-direction: column; gap: 10px; width:300px">
        <div style="display: flex; flex-direction: row; gap: 20px;">
            <div style="display: flex; flex-direction: column;">
                <label for="codigo">Código:</label>
                <span id="codigo">-</span>
            </div>
        </div>
        <div style="display: flex; flex-direction: column;">
            <label for="direccion">Descripcion:</label>
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
        <h4 style="text-align:center; max-width:600px;">Listado de Marcas de Productos</h4>
        <div class="table--container" style="max-height:500px;">
            <table border="1" style="width:100%;" id="brandsTable" class="table table__maintenance">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Marca</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/Marca.php");
                    $data = Marca::getMarcas();
                    foreach ($data as $marca) {
                    ?>
                        <tr>
                            <td><?= $marca->id_marca ?></td>
                            <td><?= $marca->descripcion ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>