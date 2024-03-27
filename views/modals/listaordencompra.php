</head>

<body>
    <header>
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/autoload.php');


        use Models\compras\Compra;
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">

                <div class="row">
                    <h5 style="background: black; color: white; text-align:center;">LISTADO ORDENES DE COMPRA</h5>



                    <b> <span class="">Buscar por:</span></b>
                    <div class="col-12">
                        <label for="inputPassword6" class="col-form-label">Proveedor</label>

                        <input type="text" id="disabledTextInput" class="form-control" aria-describedby="passwordHelpInline" onkeyup="filtrarOrdenCompra(this.value)">
                        <br>
                        <button style="width: 120px;" class="btn btn-danger" onclick="CancelarYRestaurarCompra()" type="button" id="">Cancelar</button>
                    </div>

                </div>

                <div class="" id=""></div>
            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">

                        <h6 style="margin-top: -5ox;">PROVEEDORES</h6>
                        <hr style="margin-top: -7px;">




                        <br>
                        <div class="table--container" style="margin-top: -15px;">
                            <div class="table-responsive">
                                <table class="table border=1" id="buyorderlist">
                                    <thead>
                                        <tr>
                                            <th scope="col-md-1">Proveedor</th>
                                            <th scope="col-md-1">Orden</th>
                                            <th scope="col-1">Fecha Emisión</th>
                                            <th scope="col-1">Moneda</th>
                                            <th scope="col-1">Importe</th>
                                            <th scope="col-1">Personal</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php

                                        $compras = Compra::getCompras();
                                        foreach ($compras as $compra) {
                                        ?>
                                            <tr onclick="seleccionarOrdenCompra(this)">
                                                <td><?= $compra->razon_social ?></td>
                                                <td><?= $compra->numero_documento . $compra->serie_documento ?></td>
                                                <td><?= explode(' ', $compra->fecha_compra)[0] ?></td>
                                                <td><?= $compra->Moneda ?></td>
                                                <td><?= $compra->total ?></td>
                                                <td><?= $compra->Personal ?></td>
                                                <td style="display:none"><?= $compra->id_compra ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>