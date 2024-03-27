function formatNumber(number) {
  // Formatear el número utilizando la función toLocaleString() para separadores de miles y decimales
  return number.toLocaleString("es-ES", { minimumFractionDigits: 2 });
}

function listarEstadoCuenta() {
  let fecha1Value = document.getElementById("fecha1").value;
  let fecha2Value = document.getElementById("fecha2").value;
  console.log(fecha1Value);
  console.log(fecha2Value);
  // Obtener el tipo de documento seleccionado
  // Verificar si se han establecido fechas
  if (!fecha1Value.trim() || !fecha2Value.trim()) {
    alert("Por favor, establece ambas fechas.");
    return;
  }

  // Crear una solicitud XMLHttpRequest
  const xhr = new XMLHttpRequest();
  const url = "/Alvaplast-project/Controller/ventas/EstadoCuentaController.php"; // Ruta del controlador PHP

  // Configurar la solicitud
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  // Enviar la solicitud al servidor con el tipo de documento
  xhr.send(
    "fechaIni=" +
    fecha1Value +
    "&fechaFin=" +
    fecha2Value +
    "&metodo=EstadoCuenta"
  );

  // Manejar la respuesta del servidor
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // La solicitud se completó correctamente
        if (xhr.responseText) {
          // Convertir la respuesta del servidor de JSON a objetos JavaScript
          const dataFromServer = JSON.parse(xhr.responseText);

          // Ordenar los datos por tipo de documento
          dataFromServer.sort((a, b) => {
            return a.TipoDocumento.localeCompare(b.TipoDocumento);
          });

          // Obtener la referencia del cuerpo de la tabla
          const tbody = document
            .getElementById("estadoCuenta--table")
            .getElementsByTagName("tbody")[0];

          // Limpiar el cuerpo de la tabla antes de agregar nuevos datos
          tbody.innerHTML = "";

          // Variable para guardar el tipo de documento actual
          let tipoDocumentoActual = null;

          // Variable para guardar los totales de cada tipo de documento
          let tipoTotal = 0;
          let tipoDebe = 0;
          let tipoACuenta = 0;

          // Iterar sobre los datos y agregar filas a la tabla
          dataFromServer.forEach((item) => {
            // Si el tipo de documento cambió, agregar una fila de separación y mostrar los totales del tipo anterior
            if (tipoDocumentoActual !== item.TipoDocumento) {
              if (tipoDocumentoActual !== null) {
                // Agregar fila de totales del tipo de documento anterior
                const totalRow = document.createElement("tr");

                // Agregar celdas vacías para las columnas anteriores al total
                for (let i = 0; i < 4; i++) {
                  const emptyCell = document.createElement("td");
                  emptyCell.textContent = ""; // Contenido vacío
                  totalRow.appendChild(emptyCell);
                }

                const totalCell = document.createElement("td");
                totalCell.textContent = "Total:";
                totalRow.appendChild(totalCell);

                const totalTotalCell = document.createElement("td");
                totalTotalCell.textContent = formatNumber(tipoTotal);
                totalTotalCell.style.fontWeight = "bold"; // Aplicar negrita al total
                totalRow.appendChild(totalTotalCell);

                const totalDebeCell = document.createElement("td");
                totalDebeCell.textContent = formatNumber(tipoDebe);
                totalDebeCell.style.fontWeight = "bold"; // Aplicar negrita al total
                totalRow.appendChild(totalDebeCell);

                const totalACuentaCell = document.createElement("td");
                totalACuentaCell.textContent = formatNumber(tipoACuenta);
                totalACuentaCell.style.fontWeight = "bold"; // Aplicar negrita al total
                totalRow.appendChild(totalACuentaCell);

                // Agregar fila de totales al cuerpo de la tabla
                tbody.appendChild(totalRow);

                // Reiniciar totales para el nuevo tipo de documento
                tipoTotal = 0;
                tipoDebe = 0;
                tipoACuenta = 0;
              }

              // Agregar fila de separación para el nuevo tipo de documento
              const separatorRow = document.createElement("tr");
              const separatorCell = document.createElement("td");
              separatorCell.style.backgroundColor = "#67bfd1"; // Establecer el color de fondo de la celda
              separatorCell.style.fontSize = "20px"; // Establecer el tamaño de la fuente en la celda
              separatorCell.colSpan = 8; // Ajustar el número de columnas según tu diseño
              separatorCell.textContent =
                "Tipo de documento: " + item.TipoDocumento;
              separatorRow.appendChild(separatorCell);
              tbody.appendChild(separatorRow);

              tipoDocumentoActual = item.TipoDocumento; // Actualizar el tipo de documento actual
            }

            // Crear la fila para el dato actual
            const row = document.createElement("tr");
            row.setAttribute("onclick", "abrirPagarCuota(this)");
            // Crear celdas para cada propiedad del objeto y agregarlas a la fila
            const fechaVenta = document.createElement("td");
            fechaVenta.textContent = item.FechaVenta;
            row.appendChild(fechaVenta);

            const numeroDocumento = document.createElement("td");
            numeroDocumento.textContent = item.NumeroDoc;
            row.appendChild(numeroDocumento);

            const razonSocial = document.createElement("td");
            razonSocial.textContent = item.Razon_Social;
            row.appendChild(razonSocial);

            const vendedor = document.createElement("td");
            vendedor.textContent = item.Vendedor;
            row.appendChild(vendedor);

            const estado = document.createElement("td");
            estado.textContent = item.Estado;
            row.appendChild(estado);

            const total = document.createElement("td");
            total.textContent = formatNumber(item.Total);
            total.style.backgroundColor = "#e1fdca";
            row.appendChild(total);

            const debe = document.createElement("td");
            debe.textContent = formatNumber(item.Debe);
            debe.style.backgroundColor = "#fdcae1";
            row.appendChild(debe);

            const acuenta = document.createElement("td");
            acuenta.textContent = formatNumber(item.A_Cuenta);
            acuenta.style.textAlign = "center";
            acuenta.style.backgroundColor = "#caf5fd";
            row.appendChild(acuenta);

            const id_ECuenta = document.createElement("td");
            id_ECuenta.textContent = item.id_ECuenta;
            id_ECuenta.style.display = "none";
            row.appendChild(id_ECuenta);

            // Agregar la fila a la tabla
            tbody.appendChild(row);

            // Sumar al total de cada tipo de documento
            tipoTotal += parseFloat(item.Total);
            tipoDebe += parseFloat(item.Debe);
            tipoACuenta += parseFloat(item.A_Cuenta);
          });

          // Agregar fila de totales para el último tipo de documento
          if (tipoDocumentoActual !== null) {
            const totalRow = document.createElement("tr");

            // Crear celdas para los totales y agregarlas a la fila
            for (let i = 0; i < 4; i++) {
              const totalCell = document.createElement("td");
              totalCell.textContent = "";
              totalRow.appendChild(totalCell);
            }

            const totalCell = document.createElement("td");
            totalCell.textContent = "Total:";
            totalRow.appendChild(totalCell);

            const totalTotalCell = document.createElement("td");
            totalTotalCell.textContent = formatNumber(tipoTotal);
            totalTotalCell.style.fontWeight = "bold"; // Aplicar negrita al total
            totalRow.appendChild(totalTotalCell);

            const totalDebeCell = document.createElement("td");
            totalDebeCell.textContent = formatNumber(tipoDebe);
            totalDebeCell.style.fontWeight = "bold"; // Aplicar negrita al total de "Debe"
            totalRow.appendChild(totalDebeCell);

            const totalACuentaCell = document.createElement("td");
            totalACuentaCell.textContent = formatNumber(tipoACuenta);
            totalACuentaCell.style.fontWeight = "bold"; // Aplicar negrita al total de "A Cuenta"
            totalRow.appendChild(totalACuentaCell);

            // Agregar fila de totales al cuerpo de la tabla
            tbody.appendChild(totalRow);
          }

          // Calcular y mostrar las sumas totales en etiquetas <label>
          const totalTotalGlobal = dataFromServer.reduce(
            (total, item) => total + parseFloat(item.Total),
            0
          );
          const totalDebeGlobal = dataFromServer.reduce(
            (total, item) => total + parseFloat(item.Debe),
            0
          );
          const totalACuentaGlobal = dataFromServer.reduce(
            (total, item) => total + parseFloat(item.A_Cuenta),
            0
          );

          document.getElementById("totalTotalLabel").textContent =
            "Total Total Global: " + totalTotalGlobal.toFixed(2);
          document.getElementById("totalDebeLabel").textContent =
            "Total Debe Global: " + totalDebeGlobal.toFixed(2);
          document.getElementById("totalACuentaLabel").textContent =
            "Total A Cuenta Global: " + totalACuentaGlobal.toFixed(2);
        }
      } else {
        // Hubo un error en la solicitud
        console.error("Error en la solicitud.");
      }
    }
  };
}

//----------------------------------------------------------------------------------Nuevo

//Repote compras---------------------------
function exportarEstadoPDF() {
  var doc = new jsPDF();
  var tabla = document.getElementById("estadoCuenta--table");
  doc.autoTable({ html: tabla });

  // Mostrar el PDF en una nueva ventana emergente
  doc.output("dataurlnewwindow");

  // Guardar el PDF en un archivo
  // doc.save('tabla.pdf');
}

//---------------------------------------------------------------------------------------------
function exportarEstadoExcel() {
  // Obtener la fecha y hora del sistema
  var fechaHora = new Date().toLocaleString();

  // Crear una hoja de cálculo nueva
  var workbook = XLSX.utils.book_new();

  // Crear una hoja de cálculo nueva
  var worksheet = XLSX.utils.aoa_to_sheet([]);

  // Agregar título y dirección
  var titulo = ["AlvaPlastic"];
  var direccion = "AV. CTO GRANDE Nº 3546 S.J.L";
  var telef = " Telf. 2787802 / 947316259";

  var autorizado = ["AUTORIZADO: SUSAN PAREDES V."];

  var additionalTitle = [["Fecha/hora:", fechaHora]]; // Modificar según sea necesario
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
  var table = document.getElementById("estadoCuenta--table");
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
  var range = XLSX.utils.decode_range(worksheet["!ref"]);
  for (var C = range.s.c; C <= range.e.c; ++C) {
    var colWidth = 0;
    for (var R = range.s.r; R <= range.e.r; ++R) {
      var cell = worksheet[XLSX.utils.encode_cell({ c: C, r: R })];
      if (!cell) continue;
      var cellTextLength = cell.v ? String(cell.v).length : 0;
      if (colWidth < cellTextLength) colWidth = cellTextLength;
    }
    if (!worksheet["!cols"]) worksheet["!cols"] = [];
    worksheet["!cols"][C] = { wch: colWidth }; // Establecer el ancho de la columna
  }

  // Agregar la hoja al libro de trabajo
  XLSX.utils.book_append_sheet(workbook, worksheet, "Datos");

  // Generar el archivo Excel y guardarlo en el cliente
  XLSX.writeFile(workbook, "tabla_exportada_" + fechaHora + ".xlsx");
}

function cargarCuotas(fila) {
  const columnas = fila.querySelectorAll("td");
  let id = columnas[8].innerText.trim();
  loadContentIntoModal("views/modals/EstadoCuentamodal.php", `data=${id}`);
}

function abrirPagarCuota(fila) {
  fetch("views/modals/pagarcuota.php")
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("overlay").style.display = "block";
      document.getElementById("alertModal").classList.add('pagarCuotaModal');
      document.getElementById("alertModal").innerHTML = data;
      idCuenta = fila.getElementsByTagName('td')[8].textContent;
      Total = fila.getElementsByTagName('td')[5].textContent;
      Debe = fila.getElementsByTagName('td')[6].textContent;

      document.getElementById('idCuenta').value = idCuenta;
      document.getElementById('total').value = Total;
      document.getElementById('debe').value = Debe;
      document.getElementById('monto-pago').value = Debe;

      verCuotasPorId(idCuenta);
    }).catch(error => {
      console.error('Error al cargar el archivo pagarcuota.php, error: ' + error)
    })
}

function cerrarPagarCuota() {
  listarEstadoCuenta();
  document.getElementById("overlay").style.display = "none";
  document.getElementById("alertModal").classList.remove('pagarCuotaModal');
  document.getElementById("alertModal").innerHTML = `<p id="alertText">Nuevo Valor: <input type="text" id="nuevoValor"></p>
  <button onclick="closeAlertModal(true)" id="btnSi">Sí</button>
  <button onclick="closeAlertModal(false)" id="btnNo">No</button>`;
}

function pagarCuota() {
  // Lógica de pagar una cuota
  const idCuota = document.getElementById("idCuenta").value;
  const montoAPagar = document.getElementById('monto-pago').value;
  const total = document.getElementById('total').value;
  console.log(idCuota, montoAPagar, total)

  if (montoAPagar > total) {
    return alert("el monto a pagar excede al total")
  }
  const http = new XMLHttpRequest();
  const url = "/Alvaplast-project/Controller/ventas/EstadoCuentaController.php";
  // Configurar la solicitud
  http.open("POST", url, true);
  http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  if (idCuota && total) {
    // Enviar los datos del formulario incluyendo descripcion y abreviatura
    http.send("tipo=Grabar&total=" + total + "&idCuenta=" + idCuota + "&pago=" + montoAPagar);
  } else {
    alert("faltan datos")
  }
  http.onreadystatechange = function () {
    if (http.readyState === XMLHttpRequest.DONE) {
      if (http.status === 200) {
        // La solicitud se completó correctamente
        // Puedes manejar la respuesta del servidor aquí
        alert(http.responseText);
        // Refrescar tabla de cuotas
        verCuotasPorId(idCuenta)
      } else {
        // Hubo un error en la solicitud
        console.error('Error en la solicitud.');
      }
    }
  };
}

function anularPago() {
  // Lógica de anular un pago
  const idCuota = document.getElementById("idCuenta").value;
  const total = document.getElementById('total').value;
  console.log(idCuota, total)
  const http = new XMLHttpRequest();
  const url = "/Alvaplast-project/Controller/ventas/EstadoCuentaController.php";
  // Configurar la solicitud
  http.open("POST", url, true);
  http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  if (idCuota && total) {
    // Enviar los datos del formulario incluyendo descripcion y abreviatura
    http.send("tipo=Anular&total=" + total + "&idCuenta=" + idCuota + "&pago=0");
  } else {
    alert("faltan datos")
  }
  http.onreadystatechange = function () {
    if (http.readyState === XMLHttpRequest.DONE) {
      if (http.status === 200) {
        // La solicitud se completó correctamente
        // Puedes manejar la respuesta del servidor aquí
        alert(http.responseText);
        // Refrescar tabla de cuotas
        verCuotasPorId(idCuenta)
      } else {
        // Hubo un error en la solicitud
        console.error('Error en la solicitud.');
      }
    }
  };
}

function verCuotasPorId(idCuenta) {
  // Crear una solicitud XMLHttpRequest
  const xhr = new XMLHttpRequest();
  const url =
    "/Alvaplast-project/Controller/reportes/ReporteController.php"; // Ruta del controlador PHP

  // Configurar la solicitud
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("idCuenta=" + idCuenta + "&metodo=EstadoCuenta");

  // Manejar la respuesta del servidor
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // La solicitud se completó correctamente
        if (xhr.responseText) {
          const data = JSON.parse(xhr.responseText);
          const tbody = document.getElementById('cuotas--table').querySelector('tbody');

          // Vaciar el tbody
          tbody.innerHTML = "";

          data.forEach(item => {
            const row = document.createElement('tr');

            // Llena la fila con los datos correspondientes
            row.innerHTML = `
              <td>${item.item}</td>
              <td>${item.monto_cuota}</td>
              <td>${item.Estado_Cuota}</td>
              <td>${item.fecha_pago}</td>
            `;

            // Inserta la fila en el cuerpo de la tabla
            tbody.appendChild(row);
          });
        } else {
          alert("Ocurrió un error al obtener las cuotas.");
        }
      } else {
        // Hubo un error en la solicitud
        console.error("Error en la solicitud.");
      }
    }
  };
}