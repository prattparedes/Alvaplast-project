<div class="kardex__movement">
    <div class="kardex__left">
        <h3 style="background: black; color: white; text-align:center;">Lista de Productos</h3>
        Almacén <select name="almacen" id="">
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
        Filtro <input type="text">
        <hr>
        <div class="table__container">
            <table border="1" style="width:100%;">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th style="width:60px;">Unidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lápices</td>
                        <td>PL</td>
                    </tr>
                    <tr>
                        <td>Agua</td>
                        <td>ML</td>
                    </tr>
                    <tr>
                        <td>Telas</td>
                        <td>F</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="kardex__right">
        <div style="display:flex; align-items:center; ">
            Stock Físico Final: <span id="stockfinal" style="font-weight:700;">9999</span>
            <div style="margin-left: 80px;">
                <p>Desde: <input type="date" id="fecha1" name="fecha1"></p>
                <p style="margin-bottom:0;">Hasta: <input type="date" id="fecha1" name="fecha2"></p>
            </div>
            <div style="margin-left: 20px;">
                <button type="button" class="order__btn btn btn-primary btn-lg">Consultar <i class="bi bi-search"></i></i></button>
                <button type="button" class="order__btn btn btn-primary btn-lg">Exportar <i class="bi bi-file-earmark-arrow-down"></i></button>
            </div>
        </div>
        <hr>
        <div class="table__container">
            <table border="1" style="width:100%;">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Proveedor/Cliente</th>
                        <th>Motivo</th>
                        <th>Documento</th>
                        <th>Monto</th>
                        <th>Inicio</th>
                        <th>Ingreso</th>
                        <th>Salida</th>
                        <th>Saldo</th>
                    </tr>
                </thead>
                <tbody style="font-size: 14px;">
                    <tr>
                        <td>07/12/2023 19:24:00</td>
                        <td>Proveedor 1</td>
                        <td>Compra</td>
                        <td>NC-A/001-000001</td>
                        <td>10.00</td>
                        <td>5.00</td>
                        <td>2.00</td>
                        <td>0</td>
                        <td>3.00</td>
                    </tr>
                    <tr>
                        <td>06/11/2023 14:49:00</td>
                        <td>Cliente A</td>
                        <td>Venta</td>
                        <td>NC-A/001-000001</td>
                        <td>10.00</td>
                        <td>5.00</td>
                        <td>2.00</td>
                        <td>0</td>
                        <td>3.00</td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>
</div>