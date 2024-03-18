<div class="pagarcuota--container" style="width:600px; height: 210px; background-color:rgb(255, 204, 204); border: 1.5px solid gray;" id="miModal">
    <div style="background-color:rgb(255, 153, 153); display:flex;">
        <h3 style="flex: 1; text-align: center; margin: 4px 0px; font-size: 16px;"> ====PAGAR CUOTA====</h3> <button style="align-self: flex-start;">X</button>
        <?php print_r($_POST); ?>
    </div>
    <div style="display:flex;">
        <div class="pagarcuota__left" style="flex: 0.68; border: 1px solid black; height:182px;">
            <table style="border-collapse: collapse; width: 90%; border:1px solid black; background-color:white; font-weight: 600;">
                <thead>
                    <tr>
                        <th>Cuota</th>
                        <th>Monto S/.</th>
                        <th>Estado</th>
                        <th>F. Pago</th>
                    </tr>
                </thead>
                <tbody style="color:blue; border:1px solid black; text-align:center;">
                    <tr>
                        <td>1</td>
                        <td>1315.4000</td>
                        <td>PENDIENTE</td>
                        <td>0</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="pagarcuota__right" style="flex: 0.32; padding: 4px; background-color: #ffdddd;">
            <div style="display:flex; align-items:center; text-align:center; justify-content:right; font-size: 14px;">
                <label for="total" style="display: inline-block; color:blue; margin-right:4px; font-weight:600; text-align: left;">Total:</label>
                <input type="number" style="width:100px;" id="total" name="total"><br><br>
            </div>

            <div style="display:flex; align-items:center; text-align:center; justify-content:right; font-size: 14px;">
                <label for="debe" style="display: inline-block; color:blue; margin-right:4px; font-weight:600; text-align: left;">Debe:</label>
                <input type="number" style="width:100px;" id="debe" name="debe"><br><br>
            </div>
            <div style="display:flex; align-items:center; text-align:center; justify-content:right; font-size: 14px; margin-bottom: 12px;">
                <label for="monto-pago" style="display: inline-block; color:blue; margin-right:4px; font-weight:600;">Monto Pago:</label>
                <input type="number" style="width:100px;" id="monto-pago" name="monto-pago"><br><br>
            </div>

            <div style="display:flex; justify-content: space-around;">
                <button name="btn-pagar" style="padding: 12px; color:white; background-color: rgb(78, 134, 226); font-weight:600; max-width: 65px; height:52px; border: 1px solid white; margin-left:32px;">Pagar</button>
                <button name="btn-anular-pago" style="padding: 12px; color:white; background-color: rgb(78, 134, 226); font-weight:600; max-width: 65px; height:52px; border: 1px solid white;">Anular Pago</button>

            </div>
        </div>
    </div>
</div>