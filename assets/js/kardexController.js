window.jsPDF = window.jspdf.jsPDF;

document
  .querySelector(".main__content")
  .addEventListener("click", function (event) {
    const isKardexTable = event.target.closest("#productosKardex");

    if (isKardexTable) {
      const almacenSelect = document.getElementById("almacenSelect");
      const productoSeleccionado = document.getElementById(
        "productoSeleccionadoKardex"
      );
      const id_almacen = almacenSelect.value;

      if (id_almacen === "0") {
        alert("Selecciona un almacén");
        return;
      }

      const fila = event.target.closest("tr");
      if (!fila) return; // Si no se hace clic en una fila, salimos

      const id_producto = fila.cells[0].textContent.trim();
      const nombreProducto = fila.cells[1].textContent.trim();
      productoSeleccionado.innerText = nombreProducto;

      // Mostrar la fila de carga antes de enviar la solicitud
      mostrarFilaDeCarga();

      // Crear una solicitud XMLHttpRequest
      const xhr = new XMLHttpRequest();
      const url =
        "/Alvaplast-project/Controller/inventario/KardexController.php"; // Ruta del controlador PHP

      // Configurar la solicitud
      xhr.open("POST", url, true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      if (id_almacen && id_producto) {
        // Enviar los datos del formulario incluyendo id_almacen y id_producto
        xhr.send("id_almacen=" + id_almacen + "&id_producto=" + id_producto);
      } else {
        alert("Selecciona un producto válido");
      }

      // Manejar la respuesta del servidor
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // La solicitud se completó correctamente
            if (xhr.responseText) {
              actualizarTablaMovimientosKardex(xhr.responseText);
            } else {
              alert("Movimientos del producto obtenidos");
            }
          } else {
            // Hubo un error en la solicitud
            console.error("Error en la solicitud.");
          }
        }
      };
    }
  });

function actualizarTablaMovimientosKardex(datos) {
  const movimientosKardex = document.getElementById("movimientosKardex");
  const tbody = movimientosKardex.getElementsByTagName("tbody")[0];
  tbody.innerHTML = ""; // Limpiar tabla existente

  // Parsear la respuesta JSON a un array de objetos
  const movimientos = JSON.parse(datos);

  // Agregar stock fisico final
  if (movimientos.length > 0) {
    const spanStock = document.getElementById("stockfinal");
    if (movimientos[0].tipo === "V") {
      saldoFisicoFinal = movimientos[0].stock - movimientos[0].cantidad;
    } else {
      saldoFisicoFinal = movimientos[0].stock + movimientos[0].cantidad;
    }
    spanStock.value = saldoFisicoFinal;
  }

  // Iterar sobre los datos y agregar filas a la tabla
  movimientos.forEach((movimiento) => {
    const fila = document.createElement("tr");

    // Crear celdas con los datos correspondientes
    const fecha = document.createElement("td");
    fecha.textContent = movimiento.fecha;

    const proveedorCliente = document.createElement("td");
    proveedorCliente.textContent = movimiento.Nombre;

    const motivo = document.createElement("td");
    motivo.textContent = movimiento.tipo === "V" ? "Venta" : "Compra";

    const documento = document.createElement("td");
    documento.textContent =
      movimiento.tipodocumento +
      "/" +
      movimiento.nro_documento +
      "-" +
      movimiento.serie_documento;

    const monto = document.createElement("td");
    monto.textContent = movimiento.total;

    const inicio = document.createElement("td");
    inicio.textContent = movimiento.stock;

    // Crear celdas para ingreso, salida, y saldo
    const ingreso = document.createElement("td");
    const salida = document.createElement("td");
    const saldo = document.createElement("td");

    // Determinar los valores de ingreso, salida y saldo según el tipo de movimiento
    let ingresoValue = 0;
    let salidaValue = 0;
    let saldoValue = 0;

    if (movimiento.tipo === "V") {
      // Si es venta
      salidaValue = parseFloat(movimiento.cantidad);
      saldoValue =
        parseFloat(movimiento.stock) - parseFloat(movimiento.cantidad);
    } else if (movimiento.tipo === "C") {
      // Si es compra
      ingresoValue = parseFloat(movimiento.cantidad);
      saldoValue =
        parseFloat(movimiento.stock) + parseFloat(movimiento.cantidad);
    }

    // Formatear los valores a dos decimales y asignarlos a las celdas
    ingreso.textContent = ingresoValue.toFixed(2);
    salida.textContent = salidaValue.toFixed(2);
    saldo.textContent = saldoValue.toFixed(2);

    // Agregar las celdas a la fila
    fila.appendChild(fecha);
    fila.appendChild(proveedorCliente);
    fila.appendChild(motivo);
    fila.appendChild(documento);
    fila.appendChild(monto);
    fila.appendChild(inicio);
    fila.appendChild(ingreso);
    fila.appendChild(salida);
    fila.appendChild(saldo);

    // Agregar la fila al tbody de la tabla
    tbody.appendChild(fila);

    // Color azul si es que es Compra}
    if (movimiento.tipo !== "V") {
      fila.querySelectorAll("td").forEach((celda) => {
        celda.classList.add("blue-text");
      });
    }
  });
}

function mostrarFilaDeCarga() {
  const movimientosKardex = document.getElementById("movimientosKardex");
  const tbody = movimientosKardex.getElementsByTagName("tbody")[0];
  tbody.innerHTML = ""; // Limpiar el contenido existente del tbody

  const filaCarga = document.createElement("tr");

  // Agregar nueve celdas con los tres puntos suspensivos en cada una
  for (let i = 0; i < 9; i++) {
    const celdaCarga = document.createElement("td");
    celdaCarga.textContent = "...";
    filaCarga.appendChild(celdaCarga);
  }

  // Agregar la fila de carga al tbody
  tbody.appendChild(filaCarga);
}

function FiltrarListaProductosKardex() {
  const filtroInput = document.getElementById("filtroProductos");
  const filtro = filtroInput.value.toLowerCase().trim();

  const filasProductos = document.querySelectorAll("#productosKardex tbody tr");

  filasProductos.forEach((fila) => {
    const nombreProducto = fila
      .querySelector("td:nth-child(2)")
      .textContent.toLowerCase()
      .trim();

    if (nombreProducto.includes(filtro)) {
      fila.style.display = "table-row";
    } else {
      fila.style.display = "none";
    }
  });
}

function filtrarKardexPorFechas() {
  // Obtener las fechas de los inputs
  const fecha1Input = new Date(document.getElementById("fecha1").value);
  const fecha2Input = new Date(document.getElementById("fecha2").value);

  // Ajustar la zona horaria sumando 5 horas (GMT-0500)
  const ajusteHorario = 5 * 60 * 60 * 1000; // 5 horas en milisegundos
  const fecha1Ajustada = new Date(fecha1Input.getTime() + ajusteHorario);
  const fecha2Ajustada = new Date(fecha2Input.getTime() + ajusteHorario);

  const filasMovimientos = document.querySelectorAll(
    "#movimientosKardex tbody tr"
  );

  filasMovimientos.forEach((fila) => {
    const fechaFilaText = fila.querySelector("td:nth-child(1)").textContent;

    // Separar la cadena en sus componentes de fecha y hora
    const components = fechaFilaText.split(" ");
    const fechaComponents = components[0].split("/");
    const horaComponents = components[1].split(":");

    // Crear un objeto de fecha con los componentes
    const fechaFila = new Date(
      parseInt(fechaComponents[2]),
      parseInt(fechaComponents[1]) - 1,
      parseInt(fechaComponents[0]),
      0, // Establecer la hora a 00:00:00
      0,
      0
    );

    const fecha1SinHora = new Date(
      fecha1Ajustada.getFullYear(),
      fecha1Ajustada.getMonth(),
      fecha1Ajustada.getDate()
    );
    const fecha2SinHora = new Date(
      fecha2Ajustada.getFullYear(),
      fecha2Ajustada.getMonth(),
      fecha2Ajustada.getDate()
    );

    if (!isNaN(fechaFila)) {
      if (fechaFila >= fecha1SinHora && fechaFila <= fecha2SinHora) {
        fila.style.display = "table-row";
      } else {
        fila.style.display = "none";
      }
    } else {
      console.log("Fecha no válida:", fechaFilaText);
    }
  });
}

// Función para exportar la tabla a PDF
function exportarPDF() {
  const productoSeleccionado = document.getElementById(
    "productoSeleccionadoKardex"
  ).innerHTML;
  const AlmacenSeleccionado = document.getElementById("almacenSelect").value;
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
  doc.text(

    "Movimientos de " +
    productoSeleccionado +
    " (Almacen " +
    AlmacenSeleccionado +
    ")",
    14,
    10
  ); // Texto y posición
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
    "Fecha",
    "Proveedor / Cliente",
    "Motivo",
    "Documento",
    "Monto",
    "Inicio",
    "Ingreso",
    "Salida",
    "Saldo",
  ];

  // Obtener todas las filas de la tabla
  const filas = document.querySelectorAll("#movimientosKardex tbody tr");

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


//-------------------------------------------------------------------------------------------------------------Pruebas

function exportarKardexExcel() {
  // Obtener la fecha y hora del sistema
  var fechaHora = new Date().toLocaleString();

  // Crear una hoja de cálculo nueva
  var workbook = XLSX.utils.book_new();
  
  // Crear una hoja de cálculo nueva
  var worksheet = XLSX.utils.aoa_to_sheet([]);

  // Agregar título y dirección
 var titulo = ["AlvaPlastic"];
var direccion = "AV. CTO GRANDE Nº 3546 S.J.L";
var telef=" Telf. 2787802 / 947316259";
  
var autorizado = ["AUTORIZADO: SUSAN PAREDES V."];

  var additionalTitle = [['Fecha/hora:', fechaHora]]; // Modificar según sea necesario
  var proveedor = ["PROVEEDOR:"];
  var t = [""];
  // Agregar el título y la fecha/hora del sistema al principio de la hoja
  XLSX.utils.sheet_add_aoa(worksheet, [[titulo]], { origin: -1 }); // Insertar fila del título al principio de la hoja
  XLSX.utils.sheet_add_aoa(worksheet, [[direccion]], { origin: -1 }); // Insertar fila del título al principio de la hoja
  XLSX.utils.sheet_add_aoa(worksheet, [[proveedor]], { origin: -1 }); // Insertar fila del título al principio de la hoja
  XLSX.utils.sheet_add_aoa(worksheet, [[autorizado]], { origin: -1 }); // Insertar fila del título al principio de la hoja
  XLSX.utils.sheet_add_aoa(worksheet, [[telef]], { origin: -1 }); // Insertar fila del título al principio de la hoja
  XLSX.utils.sheet_add_aoa(worksheet, additionalTitle, { origin: -1 }); // Insertar fila de fecha/hora al principio de la hoja
  XLSX.utils.sheet_add_aoa(worksheet, [[t]], { origin: -1 }); // Insertar fila del título al principio de la hoja


  // Obtener los datos de la tabla
  var table = document.getElementById("ordertable");
  var data = [];

  // Iterar sobre las filas de la tabla
  for (var i = 0; i < table.rows.length; i++) {
    var rowData = [];
    var cells = table.rows[i].cells;

    // Iterar sobre las celdas de cada fila
    for (var j = 0; j < cells.length; j++) {
      rowData.push(cells[j].textContent);
    }

    // Agregar los datos de la fila al conjunto de datos
    data.push(rowData);
  }

  // Convertir los datos a un formato de hoja de cálculo y agregarlos a la hoja
  XLSX.utils.sheet_add_aoa(worksheet, data, { origin: -1 });

  // Ajustar el ancho de las columnas al contenido
  var range = XLSX.utils.decode_range(worksheet['!ref']);
  for (var C = range.s.c; C <= range.e.c; ++C) {
    var colWidth = 0;
    for (var R = range.s.r; R <= range.e.r; ++R) {
      var cell = worksheet[XLSX.utils.encode_cell({ c: C, r: R })];
      if (!cell) continue;
      var cellTextLength = cell.v ? String(cell.v).length : 0;
      if (colWidth < cellTextLength) colWidth = cellTextLength;
    }
    if (!worksheet['!cols']) worksheet['!cols'] = [];
    worksheet['!cols'][C] = { wch: colWidth }; // Establecer el ancho de la columna
  }

  // Agregar la hoja al libro de trabajo
  XLSX.utils.book_append_sheet(workbook, worksheet, 'Datos');

  // Generar el archivo Excel y guardarlo en el cliente
  XLSX.writeFile(workbook, 'tabla_exportada_' + fechaHora + '.xlsx');
}
