function NuevaFacturación() {
  limpiarFormularioFacturación();
  document.getElementById("fecha").value = establecerFechaHora();
  document.getElementById("vendedor").value = "1";
  document.getElementById("almacen").value = "0";
  document.getElementById("placaVehiculo").value = "2";
  document.getElementById("moneda").value = "1";
  document.getElementById("marcaVehiculo").value = "Hiunday";

  activarInputs();
}

// Función para seleccionar orden de venta en facturación
async function seleccionarOrdenVentaFacturación(fila) {
  const columnas = fila.querySelectorAll("td");
  // Obtener el valor de la segunda columna
  const valorSegundaColumna = columnas[1].innerText.trim().substring(7);

  // Realizar la solicitud fetch y esperar la respuesta
  const response = await fetch(
    `http://localhost/Alvaplast-project/Controller/ventas/VentaController.php?serieDocumento=${valorSegundaColumna}`
  );

  // Verificar si la solicitud fue exitosa
  if (!response.ok) {
    throw new Error("No se pudo obtener la ID de la venta.");
  }

  // Extraer el cuerpo de la respuesta como JSON
  const data = await response.json();
  const idVenta = data.id_venta;

  // URLs dinámicas basadas en los valores extraídos
  const urlVenta = `http://localhost/Alvaplast-project/Controller/ventas/VentaController.php?idVenta=${idVenta}`;
  const urlVentaProducto = `http://localhost/Alvaplast-project/Controller/ventas/VentaProductoController.php?idVenta=${idVenta}`;

  try {
    // Realizar las solicitudes fetch para obtener los datos de Venta y Venta Producto
    const [responseVenta, responseVentaProducto] = await Promise.all([
      fetch(urlVenta),
      fetch(urlVentaProducto),
    ]);

    if (!responseVenta.ok || !responseVentaProducto.ok) {
      throw new Error("Error al obtener los datos.");
    }

    const [datosVenta, datosVentaProducto] = await Promise.all([
      responseVenta.json(),
      responseVentaProducto.json(),
    ]);

    // Obtener la dirección del cliente
    const idCliente = datosVenta[0].id_cliente;
    const urlcliente = `http://localhost/Alvaplast-project/Controller/maintenance_models/ClienteController.php?idCliente=${idCliente}`;
    const responsecliente = await fetch(urlcliente);

    if (!responsecliente.ok) {
      throw new Error("Error al obtener los datos del cliente.");
    }

    const datosCliente = await responsecliente.json();
    // Regresar al formulario y llenarlo con los datos obtenidos
    loadContent("views/ventas/facturacion.php").then(() => {
      rellenarFormularioFacturación(
        datosVenta,
        datosVentaProducto,
        datosCliente,
        null
      );
    });
  } catch (error) {
    console.error(error);
  }
}

function mostrarFacturacion(tbodyId) {
  document.getElementById("facturable").style.display = "none";
  document.getElementById("noFacturable").style.display = "none";

  document.getElementById(tbodyId).style.display = "table-row-group";
}

function rellenarFormularioFacturación(
  datosVenta,
  datosProductos,
  datosCliente,
  datosMovimiento
) {
  const ordenVentaInput = document.getElementById("ordenVenta");
  const clienteInput = document.getElementById("cliente");
  const direccionInput = document.getElementById("direccion");
  // const sucursalSelect = document.getElementById("sucursal");
  const monedaSelect = document.getElementById("moneda");
  const almacenSelect = document.getElementById("almacen");
  // const tipoPagoSelect = document.getElementById("tipoPago");
  const fechaInput = document.getElementById("fecha");
  const idVentaInput = document.getElementById("idVenta");
  // const serieDocumentoInput = document.getElementById("serieDocumento");
  const rucDni = document.getElementById("rucDni");
  const inicialInput = document.getElementById("inicial");
  const cuotasInput = document.getElementById("cuotas");
  const montofinInput = document.getElementById("montofin");
  const montocuoInput = document.getElementById("montocuo");
  const personalInput = document.getElementById("vendedor");
  const tipoDocumentoInput = document.getElementById("tipoDocumento");
  activarInputs();
  //Rellenar Formulario
  console.log(datosVenta[0]);
  ordenVentaInput.value =
    "OV/ 0" +
    datosVenta[0].numero_documento +
    "-" +
    datosVenta[0].serie_documento;
  // serieDocumentoInput.value = datosVenta[0].serie_documento;
  idVentaInput.value = datosVenta[0].id_venta;
  clienteInput.value = datosCliente.razon_social;

  if (datosCliente.tipo_cliente === "N") {
    rucDni.value = datosCliente.dni;
  } else if (datosCliente.tipo_cliente === "J") {
    rucDni.value = datosCliente.ruc;
  }

  direccionInput.value = datosCliente.direccion;
  // sucursalSelect.value = "1";
  monedaSelect.value = datosVenta[0].id_moneda;
  // tipoPagoSelect.value = datosVenta[0].tipo_pago;
  inicialInput.value = parseFloat(datosVenta[0].pago_inicial).toFixed(0);
  cuotasInput.value = parseFloat(datosVenta[0].nro_cuotas).toFixed(0);
  montofinInput.value = parseFloat(datosVenta[0].monto_financiado).toFixed(0);
  montocuoInput.value = parseFloat(datosVenta[0].monto_cuota).toFixed(0);
  personalInput.value = datosVenta[0].id_personal;
  almacenSelect.value = datosVenta[0].id_almacen;
  fechaInput.value = datosVenta[0].fecha_emision;
  tipoDocumentoInput.value = datosVenta[0].id_tipodocumento;
  seleccionarTipoDocumentoFacturacion("001");
  // Rellenar Productos
  const tablaProductos = document.getElementById("ordertable");
  tablaProductos.querySelector("tbody").innerHTML = "";

  // Iterar sobre los datos de productos y añadir filas a la tabla
  datosProductos.forEach((producto) => {
    const row = document.createElement("tr");
    row.innerHTML = `
        <td style="display: none;">${producto.id_producto}</td>
        <td colspan="1">${producto.nombre_producto}</td>
        <td class="textright">${producto.cantidad}</td>
        <td class="textright">${producto.abreviatura}</td>
        <td class="textright">${producto.precio_venta}</td>
        <td class="textright">${producto.descuento}</td>
        <td class="textright">${producto.Sub_Total}</td>`;
    tablaProductos.querySelector("tbody").appendChild(row);
  });

  // Obtener las celdas de la tabla por su ID
  const productSubtotal1 = document.getElementById("productsubtotal1");
  const productSubtotal2 = document.getElementById("productsubtotal2");
  const productIgvCell = document.getElementById("productigv");
  const productTotalCell = document.getElementById("productTotal");
  const productDescuento = document.getElementById("productDescuento");

  // Asignar valores a las celdas de la tabla con los datos de la venta
  // seleccionarTipoDocumentoFacturacion("001");
  productSubtotal1.textContent = datosVenta[0].subtotal;
  productSubtotal2.textContent = datosVenta[0].subtotal;
  productIgvCell.textContent = datosVenta[0].igv;
  productTotalCell.textContent = datosVenta[0].total;
  productDescuento.textContent = 0;

  console.log('datos movimiento: ' + datosMovimiento)
  if (datosMovimiento) {
    console.log('se está activando esto');
    document.getElementById('idMovimiento').value = datosMovimiento.id_movimiento;
    document.getElementById('caja').value = datosMovimiento.id_caja;
    document.getElementById('numeroDocumento').value = datosMovimiento.numero_documento;
    document.getElementById('serieDocumento').value = datosMovimiento.serie_documento;
  }
}

function limpiarFormularioFacturación() {
  // Limpiar tabla de precios
  document.getElementById("productsubtotal1").innerHTML = 0.0;
  document.getElementById("productsubtotal2").innerHTML = 0.0;
  document.getElementById("productDescuento").innerHTML = 0.0;
  document.getElementById("productigv").innerHTML = 0.0;
  document.getElementById("productTotal").innerHTML = 0.0;

  // Seleccionar todos los inputs, textareas y selects excepto los dos primeros inputs
  const formInputs = document.querySelectorAll("input, textarea, select");

  // Iterar sobre los elementos seleccionados y limpiar sus valores
  formInputs.forEach((input) => {
    input.value = "";
  });

  // Limpiar tabla de orden
  const orderTable = document.getElementById("ordertable");
  const orderTableBody = orderTable.querySelector("tbody");
  orderTableBody.innerHTML = "";
}

function seleccionarTipoDocumentoFacturacion(idTipoDocumento) {

  const url = `http://localhost/Alvaplast-project/Controller/maintenance_models/DocumentoController.php?id_documento=${idTipoDocumento}&numero_documento=001`;
  fetch(url)
    .then(response => {
      if (!response.ok) {
        throw new Error(`Error en la solicitud: ${response.status}`);
      }
      return response.json();
    })
    .then(data => {
      // Hacer algo con los datos obtenidos
      console.log(data);
      document.getElementById("serieDocumento").value = data;
    })
    .catch(error => {
      // Manejar errores
      console.error(`Error en la solicitud: ${error.message}`);
    });

  console.log(idTipoDocumento)
}

function seleccionarPlacaVehiculo() {
  var select = document.getElementById("placaVehiculo");
  var marcaInput = document.getElementById("marcaVehiculo");

  // Obtener la opción seleccionada
  var selectedOption = select.options[select.selectedIndex];

  // Obtener la marca del atributo data-marca de la opción seleccionada
  var marca = selectedOption.getAttribute("data-marca");

  // Establecer el valor del input de la marca con la marca obtenida
  marcaInput.value = marca;
}

function selectTransportista() {
  var select = document.getElementById("nombreTransportista");
  var rucInput = document.getElementById("rucVehiculo");

  var selectedOption = select.options[select.selectedIndex];

  var ruc = selectedOption.getAttribute("data-ruc");
  // var dni = selectedOption.getAttribute("data-dni");
  rucInput.value = ruc;
}

function selectChofer() {
  var select = document.getElementById("nombreChofer");
  var licenciaInput = document.getElementById("choferLicencia");

  var selectedOption = select.options[select.selectedIndex];

  var marca = selectedOption.getAttribute("data-licencia");
  licenciaInput.value = marca;
}


document.querySelector(".main__content").addEventListener("click", function (event) {
  if (event.target.classList.contains("bill_submit")) {
    event.preventDefault();
    const idKardex = document.getElementById("idKardex").value
    var idMovimiento = document.getElementById("idMovimiento").value
    const idCaja = document.getElementById("caja").value
    const idOperacion = document.getElementById("idVenta").value
    const idAlmacen = document.getElementById("almacen").value
    const idDocumento = document.getElementById("tipoDocumento").value
    const numeroDocumento = document.getElementById("numeroDocumento").value
    const serieDocumento = document.getElementById("serieDocumento").value
    const tipoMovimiento = document.getElementById("tipoOperacion").value
    const monto = document.getElementById("inicial").value
    const fecha = document.getElementById("fecha").value
    const metodo = event.target.innerHTML
    const ruc = document.getElementById("rucDni").value
    console.log(idKardex);
    const xhr = new XMLHttpRequest();
    const url = "/Alvaplast-project/Controller/movimientos/MovimientoController.php";
    xhr.open("POST", url, true)
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    if (idCaja, idOperacion) {
      xhr.send("idCaja=" + idCaja + "&idOperacion=" + idOperacion + "&idAlmacen=" + idAlmacen + "&idDocumento=" + idDocumento + "&numeroDocumento=" + numeroDocumento + "&serieDocumento=" + serieDocumento + "&tipoMovimiento=" + tipoMovimiento + "&monto=" + monto + "&fecha=" + fecha + "&metodo=" + metodo + "&idMovimiento=" + idMovimiento);
    } else {
      //alert("faltan datos")
      alertify
      .alert("Falta agregar datos.", function(){
      //  alertify.error('Error');
      });
     
    }
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // La solicitud se completó correctamente
          // Puedes manejar la respuesta del servidor aquí
          console.log(xhr.responseText);
          //Envio de los datos de CompraProducto
          var idMovimiento = xhr.responseText;
          if (metodo == "Grabar") {
            mandarDatosKardexFact(1, fecha, numeroDocumento, serieDocumento, idDocumento, idAlmacen, idMovimiento, monto, ruc, metodo)
           // alert("Se grabo correctamente la factura")
           alertify
           .alert("Se grabo correctamente la factura.", function(){
             alertify.message('OK');
           });
          } else if (metodo == "Anular " || "Eliminar") {
            mandarDatosKardexFact(idKardex, fecha, numeroDocumento, serieDocumento, idDocumento, idAlmacen, idMovimiento, monto, ruc, metodo)
           // alert("Se elimino la factura hecha")
           alertify.confirm("Desea eliminar Factura.",
          function(){
          alertify.success('Ok');
          },
          function(){
          alertify.error('Cancel');
          });
          }
        } else {
          // Hubo un error en la solicitud
          console.error('Error en la solicitud.');
        }
      }
    };
  }
});

function mandarDatosKardexFact(idKardex, fecha, numeroDocumento, serieDocumento, idDocumento, idAlmacen, idMovimiento, total, rucDni, metodo) {
  const tabla = document.getElementById("ordertable");
  const filas = tabla.querySelectorAll("tbody tr");

  filas.forEach((fila) => {
    const columnas = fila.querySelectorAll("td");
    //Asignar los datos para mandar a la casa
    const idProducto = columnas[0].textContent.trim();
    const nombreProducto = columnas[1].textContent.trim();
    const cantidad = columnas[2].textContent.trim();
    const precioCompra = columnas[4].textContent.trim();
    const descuento = columnas[5].textContent.trim();
    var tipo = "V"
    // comenzamos con el protocolo http
    const http = new XMLHttpRequest();
    const url =
      "/Alvaplast-project/Controller/inventario/KardexController.php";
    //configuración de la solicitud
    http.open("POST", url, true);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    if (precioCompra) {
      //Enviamos los datos al controlador
      http.send("fecha=" + fecha + "&numeroDocumento=" + numeroDocumento + "&serieDocumento=" + serieDocumento + "&idDocumento=" + idDocumento + "&idProducto=" + idProducto + "&idAlmacen=" + idAlmacen + "&idMovimiento=" + idMovimiento + "&cantidad=" + cantidad + "&precio=" + precioCompra + "&descuento=" + descuento + "&tipo=" + tipo + "&total=" + total + "&ruc=" + rucDni + "&nombre=" + nombreProducto + "&metodo=" + metodo + "&idKardex=" + idKardex);
    } else {
      //alert("faltan datos");
      
      alertify
      .alert("Falta agregar datos.", function(){
       // alertify.error('Error');
      });
    }

    http.onreadystatechange = function () {
      if (http.readyState === XMLHttpRequest.DONE) {
        if (http.status === 200) {
          // La solicitud se completó correctamente
          // Puedes manejar la respuesta del servidor aquí
          console.log(http.responseText);


        } else {
          // Hubo un error en la solicitud
          console.error("Error en la insercion de los datos");
        }
      }
    };
  });
}


function filtrarRegistroFacturacion(filtro) {
  filtro = filtro.toLowerCase();

  var rows = document.querySelectorAll('#detalle_venta tr');

  rows.forEach(function (row) {
    var cells = row.querySelectorAll('td');

    // Inicializar una variable para rastrear si el filtro coincide con alguna celda de la fila
    var matchFound = false;

    // Iterar sobre cada celda de la fila
    cells.forEach(function (cell) {
      // Convertir el contenido de la celda a minúsculas para la comparación insensible a mayúsculas y minúsculas
      var cellContent = cell.textContent.toLowerCase();

      // Verificar si el filtro está contenido en el contenido de la celda
      if (cellContent.includes(filtro)) {
        // Si se encuentra una coincidencia, marcar que se ha encontrado una coincidencia
        matchFound = true;
      }
    });

    // Mostrar u ocultar la fila según si se encontró una coincidencia con el filtro
    row.style.display = matchFound ? '' : 'none';
  });
}

async function seleccionarFactura(fila) {
  var idVenta = fila.getElementsByTagName('td')[10].textContent.trim();

  // URLs dinámicas basadas en los valores extraídos
  const urlVenta = `http://localhost/Alvaplast-project/Controller/ventas/VentaController.php?idVenta=${idVenta}`;
  const urlVentaProducto = `http://localhost/Alvaplast-project/Controller/ventas/VentaProductoController.php?idVenta=${idVenta}`;
  const urlMovimiento = `http://localhost/Alvaplast-project/Controller/movimientos/MovimientoController.php?idVenta=${idVenta}`;

  try {
    // Realizar las solicitudes fetch para obtener los datos de Venta, Venta Producto y Movimiento
    const [responseVenta, responseVentaProducto, responseMovimiento] = await Promise.all([
      fetch(urlVenta),
      fetch(urlVentaProducto),
      fetch(urlMovimiento),
    ]);

    if (!responseVenta.ok || !responseVentaProducto.ok || !responseMovimiento.ok) {
      throw new Error("Error al obtener los datos.");
    }

    const [datosVenta, datosVentaProducto, datosMovimiento] = await Promise.all([
      responseVenta.json(),
      responseVentaProducto.json(),
      responseMovimiento.json(),
    ]);

    // Obtener la dirección del cliente
    const idCliente = datosVenta[0].id_cliente;
    const urlCliente = `http://localhost/Alvaplast-project/Controller/maintenance_models/ClienteController.php?idCliente=${idCliente}`;
    const responseCliente = await fetch(urlCliente);

    if (!responseCliente.ok) {
      throw new Error("Error al obtener los datos del cliente.");
    }

    const datosCliente = await responseCliente.json();

    //Obtener idKardex
    const idMovimiento = datosMovimiento.id_movimiento;
    const idKardexUrl = `http://localhost/Alvaplast-project/Controller/inventario/KardexController.php?idMovimiento=${idMovimiento}`;
    const responseIdKardex = await fetch(idKardexUrl);

    if (!responseIdKardex.ok) {
      throw new Error("Error al obtener el idKardex.");
    }

    const idKardex = await responseIdKardex.json();

    // Regresar al formulario y llenarlo con los datos obtenidos
    loadContent("views/ventas/facturacion.php").then(() => {
      rellenarFormularioFacturación(
        datosVenta,
        datosVentaProducto,
        datosCliente,
        datosMovimiento
      );
      console.log(datosMovimiento);
      document.getElementById('tipoDocumento').setAttribute('disabled', 'disabled');
      document.getElementById('vendedor').setAttribute('disabled', 'disabled');
      document.getElementById('almacen').setAttribute('disabled', 'disabled');
      document.getElementById('ordenVenta').setAttribute('disabled', 'disabled');
      document.getElementById('fecha').setAttribute('disabled', 'disabled');
      document.getElementById('caja').setAttribute('disabled', 'disabled');
      document.getElementById('idKardex').value = idKardex;
    });
  } catch (error) {
    console.error(error);
  }
}

//-----------------------------------------------------------------------Imprimir--Corregir
// window.jsPDF = window.jspdf.jsPDF;
function exportarFacturacionPDF() {
  var doc = new jsPDF();
  
  // Agregar título al documento
  var titulo = "Reporte de Factuación"; // Cambia "Reporte de Ventas" por el título que desees
  doc.text(titulo, 20, 10);
  
  // Obtener fecha y hora actual
  var fechaHoraActual = new Date().toLocaleString();
  
  // Agregar fecha y hora al documento
  doc.text("Fecha y hora: " + fechaHoraActual, 20, 20);
  
  var tabla = document.getElementById('ordertable');
  doc.autoTable({ html: tabla });
  
  // Mostrar el PDF en una nueva ventana emergente
  doc.output('dataurlnewwindow');
  
  // Guardar el PDF en un archivo
  // doc.save('tabla.pdf');
}
