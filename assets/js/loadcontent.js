function loadContent(page) {
  return new Promise(function (resolve, reject) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4) {
        if (this.status == 200) {
          document.getElementById("navbarNav").classList.remove("show")
          document.querySelector(".main__content").innerHTML = this.responseText;
          resolve(); // Resuelve la promesa si la carga es exitosa
        } else {
          console.error("Error en la carga del contenido. Estado: " + this.status);
          reject(new Error("Error en la carga del contenido")); // Rechaza la promesa en caso de error
        }
      }
    };
    xhttp.open("GET", page, true);
    xhttp.send();
  });
}