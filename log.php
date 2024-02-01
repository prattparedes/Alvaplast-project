<!doctype html>
<html lang="en">

<head>
  <title>Sistema</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

</head>

<body">
  <main>
    <div class="main__container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#" onclick="loadContent('views/home.php')">
            <svg class="bi pe-none me-2" width="40" height="32">
              <use xlink:href="#bootstrap" />
            </svg>
            ALVAPLASTIC
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav" style="justify-content:center; align-items:center;">
            <ul class="navbar-nav">
              <li class="nav-item">
                <!-- <a class="nav-link text-white btn btn-secondary" aria-current="page" href="#" onclick="loadContent('views/home.php')"> -->
                <i class="bi bi-house-door"></i>
                INICIO
                </a>
              </li>
              <li class="nav-item">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-table"></i>
                    VENTASx
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/ventas/ordenVENTA.php')">Orden de Venta</a>

                    <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/ventas/facturacion.php')">Facturación</a>
                    <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/ventas/regulardocumento.php')">Regular documento</a>
                    <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/ventas/estadocuenta.php')">Estado de cuenta</a>


                  </ul>
                </div>


              <li class="nav-item">
                <a class="nav-link text-white btn btn-secondary" onclick="loadContent('views/compras/ordencompra.php')">
                  <i class="bi bi-grid"></i>
                  COMPRASAQUI
                </a>
              </li>




              <li class="nav-item">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="reportsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-table"></i>
                    REPORTES
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="reportsDropdown">

                    <a class="dropdown-item" href="#" onclick="loadContent('views/reportes/registroventa.php')">Registro de Ventas</a>
                    <a class="dropdown-item" href="#" onclick="loadContent('views/reportes/registrocompra.php')">Registro de Compras</a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item" href="#" onclick="loadContent('views/reportes/ventasxdocumento.php')">Ventas por documento</a>
                    <a class="dropdown-item" href="#" onclick="loadContent('views/reportes/ventasxfecha.php')">Ventas por fecha</a>
                    <a class="dropdown-item" href="#" onclick="loadContent('views/reportes/ventasxcliente.php')">Ventas por cliente</a>
                    <a class="dropdown-item" href="#" onclick="loadContent('views/reportes/ventasxproducto.php')">Ventas por producto</a>
                    <a class="dropdown-item" href="#" onclick="loadContent('views/reportes/ventasxmarca.php')">Ventas por Marca</a>
                    <a class="dropdown-item" href="#" onclick="loadContent('views/reportes/ventasxserie.php')">Ventas por Serie</a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item" href="#" onclick="loadContent('views/reportes/utilidadxtipodocumento.php')">Ventas por Utilidades</a>

                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="inventoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-table"></i>
                    INVENTARIOS
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="inventoryDropdown">
                    <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/inventario/ingresokardex.php')">Ingreso al Kardex</a>


                    <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/inventario/movimientokardex.php')">Movimiento de Kardex</a>


                    <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/inventario/stockproductos.php')">Stock de Productos</a>


                  </ul>
                </div>
              </li>


              <li class="nav-item">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="inventoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-table"></i>
                    MANTENIMIENTOS
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="inventoryDropdown">
                    <!-- <li class="nav-item"><a href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/productmodal.php')">Productos</a></li> -->



                    <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/productosmodel.php')">Productos</a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/clientemodel.php')">Clientes</a>
                    <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/proveedormodel.php')">Proveedores</a>
                    <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/personalmodel.php')">Personal</a>
                    <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/personalmodel.php')">Permisos</a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/productolineamodel.php')">Lineas</a>
              </li>
              <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/productosmarcamodel.php')">Marcas</a></li>
              <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/productounidadmodel.php')">Unidad</a></li>
              <hr class="dropdown-divider">
              <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/monedamodel.php')">Monedasss</a></li>
              <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/sucursalmodel.php')">Sucursalss</a></li>
              <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/almacenModel.php')">Almacen</a></li>
              <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/conceptomodel.php')">Concepto</a></li>
              <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/vehiculomodel.php')">Vehiculoss</a></li>
              <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/documentomodel.php')">Documentos</a></li>
              <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/transportistamodel.php')">Transportista</a></li>
              <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/tipocambio.php')">Tipo de cambio</a></li>


              <!-- <li class="nav-item"><a href="#" class="nav-link" onclick="loadContent('views/stockproducts.php')">Unidad</a></li>
                 -->

            </ul>
          </div>
          </li>


          <li class="nav-item">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-table"></i>

                MI CUENTA
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <!-- <a class="dropdown-item" href="" onclick="loadContent('views/users.php')">iniciar Sesion</a> -->
                <a class="dropdown-item" href="index.php" class="nav-link"> <i class="bi bi-people"></i> Cerrar Session</a>

              </ul>
            </div>
          </li>

          <!-- <li class="nav-item">
            <a class="nav-link text-white btn btn-secondary" onclick="loadContent('views/users.php')">
              <i class="bi bi-people"></i>
              USUARIOS
            </a>
          </li> -->
          </ul>
        </div>
    </div>
    </nav>
    <div class="main__content">
      <?php include 'views/home.php'; ?>
      <?php include 'views/modals/alertModal.php'; ?>
    </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <script src="assets/js/loadcontent.js"></script>
  <script src="assets/js/modals.js"></script>
  <script src="assets/js/orders.js"></script>
  <script src="assets/js/formController.js"></script>
  <script src="assets/js/kardexController.js"></script>
  <script src="assets/js/maintenance/filtrosTablas.js"></script>
  <script src="assets/js/maintenance/maintenance_modals.js"></script>
  <script src="assets/js/maintenance/Forms_maintenance.js"></script>
  <script src="assets/js/compra/ordenCompra.js"></script>
  <script src="assets/js/ventas/ordenVenta.js"></script>
  <script src="assets/js/inventarios/ingresoKardex.js"></script>
  </body>
</body>

</html>