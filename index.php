<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
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

<body>
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
                <a class="nav-link text-white btn btn-secondary" aria-current="page" href="#" onclick="loadContent('views/home.php')">
                  <i class="bi bi-house-door"></i>
                  INICIO
                </a>
              </li>
              <li class="nav-item">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-table"></i>
                    VENTAS
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li class="nav-item"><a href="#" class="nav-link" onclick="loadContent('views/sellorder.php')">Orden de Venta</a></li>
                    <li class="nav-item"><a href="#" class="nav-link" onclick="loadContent('views/billing.php')">Facturación</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Regula Documento</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Estado de Cuenta</a></li>
                  </ul>
                </div>
              <li class="nav-item">
                <a class="nav-link text-white btn btn-secondary" onclick="loadContent('views/buyorder.php')">
                  <i class="bi bi-grid"></i>
                  COMPRA
                </a>
              </li>
              <li class="nav-item">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="reportsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-table"></i>
                    REPORTES
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="reportsDropdown">
                    <li class="nav-item"><a href="#" class="nav-link" onclick="loadContent('views/sellrecords.php')">Registro de Ventas</a></li>
                    <li class="nav-item"><a href="#" class="nav-link" onclick="loadContent('views/buyrecords.php')">Registro de Compras</a></li>
                    <li class="nav-item"><a href="#" class="nav-link" onclick="loadContent('views/billingrecords.php')">Registro de Facturación</a></li>
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
                    <li class="nav-item"><a href="#" class="nav-link" onclick="loadContent('views/stockentry.php')">Ingreso al Kardex</a></li>
                    <li class="nav-item"><a href="#" class="nav-link" onclick="loadContent('views/stockmovement.php')">Movimiento de Kardex</a></li>
                    <li class="nav-item"><a href="#" class="nav-link" onclick="loadContent('views/stockproducts.php')">Stock de Productos</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white btn btn-secondary" onclick="loadContent('views/maintenance.php')">
                  <i class="bi bi-clipboard-plus"></i>
                  MANTENIMIENTO
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white btn btn-secondary" onclick="loadContent('views/users.php')">
                  <i class="bi bi-people"></i>
                  USUARIOS
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="main__content">
        <?php include 'views/home.php'; ?>
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

  <script>
    var triggerEl = document.querySelector('#navId a')
    bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name
  </script>
  <script src="assets/js/loadcontent.js"></script>
  <script src="assets/js/modals.js"></script>
  <script src="assets/js/orders.js"></script>
  <script src="assets/js/formController.js"></script>
  <script src="assets/js/kardexController.js"></script>
</body>

</html>