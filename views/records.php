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
            <th>Razon Social</th>
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
            foreach ($facturas as $fact) {
        ?>

        <tr>
            <td><?=$fact->serie_documento?></td>
            <td><?=$fact->Personal?></td>
            <td>Cliente Ejemplo</td>
            <td>123456789</td>
            <td>Vendedor A</td>
            <td>01/01/2023</td>
            <td>100.00</td>
            <td>Soles</td>
            <td>Pagado</td>
        </tr>

     <?php }?>
       
    </tbody>
</table>