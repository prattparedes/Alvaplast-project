<div class="home">
  <div style="display:flex; align-items:center;">
    <h1>Bienvenido a</h1>
    <img src="assets/img/alvaplast_logo.png" alt="" class="home__logo">
  </div>
  <h2>Elija una opción a realizar:</h2>
  <div class="home__btns">
    <button type="button" class="home__btn btn btn-primary btn-lg" onclick="loadContent('views/sellorder.php')">CREAR ORDEN DE VENTA <i class="bi bi-plus-circle"></i></button>
    <button type="button" class="home__btn btn btn-primary btn-lg" onclick="loadContent('views/buyorder.php')">CREAR ORDEN DE COMPRA <i class="bi bi-plus-circle"></i></button>
    <button type="button" class="home__btn btn btn-primary btn-lg" onclick="loadContent('views/billing.php')">GENERAR NUEVA FACTURACIÓN <i class="bi bi-plus-circle"></i></button>
    <button type="button" class="home__btn btn btn-primary btn-lg" onclick="loadContent('views/home.php')">VER EL ESTADO DE CUENTA <i class="bi bi-plus-circle"></i></button>
    <button type="button" class="home__btn btn btn-primary btn-lg" onclick="loadContent('views/stockentry.php')">NUEVO INGRESO AL KARDEX <i class="bi bi-plus-circle"></i></button>
    <button type="button" class="home__btn btn btn-primary btn-lg" onclick="loadContent('views/stockmovement.php')">VER MOVIMIENTOS DE KARDEX <i class="bi bi-plus-circle"></i></button>
    <button type="button" class="home__btn btn btn-primary btn-lg" onclick="loadContent('views/stockproducts.php')">VER STOCK DE PRODUCTOS <i class="bi bi-plus-circle"></i></button>
    <button type="button" class="home__btn btn btn-primary btn-lg" onclick="loadContent('views/maintenance.php')">ENTRAR A MANTENIMIENTO <i class="bi bi-plus-circle"></i></button>  
  </div>
</div>