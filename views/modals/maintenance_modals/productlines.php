<h2 style="text-align:center;">Mantenimiento de Línea de Productos</h2>

<div style="display: flex; gap: 20px; max-width:1200px; margin:0 auto;">
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
            <button class="btn btn-primary" style="width: 90px;" type="submit">Nuevo</button>
            <button class="btn btn-primary" style="width: 90px;" type="submit">Grabar</button>
            <button class="btn btn-primary" style="width: 100px;" type="button">Modificar</button>
            <button class="btn btn-primary" style="width: 90px;" type="button">Eliminar</button>
        </div>
    </div>
    <div style="flex: 60%; width:500px; border-left:1.25px solid lightgray; padding-left: 16px;">
        <h4 style="text-align:center;">Listado de Líneas de Productos</h4>
        <table border="1" style="width:100%; text-align:center;" id="productlinesTable">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/Linea.php");
                $data = Linea::ListarLineas();
                foreach ($data as $linea) {
                ?>
                    <tr>
                        <td><?= $linea->id_linea ?></td>
                        <td><?= $linea->descripcion ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>