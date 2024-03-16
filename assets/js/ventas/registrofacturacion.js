
function ListarRegistroFacturacion() {
  let fecha1Value = document.getElementById("fecha1").value;
  let fecha2Value = document.getElementById("fecha2").value;
  console.log(fecha1Value)

  // Verificar si se han establecido fechas
  if (!fecha1Value.trim() || !fecha2Value.trim()) {
    alert("Por favor, establece ambas fechas.");
    return;
  }



  //-----------------
  // Convertir las cadenas de fecha en objetos Date
  // let fecha1 = new Date(fecha1Value + "T00:00:00Z");
  // let fecha2 = new Date(fecha2Value + "T23:59:59Z");

  // // Obtener la fecha actual y convertirla a UTC
  // let today = new Date();
  // let formattedToday =
  //   today.getFullYear() +
  //   "-" +
  //   ("0" + (today.getMonth() + 1)).slice(-2) +
  //   "-" +
  //   ("0" + today.getDate()).slice(-2);

  // // Verificar si las fechas son iguales a la fecha actual
  // if (formattedFecha1 === formattedToday || formattedFecha2 === formattedToday) {
  //   // Si las fechas son iguales a la fecha actual, sumar un día a la fecha 2
  //   fecha2.setDate(fecha2.getDate() + 1);
  // }

  // // Convertir las fechas a UTC para evitar problemas de zona horaria
  // let formattedFecha1 = fecha1.toISOString().split("T")[0];
  // let formattedFecha2 = fecha2.toISOString().split("T")[0];



  // Función para formatear números a 2 decimales

  // Crear una solicitud XMLHttpRequest
  const xhr = new XMLHttpRequest();
  const url = "/Alvaplast-project/Controller/ventas/registroFacturacionController.php"; // Ruta del controlador PHP

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
          const tbody = document.getElementById("detalle_venta");
          tbody.innerHTML = "";

          // Iterar sobre los datos y agregar filas a la tabla
          dataFromServer.forEach((item) => {
            const row = document.createElement("tr");
            row.setAttribute('onclick', 'seleccionarFactura(this)');

            // Crear celdas para cada propiedad del objeto
            const numero_documento = document.createElement("td");
            numero_documento.textContent = item.Numero_Documento;
            row.appendChild(numero_documento);

            const ordenVenta = document.createElement("td");
            ordenVenta.textContent = item.Orden_Venta;
            row.appendChild(ordenVenta);

            const cliente = document.createElement("td");
            cliente.textContent = item.Cliente;
            row.appendChild(cliente);

            const docCliente = document.createElement("td");
            docCliente.textContent = item.Documento_Cliente;
            row.appendChild(docCliente);


            const vendedor = document.createElement("td");
            vendedor.textContent = item.Vendedor;
            row.appendChild(vendedor);

            const fecha_emision = document.createElement("td");
            fecha_emision.textContent = item.fecha_movimiento;
            row.appendChild(fecha_emision);

            const monto = document.createElement("td");
            monto.textContent = item.monto;
            row.appendChild(monto);

            const moneda = document.createElement("td");
            moneda.textContent = item.Moneda;
            row.appendChild(moneda);

            const estado = document.createElement("td");
            estado.textContent = item.Estado;
            row.appendChild(estado);

            const idmovimiento = document.createElement("td");
            idmovimiento.textContent = item.id_movimiento;
            idmovimiento.style.display = 'none'; // Ocultar la celda
            row.appendChild(idmovimiento);

            const idventa = document.createElement("td");
            idventa.textContent = item.id_venta;
            idventa.style.display = 'none'; // Ocultar la celda
            row.appendChild(idventa);


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
