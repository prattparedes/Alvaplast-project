</head>

<body>
    <header>
        
        <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Alvaplast-project/autoload.php');

      
        use Models\ventas\RegistroFacturacion;
       
        ?>

        <div class="kardex__movement">
            <div class="kardex__left">
                <div class="row">
               
                    <!-- <h5 style="background: grey; color: white; text-align:center;"></h5> -->
                    <h5 style="background: black; color: white; text-align:center;">REGISTRO DE FACTURACIÓN</h5>
                    <h6>FILTRO DE REGISTRO</h6>
                    <hr>
                    <div class="row">

                        <?php
                        date_default_timezone_set('America/Lima'); // Establecer la zona horaria de Perú
                        $currentDateTime = date('Y-m-d H:i');

                        // Restar un mes a la fecha actual
                        $fechaAnterior = date('Y-m-d H:i', strtotime('-1 month', strtotime($currentDateTime)));

                        
                        ?>

                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputStartDate" class="col-form-label">Fecha de Inicio:</label>
                            <input type="datetime-local" id="fecha1" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $fechaAnterior; ?>">
                        </div>



                        <div class="col-md-4" style="width: 400px;">
                            <label for="inputEndDate" class="col-form-label">Fecha de Fin:</label>
                            <input type="datetime-local" id="fecha2" class="form-control" aria-describedby="passwordHelpInline" value="<?php echo $currentDateTime; ?>">
                        </div>

                        <div class="col-12">
                       <br><br><hr style="margin-top: -10px;">
                       <a style="width: 100px;" class="btn btn-primary" type="button" onclick="ListarRegistroFacturacion()">Consultar</a>
                        <!-- <a name="" id="" class="btn btn-warning" href="#" role="button">Limpiar</a> -->
                        <a style="width: 100px;" name="" id="" class="btn btn-danger" href="#" onclick="loadContent('views/ventas/facturacion.php')" role="button">Cancelar</a>
                        <hr>
                    </div>
                    </div>

                    <div class=""><br><br></div>
                </div>


            </div>
            <div class="kardex__right">
                <div style="display:flex; align-items:center;">
                    <div style="display:flex; flex-direction:column; margin-top:5px">

                        <div class="row">
                            <div class="" style="width: 370px;">
                                <label for="inputFilter" class="col-form-label">Filtrar por:</label>
                                <input type="text" id="filtroProductos" class="form-control" aria-describedby="passwordHelpInline" onkeyup="filtrarRegistroFacturacion(this.value)">
                            </div>
                            <button style="width: 90px; height:34px;margin-top:38px" class="btn btn-success" type="button">Buscar</button>
                        </div>
                    </div>

                </div>
                <h5 style="background: teal; color: white; text-align:left; margin-top:10px" class="titulo">DETALLE DE VENTA</h5>
                <hr>
                <div class="table--container">

                    <!-- <table class="tbl_venta" id="ordertable"  style="width:100%;"> -->
                    <table class="tbl_venta" id="estadofacturacion--table" style="width: 850px;">
                        <thead>
                            <tr>
                            <th scope="col-1">Nº DOCUMENTO</th>
                                    <th scope="col-1">ORD. VENTA</th>
                                    <th scope="col-1">CLIENTE</th>
                                    <th scope="col-1">DOC CLIENTE</th>
                                    <th scope="col-1">VENDEDOR</th>
                                    <th scope="col-1">FEC. EMISION</th>
                                    <th scope="col-1">MONTO</th>
                                    <th scope="col-1">MONEDA</th>
                                    <th scope="col-1">ESTADO</th>
                            </tr>
                        </thead>

                        <tbody id="detalle_venta">
                           
                        </tbody>

                        <tfoot class="footer">

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

      