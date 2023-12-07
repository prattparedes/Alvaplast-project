<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>
  <header>
    <!-- Nav tabs -->
    <!-- <ul class="nav nav-tabs" id="navId" role="tablist">
        <li class="nav-item">
            <a href="#tab1Id" class="nav-link active" data-bs-toggle="tab" aria-current="page">Active</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#tab2Id">Action</a>
                <a class="dropdown-item" href="#tab3Id">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#tab4Id">Action</a>
            </div>
        </li>
        <li class="nav-item" role="presentation">
            <a href="#tab5Id" class="nav-link" data-bs-toggle="tab">Another link</a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="#" class="nav-link disabled" data-bs-toggle="tab">Disabled</a>
        </li>
    </ul> -->
    
    <!-- Tab panes -->
    <!-- <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab1Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
    </div> -->

  </header>
  <main>
    <div class="main__container">
      <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark sidebar-height" style="width: 280px;">
          <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <span class="fs-4">ALVAPLASTIC</span>
          </a>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <a href="#" class="nav-link active" aria-current="page" onclick="loadContent('views/home.php')">
                <i class="bi bi-house-door"></i>
                INICIO
              </a>
            </li>
            <!-- <li>
              <a href="#" class="nav-link text-white">
                <i class="bi bi-speedometer2"></i>
                DASHBOARD
              </a>
            </li> -->
            <li class="nav-item">
                  <a href="#" class="nav-link text-white" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    <i class="bi bi-table"></i>
                      VENTAS
                  </a>
                  <div class="collapse" id="orders-collapse">
                      <ul class="nav nav-pills flex-column mb-auto ms-3">
                          <li class="nav-item"><a href="#" class="nav-link text-white" onclick="loadContent('views/sellorder.php')">Orden de Venta</a></li>
                          <li class="nav-item"><a href="#" class="nav-link text-white" onclick="loadContent('views/billing.php')">Facturación</a></li>
                          <li class="nav-item"><a href="#" class="nav-link text-white">Regula Documento</a></li>
                          <li class="nav-item"><a href="#" class="nav-link text-white">Estado de Cuenta</a></li>
                      </ul>
                  </div>
              </li>
            <li>
              <a href="#" class="nav-link text-white" onclick="loadContent('views/buyorder.php')">
                <i class="bi bi-grid"></i>
                COMPRA
              </a>
            </li>
            <li class="nav-item">
                  <a href="#" class="nav-link text-white" data-bs-toggle="collapse" data-bs-target="#reports-collapse" aria-expanded="false">
                    <i class="bi bi-table"></i>
                      REPORTES
                  </a>
                  <div class="collapse" id="reports-collapse">
                      <ul class="nav nav-pills flex-column mb-auto ms-3">
                          <li class="nav-item"><a href="#" class="nav-link text-white">Registro de Ventas</a></li>
                          <li class="nav-item"><a href="#" class="nav-link text-white">Registro de Compras</a></li>
                          <li class="nav-item"><a href="#" class="nav-link text-white" onclick="loadContent('views/records.php')">Registro de Facturación</a></li>
                      </ul>
                  </div>
            </li>
            <li class="nav-item">
                  <a href="#" class="nav-link text-white" data-bs-toggle="collapse" data-bs-target="#inventory-collapse" aria-expanded="false">
                    <i class="bi bi-table"></i>
                      INVENTARIOS
                  </a>
                  <div class="collapse" id="inventory-collapse">
                      <ul class="nav nav-pills flex-column mb-auto ms-3">
                          <li class="nav-item"><a href="#" class="nav-link text-white" onclick="loadContent('views/stockentry.php')">Ingreso al Kardex</a></li>
                          <li class="nav-item"><a href="#" class="nav-link text-white" onclick="loadContent('views/stockmovement.php')">Movimiento de Kardex</a></li>
                          <li class="nav-item"><a href="#" class="nav-link text-white" onclick="loadContent('views/stockproducts.php')">Stock de Productos</a></li>
                      </ul>
                  </div>
            </li>
            <li>
              <a href="#" class="nav-link text-white" onclick="loadContent('views/maintenance.php')">
                <i class="bi bi-clipboard-plus"></i>
                MANTENIMIENTO
              </a>
            </li>
            <li>
              <a href="/views/users.php" class="nav-link text-white" onclick="loadContent('views/users.php')">
                <i class="bi bi-people"></i>
                USUARIOS
              </a>
            </li>
          </ul>
          <hr>
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong>mdo</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
              <li><a class="dropdown-item" href="#">Configuración</a></li>
              <li><a class="dropdown-item" href="#">Perfil</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
            </ul>
          </div>
      </div>
      <div class="main__content">
        <div class="home">
          <h1 class="">Bienvenido a</h1>
          <img src="assets/img/alvaplast_logo.png" alt="" class="home__logo">
        </div>
      </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <script>
        var triggerEl = document.querySelector('#navId a')
        bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name
  </script>
  <script src="assets/js/sidebar.js"></script>
  <script src="assets/js/modals.js"></script>

</body>

</html>