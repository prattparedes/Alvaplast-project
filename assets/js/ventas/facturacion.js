function NuevaFacturación() {
  limpiarFormularioFacturación();
  document.getElementById("fecha").value = establecerFechaHora();
  document.getElementById("vendedor").value = "1";
  document.getElementById("almacen").value = "1";
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
        datosCliente
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
  datosCliente
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
        <td class="textright">-</td>
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
  productSubtotal1.textContent = datosVenta[0].subtotal;
  productSubtotal2.textContent = datosVenta[0].subtotal;
  productIgvCell.textContent = datosVenta[0].igv;
  productTotalCell.textContent = datosVenta[0].total;
  productDescuento.textContent = 0;
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