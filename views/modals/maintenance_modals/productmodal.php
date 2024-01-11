<h2 style="text-align:center">Mantenimiento de Productos</h2>




<div style="display: flex; gap: 20px; margin: 0 auto;">
    <div style="flex: 40%; display: flex; flex-direction: column; gap: 10px; width:300px">
        <h4>Código de producto: <span id="codigo">-</span> </h4>
        <div style="display: flex; gap: 20px; justify-content: space-between;">
            <!-- Columna izquierda -->
            <div style="display: flex; flex-direction: column; gap: 10px; width: 48%;">
                <div style="display: flex; flex-direction:column; gap: 10px;">
                    <div style="display: flex; flex-direction: column;">
                        <label for="procedencia">Procedencia:</label>
                        <select style="height:32px;" id="procedencia" name="procedencia">
                            <option value="NACIONAL">NACIONAL</option>
                            <option value="IMPORTADO">IMPORTADO</option>
                        </select>
                    </div>

                    <div style="display: flex; flex-direction: column;">
                        <label for="nombre">Nombre:</label>
                        <input style="height:32px;" type="text" id="nombre" name="nombre">
                    </div>

                    <div style="display: flex; flex-direction: column;">
                        <label for="linea">Línea:</label>
                        <select style="height:32px;" id="linea" name="linea">
                            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/Models/Linea.php');
                            $lineas = Linea::ListarLineas();
                            foreach ($lineas as $lin) { ?>
                                <option value="<?= $lin->id_linea ?>"><?= $lin->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div style="display: flex; flex-direction: column;">
                        <label for="moneda">Moneda:</label>
                        <select style="height:32px; width:100px" id="moneda" name="moneda">
                            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/Models/Moneda.php');
                            $monedas = Moneda::getMonedas();
                            foreach ($monedas as $moneda) { ?>
                                <option value="<?= $moneda->id_moneda ?>"><?= $moneda->descripcion ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div style="display: flex; flex-direction: column;">
                        <label for="precioCompra">Precio de Compra:</label>
                        <input style="height: 32px;  width:100px" type="number" id="precioCompra" name="precioCompra">
                    </div>


                    <div style="display: flex; flex-direction: column;">
                        <label for="precioVenta">Precio de Venta:</label>
                        <input style="height: 32px;  width:100px" type="number" id="precioVenta" name="precioVenta">
                    </div>
                </div>
            </div>

            <!-- Columna derecha -->
            <div style="display: flex; flex-direction: column; gap: 10px; width: 48%;">
                <div style="display: flex; flex-direction: column;">
                    <label for="descripcion">Descripción:</label>
                    <textarea style="height: 98px; width: 100%; word-wrap: break-word;" id="descripcion" name="descripcion"></textarea>
                </div>

                <div style="display: flex; flex-direction: column;">
                    <label for="marca">Marca:</label>
                    <select style="height:32px;" id="marca" name="marca">
                        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/Models/Marca.php');
                        $marcas = Marca::getMarcas();
                        foreach ($marcas as $marca) { ?>
                            <option value="<?= $marca->id_marca ?>"><?= $marca->descripcion ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div style="display: flex; flex-direction: row;">
                    <div>
                        <label for="unidad">Unidad:</label>
                        <select style="height:32px;" id="unidad" name="unidad">
                            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/Models/Unidad.php');
                            $unidades = Unidad::getUnidades();
                            foreach ($unidades as $unidad) { ?>
                                <option value="<?= $unidad->id_unidad ?>"><?= $unidad->abreviatura ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div style="margin-left:12px;">
                        <label for="volumen">Volumen:</label>
                        <input style="height:32px; width:100px" type="number" id="volumen" name="volumen">
                    </div>
                </div>

                <div style="display: flex; flex-direction: row;">
                    <div>
                        <label for="stockMinimo">Stock Mínimo:</label>
                        <input style="height:32px; width:100px" type="number" id="stockMinimo" name="stockMinimo">
                    </div>
                    <div>
                        <label for="stockMaximo">Stock Máximo:</label>
                        <input style="height:32px; width:100px" type="number" id="stockMaximo" name="stockMaximo">
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; text-align: left;">
                    <label for="descripcion">Estado:</label>
                    <div style="display:flex; align-items:center;">
                        <input style="height:32px; width:24px;" type="checkbox" id="estado" name="estado">
                        <span style="margin-left:8px; font-weight:600;">Habilitado</span>
                    </div>
                </div>

            </div>
        </div>

        <!-- Campo de Examinar -->
        <div style="display: flex; gap: 10px; margin-top: 16px;">
            <div style="display: flex; flex-direction: column; margin-right:40px;">
                <label>Subir Imagen:</label>
                <input type="file" id="foto" name="foto" style="display: none;">
                <button id="selectImageButton">Seleccionar archivo</button>
            </div>
            <div style="display: flex; flex-direction: column;">
                <img id="imagenMostrada" src="assets/img/img-placeholder.png" style="border: 1.5px solid black; max-width: 200px; max-height: 200px;" alt="Imagen">
            </div>
        </div>

        <!-- Botones -->
        <div style="margin-top: 16px; display:flex; justify-content: space-around; max-width:440px;">
            <button class="btn btn-primary maintenanceform__btn" style="width: 90px;" type="submit">Nuevo</button>
<button class="btn btn-primary maintenanceform__btn" style="width: 90px;" type="submit">Grabar</button>
            <button class="btn btn-primary maintenanceform__btn" style="width: 100px;" type="button">Modificar</button>
            <button class="btn btn-primary maintenanceform__btn" style="width: 90px;" type="button">Eliminar</button>

        </div>
    </div>
    <div style="flex: 60%; border-left:1.25px solid lightgray; padding-left: 16px;">
        <h4 style="text-align:center;">Listado de Productos <button onclick="listarProductosMantenimiento()">Listar</button></h4>
        Filtrar por razon social: <input type="text" onkeyup="FiltrarProductosMantenimiento(this.value)" id="filtroProductos">
        Filtrar por Línea de Productos: <select name="" id="" onchange="FiltrarLineaProductosMantenimiento(this.value)">
            <option value="0">Ingrese línea</option>
            <?php
            require_once($_SERVER['DOCUMENT_ROOT'] . "/Alvaplast-project/Models/Linea.php");
            $listas = Linea::ListarLineas();
            function compararPorDescripcion($a, $b)
            {
                return strcmp($a->descripcion, $b->descripcion);
            }
            usort($listas, "compararPorDescripcion");
            foreach ($listas as $linea) {
            ?>
                <option value="<?= $linea->id_linea ?>"><?= $linea->descripcion ?></option>
            <?php
            }
            ?>
        </select>
        <div class="table--container" style="max-height:692px; margin-top:8px;">
            <table border="1" style="width:100%;" id="productsTable" class="table table__maintenance--big">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Producto</th>
                        <th>P. Venta</th>
                        <th>P. Compra</th>
                        <th>Moneda</th>
                        <th>Marca</th>
                        <th>Unidad</th>
                        <th>Volumen</th>
                        <th>Stock Min.</th>
                        <th>Stock Max.</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody id="productsTableBody">

                </tbody>
            </table>
        </div>
    </div>
</div>