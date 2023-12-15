<h2 style="text-align:center; margin-bottom: 8px;">Lista de Proveedores</h2>
<span style="font-weight: 600; width:fit-content;">Filtrar por proveedor: <input type="text" style="width: 240px;"></span><button class="modal__btn--search">Buscar</button>
<span style="font-weight: 600; width:fit-content; margin-left:20px">Filtrar por RUC: <input type="text" style="width: 120px;"></span><button class="modal__btn--search">Buscar</button>
<hr>
<div class="modal__table--container">
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
                require_once('../../Models/Proveedor.php');
                $proveedores = Proveedor::getProveedores();
                foreach ($proveedores as $proveedor) {
            ?>
                <tr>
                 <td><?= $proveedor->nombre ?></td>
                 <td><?= $proveedor->orden ?></td>
                 <td><?= $proveedor->fecha_emision ?></td>
                 <td><?= $proveedor->moneda ?></td>
                 <td><?= $proveedor->importe ?></td>
                 <td><?= $proveedor->personal ?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>`
</div>