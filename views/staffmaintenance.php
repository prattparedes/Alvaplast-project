<h2 style="text-align:center">Mantenimiento de Personal</h2>

<div style="max-width: 1600px; margin: 0 auto;">
    <div style="display: flex; gap: 20px; margin: 0 auto;">
        <div style="flex: 40%; display: flex; flex-direction: column; gap: 10px; width:300px">
            <div style="display: flex; flex-direction: row; gap: 20px;">
                <div style="display: flex; flex-direction: column;">
                    <label for="codigo">Código:</label>
                    <span id="codigo">-</span>
                </div>
                <div style="display: flex; flex-direction: column; flex-grow: 1;">
                    <label for="nombres">Nombres:</label>
                    <input style="height:32px; width: 100%;" type="text" id="nombres" name="nombres">
                </div>
            </div>
            <div style="display: flex; flex-direction: row; gap: 20px;">
                <div style="display: flex; flex-direction: column;">
                    <label for="paterno">Ap. Paterno:</label>
                    <input style="height:32px; width: 100%;" type="text" id="paterno" name="paterno">
                </div>
                <div style="display: flex; flex-direction: column;">
                    <label for="materno">Ap. Materno:</label>
                    <input style="height:32px; width: 100%;" type="text" id="materno" name="materno">
                </div>
            </div>
            <div style="display: flex; flex-direction: row; gap: 20px;">
                <div style="display: flex; flex-direction: column;">
                    <label for="dni">DNI</label>
                    <input style="height:32px; width: 100%;" type="number" id="dni" name="dni">
                </div>
                <div style="display: flex; flex-direction: column;">
                    <label for="materno">Cargo:</label>
                    <select name="" id="cargo">
                        <option value="" default>Elija una opcion</option>
                        <option value="A">Administrador</option>
                        <option value="V">Vendedor</option>
                    </select>
                </div>
            </div>
            <div style="display: flex; flex-direction: column;">
                <label for="direccion">Dirección:</label>
                <input style="height:32px; width: 100%;" type="text" id="direccion" name="direccion">
            </div>
            <div style="display: flex; flex-direction: row; gap: 20px;">
                <div style="display: flex; flex-direction: column;">
                    <label for="telefono">Teléfono:</label>
                    <input style="height:32px; width: 100%;" type="number" id="telefono" name="telefono">
                </div>
                <div style="display: flex; flex-direction: column;">
                    <label for="celular">Celular:</label>
                    <input style="height:32px; width: 100%;" type="number" id="celular" name="celular">
                </div>
            </div>
            <div style="display: flex; flex-direction: row; gap: 20px;">
                <div style="display: flex; flex-direction: column;">
                    <label for="estado">Estado:</label>
                    <select style="height:32px; width: 100%;" id="estado" name="estado">
                        <option value="A">Activo</option>
                        <option value="C">Cesante</option>
                        <option value="V">Vacaciones</option>
                    </select>
                </div>
                <div style="display: flex; flex-direction: column;">
                    <button style="height:100%; display: flex; flex-direction:column; align-items:center; margin-left: 40px;" onclick="cargarPermisosPersonal()"><i class="bi bi-person-vcard"></i><span>Permisos de Almacén</span></button>
                </div>  
            </div>
            <div style="display: flex; flex-direction: column;">
                <label for="usuario">Usuario:</label>
                <input style="height:32px; width: 50%;" type="text" id="usuario" name="usuario">
            </div>
            <div style="display: flex; flex-direction: row; gap: 20px;">
                <div style="display: flex; flex-direction: column;">
                    <label for="clave">Clave:</label>
                    <input style="height:32px; width: 100%;" type="password" id="clave" name="clave">
                </div>
                <div style="display: flex; flex-direction: column;">
                    <label for="clave2">Repetir Clave:</label>
                    <input style="height:32px; width: 100%;" type="password" id="clave2" name="clave2">
                </div>
            </div>
            <div style="margin-top: 16px; display:flex; justify-content: space-around; max-width:440px;">
                <button class="btn btn-primary" style="width: 90px;" type="submit">Nuevo</button><button class="btn btn-primary" style="width: 90px;" type="submit">Grabar</button>
                <button class="btn btn-primary" style="width: 100px;" type="button">Modificar</button>
                <button class="btn btn-primary" style="width: 90px;" type="button">Eliminar</button>
            </div>
        </div>
        <div style="flex: 60%; border-left:1.25px solid lightgray; padding-left: 16px;">
            <h4 style="text-align:center;">Listado de Personal</h4>
            <div class="table--container" style="max-height:720px;">
                <table border="1" style="width:100%;" id="staffTable" class="table table__maintenance--big">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombres</th>
                            <th>Ap. Paterno</th>
                            <th>Ap. Materno</th>
                            <th>Dni</th>
                            <th>Direccion</th>
                            <th>Teléfono</th>
                            <th>Cargo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/Personal.php");
                        $data = Personal::getPersonal();
                        foreach ($data as $pers) {
                        ?>
                            <tr ondblclick="llenarFormularioStaff(this)">
                                <td><?= $pers->id_personal ?></td>
                                <td><?= $pers->nombres ?></td>
                                <td><?= $pers->ap_paterno ?></td>
                                <td><?= $pers->ap_materno ?></td>
                                <td><?= $pers->dni ?></td>
                                <td><?= $pers->direccion ?></td>
                                <td><?= $pers->telefono ?></td>
                                <td><?= $pers->cargo ?></td>
                                <td style="display:none;"><?= $pers->estado ?></td>
                                <td style="display:none;"><?= $pers->usuario ?></td>
                                <td style="display:none;"><?= $pers->clave ?></td>
                                <td style="display:none;"><?= $pers->celular ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'modals/generalModal.php'; ?>