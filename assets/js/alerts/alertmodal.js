function openAlertModal() {
  document.getElementById("overlay").style.display = "block";
  document.getElementById("alertModal").style.display = "block";
  document.getElementById('nuevoValor').value = celdaSeleccionada.textContent;
}

function closeAlertModal(confirm) {
  document.getElementById("overlay").style.display = "none";
  document.getElementById("alertModal").style.display = "none";
  if (confirm) {
    let nuevoValor = document.getElementById("nuevoValor").value;
    celdaSeleccionada.textContent = nuevoValor;

    let filaSeleccionada = celdaSeleccionada.parentNode;
    let celdas = filaSeleccionada.querySelectorAll("td"); // Obtener todas las celdas de la fila

    // Acceder a las celdas por su índice
    let celdaTotal = celdas[6]; // Suponiendo que la celda total es la octava celda (el índice 7)
    let celdaCantidad = celdas[2]; // Suponiendo que la celda de cantidad es la tercera celda (el índice 2)
    let celdaPrecio = celdas[4]; // Suponiendo que la celda de precio es la quinta celda (el índice 4)

    console.log(celdas)
    console.log(celdaTotal, celdaCantidad,celdaPrecio)

    // Verificar si las celdas están definidas antes de acceder a su contenido
    if (celdaTotal && celdaCantidad && celdaPrecio) {
      // Convertir los textos a números y realizar la multiplicación
      let total =
        parseFloat(celdaCantidad.textContent) *
        parseFloat(celdaPrecio.textContent);

      // Actualizar el texto de la celda total
      celdaTotal.textContent = total.toFixed(2);

      // Realizar cualquier otra operación necesaria
      actualizarTablaPrecios();
    } else {
      console.error("No se pudo acceder a las celdas necesarias.");
    }
  }
}
