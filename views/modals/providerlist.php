<h2 style="text-align:center; margin-bottom: 8px;">Lista de Proveedores</h2>
<span style="font-weight: 600; width:fit-content;">Filtrar por proveedor: <input type="text" style="width: 240px;"></span><button class="modal__btn--search">Buscar</button>
<span style="font-weight: 600; width:fit-content; margin-left:20px">Filtrar por RUC: <input type="text" style="width: 120px;"></span><button class="modal__btn--search">Buscar</button>
<hr>
<div class="modal__table--container">
    <table class="table">
        <thead>
            <tr>
                <th>Proveedor</th>
                <th>Ruc</th>
                <th>Dirección</th>
                <th>Telefono</th>
                <th>Fax</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php  require_once($_SERVER['DOCUMENT_ROOT']."/Alvaplast-project/Models/Proveedor.php");
            $providers = Proveedor::listarProveedores();
            foreach($providers as $provider){?>
            <tr>
                <td><?=$provider->razon_social?></td>
                <td><?=$provider->ruc?></td>
                <td><?=$provider->direccion?></td>
                <td><?=$provider->telefono?></td>
                <td><?=$provider->fax?></td>
                <td><?=$provider->email?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>`
</div>