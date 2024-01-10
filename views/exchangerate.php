<div style="max-width: 1200px; margin:0 auto;">
    <h2 style="text-align:center; margin-bottom: 16px;">Tipo de Cambio</h2>
    <div style="display: flex; gap: 20px;">
        <div style="flex: 40%; display: flex; flex-direction: column; gap: 10px; width:300px;">
            <div style="display: flex; flex-direction: column; align-items:end;">
                <p style="text-align:left; width:50%; margin-bottom: 2px;">Fecha Inicio:</p>
                <?php
                date_default_timezone_set('America/Lima'); // Establecer la zona horaria de Perú
                $currentDateTime = date('Y-m-d H:i');
                ?>
                <input type="datetime-local" style="width:50%;" id="fechaInicio" name="fechaInicio" value="<?php echo $currentDateTime; ?>" disabled>
            </div>
            <div style="display: flex; flex-direction: column; align-items:end;">
                <?php
                $url = 'https://api.apis.net.pe/v1/tipo-cambio-sunat';
                $response = file_get_contents($url);
                $data = json_decode($response);
                $compra = $data->compra;
                $venta = $data->venta;
                ?>
                <p style="text-align:left; width:50%; margin-bottom: 2px;">T. Compra:</p>
                <input type="number" style="width:50%;" id="tCompra" name="tCompra" value="<?php echo $compra ?>">
            </div>
            <div style="display: flex; flex-direction: column; align-items:end;">
                <p style="text-align:left; width:50%; margin-bottom: 2px;">T. Venta:</p>
                <input type="number" style="width:50%;" id="tVenta" name="tVenta" value="<?php echo $venta ?>">
            </div>
            <div style="margin-top: 16px; display:flex; justify-content: end; max-width:360px;">
                <button class="btn btn-primary" style="width: 92px; margin-right:32px;" type="submit">Grabar</button>
            </div>
        </div>
        <div style="flex: 60%; width:500px; border-left:1.25px solid lightgray; padding-left: 16px;">
            <div class="table--container" style="max-height:600px;">
                <table border="1" style="width:100%; text-align:center;" class="table  table__maintenance">
                    <thead>
                        <tr>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Precio Compra</th>
                            <th>Precio Venta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/TipoCambio.php");
                        $data = TipoCambio::getTipoCambio();
                        foreach ($data as $exchange) {
                        ?>
                            <tr>
                                <td><?= $exchange->fecha_inicio ?></td>
                                <td><?= $exchange->fecha_fin === '1900-01-01 00:00:00' ? '' : $exchange->fecha_fin ?></td>
                                <td><?= $exchange->cambio_compra ?></td>
                                <td><?= $exchange->cambio_venta ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>