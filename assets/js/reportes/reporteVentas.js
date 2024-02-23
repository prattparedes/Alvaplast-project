function consultarReporteVentas() {
  let idAlmacen = document.getElementById("almacen").value;
  let fecha1Value = document.getElementById("fecha1").value;
  let fecha2Value = document.getElementById("fecha2").value;

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

          // Limpiar tbody
          tbody.innerHTML = "";

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

function consultarReporteCompras() {
  let idAlmacen = document.getElementById("almacen").value;
  let fecha1Value = document.getElementById("fecha1").value;
  let fecha2Value = document.getElementById("fecha2").value;
  let proveedor = document.getElementById("proveedor").value;

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
      "&proveedor=" +
      proveedor +
      "&metodo=Compras"
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

          // Limpiar tbody
          tbody.innerHTML = "";

          // Iterar sobre los datos y agregar filas a la tabla
          dataFromServer.forEach((item) => {
            const row = document.createElement("tr");

            // Crear celdas para cada propiedad del objeto
            const proveedorCell = document.createElement("td");
            proveedorCell.textContent = item.proveedor;
            row.appendChild(proveedorCell);

            const comprobanteCell = document.createElement("td");
            comprobanteCell.textContent = item.comprobante;
            row.appendChild(comprobanteCell);

            const fechaCell = document.createElement("td");
            fechaCell.textContent = item.fecha;
            row.appendChild(fechaCell);

            const monedaCell = document.createElement("td");
            monedaCell.textContent = item.moneda;
            row.appendChild(monedaCell);

            const importeCell = document.createElement("td");
            importeCell.textContent = parseFloat(item.importe).toFixed(2);
            row.appendChild(importeCell);

            const almacenCell = document.createElement("td");
            almacenCell.textContent = item.almacen;
            row.appendChild(almacenCell);

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

//--


//---------------------------------------------------------------


//Reporte por tipo documento
function consultarReportexDocumento() {
  let tipodoc = document.getElementById("tipodoc").value;
  let fecha1Value = document.getElementById("fecha1").value;
  let fecha2Value = document.getElementById("fecha2").value;
  

  // Convertir las cadenas de fecha en objetos Date
  let fecha1 = new Date(fecha1Value);
  let fecha2 = new Date(fecha2Value);

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

  // Verificar si se ha seleccionado un almacén
  // if (!idAlmacen) {
  //   alert("Por favor, selecciona un almacén.");
  //   return;
  // }

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
    "tipodoc=" +
    tipodoc +
      "&fechaIni=" +
      formattedFecha1 +
      "&fechaFin=" +
      formattedFecha2 +
      "&metodo=Fecha"
      
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

          // Limpiar tbody
          tbody.innerHTML = "";

          // Iterar sobre los datos y agregar filas a la tabla
          dataFromServer.forEach((item) => {
            const row = document.createElement("tr");

            // Crear celdas para cada propiedad del objeto
            const cliente = document.createElement("td");
              cliente.textContent = item.cliente;
              row.appendChild(cliente);
  
              const comprobante = document.createElement("td");
              comprobante.textContent = item.comprobante;
              row.appendChild(comprobante);
  
              const fecha = document.createElement("td");
              fecha.textContent = item.fecha;
              row.appendChild(fecha);
  
              const moneda = document.createElement("td");
              moneda.textContent = item.moneda;
              row.appendChild(moneda);
  
              const importe = document.createElement("td");
              importe.textContent = item.importe;
              row.appendChild(importe);

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


//----------------------------------
function consultarReportexFechas() {
  // let idAlmacen = document.getElementById("tipoDocumento").value;
  let fecha1Value = document.getElementById("fecha1").value;
  let fecha2Value = document.getElementById("fecha2").value;
  

  // Convertir las cadenas de fecha en objetos Date
  let fecha1 = new Date(fecha1Value);
  let fecha2 = new Date(fecha2Value);

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

  // Verificar si se ha seleccionado un almacén
  // if (!idAlmacen) {
  //   alert("Por favor, selecciona un almacén.");
  //   return;
  // }

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
    
      "&fechaIni=" +
      formattedFecha1 +
      "&fechaFin=" +
      formattedFecha2 +
      "&metodo=Fecha"
      
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

          // Limpiar tbody
          tbody.innerHTML = "";

          // Iterar sobre los datos y agregar filas a la tabla
          dataFromServer.forEach((item) => {
            const row = document.createElement("tr");

            // Crear celdas para cada propiedad del objeto
            const cliente = document.createElement("td");
            cliente.textContent = item.cliente;
            row.appendChild(cliente);

            const comprobanteCell = document.createElement("td");
            comprobanteCell.textContent = item.comprobante;
            row.appendChild(comprobanteCell);

            const fechaCell = document.createElement("td");
            fechaCell.textContent = item.fecha;
            row.appendChild(fechaCell);

            const monedaCell = document.createElement("td");
            monedaCell.textContent = item.moneda;
            row.appendChild(monedaCell);

            const importeCell = document.createElement("td");
            importeCell.textContent = parseFloat(item.importe).toFixed(2);
            row.appendChild(importeCell);

            const almacenCell = document.createElement("td");
            almacenCell.textContent = item.almacen;
            row.appendChild(almacenCell);

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

function consultarReportexSerie() {
  // let idAlmacen = document.getElementById("tipoDocumento").value;
  let fecha1Value = document.getElementById("fecha1").value;
  let fecha2Value = document.getElementById("fecha2").value;
  

  // Convertir las cadenas de fecha en objetos Date
  let fecha1 = new Date(fecha1Value);
  let fecha2 = new Date(fecha2Value);

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

  // Verificar si se ha seleccionado un almacén
  // if (!idAlmacen) {
  //   alert("Por favor, selecciona un almacén.");
  //   return;
  // }

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
    
      "&fechaIni=" +
      formattedFecha1 +
      "&fechaFin=" +
      formattedFecha2 +
      "&metodo=Fecha"
      
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

          // Limpiar tbody
          tbody.innerHTML = "";

          // Iterar sobre los datos y agregar filas a la tabla
          dataFromServer.forEach((item) => {
            const row = document.createElement("tr");

            // Crear celdas para cada propiedad del objeto
            const codigo = document.createElement("td");
            codigo.textContent = item.codigo;
            row.appendChild(codigo);

            const producto = document.createElement("td");
            producto.textContent = item.producto;
            row.appendChild(producto);

            const cantidad = document.createElement("td");
            cantidad.textContent = item.cantidad;
            row.appendChild(cantidad);

            const unidad = document.createElement("td");
            unidad.textContent = item.unidad;
            row.appendChild(unidad);

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

//----
 // Extraer año, mes y día de las fechas
  // let formattedFecha1 =
  //   fecha1.getFullYear() +
  //   "-" +
  //   ("0" + (fecha1.getMonth() + 1)).slice(-2) +
  //   "-" +
  //   ("0" + fecha1.getDate()).slice(-2);
  // let formattedFecha2 =
  //   fecha2.getFullYear() +
  //   "-" +
  //   ("0" + (fecha2.getMonth() + 1)).slice(-2) +
  //   "-" +
  //   ("0" + fecha2.getDate()).slice(-2);

  // Extraer día, mes y año de las fechas//--