function ListarDocumentosVentas() {
  let fecha1Value = document.getElementById("fecha1").value;
  let fecha2Value = document.getElementById("fecha2").value;

  // Verificar si se han establecido fechas
  if (!fecha1Value.trim() || !fecha2Value.trim()) {
    alert("Por favor, establece ambas fechas.");
    return;
  }

  // Convertir las cadenas de fecha en objetos Date
  let fecha1 = new Date(fecha1Value);
  let fecha2 = new Date(fecha2Value);

  // Extraer día, mes y año de las fechas
  let formattedFecha1 =
    ("0" + fecha1.getDate()).slice(-2) +
    "-" +
    ("0" + (fecha1.getMonth() + 1)).slice(-2) +
    "-" +
    fecha1.getFullYear();
  let formattedFecha2 =
    ("0" + fecha2.getDate()).slice(-2) +
    "-" +
    ("0" + (fecha2.getMonth() + 1)).slice(-2) +
    "-" +
    fecha2.getFullYear();

  // Función para formatear números a 2 decimales
  const formatNumber = (num) => {
    return parseFloat(num).toFixed(2);
  };

  // Crear una solicitud XMLHttpRequest
  const xhr = new XMLHttpRequest();
  const url = "/Alvaplast-project/Controller/ventas/regulardocumentoController.php"; // Ruta del controlador PHP

  // Configurar la solicitud
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.send("fechaIni=" + formattedFecha1 + "&fechaFin=" + formattedFecha2);

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


//-----
//----

//--
// function filtrarFacturacion() {
//   const filtroInput = document.getElementById("filtroProductos");
//   const filtro = filtroInput.value.toLowerCase().trim();

//   const filasProductos = document.querySelectorAll("#estadofacturacion--table tbody tr");

//   filasProductos.forEach((fila) => {
//     const nombreProducto = fila
//       .querySelector("td:nth-child(2)")
//       .textContent.toLowerCase()
//       .trim();

//     if (nombreProducto.includes(filtro)) {
//       fila.style.display = "table-row";
//     } else {
//       fila.style.display = "none";
//     }
//   });
// }

// Función para exportar la tabla a PDF
window.jsPDF = window.jspdf.jsPDF;
function exportarPDFD() {

  const fecha1 = new Date(document.getElementById("fecha1").value);
  const fecha2 = new Date(document.getElementById("fecha2").value);

  // Ajustar la zona horaria sumando 5 horas (GMT-0500)
  const ajusteHorario = 5 * 60 * 60 * 1000; // 5 horas en milisegundos
  const fecha1Ajustada = new Date(fecha1.getTime() + ajusteHorario);
  const fecha2Ajustada = new Date(fecha2.getTime() + ajusteHorario);

  //Fecha por día mes y año
  const fechaFormateada1 = fecha1Ajustada.toLocaleDateString("es-ES", {
    day: "numeric",
    month: "long",
    year: "numeric",
  });
  const fechaFormateada2 = fecha2Ajustada.toLocaleDateString("es-ES", {
    day: "numeric",
    month: "long",
    year: "numeric",
  });

  // Crear un objeto jsPDF
  const doc = new jsPDF();

  // Título del documento
  // doc.text(
  //   "Movimientos de " +
  //     productoSeleccionado +
  //     " (Almacén " +
  //     AlmacenSeleccionado +
  //     ")",
  //   14,
  //   10
  // ); // Texto y posición
  if (
    !(
      fechaFormateada1 === "Invalid Date" || fechaFormateada2 === "Invalid Date"
    )
  ) {
    doc.text(
      "Desde: " + fechaFormateada1 + " Hasta: " + fechaFormateada2,
      14,
      20
    ); // Texto y posición
  }

  // Encabezados de la tabla
  const headers = [
    "Movimiento",
    "Documento",
    "Correlativo",
    "Razón Social",
    "Monto",
    
  ];

  // Obtener todas las filas de la tabla
  const filas = document.querySelectorAll("#regulardocumento--table tbody tr");
  console.log(filas)
  // Crear un array de datos de las filas visibles
  const datosFilas = [];
  filas.forEach((fila) => {
    if (window.getComputedStyle(fila).display !== "none") {
      const contenido = fila.innerText || fila.textContent;
      datosFilas.push(contenido.split("\t")); // Usar solo split("\t")
    }
  });

  console.log(datosFilas);
  // Configurar tamaño de fuente para las filas
  const fontSize = 10; // Tamaño de fuente para las filas
  doc.setFontSize(fontSize);

  if (
    !(
      fechaFormateada1 === "Invalid Date" || fechaFormateada2 === "Invalid Date"
    )
  ) {
    // Agregar las filas al PDF usando autoTable
    doc.autoTable({
      head: [headers], // Encabezados de la tabla
      body: datosFilas, // Datos de las filas visibles
      margin: { top: 25 }, // Margen superior para dejar espacio para el título
      styles: {
        fontSize: 7, // Tamaño de fuente para las filas
        overflow: "ellipsize", // Controlar el desbordamiento de texto
      },
    });
  } else {
    // Agregar las filas al PDF usando autoTable
    doc.autoTable({
      head: [headers], // Encabezados de la tabla
      body: datosFilas, // Datos de las filas visibles
      margin: { top: 15 }, // Margen superior para dejar espacio para el título
      styles: {
        fontSize: 7, // Tamaño de fuente para las filas
        overflow: "ellipsize", // Controlar el desbordamiento de texto
      },
      columnStyles: {
        // Establecer estilos específicos para ciertas columnas si es necesario
        0: { fontStyle: "bold" },
        // ... otras columnas si es necesario
      },
    });
  }

  // Guardar el PDF como una cadena de datos (blob)
  const pdfData = doc.output();

  // Crear un objeto blob con los datos del PDF
  const blob = new Blob([pdfData], { type: "application/pdf" });

  // Crear una URL para el objeto blob
  const url = URL.createObjectURL(blob);

  // Abrir la URL en una nueva ventana del navegador
  window.open(url);
}

