// Nuevo Ingreso al Kardex
function NuevoIngreso() {
  document.getElementById("numeroOC").removeAttribute("disabled");
  document.getElementById("tipoDocumento").removeAttribute("disabled");
  document.getElementById("fecha2").removeAttribute("disabled");
  document.getElementById("numero1").removeAttribute("disabled");
  document.getElementById("numero2").removeAttribute("disabled");
}

function abrirListadoOC() {
  if (document.getElementById("numeroOC").disabled) {
    return;
  }
  loadContent("views/modals/listaordencompraKardex.php");
}

// Pasar orden de compra al kardex formulario
async function seleccionarOCKardex(fila) {
  const columnas = fila.querySelectorAll("td");

  // Obtener el valor de la segunda columna (posición 1 en base a índices)
  const valorSegundaColumna = columnas[1].innerText.trim().substring(3);

  obtenerDatosOCKardex(valorSegundaColumna);
}

async function obtenerDatosOCKardex(idCompra) {
  console.log(idCompra);
  console.log(typeof idCompra);
  // URLs dinámicas basadas en los valores extraídos
  const urlCompra = `http://localhost/Alvaplast-project/Controller/compras/CompraController.php?idCompra=${idCompra}`;
  const urlCompraProducto = `http://localhost/Alvaplast-project/Controller/compras/CompraProductoController.php?idCompra=${idCompra}`;

  try {
    // Realizar las solicitudes fetch para obtener los datos de Compra y Compra Producto
    const [responseCompra, responseCompraProducto] = await Promise.all([
      fetch(urlCompra),
      fetch(urlCompraProducto),
    ]);

    if (!responseCompra.ok || !responseCompraProducto.ok) {
      throw new Error("Error al obtener los datos.");
    }

    const [datosCompra, datosCompraProducto] = await Promise.all([
      responseCompra.json(),
      responseCompraProducto.json(),
    ]);

    // Obtener la dirección del proveedor
    const urlProveedor = `http://localhost/Alvaplast-project/Controller/maintenance_models/ProveedorController.php?idProveedor=${datosCompra.id_proveedor}`;
    const responseProveedor = await fetch(urlProveedor);

    if (!responseProveedor.ok) {
      throw new Error("Error al obtener los datos del proveedor.");
    }

    const [datosProveedor] = await responseProveedor.json();

    // Regresar al formulario y llenarlo con los datos obtenidos
    loadContent("views/inventario/ingresokardex.php").then(() => {
      rellenarFormularioIngresoKardex(
        datosCompra,
        datosCompraProducto,
        datosProveedor
      );
      console.log("Datos Compra:", datosCompra);
      console.log("Datos Compra Producto:", datosCompraProducto);
      console.log("Dirección del proveedor:", datosProveedor);
      document.getElementById("numeroOC").removeAttribute("disabled");
      document.getElementById("tipoDocumento").removeAttribute("disabled");
      document.getElementById("numeroOC").removeAttribute("disabled");
      document.getElementById("fecha2").removeAttribute("disabled");
      document.getElementById("numero1").removeAttribute("disabled");
      document.getElementById("numero2").removeAttribute("disabled");
    });
  } catch (error) {
    console.error(error);
  }
}

function rellenarFormularioIngresoKardex(
  datosCompra,
  datosProductos,
  datosProveedor
) {
  // Rellenar Formulario
  document.getElementById("idOperacion").value = datosCompra.id_compra;
  document.getElementById("idMoneda").value = datosCompra.id_moneda;
  document.getElementById("almacen").value = datosCompra.id_almacen;
  document.getElementById("proveedor").value = datosProveedor.razon_social;
  document.getElementById("rucDni").value = datosProveedor.ruc;
  document.getElementById("numeroOC").value =
    "OC/ " + datosCompra.numero_documento + " - " + datosCompra.serie_documento;
  document.getElementById("tipoPago").value = datosCompra.tipo_pago;
  document.getElementById("inicial").value = datosCompra.total;
  document.getElementById("fecha1").value = datosCompra.fecha_compra;
  document.getElementById("fecha2").value = establecerFechaHora();
  document.getElementById("numero1").value = datosCompra.numero_documento;
  document.getElementById("numero2").value = datosCompra.serie_documento;
  document.getElementById("igv").checked = datosCompra.igv ? true : false;
  listarCajas(datosCompra.id_almacen)
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
          <td class="textright">${producto.precio_compra}</td>
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

  // Asignar valores a las celdas de la tabla con los datos de la compra
  productSubtotal2.textContent = datosCompra.subtotal;
  productIgvCell.textContent = datosCompra.igv;
  productTotalCell.textContent = datosCompra.total;

  // Sumar Descuentos
  let descuento = 0;
  datosProductos.forEach((producto) => {
    descuento += parseFloat(producto.descuento);
  });
  productDescuento.textContent = descuento.toFixed(2);
  productSubtotal1.textContent = (
    parseFloat(datosCompra.subtotal) + descuento
  ).toFixed(2);
}

//Metodo para listar las cajas que se tiene en un almacen
function listarCajas(values) {
  console.log(values);
  const url = `/Alvaplast-project/Controller/maintenance_models/AlmacenController.php?idAlmacen=${values}`;

  // Utilizar fetch para realizar la solicitud GET
  return fetch(url)
    .then((response) => {
      if (!response.ok) {
        throw new Error(`Error en la solicitud: ${response.status}`);
      }
      return response.json(); // Convertir la respuesta a formato JSON
    })
    .then((data) => {
      // Manipular los datos obtenidos (en este ejemplo, simplemente imprimirlos)
      const cajaSelect = document.getElementById("caja");
      data.forEach((caja) => {
        const optionCaja = document.createElement("option");
        optionCaja.value = caja.id_caja;
        optionCaja.text = caja.descripcion;
        cajaSelect.appendChild(optionCaja);
      });
    })
    .catch((error) => {
      console.error("Error al obtener datos:", error);
      throw error; // Puedes manejar el error o relanzarlo según tus necesidades
    });
}

/////////////////////////////////////////////////////////////////////////////////////
//                             STOCK DE PRODUCTOS KARDEX                           //
/////////////////////////////////////////////////////////////////////////////////////

// Producto Stock
let filtroLineaKardex = null;
function FiltrarProductosStockKardex(filtro) {
  const filasProductos = document.querySelectorAll(
    "#stock__products--table tbody tr"
  );
  filasProductos.forEach((fila) => {
    const nombreProducto = fila
      .querySelector("td:nth-child(2)")
      .textContent.toLowerCase()
      .trim();

    // Aplicar filtro por texto
    if (
      nombreProducto.includes(filtro) &&
      (!filtroLineaKardex ||
        CumpleFiltroLineaStockKardex(fila, filtroLineaKardex))
    ) {
      fila.style.display = "table-row";
    } else {
      fila.style.display = "none";
    }
  });
}

function FiltrarLineaProductosStockKardex(filtro) {
  console.log(filtro);
  if (filtro === "0") {
    filtroLineaKardex = null; // Limpiar el filtro de línea si el valor es "0"
  } else {
    filtroLineaKardex = filtro;
  }

  const filasProductos = document.querySelectorAll(
    "#stock__products--table tbody tr"
  );
  filasProductos.forEach((fila) => {
    if (
      !filtroLineaKardex ||
      CumpleFiltroLineaStockKardex(fila, filtroLineaKardex)
    ) {
      fila.style.display = "table-row";
    } else {
      fila.style.display = "none";
    }
  });
}


function CumpleFiltroLineaStockKardex(fila, filtro) {
  const idLinea = fila
    .querySelector("td:nth-child(4)")
    .textContent.trim()
    .toLowerCase(); // Convertir a minúsculas
  filtro = filtro.toLowerCase(); // Convertir a minúsculas
  return idLinea === filtro;
}
//----------------------------------------------------------------------------------
function listarProductosStockXAlmacen(idAlmacen) {
  // Crear una solicitud XMLHttpRequest
  const xhr = new XMLHttpRequest();
  const url =
    "/Alvaplast-project/Controller/maintenance_models/ProductoController.php"; // Ruta del controlador PHP

  // Configurar la solicitud
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.send("idAlmacen=" + idAlmacen);
  // Manejar la respuesta del servidor
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // La solicitud se completó correctamente
        if (xhr.responseText) {
          actualizarTablaStockKardex(xhr.responseText);
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

function actualizarTablaStockKardex(datos) {
  const stockKardex = document.getElementById("stock__products--table");
  const tbody = stockKardex.getElementsByTagName("tbody")[0];
  tbody.innerHTML = ""; // Limpiar tabla existente

  // Parsear la respuesta JSON a un array de objetos
  const stocks = JSON.parse(datos);

  // Iterar sobre los datos y agregar filas a la tabla
  stocks.forEach((productostock) => {
    const fila = document.createElement("tr");
    // Crear celdas con los datos correspondientes
    const idproducto = document.createElement("td");
    idproducto.textContent = productostock.id_producto;

    const producto = document.createElement("td");
    producto.textContent = productostock.nombre_producto;

    const unidad = document.createElement("td");
    unidad.textContent = productostock.Unidad;

    const linea = document.createElement("td");
    linea.textContent = productostock.Linea;

    const marca = document.createElement("td");
    marca.textContent = productostock.Marca;

    const stock = document.createElement("td");
    console.log(productostock.stock)
    stock.textContent = productostock.stock === '.00' ? '0.0' : productostock.stock;

    //   // Formatear los valores a dos decimales y asignarlos a las celdas
    //   ingreso.textContent = ingresoValue.toFixed(2);
    //   salida.textContent = salidaValue.toFixed(2);
    //   saldo.textContent = saldoValue.toFixed(2);

    // Agregar las celdas a la fila
    fila.appendChild(idproducto);
    fila.appendChild(producto);
    fila.appendChild(unidad);
    fila.appendChild(linea);
    fila.appendChild(marca);
    fila.appendChild(stock);

    // Agregar la fila al tbody de la tabla
    tbody.appendChild(fila);
  });
}


document.querySelector(".main__content").addEventListener("click", function (event) {
  if (event.target.classList.contains("kardex_submit")) {
    event.preventDefault();

    const idCaja = document.getElementById("caja").value
    const idOperacion = document.getElementById("idOperacion").value
    const idAlmacen = document.getElementById("almacen").value
    const idDocumento = document.getElementById("tipoDocumento").value
    const numeroDocumento = document.getElementById("numero1").value
    const serieDocumento = document.getElementById("numero2").value
    const tipoMovimiento = document.getElementById("tipoOperacion").value
    const monto = document.getElementById("inicial").value
    const fecha = document.getElementById("fecha2").value
    const metodo = event.target.innerHTML
    const ruc = document.getElementById("rucDni").value
    const xhr = new XMLHttpRequest();
    const url = "/Alvaplast-project/Controller/movimientos/MovimientoController.php";

    xhr.open("POST", url, true)
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    if (idCaja, idOperacion) {
      xhr.send("idCaja=" + idCaja + "&idOperacion=" + idOperacion + "&idAlmacen=" + idAlmacen + "&idDocumento=" + idDocumento + "&numeroDocumento=" + numeroDocumento + "&serieDocumento=" + serieDocumento + "&tipoMovimiento=" + tipoMovimiento + "&monto=" + monto + "&fecha=" + fecha + "&metodo=" + metodo);
    } else {
      alert("faltan datos")
    }



    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // La solicitud se completó correctamente
          // Puedes manejar la respuesta del servidor aquí
          console.log(xhr.responseText);
          //Envio de los datos de CompraProducto
          var idMovimiento = xhr.responseText;
          mandarDatosKardex(fecha, numeroDocumento, serieDocumento, idDocumento, idAlmacen, idMovimiento, monto, ruc, metodo)
        } else {
          // Hubo un error en la solicitud
          console.error('Error en la solicitud.');
        }
      }
    };
  }
});


function mandarDatosKardex(fecha, numeroDocumento, serieDocumento, idDocumento, idAlmacen, idMovimiento, total, rucDni, metodo) {
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
    var tipo = "C"
    // comenzamos con el protocolo http
    const http = new XMLHttpRequest();
    const url =
      "/Alvaplast-project/Controller/inventario/KardexController.php";
    //configuración de la solicitud
    http.open("POST", url, true);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    if (precioCompra) {
      //Enviamos los datos al controlador
      http.send("fecha=" + fecha + "&numeroDocumento=" + numeroDocumento + "&serieDocumento=" + serieDocumento + "&idDocumento=" + idDocumento + "&idProducto=" + idProducto + "&idAlmacen=" + idAlmacen + "&idMovimiento=" + idMovimiento + "&cantidad=" + cantidad + "&precio=" + precioCompra + "&descuento=" + descuento + "&tipo=" + tipo + "&total=" + total + "&ruc=" + rucDni + "&nombre=" + nombreProducto + "&metodo=" + metodo);
    } else {
      alert("faltan datos");
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

//--------------------------------------------------------------------------------------------------------------------------Prueba
function exportarStockExcel() {
  // Crear una hoja de cálculo nueva
  var workbook = XLSX.utils.book_new();

  // Obtener los datos de la tabla
  var table = document.getElementById("stock__products--table");
  var data = [];

  // Agregar título
  var titleRow = ["AlvaPlastic"];
  data.push(titleRow);

  var contenido = "AV. CANTO GRANDE Nº 3546-3548 S.J.L" + "                " + " - Telf. 2787802 / 947316259";
  var fila = [contenido];
  data.push(fila);
  // var parrafo = ["AV. CANTO GRANDE Nº 3546-3548 S.J.L"];
  // data.push(parrafo);

  // var telef = [" Telf. 2787802 / 947316259"];
  // data.push(telef);

  var proveedor = ["PROVEEDOR:"];
  data.push(proveedor);

  var auto = ["AUTORIZADO: SUSAN PAREDES VILLANUEVA"];
  data.push(auto);

  var vac = [""];
  data.push(vac);

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

  // Convertir los datos a un formato de hoja de cálculo
  var worksheet = XLSX.utils.aoa_to_sheet(data);

  // Agregar la hoja al libro de trabajo
  XLSX.utils.book_append_sheet(workbook, worksheet, 'Datos');

  // Generar el archivo Excel y guardarlo en el cliente
  XLSX.writeFile(workbook, 'documento_exportado_' + new Date().toISOString() + '.xlsx');
}

//-----------------------------------------ExportarPDF------------------------------------------
function exportarStockPDF() {
  var doc = new jsPDF();
  var tabla = document.getElementById('stock__products--table');
  doc.autoTable({ html: tabla });

  // Mostrar el PDF en una nueva ventana emergente
  doc.output('dataurlnewwindow');

  // Guardar el PDF en un archivo
  // doc.save('tabla.pdf');
}
//------------------------------------------


//-------REPORTE X MARCA-----------------------------------



 function FiltrarReportexMarca(filtro) {
   console.log(filtro);
   if (filtro === "0") {
     filtroxMarcaProducto = null; // Limpiar el filtro de línea si el valor es "0"
   } else {
     filtroxMarcaProducto = filtro;
   }

   const filasProductos = document.querySelectorAll(
     "#ventaxmarca tbody tr"
   );
   filasProductos.forEach((fila) => {
     if (
       !filtroxMarcaProducto ||
       CumpleFiltroProductoxMarca(fila, filtroxMarcaProducto)
     ) {
       fila.style.display = "table-row";
     } else {
       fila.style.display = "none";
     }
   });
 }


function listarProductoxMarca() {
  const xhr = new XMLHttpRequest();
  const url = "/Alvaplast-project/Controller/maintenance_models/MarcaController.php";

  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        if (xhr.responseText) {
        //  const dataFromServer = JSON.parse(xhr.responseText);

          const tbody = document.getElementById("ventaxmarca");
          tbody.innerHTML = ""; // Limpiar contenido existente de la tabla

       //   dataFromServer.forEach((item) => {
            const row = document.createElement("tr");

            // Crear celdas para cada propiedad del objeto
            // const producto = document.createElement("td");
            // producto.textContent = item.producto;

            // const cliente = document.createElement("td");
            // cliente.textContent = item.cliente;

            // const marca = document.createElement("td");
            // marca.textContent = item.marca;

            // const unidad = document.createElement("td");
            // unidad.textContent = item.Unidad;

            // const cantidad = document.createElement("td");
            // cantidad.textContent = item.cantidad;

            // const moneda = document.createElement("td");
            // moneda.textContent = item.moneda;

            // const importe = document.createElement("td");
            // importe.textContent = item.importe;

            // const fecha = document.createElement("td");
            // fecha.textContent = item.fecha;

            // const almacen = document.createElement("td");
            // almacen.textContent = item.almacen;

            // const comprobante = document.createElement("td");
            // comprobante.textContent = item.comprobante;

            // Agregar las celdas a la fila
            // row.appendChild(producto);
            // row.appendChild(cliente);
            // row.appendChild(marca);
            // row.appendChild(unidad);
            // row.appendChild(cantidad);
            // row.appendChild(moneda);
            // row.appendChild(importe);
            // row.appendChild(fecha);
            // row.appendChild(almacen);
            // row.appendChild(comprobante);

            // Agregar la fila a la tabla
            tbody.appendChild(row);
          
        }
      } else {
        console.error("Error en la solicitud.");
      }
    }
  };

  xhr.send(); // Enviar solicitud
}
