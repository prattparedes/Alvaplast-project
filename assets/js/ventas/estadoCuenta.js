function listarEstadoCuenta() {
  let fecha1Value = document.getElementById("fecha1").value;
  let fecha2Value = document.getElementById("fecha2").value;

  // Convertir las cadenas de fecha en objetos Date
  let fecha1 = new Date(fecha1Value);
  let fecha2 = new Date(fecha2Value);

  // Extraer año, mes y día de las fechas
  let formattedFecha1 =
    fecha1.getFullYear() +
    "-" +
    ("0" + (fecha1.getMonth() + 1)).slice(-2) +
    "-" +
    ("0" + fecha1.getDate()).slice(-2);
  let formattedFecha2 =
    fecha2.getFullYear() +
    "-" +
    ("0" + (fecha2.getMonth() + 1)).slice(-2) +
    "-" +
    ("0" + fecha2.getDate()).slice(-2);

  // Verificar si se han establecido fechas
  if (!fecha1 || !fecha2) {
    alert("Por favor, establece ambas fechas.");
    return;
  }

  // Función para formatear números a 2 decimales
  const formatNumber = (num) => {
    return parseFloat(num).toFixed(2);
  };

  // Crear una solicitud XMLHttpRequest
  const xhr = new XMLHttpRequest();
  const url = "/Alvaplast-project/Controller/ventas/EstadoCuentaController.php"; // Ruta del controlador PHP

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
          const dataFromServer = JSON.parse(xhr.responseText);

          // Obtener la referencia del cuerpo de la tabla
          const tbody = document.getElementById("estadoCuenta--table");

          // Iterar sobre los datos y agregar filas a la tabla
          dataFromServer.forEach((item) => {
            const row = document.createElement("tr");

            // Crear celdas para cada propiedad del objeto
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
            row.appendChild(total);

            const debe = document.createElement("td");
            debe.textContent = formatNumber(item.Debe);
            row.appendChild(debe);

            const acuenta = document.createElement("td");
            acuenta.textContent = formatNumber(item.A_Cuenta);
            acuenta.style.textAlign = 'center';
            row.appendChild(acuenta);

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
