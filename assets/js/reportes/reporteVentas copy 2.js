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
    "&tipodoc=" +
    tipodoc +
    "&metodo=Documento"
  );
  
//   // Obtener el elemento select
//   const selectTipoDoc = document.getElementById("tipodoc");

//   // Obtener el valor seleccionado del select
//   const selectedValue = selectTipoDoc.value;

//   // Obtener el texto seleccionado del select
//   const selectedText = selectTipoDoc.options[selectTipoDoc.selectedIndex].text;
  

//   // Actualizar el contenido del label con el valor seleccionado
//   const labelSelectedTipoDoc = document.getElementById("label_tipodoc");
//   labelSelectedTipoDoc.textContent = "" + selectedText + "";
// // Cambiar el tamaño de texto del label
// labelSelectedTipoDoc.style.fontSize = "20px"; // Puedes ajustar el valor del tamaño de texto según lo necesites
// labelSelectedTipoDoc.style.color="black";
// labelSelectedTipoDoc.style.fontWeight = "bold";


  //console.log(formattedFecha1, formattedFecha2, 'tipodoc: ' + tipoDoc)
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
          let totalImporte = 0; // Inicializar el total del importe
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

            // // Sumar al total del importe
            // totalImporte += parseFloat(item.importe);
          });

        //   // Mostrar el total del importe en una etiqueta <label>
        //   const labelTotalImporte = document.getElementById("total_importe");
        //   labelTotalImporte.textContent = "Total de Importe: S/. " + totalImporte.toFixed(2);
        //   labelTotalImporte.style.fontSize = "25px"; // Cambiar tamaño de texto a 20px (puedes ajustar el valor según lo necesites)
        //   labelTotalImporte.style.color="brown";
        //   labelTotalImporte.style.fontWeight = "bold";
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
    "&metodo=Serie"
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
            const id_producto = document.createElement("td");
            id_producto.textContent = item.id_producto;
            row.appendChild(id_producto);

            const nombre_producto = document.createElement("td");
            nombre_producto.textContent = item.nombre_producto;
            row.appendChild(producto);

            const abreviatura = document.createElement("td");
            abreviatura.textContent = item.abreviatura;
            row.appendChild(abreviatura);

            const cantidad = document.createElement("td");
            unidad.textContent = item.cantidad;
            row.appendChild(cantidad);

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

function consultarReportexCliente() {
  let idCliente = document.getElementById('idCliente').value;

  // Verificar si se han establecido fechas
  if (!idCliente) {
    alert("Por favor, selecciona un cliente.");
    return;
  }

  // Crear una solicitud XMLHttpRequest
  const xhr = new XMLHttpRequest();
  const url = "/Alvaplast-project/Controller/reportes/ReporteController.php"; // Ruta del controlador PHP

  // Configurar la solicitud
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.send(
    "&idCliente=" +
    idCliente +
    "&metodo=Cliente"
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
            const producto = document.createElement("td");
            producto.textContent = item.producto;
            row.appendChild(producto);

            const cantidad = document.createElement("td");
            cantidad.textContent = item.cantidad;
            row.appendChild(cantidad);

            const moneda = document.createElement("td");
            moneda.textContent = item.moneda;
            row.appendChild(moneda);

            const importe = document.createElement("td");
            importe.textContent = item.importe;
            row.appendChild(importe);

            const fecha = document.createElement("td");
            fecha.textContent = item.fecha;
            row.appendChild(fecha);

            const comprobante = document.createElement("td");
            comprobante.textContent = item.comprobante;
            row.appendChild(comprobante);

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

function consultarReportexProducto() {
  let idProducto = document.getElementById('idProducto').value;

  // Verificar si se han establecido fechas
  if (!idProducto) {
    alert("Por favor, selecciona un producto.");
    return;
  }

  // Crear una solicitud XMLHttpRequest
  const xhr = new XMLHttpRequest();
  const url = "/Alvaplast-project/Controller/reportes/ReporteController.php"; // Ruta del controlador PHP

  // Configurar la solicitud
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.send(
    "&idProducto=" +
    idProducto +
    "&metodo=Producto"
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

            const cantidad = document.createElement("td");
            cantidad.textContent = item.cantidad;
            row.appendChild(cantidad);

            const moneda = document.createElement("td");
            moneda.textContent = item.moneda;
            row.appendChild(moneda);

            const importe = document.createElement("td");
            importe.textContent = item.importe;
            row.appendChild(importe);

            const fecha = document.createElement("td");
            fecha.textContent = item.fecha;
            row.appendChild(fecha);

            const comprobante = document.createElement("td");
            comprobante.textContent = item.comprobante;
            row.appendChild(comprobante);

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
//-----------------------------------------------------------------------------------------------------++


function consultarReportexUtilidad() {
  let tipoDoc = document.getElementById("tipoDocumento").value;
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
    "&tipodoc=" +
    tipoDoc +
    "&metodo=Utilidad"
  );

  console.log(formattedFecha1, formattedFecha2, 'documento: ' + tipoDoc)
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
          dataFromServer.sort((a, b) => {
            // Convertir las fechas a objetos Date y comparar
            const dateA = convertirFecha(a.Fecha);
            const dateB = convertirFecha(b.Fecha);
            return dateA - dateB;
          }).forEach((item) => {
            const row = document.createElement("tr");

            // Crear celdas para cada propiedad del objeto

            const fecha = document.createElement("td");
            fecha.textContent = item.Fecha;
            row.appendChild(fecha);

            const producto = document.createElement("td");
            producto.textContent = item.nombre_producto;
            row.appendChild(producto);

            const abreviatura = document.createElement("td");
            abreviatura.textContent = item.abreviatura;
            row.appendChild(abreviatura);

            const descripcion = document.createElement("td");
            descripcion.textContent = item.descripcion;
            row.appendChild(descripcion);

            const Costo = document.createElement("td");
            Costo.textContent = item.Costo;
            row.appendChild(Costo);

            const PrecioUnit = document.createElement("td");
            PrecioUnit.textContent = item.PrecioUnit;
            row.appendChild(PrecioUnit);

            const cantidad = document.createElement("td");
            cantidad.textContent = item.cantidad;
            row.appendChild(cantidad);

            const Utilidad = document.createElement("td");
            Utilidad.textContent = item.Utilidad;
            row.appendChild(Utilidad);

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
//------------------------------------------------consultarDatosCosto
function consultarDatosCosto() {
  let idAlmacen = document.getElementById("almacen").value;
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
    "&idAlmacen=" +
    idAlmacen +
    "&metodo=Costo"
  );
  console.log(formattedFecha1, formattedFecha2, 'documento: ' + idAlmacen)


  // Manejar la respuesta del servidor
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

          // Calcular la suma de utilidades
          const sumaUtilidades = dataFromServer.reduce((total, item) => {
            return total + parseFloat(item.Utilidad);
          }, 0);

          // Mostrar la suma en una etiqueta <label>
          const labelSumaUtilidades = document.getElementById("suma_utilidades");
          labelSumaUtilidades.textContent = "Suma de Utilidades: " + sumaUtilidades.toFixed(2);

          // Calcular la suma de utilidades por día
          const sumasPorDia = {};

          dataFromServer.forEach((item) => {
            // Obtener la fecha del item
            const fecha = convertirFecha(item.Fecha);

            // Formatear la fecha en formato 'YYYY-MM-DD' para usarla como clave
            const fechaFormateada = fecha.toISOString().split('T')[0];

            // Si la fecha ya está en el objeto sumasPorDia, suma la utilidad, de lo contrario, inicializa la suma en 0
            sumasPorDia[fechaFormateada] = (sumasPorDia[fechaFormateada] || 0) + parseFloat(item.Utilidad);
          });

          // Mostrar las sumas por día (por ejemplo, en la consola)
          console.log(sumasPorDia);

          // Mostrar la suma en un campo de entrada <input>
          // const inputSumaUtilidades = document.getElementById("suma_utilidades");
          // inputSumaUtilidades.value = sumaUtilidades.toFixed(2);

          // Capturar la suma total de utilidades de la fecha de inicio en un label
          const labelSumaUtilidadesFechaInicio = document.getElementById("suma_utilidades_fecha_inicio");
          labelSumaUtilidadesFechaInicio.textContent = "Suma de Utilidades (Fecha de Inicio): " + sumasPorDia[formattedFecha1];

          // Capturar la suma total de utilidades de la fecha de fin en otro label
          const labelSumaUtilidadesFechaFin = document.getElementById("suma_utilidades_fecha_fin");
          labelSumaUtilidadesFechaFin.textContent = "Suma de Utilidades (Fecha de Fin): " + sumasPorDia[formattedFecha2];

          // Iterar sobre los datos y agregar filas a la tabla
          dataFromServer.sort((a, b) => {
            // Convertir las fechas a objetos Date y comparar
            const dateA = convertirFecha(a.Fecha);
            const dateB = convertirFecha(b.Fecha);
            return dateA - dateB;
          }).forEach((item) => {
            const row = document.createElement("tr");

            // Crear celdas para cada propiedad del objeto

            const id_producto = document.createElement("td");
            id_producto.textContent = item.id_producto;
            row.appendChild(id_producto);

            const producto = document.createElement("td");
            producto.textContent = item.nombre_producto;
            row.appendChild(producto);

            const abreviatura = document.createElement("td");
            abreviatura.textContent = item.abreviatura;
            row.appendChild(abreviatura);

            const descripcion = document.createElement("td");
            descripcion.textContent = item.descripcion;
            row.appendChild(descripcion);

            const Costo = document.createElement("td");
            Costo.textContent = item.Costo;
            row.appendChild(Costo);

            const PrecioUnit = document.createElement("td");
            PrecioUnit.textContent = item.PrecioUnit;
            row.appendChild(PrecioUnit);

            const cantidad = document.createElement("td");
            cantidad.textContent = item.Cantidad;
            row.appendChild(cantidad);

            const Utilidad = document.createElement("td");
            Utilidad.textContent = item.Utilidad;
            row.appendChild(Utilidad);

            // Agregar la fila a la tabla
            tbody.appendChild(row);
          });
        } else {
          // Hubo un error en la solicitud
          console.error("Error en la solicitud.");
        }
      }
    }
  };
}

//---------------------------------------------------------REPORTESXHelpers-----
// Función para calcular la suma de utilidades por día function exportarCostoPDF
function calcularSumaUtilidadesPorDia() {
  var tabla = document.getElementById("ventaxCosto");
  var rows = tabla.rows;
  var sumasPorDia = {};

  for (var i = 1; i < rows.length; i++) {
    var cells = rows[i].cells;
    var fecha = cells[6].textContent; // Suponiendo que la fecha está en la séptima columna
    var utilidad = parseFloat(cells[7].textContent); // Suponiendo que la utilidad está en la octava columna

    // Convertir la fecha al formato 'YYYY-MM-DD'
    var fechaFormateada = convertirFecha(fecha);

    // Si ya existe una entrada para esta fecha, sumar la utilidad, de lo contrario, inicializarla
    if (fechaFormateada in sumasPorDia) {
      sumasPorDia[fechaFormateada] += utilidad;
    } else {
      sumasPorDia[fechaFormateada] = utilidad;
    }
  }

  return sumasPorDia;
}

function exportarCostoPDF() {
  var doc = new jsPDF();

  var tabla = document.getElementById("ventaxCosto");
  doc.autoTable({ html: tabla });

  // Obtener las fechas establecidas de los input datetime-local
  var fechasEstablecidas = [];
  var inputsFecha = document.querySelectorAll("input[type='datetime-local']");
  inputsFecha.forEach(function (input) {
    var fecha = input.value.split("T")[0]; // Tomar solo la parte de la fecha sin la hora
    fechasEstablecidas.push(fecha);
  });
  // Ajustar el tamaño del texto para las fechas establecidas
  doc.setFontSize(12); // Tamaño del texto: 10 puntos
  // Concatenar las fechas en una sola cadena
  var fechasTexto = fechasEstablecidas.join("  -  ");

  // Agregar las fechas establecidas al PDF en una sola línea
  var yPos = doc.autoTable.previous.finalY + 10;
  doc.text("Fechas establecidas: " + fechasTexto, 10, yPos);
  yPos += 10; // Incrementar la posición Y para separar las fechas de las sumas

  // Calcular la suma de utilidades por día
  var sumasPorDia = calcularSumaUtilidadesPorDia();
  doc.setFontSize(15); // Tamaño del texto: 10 puntos
  // Agregar la suma de utilidades por día al PDF
  // doc.text("SUMA DE UTILIDADES POR DÍA:", 10, yPos);
  // yPos += 2;

  Object.keys(sumasPorDia).forEach(function (fecha) {
    yPos += 1;
    var sumaFormateada = sumasPorDia[fecha].toFixed(2); // Formatear a dos decimales

    // Guardar la posición actual
    var currentY = yPos;

    // Establecer el color de relleno para el rectángulo
    doc.setFillColor(205, 0, 0); // Relleno rojo

    // Dibujar el rectángulo alrededor del texto con color de relleno
    doc.rect(10, currentY - 7, 190, 10, 'F'); // Dibujar un rectángulo relleno alrededor del texto

    // Establecer el color de borde para el rectángulo
    doc.setDrawColor(0); // Borde negro

    // Dibujar el borde alrededor del texto
    doc.setLineWidth(0.1); // Establecer el ancho del borde
    doc.rect(10, currentY - 7, 190, 10, 'S'); // Dibujar un rectángulo alrededor del texto con borde

    // Establecer el color de texto para la suma de utilidades
    doc.setTextColor(255, 255, 255); // Texto blanco
    doc.text("La suma de utilidades por día  es: S/." + sumaFormateada, 15, currentY);

    // Restablecer el color de texto a negro
    doc.setTextColor(0); // Texto negro
  });

  // Mostrar el PDF en una nueva ventana emergente
  doc.output("dataurlnewwindow");
}


//--------------------------------OPCIONAL


//----------------------------------------------------------------------------------------------------------
function seleccionarClienteReporteCliente(fila) {
  var idCliente = fila.cells[0].textContent;
  var nombreCliente = fila.cells[1].textContent;


  loadContent('views/reportes/ventasxcliente.php').then(() => {
    document.getElementById("idCliente").value = idCliente;
    document.getElementById("cliente").value = nombreCliente;
  })
}

function seleccionarProductoReporteProducto(fila) {
  var idProducto = fila.cells[0].textContent;
  var producto = fila.cells[1].textContent;

  loadContent('views/reportes/ventasxproducto.php').then(() => {
    document.getElementById("idProducto").value = idProducto;
    document.getElementById("producto").value = producto;
  })
}

// Función para convertir la cadena de fecha en un objeto de fecha
function convertirFecha(fechaString) {
  // Separar el string de fecha en partes
  const partes = fechaString.split("/");
  // Crear un objeto de fecha con las partes
  const fecha = new Date(partes[2], partes[1] - 1, partes[0]);
  return fecha;
}

//---------------------------------------------------------REPORTES---------------------------------


//--------------------------------------------------------------------------------------------------
function exportarRVentaPDF() {
  var doc = new jsPDF();

  // Agregar título al documento
  var titulo = "Reporte de Ventas"; // Cambia "Reporte de Ventas" por el título que desees
  doc.text(titulo, 20, 10);

  // Obtener fecha y hora actual
  var fechaHoraActual = new Date().toLocaleString();

  // Agregar fecha y hora al documento
  doc.text("Fecha y hora: " + fechaHoraActual, 20, 20);

  var tabla = document.getElementById("reporte--table");
  doc.autoTable({ html: tabla });

  // Mostrar el PDF en una nueva ventana emergente
  doc.output("dataurlnewwindow");

  // Guardar el PDF en un archivo
  // doc.save('tabla.pdf');
}

function exportarRCompraPDF() {
  var doc = new jsPDF();
  var tabla = document.getElementById("reporte--table");
  doc.autoTable({ html: tabla });

  // Mostrar el PDF en una nueva ventana emergente
  doc.output("dataurlnewwindow");

  // Guardar el PDF en un archivo
  // doc.save('tabla.pdf');
}

function exportarVDocumentoPDF() {
  var doc = new jsPDF();
  var tabla = document.getElementById("ventaxdocumento");
  doc.autoTable({ html: tabla });

  // Mostrar el PDF en una nueva ventana emergente
  doc.output("dataurlnewwindow");

  // Guardar el PDF en un archivo
  // doc.save('tabla.pdf');
}

function exportarVFechaPDF() {
  var doc = new jsPDF();
  var tabla = document.getElementById("ventaxFecha");
  doc.autoTable({ html: tabla });

  // Mostrar el PDF en una nueva ventana emergente
  doc.output("dataurlnewwindow");

  // Guardar el PDF en un archivo
  // doc.save('tabla.pdf');
}

function exportarVClientePDF() {
  var doc = new jsPDF();
  var tabla = document.getElementById("ventaxcliente");
  doc.autoTable({ html: tabla });

  // Mostrar el PDF en una nueva ventana emergente
  doc.output("dataurlnewwindow");

  // Guardar el PDF en un archivo
  // doc.save('tabla.pdf');
}

function exportarVProductoPDF() {
  var doc = new jsPDF();
  var tabla = document.getElementById("ventaxproducto");
  doc.autoTable({ html: tabla });

  // Mostrar el PDF en una nueva ventana emergente
  doc.output("dataurlnewwindow");

  // Guardar el PDF en un archivo
  // doc.save('tabla.pdf');
}

function exportarVMarcaPDF() {
  var doc = new jsPDF();
  var tabla = document.getElementById("ventaxmarca");
  doc.autoTable({ html: tabla });

  // Mostrar el PDF en una nueva ventana emergente
  doc.output("dataurlnewwindow");

  // Guardar el PDF en un archivo
  // doc.save('tabla.pdf');
}

function exportarVSeriePDF() {
  var doc = new jsPDF();
  var tabla = document.getElementById("ventaxserie");
  doc.autoTable({ html: tabla });

  // Mostrar el PDF en una nueva ventana emergente
  doc.output("dataurlnewwindow");

  // Guardar el PDF en un archivo
  // doc.save('tabla.pdf');
}

function exportarVUtilidadesPDF() {
  var doc = new jsPDF();
  var tabla = document.getElementById("ventaxutilidades");
  doc.autoTable({ html: tabla });

  // Mostrar el PDF en una nueva ventana emergente
  doc.output("dataurlnewwindow");

  // Guardar el PDF en un archivo
  // doc.save('tabla.pdf');
}

//----VSCOSTO---------------------------------------------------------------------------listar
