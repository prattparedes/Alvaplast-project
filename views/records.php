<h4>Filtro: </h4>
Fecha INICIO
<input type="date" class="form-control" id="fecha" name="fecha">

Fecha FIN:
<input type="date" class="form-control" id="fecha" name="fecha">

<hr>
<table class="table">
    <thead>
        <tr>
            <th>Nro de Documento</th>
            <th>Cliente</th>
            <th>Documento Cliente</th>
            <th>Vendedor</th>
            <th>Fecha de Emisión</th>
            <th>Monto</th>
            <th>Moneda</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php  
            require_once("../Models/Facturacion.php");
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