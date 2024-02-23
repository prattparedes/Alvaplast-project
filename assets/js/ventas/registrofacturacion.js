function ListarRegistroFacturacion() {
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
  const url = "/Alvaplast-project/Controller/ventas/registroFacturacionController.php"; // Ruta del controlador PHP

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
          const tbody = document.getElementById("estadofacturacion--table");


           // Iterar sobre los datos y agregar filas a la tabla
            dataFromServer.forEach((item) => {
            const row = document.createElement("tr");

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

