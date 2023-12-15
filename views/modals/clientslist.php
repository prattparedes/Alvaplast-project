<h2 style="text-align:center; margin-bottom: 8px;">Listado de Clientes</h2>
<span style="font-weight: 600; width:fit-content;">Filtrar por Razón Social: <input type="text" style="width: 240px;"></span>
<span style="font-weight: 600; width:fit-content; margin-left:8px;">Filtrar por RUC: <input type="text" style="width: 240px;"></span>
<span style="font-weight: 600; width:fit-content; margin-left:8px;">Filtrar por DNI: <input type="text" style="width: 240px;"></span><button class="modal__btn--search">Buscar</button>
<hr>
<div class="modal__table--container">
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Razón Social</th>
                <th>RUC</th>
                <th>DNI</th>
                <th>Dirección</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            <?php

            require_once('../../Models/Cliente.php');

            $clientes = Cliente::getClientes();

            foreach ($clientes as $cliente) {
            ?>
                <tr>
                    <td><?= $cliente->id_cliente ?></td>
                    <td><?= $cliente->razon_social ?></td>
                    <td><?= $cliente->ruc ?></td>
                    <td><?= $cliente->dni ?></td>
                    <td><?= $cliente->direccion ?></td>
                    <td><?= $cliente->celular ?></td>
                </tr>
            <?php }?> 
        </tbody>
    </table>
</div>