<h2 style="text-align:center;">REGISTRO DE VENTAS</h1>
<h4>Filtro: </h4>
<div style="display: flex; gap: 20px;">
    <div style="display: flex; flex-direction: column;">
        <label for="fechaInicio" class="form-label">Fecha INICIO</label>
        <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" style="max-width: 500px;">
    </div>
    <div style="display: flex; flex-direction: column;">
        <label for="fechaFin" class="form-label">Fecha FIN</label>
        <input type="date" class="form-control" id="fechaFin" name="fechaFin" style="max-width: 500px;">
    </div>
    <Button class="btn btn-primary" style="margin-top:8px; height:68px;">BUSCAR</Button>
    <button type="button" class="order__btn order__btn--inactive btn btn-primary btn-lg">Exportar <i class="bi bi-file-earmark-arrow-down"></i></button>
        <button type="button" class="order__btn order__btn--inactive btn btn-primary btn-lg">Imprimir <i class="bi bi-printer"></i></button>
</div>
<hr>
<h1 style="color:red;">Falta actualizar esta tabla</h1>
<table class="table">
    <thead>
        <tr>
            <th>Fecha de Emisión</th>
            <th>Comprobante</th>
            <th>RUC/DNI</th>
            <th>Cliente</th>
            <th>Importe</th>
            <th>Moneda</th>
            <th>Tipo de Pago</th>
        </tr>
    </thead>
    <tbody>
        <?php  
            require_once($_SERVER['DOCUMENT_ROOT'].'/Alvaplast-project/Models/Facturacion.php');
            $facturas = Facturacion::getFacturacion();
            foreach ($facturas as $entro) {
        ?>

        <tr>
            <td><?=$entro->id_movimiento?></td>
            <td><?=$entro->cliente?></td>
            <?php $doc = trim($entro->dni); $doc2 = trim($entro->ruc);  
            if(strlen($doc)>1 ){
                $documento = "<b>dni/".$doc."</b>";    
            }elseif(strlen($doc2)>1){
                $documento = "<b>ruc/".$doc2."</b>";
            }else{
                $documento = "no señalado";
            }
            ?>
            <td><?=$documento?></td>
            <td><?=strtolower($entro->nombres)?></td>
            <td><?=explode(' ',$entro->fecha_movimiento)[0]?></td>
            <td><?=$entro->pago_inicial?></td>
            <td><?=$entro->moneda?></td>
            <?php ($entro)?>
            <td><?= ($entro->estado == "1")? "pagado" : "pendiente"?></td>
        </tr>

     <?php }?>
       
    </tbody>
</table>