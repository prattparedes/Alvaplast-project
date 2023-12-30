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

