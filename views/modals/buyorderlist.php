<h2 style="text-align:center; margin-bottom: 8px;">Listado de Órdenes de Compra</h2>
    <span style="font-weight: 600; width:fit-content;">Filtrar por proveedor: <input type="text" style="width: 240px;"></span><button class="modal__btn--search">Buscar</button>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>Proveedor</th>
                <th>Orden</th>
                <th>Fecha Emisión</th>
                <th>Moneda</th>
                <th>Importe</th>
                <th>Personal</th>
            </tr>
        </thead>
        <tbody>
           <?php
            require_once('../../Models/Compra.php');
            $compras = Compra::getCompras();
            foreach($compras as $compra){
           ?>
            <tr>
                <td><?=$compra->razon_social?></td>
                <td><?=$compra->numero_documento.$compra->serie_documento?></td>
                <td><?=explode(' ',$compra->fecha_compra)[0]?></td>
                <td><?=$compra->Moneda?></td>
                <td><?=$compra->total?></td>
                <td><?=$compra->Personal?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>