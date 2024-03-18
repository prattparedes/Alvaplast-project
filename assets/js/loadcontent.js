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


function loadContentIntoModal(page, data) {
  return new Promise(function (resolve, reject) {
    var modal = document.getElementById('miModal');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4) {
        if (this.status == 200) {
          modal.style.display = 'block'; // Mostrar el modal
          modal.querySelector(".modal-content").innerHTML = this.responseText;
          resolve(); // Resuelve la promesa si la carga es exitosa
        } else {
          console.error("Error en la carga del contenido. Estado: " + this.status);
          reject(new Error("Error en la carga del contenido")); // Rechaza la promesa en caso de error
        }
      }
    };
    xhttp.open("POST", page, true);
    // Si deseas enviar datos al servidor, puedes hacerlo con xhttp.send(data);
    // Asegúrate de que 'data' sea una cadena de texto que represente los datos que deseas enviar.
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);
  });
}