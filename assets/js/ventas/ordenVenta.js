// Añadir Cliente, Dirección e ID al formulario órden de venta
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#clienttable");

    if (isModalTable) {
      const fila = event.target.closest("tr");
      const columnas = fila.querySelectorAll("td");

      // Crear un array con el contenido de las celdas de la fila clickeada
      const contenidoFila = Array.from(columnas).map(
        (columna) => columna.innerText
      );

      // Obtener elementos del array
      const clientID = contenidoFila[0];
      const clientName = contenidoFila[1];
      const clientDirection = contenidoFila[4];
      const clientRUC = contenidoFila[2];
      const clientDNI = contenidoFila[3];

      // Cambiar el HTML de los spans por los datos
      document.getElementById("idcliente").value = clientID;
      document.getElementById("cliente").value = clientName;
      document.getElementById("direccion").value = clientDirection;

      const rucDniInput = document.getElementById("rucDni");

      // Verificar si hay RUC o DNI y asignar el valor correspondiente al input
      if (clientRUC !== "-") {
        rucDniInput.value = clientRUC;
      } else if (clientDNI !== "-") {
        rucDniInput.value = clientDNI;
      }

      // Cerrar el modal
      var modalBackground = document.querySelector(".modal__background");
      modalBackground.classList.add("modal__inactive");
    }
  });