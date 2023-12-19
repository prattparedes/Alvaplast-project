<h2 style="text-align:center;">Mantenimiento de Monedas</h2>
<div style="display: flex; gap: 20px;">
    <!-- Columna izquierda: tabla de monedas -->
    <div style="flex: 1; width:500px;">
        <h4 style="text-align:center;">Monedas</h4>
        <table border="1" style="width:100%;" id="currenciesTable">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Símbolo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/Models/Moneda.php"); 
                $data = Moneda::getMonedas();
                foreach($data as $money){
                ?>
                <tr>
                    <td><?=$money->id_moneda?></td>
                    <td><?=$money->descripcion?></td>
                    <td><?=$money->simbolo?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    <!-- Columna derecha: formulario -->
    <form method="POST"  id="miFormulario">
        
        <div style="flex: 1; display: flex; flex-direction: column; gap: 10px;">
            <div style="display: flex; flex-direction: column;">
                <span>Código:</span>
                <input id="codigo" type="number" disabled>
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
        </div>
        <div>
            
        </div>
    </form>
</div>
<div style="margin-top: 16px; display:flex; justify-content: space-around;">
    <button class="btn btn-primary money_submit"  style="width: 92px;" type="submit">Grabar</button>
    <button class="btn btn-primary money_submit" style="width: 92px;" type="submit" >Modificar</button>
    <button class="btn btn-primary money_submit" style="width: 92px;" type="submit" >Eliminar</button>
</div>