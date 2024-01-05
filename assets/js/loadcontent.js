function loadContent(page) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.querySelector(".main__content").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", page, true);
  xhttp.send();
  productosAgregados = [];
}

url_maintenance = 'views/modals/maintenance_modals/'
function loadMaintenanceContent(page) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.querySelector(".maintenance__container").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", url_maintenance + page + '.php', true);
  xhttp.send();
}

// Carga Dinámica de los modals
function loadModalContent(modalName) {
  document.querySelector(
    ".modal__content--dynamic"
  ).innerHTML = `<img src="assets/img/tube-spinner.svg" alt="Cargando..." class="modal__loading" style="width: 30%;">`;

  fetch(`views/modals/${modalName}.php`)
    .then((response) => response.text())
    .then((data) => {
      document.querySelector(".modal__content--dynamic").innerHTML = data;
    })
    .catch((error) => console.error("Error:", error));
}
