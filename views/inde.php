<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

</head>

<body>
  <main>
    <div class="main__container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="../views/home.php">
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
                <a class="nav-link text-white btn btn-secondary" aria-current="page" href="#" onclick="loadContent('views/home.php')">
                  <i class="bi bi-house-door"></i>
                  INICIO
                </a>
              </li>
             
              
              <li class="nav-item">
                 <a class="nav-link text-white btn btn-secondary" onclick="loadContent('views/ordencompra.php')"> 
              
                  COMPRAS
                </a>
              </li>


              <li class="nav-item">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-table"></i>
                    
                    VENTAS
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                   
                    <a class="dropdown-item" href="ordenVENTA.php" class="nav-link">Orden de Venta</a>
                    <a class="dropdown-item" href="facturacion.php" class="nav-link">Facturacion</a>
                    <a class="dropdown-item" href="regulardocumento.php" class="nav-link">Regular documento</a>
                    <a class="dropdown-item" href="estadocuenta.php" class="nav-link">Estado de cuenta</a>
                    
                  
                    <!-- <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/facturacion.php')">Facturación</a> -->
                    <!-- <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/regulardocumento.php')">Regular documento</a> -->
                    <!-- <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/estadocuenta.php')">Estado de cuenta</a> -->
                  </ul>
                </div>
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
                    <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/ingresokardex.php')">Ingreso al Kardex</a>
                    
                   
                    <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/movimientokardex.php')">Movimiento de Kardex</a>
                 
                   
                    <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/stockproductos.php')">Stock de Productos</a>
                    
                     
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
                    <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/permisosmodel.php')">Permisos</a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/modals/maintenance_modals/productolineamodel.php')">Lineas</a></li>
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
                    <li class="nav-item"><a href="#" class="nav-link" onclick="loadContent('views/stockproducts.php')">Moneda</a></li>
                    <li class="nav-item"><a href="#" class="nav-link" onclick="loadContent('views/stockproducts.php')">Sucursal</a></li>
                    <li class="nav-item"><a href="#" class="nav-link" onclick="loadContent('views/stockproducts.php')">Almacen</a></li>
                    <li class="nav-item"><a href="#" class="nav-link" onclick="loadContent('views/stockproducts.php')">Vehiculos</a></li>
                    <li class="nav-item"><a href="#" class="nav-link" onclick="loadContent('views/stockproducts.php')">Documento</a></li>
                    <li class="nav-item"><a href="#" class="nav-link" onclick="loadContent('views/stockproducts.php')">Transportista</a></li> -->
                    


                  </ul>
                </div>
              </li>




              <li class="nav-item">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-table"></i>
                    
                    CERRAR SESION
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                   
                    <a class="dropdown-item" href="index.php" class="nav-link">Cerrar Session</a>
                   
                    
                  
                    <!-- <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/facturacion.php')">Facturación</a> -->
                    <!-- <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/regulardocumento.php')">Regular documento</a> -->
                    <!-- <a class="dropdown-item" href="#" class="nav-link" onclick="loadContent('views/estadocuenta.php')">Estado de cuenta</a> -->
                  </ul>
                </div>
              </li>


















              <li class="nav-item">
                <a class="nav-link text-white btn btn-secondary" onclick="loadContent('views/index.php')">
                  <i class="bi bi-people"></i>
                  USUARIOS
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="main__content">
        
        <!-- ?php include '../views/home.php'; ?> -->
        <!-- include 'views/modals/alertModal.php'; ?>  -->
      </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  
<script src="assets/js/loadcontent.js"></script>
  <script src="assets/js/modals.js"></script>
  <script src="assets/js/orders.js"></script>
  <script src="assets/js/formController.js"></script>
  <script src="assets/js/kardexController.js"></script>
  <script src="assets/js/maintenance/filtrosTablas.js"></script>
  <script src="assets/js/maintenance/maintenance_modals.js"></script>
</body>

</html>