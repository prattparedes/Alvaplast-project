function ListarDocumentosVentas() {
  let fecha1Value = document.getElementById("fecha1").value;
  let fecha2Value = document.getElementById("fecha2").value;
  console.log(fecha1Value)
  console.log(fecha2Value)
  // Verificar si se han establecido fechas
  if (!fecha1Value.trim() || !fecha2Value.trim()) {
    alert("Por favor, establece ambas fechas.");
    return;
  }
  // Crear una solicitud XMLHttpRequest
  const xhr = new XMLHttpRequest();
  const url = "/Alvaplast-project/Controller/ventas/regulardocumentoController.php"; // Ruta del controlador PHP

  // Configurar la solicitud
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.send("fechaIni=" + fecha1Value + "&fechaFin=" + fecha2Value);

  // Manejar la respuesta del servidor
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // La solicitud se completó correctamente
        if (xhr.responseText) {
          // Convertir la respuesta del servidor de JSON a objetos JavaScript
          console.log(xhr.responseText);
          const dataFromServer = JSON.parse(xhr.responseText);


          ///------------------


          // Obtener la referencia del cuerpo de la tabla
          const tbody = document.getElementById("regulardocumento--table");


          // Iterar sobre los datos y agregar filas a la tabla
          dataFromServer.forEach((item) => {
            const row = document.createElement("tr");


            // Crear celdas para cada propiedad del objeto


            const Movimiento = document.createElement("td");
            Movimiento.textContent = item.Movimiento;
            Movimiento.style.textAlign = 'center';
            row.appendChild(Movimiento);

            const Documento = document.createElement("td");
            Documento.textContent = item.Documento;
            Documento.style.textAlign = 'center';
            row.appendChild(Documento);

            const Correlativo = document.createElement("td");
            Correlativo.textContent = item.Correlativo;
            row.appendChild(Correlativo);


            const razonSocial = document.createElement("td");
            razonSocial.textContent = item.razon_social;
            row.appendChild(razonSocial);

            const monto = document.createElement("td");
            monto.textContent = item.monto;
            monto.style.textAlign = 'center';
            row.appendChild(monto);


            // Agregar la fila a la tabla
            tbody.appendChild(row);
          });
        }
      } else {
        // Hubo un error en la solicitud
        console.error("Error en la solicitud.");
      }
    }
  };
}

//----------------------------------------------------------------------------
// window.jsPDF = window.jspdf.jsPDF;

// Función para exportar la tabla a PDF

function exportarRegularPDF() {
  var doc = new jsPDF();
  var tabla = document.getElementById('regulardocumento--table');
  doc.autoTable({ html: tabla });

  // Mostrar el PDF en una nueva ventana emergente
  doc.output('dataurlnewwindow');

  // Guardar el PDF en un archivo
  // doc.save('tabla.pdf');
}

