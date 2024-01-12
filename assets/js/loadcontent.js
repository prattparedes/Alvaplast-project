function loadContent(page) {
  return new Promise(function(resolve, reject) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4) {
        if (this.status == 200) {
          document.querySelector(".main__content").innerHTML = this.responseText;
          resolve(); // Resuelve la promesa si la carga es exitosa
        } else {
          reject(new Error("Error en la carga del contenido")); // Rechaza la promesa en caso de error
        }
      }
    };
    xhttp.open("GET", page, true);
    xhttp.send();
  });
}

url_maintenance = '../views/modals/maintenance_modals/'
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

