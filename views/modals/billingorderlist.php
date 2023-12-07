<h2 style="text-align:center; margin-bottom: 8px;">Listado de Facturación</h2>
<div style="display: flex; align-items: center; gap: 10px;">
    <label for="fechaInicio">Fecha INICIO:</label>
    <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">

    <label for="fechaFin">Fecha FIN:</label>
    <input type="date" class="form-control" id="fechaFin" name="fechaFin">
</div>
<hr>
<table class="table">
    <thead>
        <tr>
            <th>Nro de Documento</th>
            <th>Orden de Venta</th>
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
        <tr>
            <td>DOC-001</td>
            <td>OV-12345</td>
            <td>Empresa A</td>
            <td>12345678-9</td>
            <td>Juan Pérez</td>
            <td>2023-12-01</td>
            <td>1500.00</td>
            <td>Dólares</td>
            <td>En proceso</td>
        </tr>
        <tr>
            <td>DOC-002</td>
            <td>OV-54321</td>
            <td>Empresa B</td>
            <td>98765432-1</td>
            <td>Maria González</td>
            <td>2023-11-25</td>
            <td>2800.00</td>
            <td>Euros</td>
            <td>Completado</td>
        </tr>
    </tbody>
</table>