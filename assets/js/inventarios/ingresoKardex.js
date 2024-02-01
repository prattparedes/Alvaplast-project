// Nuevo Ingreso al Kardex
function NuevoIngreso() {
  document.getElementById("numeroOC").removeAttribute("disabled");
  document.getElementById("tipoDocumento").removeAttribute("disabled");
  document.getElementById("numeroOC").removeAttribute("disabled");
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

  // URLs dinámicas basadas en los valores extraídos
  const urlCompra = `http://localhost/Alvaplast-project/Controller/compras/CompraController.php?idCompra=${valorSegundaColumna}`;
  const urlCompraProducto = `http://localhost/Alvaplast-project/Controller/compras/CompraProductoController.php?idCompra=${valorSegundaColumna}`;

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
  document.getElementById("proveedor").value = datosProveedor.razon_social;
  document.getElementById("rucDni").value = datosProveedor.ruc;
  document.getElementById("numeroOC").value =
    "OC/ " + datosCompra.numero_documento + " - " + datosCompra.serie_documento;
  document.getElementById("tipoPago").value = datosCompra.tipo_pago;
  document.getElementById("inicial").value = datosCompra.total;
  document.getElementById("fecha1").value = datosCompra.fecha_compra;
  document.getElementById("fecha2").value = datosCompra.fecha_compra;
  document.getElementById("igv").checked = datosCompra.igv ? true : false;

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
    descuento += parseFloat(producto.descuento)
  });
  productDescuento.textContent = descuento.toFixed(2);
  productSubtotal1.textContent = (parseFloat(datosCompra.subtotal) + descuento).toFixed(2);
}
