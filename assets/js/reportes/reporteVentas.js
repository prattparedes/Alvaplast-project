function consultarReporteVentas() {
  let idAlmacen = document.getElementById("almacen").value;
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

  console.log(idAlmacen, formattedFecha1, formattedFecha2);

  // Verificar si se ha seleccionado un almacén
  if (!idAlmacen) {
    alert("Por favor, selecciona un almacén.");
    return;
  }

  // Verificar si se han establecido fechas
  if (!fecha1 || !fecha2) {
    alert("Por favor, establece ambas fechas.");
    return;
  }

  // Crear una solicitud XMLHttpRequest
  const xhr = new XMLHttpRequest();
  const url = "/Alvaplast-project/Controller/reportes/ReporteController.php"; // Ruta del controlador PHP

  // Configurar la solicitud
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.send(
    "idAlmacen=" +
      idAlmacen +
      "&fechaIni=" +
      formattedFecha1 +
      "&fechaFin=" +
      formattedFecha2 +
      "&metodo=Ventas"
  );
  // Manejar la respuesta del servidor
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // La solicitud se completó correctamente
        if (xhr.responseText) {
            console.log(xhr.responseText);
          // Convertir la respuesta del servidor de JSON a objetos JavaScript
          const dataFromServer = JSON.parse(xhr.responseText);

          // Obtener la referencia del cuerpo de la tabla
          const tbody = document.getElementById("detalle_venta");

          // Iterar sobre los datos y agregar filas a la tabla
          dataFromServer.forEach((item) => {
            const row = document.createElement("tr");

            // Crear celdas para cada propiedad del objeto
            const fechaEmisionCell = document.createElement("td");
            fechaEmisionCell.textContent = item.fecha;
            row.appendChild(fechaEmisionCell);

            const comprobanteCell = document.createElement("td");
            comprobanteCell.textContent = item.comprobante;
            row.appendChild(comprobanteCell);

            const rucDniCell = document.createElement("td");
            rucDniCell.textContent = item.dniruc;
            row.appendChild(rucDniCell);

            const clienteCell = document.createElement("td");
            clienteCell.textContent = item.cliente;
            row.appendChild(clienteCell);

            const importeCell = document.createElement("td");
            importeCell.textContent = item.importe;
            row.appendChild(importeCell);

            const monedaCell = document.createElement("td");
            monedaCell.textContent = item.moneda;
            row.appendChild(monedaCell);

            const tipoPagoCell = document.createElement("td");
            tipoPagoCell.textContent = item.tipopago;
            row.appendChild(tipoPagoCell);

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
