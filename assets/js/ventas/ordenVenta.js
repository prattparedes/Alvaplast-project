// Nueva Orden de Venta
function nuevaOrdenVenta() {
  limpiarFormularioVenta();
  document.getElementById("fecha").value = establecerFechaHora();

  activarInputs();
  document
    .getElementById("btnRegister")
    .classList.remove("order__btn--inactive");
  document.getElementById("btnModify").classList.add("order__btn--inactive");
  document.getElementById("btnDelete").classList.add("order__btn--inactive");
  // Conseguir id de venta nuevo
  const xhr = new XMLHttpRequest();
  const url = "/Alvaplast-project/Controller/ventas/VentaController.php"; // Ruta del controlador PHP
  xhr.open("GET", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("idVenta=" + 999999999);

  // Manejar la respuesta del servidor
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Puedes manejar la respuesta del servidor aquí
        document.getElementById("idVenta").value = xhr.responseText.replace(
          /^"|"$/g,
          ""
        );
      } else {
        console.error("Error en la solicitud.");
      }
    }
  };
}

// Función para ir al listado de clientes
function abrirListadoClientes() {
  if (!document.getElementById("cliente").disabled) {
    guardarCopiaSeguridadVenta(copiaSeguridadFormulario);
    loadContent("views/modals/listadoclientes.php");
  }
}

// Función para seleccionar Cliente y Pasarlo al Formulario
function seleccionarCliente(fila) {
  const columnas = fila.querySelectorAll("td");

  // Crear un array con el contenido de las celdas de la fila clickeada
  const contenidoFila = Array.from(columnas).map(
    (columna) => columna.innerText
  );

  // Obtener elementos del array
  const clientID = contenidoFila[0];
  const clientName = contenidoFila[1];
  const clientDirection = contenidoFila[4];
  const clientRUC = contenidoFila[2];
  const clientDNI = contenidoFila[3];

  // Cambiar al formulario y luego cambiar el html
  loadContent("views/ventas/ordenVenta.php").then(() => {
    document
      .getElementById("btnRegister")
      .classList.remove("order__btn--inactive"); //--------------------------------------
    // Cambiar el HTML de los spans por los datos
    restaurarCopiaSeguridadVenta(copiaSeguridadFormulario);
    document.getElementById("idcliente").value = clientID;
    document.getElementById("cliente").value = clientName;
    document.getElementById("direccion").value = clientDirection;

    const rucDniInput = document.getElementById("rucDni");

    // Verificar si hay RUC o DNI y asignar el valor correspondiente al input
    if (clientRUC !== "-") {
      rucDniInput.value = clientRUC;
    } else if (clientDNI !== "-") {
      rucDniInput.value = clientDNI;
    }
    activarInputs();
  });
}

// Función para ir al listado de productos
function abrirListadoProductosVenta() {
  var opcion = document.getElementById("almacen").value;
  var cliente = document.getElementById("idcliente").value;

  if (cliente == "0" || !cliente) {
    return alert("Debe seleccionar un cliente");
  }

  if (opcion == "0" || !opcion) {
    return (alert = alertify
      .alert("Información", "Debe seleccionar un almacén")
      .set("label", "Aceptar"));

    alert.set("modal", false); //al pulsar fuera del dialog se cierra o no
    // return alert("Debe seleccionar un almacén");
  }

  guardarCopiaSeguridadVenta(copiaSeguridadFormulario);

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4) {
      if (this.status == 200) {
        document.getElementById("navbarNav").classList.remove("show");
        document.querySelector(".main__content").innerHTML = this.responseText;

        // Aquí puedes utilizar el valor de additionalData como desees
        console.log("Datos adicionales:", opcion, cliente);

        // Ya no necesitas la lógica de la promesa aquí
      } else {
        alert("Error en la carga del contenido");
      }
    }
  };
  xhttp.open(
    "GET",
    "views/modals/listadoproductosventa.php" +
      "?idAlmacen=" +
      encodeURIComponent(opcion) +
      "&idCliente=" +
      encodeURIComponent(cliente),
    true
  );
  xhttp.send();
}

// Función para seleccionar Producto y pasarlo al formulario
function seleccionarProductoVenta(fila) {
  const columnas = fila.querySelectorAll("td");

  // Crear un array con el contenido de las celdas de la fila clickeada
  const contenidoFila = Array.from(columnas).map(
    (columna) => columna.innerText
  );

  // Guardar los datos de la fila en una variable global para ser usada más tarde
  window.clickedRowData = contenidoFila;

  // Obtener elementos del array
  const productUnit = contenidoFila[5];
  const productName = contenidoFila[1];
  const productPrice = contenidoFila[4];
  const productStock = contenidoFila[6];

  // Cambiar al formulario y luego cambiar el html
  loadContent("views/ventas/OrdenVenta.php").then(() => {
    document
      .getElementById("btnRegister")
      .classList.remove("order__btn--inactive"); //-----------------------------------
    // Cambiar el HTML de los spans por los datos
    document.getElementById("productstock").value = productStock;
    document.getElementById("productunit").value = productUnit;
    document.getElementById("productname").value = productName;
    document.getElementById("productprice").value = productPrice;
    activarInputs();
    document.getElementById("productunit").setAttribute("disabled", "disabled");
    document.getElementById("productquantity").removeAttribute("disabled");
    document.getElementById("productprice").removeAttribute("disabled");
    document.getElementById("productdiscount").removeAttribute("disabled");
    document
      .getElementById("productstock")
      .setAttribute("disabled", "disabled");
    restaurarCopiaSeguridadVenta(copiaSeguridadFormulario);
  });
}

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// FALTA ARREGLAR ESTA FUNCIÓN HASTA TENER LOS DATOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function abrirListadoVentas() {
  if (
    document
      .getElementById("btnSearch")
      .classList.contains("order__btn--inactive")
  ) {
    return;
  }
  guardarCopiaSeguridadVenta(copiaSeguridadFormulario);
  loadContent("views/modals/listaordenventa.php");
}

// Función para seleccionar una Orden de Venta y llenar el formulario
async function seleccionarOrdenVenta(fila) {
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
    loadContent("views/compras/ordencompra.php").then(() => {
      rellenarFormularioCompra(
        datosCompra,
        datosCompraProducto,
        datosProveedor
      );
      // console.log("Datos Compra:", datosCompra);
      // console.log("Datos Compra Producto:", datosCompraProducto);
      // console.log("Dirección del proveedor:", datosProveedor.direccion);
    });
  } catch (error) {
    console.error(error);
  }
}

// Limpiar todo el formulario Venta
function limpiarFormularioVenta() {
  // Limpiar tabla de precios
  document.getElementById("productsubtotal1").innerHTML = 0.0;
  document.getElementById("productsubtotal2").innerHTML = 0.0;
  document.getElementById("productDescuento").innerHTML = 0.0;
  document.getElementById("productigv").innerHTML = 0.0;
  document.getElementById("productTotal").innerHTML = 0.0;

  // Seleccionar todos los inputs, textareas y selects excepto los dos primeros inputs
  const formInputs = document.querySelectorAll(
    "input:not(:nth-child(-n+2)), textarea, select"
  );

  // Iterar sobre los elementos seleccionados y limpiar sus valores
  formInputs.forEach((input) => {
    input.value = "";
  });

  // Limpiar tabla de orden
  const orderTable = document.getElementById("ordertable");
  const orderTableBody = orderTable.querySelector("tbody");
  orderTableBody.innerHTML = "";
}

function modificarVenta() {
  let botonModificar = document.getElementById("btnModify");
  if (botonModificar.classList.contains("order__btn--inactive")) {
    return;
  }

  if (botonModificar.innerHTML === "Modificar") {
    guardarCopiaSeguridadVenta(copiaSeguridadFormularioInicial);
    activarInputs();
    document.getElementById("metodo").value = "modificar";

    botonModificar.innerHTML = "Cancelar";
    botonModificar.style.backgroundColor = "gray";
    botonModificar.style.borderColor = "gray";
    document.getElementById("btnDelete").classList.add("order__btn--inactive");
    document
      .getElementById("btnRegister")
      .classList.remove("order__btn--inactive");
    document.getElementById("btnSearch").classList.add("order__btn--inactive");
  } else if (botonModificar.innerHTML === "Cancelar") {
    restaurarCopiaSeguridadVenta(copiaSeguridadFormularioInicial);
    desactivarInputs();
    document.getElementById("metodo").value = "0";
    botonModificar.innerHTML = "Modificar";
    botonModificar.style.backgroundColor = "#ffc107";
    botonModificar.style.borderColor = "#ffc107";
    document
      .getElementById("btnDelete")
      .classList.remove("order__btn--inactive");
    document
      .getElementById("btnRegister")
      .classList.add("order__btn--inactive");
    document
      .getElementById("btnSearch")
      .classList.remove("order__btn--inactive");
    document.getElementById("btnSearch").removeAttribute("disabled");
  }
}

// Guardar Copia Seguridad de un Formulario si se cancela modificaciones
function guardarCopiaSeguridadVenta(formulario) {
  // Obtener filas de la tabla productos
  const tablaProductos = document.getElementById("ordertable");
  const filasProductos = tablaProductos.querySelectorAll("tbody tr");

  // Obtener tabla precios
  const preciosTabla = document.querySelector("#ordertable tfoot");
  const celdasPrecios = preciosTabla.querySelectorAll("tr  td:nth-child(2)");

  // Guardar datos de la tabla de precios en un array
  const datosPrecios = [];
  celdasPrecios.forEach((celda, index) => {
    if (index < 5) {
      datosPrecios.push(celda.innerText);
    }
  });

  // Guardar las claves y valores principales
  if (formulario === copiaSeguridadFormulario) {
    copiaSeguridadFormulario = {
      id_venta: document.getElementById("idVenta").value,
      cliente: document.getElementById("cliente").value,
      id_cliente: document.getElementById("idcliente").value,
      direccion: document.getElementById("direccion").value,
      rucdni: document.getElementById("rucDni").value,
      moneda: document.getElementById("moneda").value,
      tipoPago: document.getElementById("tipoPago").value,
      inicial: document.getElementById("inicial").value,
      cuotas: document.getElementById("cuotas").value,
      montofinanciado: document.getElementById("montofin").value,
      montocuotas: document.getElementById("montocuo").value,
      vendedor: document.getElementById("vendedor").value,
      sucursal: document.getElementById("sucursal").value,
      almacen: document.getElementById("almacen").value,
      fecha: document.getElementById("fecha").value,
      tipoDocumento: document.getElementById("tipoDocumento").value,
      notas: document.getElementById("notas").value,
      modificarActivo: document.getElementById("btnModify").innerHTML,
      precios: datosPrecios, // Guardar el array con los valores de la tabla precios
      productos: [], // Inicializar un array vacío para los productos
    };

    // Guardar los datos de las filas de productos en el array correspondiente
    filasProductos.forEach((fila) => {
      const columnas = fila.querySelectorAll("td");

      const rowData = {
        id_producto: columnas[0].innerText,
        producto: columnas[1].innerText,
        cantidad: columnas[2].innerText,
        unidad: columnas[3].innerText,
        precioCompra: columnas[4].innerText,
        descuento: columnas[5].innerText,
        total: columnas[6].innerText,
      };

      copiaSeguridadFormulario.productos.push(rowData);
    });
  } else if (formulario === copiaSeguridadFormularioInicial) {
    copiaSeguridadFormularioInicial = {
      id_venta: document.getElementById("idVenta").value,
      cliente: document.getElementById("cliente").value,
      id_cliente: document.getElementById("idcliente").value,
      direccion: document.getElementById("direccion").value,
      rucdni: document.getElementById("rucDni").value,
      moneda: document.getElementById("moneda").value,
      tipoPago: document.getElementById("tipoPago").value,
      inicial: document.getElementById("inicial").value,
      cuotas: document.getElementById("cuotas").value,
      montofinanciado: document.getElementById("montofin").value,
      montocuotas: document.getElementById("montocuo").value,
      vendedor: document.getElementById("vendedor").value,
      sucursal: document.getElementById("sucursal").value,
      almacen: document.getElementById("almacen").value,
      fecha: document.getElementById("fecha").value,
      tipoDocumento: document.getElementById("tipoDocumento").value,
      notas: document.getElementById("notas").value,
      modificarActivo: document.getElementById("btnModify").innerHTML,
      precios: datosPrecios, // Guardar el array con los valores de la tabla precios
      productos: [], // Inicializar un array vacío para los productos
    };

    // Guardar los datos de las filas de productos en el array correspondiente
    filasProductos.forEach((fila) => {
      const columnas = fila.querySelectorAll("td");

      const rowData = {
        id_producto: columnas[0].innerText,
        producto: columnas[1].innerText,
        cantidad: columnas[2].innerText,
        unidad: columnas[3].innerText,
        precioCompra: columnas[4].innerText,
        descuento: columnas[5].innerText,
        total: columnas[6].innerText,
      };

      copiaSeguridadFormularioInicial.productos.push(rowData);
    });
  }
}

//Restaurar copia de seguridad
function restaurarCopiaSeguridadVenta(formulario) {
  console.log("restaurando");
  // Restaurar los valores de la tabla de precios
  const preciosTabla = document.querySelector("#ordertable tfoot");
  const celdasPrecios = preciosTabla.querySelectorAll("tr  td:nth-child(2)");

  formulario.precios.forEach((precio, index) => {
    if (index < 5) {
      celdasPrecios[index].innerText = precio;
    }
  });

  // Restaurar los valores de la tabla de productos
  const tablaProductos = document.getElementById("ordertable");
  const cuerpoTablaProductos = tablaProductos.querySelector("tbody");

  // Limpiar la tabla de productos antes de restaurar los datos
  cuerpoTablaProductos.innerHTML = "";

  formulario.productos.forEach((producto) => {
    const nuevaFila = document.createElement("tr");
    nuevaFila.setAttribute("onclick", "seleccionarFila(this)");

    const columnasProducto = [
      producto.id_producto,
      producto.producto,
      producto.cantidad,
      producto.unidad,
      producto.precioCompra,
      producto.descuento,
      producto.total,
    ];

    columnasProducto.forEach((columna, index) => {
      const nuevaCelda = document.createElement("td");
      nuevaCelda.textContent = columna;

      // Aplicar estilos y atributos según el índice
      switch (index) {
        case 0:
          nuevaCelda.style.display = "none";
          nuevaCelda.id = "id_producto";
          nuevaCelda.textContent = columna;
          break;
        case 1:
          // Aquí puedes agregar estilos adicionales si es necesario
          nuevaCelda.colSpan = "1";
          nuevaCelda.textContent = columna;
          break;
        case 2:
          nuevaCelda.classList.add("textcenter");
          nuevaCelda.textContent = columna;
          break;
        default:
          nuevaCelda.textContent = columna;
          nuevaCelda.classList.add("textright");
          break;
      }

      nuevaFila.appendChild(nuevaCelda);
    });

    cuerpoTablaProductos.appendChild(nuevaFila);
  });

  // Restaurar los valores principales del formulario
  let copy = formulario;
  document.getElementById("idVenta").value = copy.id_venta;
  document.getElementById("cliente").value = copy.cliente;
  document.getElementById("idcliente").value = copy.id_cliente;
  document.getElementById("direccion").value = copy.direccion;
  document.getElementById("rucDni").value = copy.rucdni;
  document.getElementById("moneda").value = copy.moneda;
  document.getElementById("tipoPago").value = copy.tipoPago;
  document.getElementById("inicial").value = copy.inicial;
  document.getElementById("cuotas").value = copy.cuotas;
  document.getElementById("montofin").value = copy.montofinanciado;
  document.getElementById("montocuo").value = copy.montocuotas;
  document.getElementById("vendedor").value = copy.vendedor;
  document.getElementById("sucursal").value = copy.sucursal;
  document.getElementById("almacen").value = copy.almacen;
  document.getElementById("fecha").value = copy.fecha;
  document.getElementById("tipoDocumento").value = copy.tipoDocumento;
  document.getElementById("notas").value = copy.notas;

  console.log(copy);

  if (copy.modificarActivo === "Cancelar") {
    let botonModificar = document.getElementById("btnModify");
    botonModificar.classList.remove("order__btn--inactive");
    botonModificar.innerHTML = "Cancelar";
    botonModificar.style.backgroundColor = "gray";
    botonModificar.style.borderColor = "gray";
    document.getElementById("btnDelete").classList.add("order__btn--inactive");
    document
      .getElementById("btnRegister")
      .classList.remove("order__btn--inactive");
  }
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// FALTA ARREGLAR ESTA FUNCIÓN HASTA TENER LOS DATOS
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

// Función para pasar los datos obtenidos de la lista de compras al formulario de compras
function rellenarFormularioVenta(datosCompra, datosProductos, datosProveedor) {
  const proveedorInput = document.getElementById("proveedor");
  const direccionInput = document.getElementById("direccion");
  const sucursalSelect = document.getElementById("sucursal");
  const monedaSelect = document.getElementById("moneda");
  const almacenSelect = document.getElementById("almacen");
  const tipoPagoSelect = document.getElementById("tipoPago");
  const fechaInput = document.getElementById("fecha");
  const igvCheckbox = document.getElementById("igv");
  const descripcionTextarea = document.getElementById("descripcion");
  const idCompraInput = document.getElementById("idCompra");

  //Rellenar Formulario
  proveedorInput.value = datosProveedor.razon_social;
  direccionInput.value = datosProveedor.direccion;
  sucursalSelect.value = "1";
  monedaSelect.value = datosCompra.id_moneda;
  almacenSelect.value = datosCompra.id_almacen;
  tipoPagoSelect.value = datosCompra.tipo_pago;
  fechaInput.value = datosCompra.fecha_compra;
  igvCheckbox.checked = true;
  descripcionTextarea.value =
    datosCompra.descripcion !== undefined ? datosCompra.descripcion : "";
  idCompraInput.value = "00" + datosCompra.id_compra;

  // Rellenar Productos
  const tablaProductos = document.getElementById("ordertable");
  tablaProductos.querySelector("tbody").innerHTML = "";

  // Iterar sobre los datos de productos y añadir filas a la tabla
  datosProductos.forEach((producto) => {
    const row = document.createElement("tr");
    row.setAttribute("onclick", "seleccionarFila(this)");
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
  productSubtotal1.textContent = datosCompra.subtotal;
  productSubtotal2.textContent = datosCompra.subtotal;
  productIgvCell.textContent = datosCompra.igv;
  productTotalCell.textContent = datosCompra.total;
  productDescuento.textContent = 0;
}

// Añadir nueva fila en la tabla de órdenes de venta/compra

function mostrarFacturacion(tbodyId) {
  console.log(tbodyId.value);
  document.getElementById("facturable").style.display = "none";
  document.getElementById("noFacturable").style.display = "none";

  document.getElementById(tbodyId.value).style.display = "table-row-group";
}

/*     Falta Aqui   */
document
  .querySelector(".main__content")
  .addEventListener("click", function (event) {
    if (event.target.classList.contains("sell_submit")) {
      event.preventDefault();
      // Obtener los datos del formulario
      const idVenta = document.getElementById("idVenta").value;
      const idAlmacen = document.getElementById("almacen").value;
      const idPersonal = 2;
      const idDocumento = document.getElementById("tipoDocumento").value;
      const idCliente = document.getElementById("idcliente").value;
      const fecha = document.getElementById("fecha").value; // Obtener la descripción del formulario
      const total = document.getElementById("productTotal").innerHTML; // Obtener la abreviatura del formulario
      const subtotal = document.getElementById("productsubtotal2").innerHTML;
      const igv = document.getElementById("productigv").innerHTML;
      const idMoneda = document.getElementById("moneda").value;
      const numeroDocumento = document.getElementById("numeroDocumento").value;
      const serieDocumento = document.getElementById("serieDocumento").value;
      const tipoPago = document.getElementById("tipoPago").value;
      const pagoInicial = document.getElementById("inicial").value;
      const mod = document.getElementById("metodo").value;
      if (mod == "modificar") {
        var metodo = mod;
      } else {
        var metodo = event.target.innerHTML;
      }
      if (
        metodo === "Grabar" &&
        document
          .getElementById("btnRegister")
          .classList.contains("order__btn--inactive")
      ) {
        return;
      }

      if (
        metodo === "Eliminar" &&
        document
          .getElementById("btnDelete")
          .classList.contains("order__btn--inactive")
      ) {
        return;
      }

      // Crear una solicitud XMLHttpRequest
      const xhr = new XMLHttpRequest();
      const url = "/Alvaplast-project/Controller/ventas/VentaController.php"; // Ruta del controlador PHP

      // Configurar la solicitud
      xhr.open("POST", url, true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      console.log(metodo, fecha, tipoPago);
      if (idAlmacen) {
        // Enviar los datos del formulario incluyendo descripcion y abreviatura
        xhr.send(
          "idVenta=" +
            idVenta +
            "&fecha=" +
            fecha +
            "&total=" +
            total +
            "&subtotal=" +
            subtotal +
            "&igv=" +
            igv +
            "&idMoneda=" +
            idMoneda +
            "&numeroDocumento=" +
            numeroDocumento +
            "&serieDocumento=" +
            serieDocumento +
            "&idCliente=" +
            idCliente +
            "&idAlmacen=" +
            idAlmacen +
            "&tipoPago=" +
            tipoPago +
            "&idPersonal=" +
            idPersonal +
            "&metodo=" +
            metodo +
            "&idDocumento=" +
            idDocumento +
            "&pagoInicial=" +
            pagoInicial
        );
      } else {
        alert("faltan datos");
      }
      // Manejar la respuesta del servidor
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // La solicitud se completó correctamente
            // Puedes manejar la respuesta del servidor aquí
            alert(xhr.responseText);
            //Envio de los datos de CompraProducto
            if (metodo == "Eliminar") {
              loadContent("views/ventas/ordenVenta.php");
            }
            RegistrarDatosTabla(idCompra, metodo);
            //RegistrarDatosTabla(idCompra, metodo);
          } else {
            // Hubo un error en la solicitud
            console.error("Error en la solicitud.");
          }
        }
      };
    }
  });

function RegistrarDatosTabla(idCompra, metodo) {
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
    const subTotal = columnas[6].textContent.trim();
    // comenzamos con el protocolo http
    const http = new XMLHttpRequest();
    const url =
      "/Alvaplast-project/Controller/ventas/VentaProductoController.php";
    //configuración de la solicitud
    http.open("POST", url, true);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    if (precioCompra && subTotal) {
      //Enviamos los datos al controlador
      http.send(
        "idCompra=" +
          idCompra +
          "&idProducto=" +
          idProducto +
          "&cantidad=" +
          cantidad +
          "&precioCompra=" +
          precioCompra +
          "&descuento=" +
          descuento +
          "&subtotal=" +
          subTotal +
          "&metodo=" +
          metodo
      );
    } else {
      alert("faltan datos");
    }

    http.onreadystatechange = function () {
      if (http.readyState === XMLHttpRequest.DONE) {
        if (http.status === 200) {
          // La solicitud se completó correctamente
          // Puedes manejar la respuesta del servidor aquí
          console.log(http.responseText);

          // Envío a Kardex
          if (metodo === "Grabar") {
            openAlertModal();
          }
        } else {
          // Hubo un error en la solicitud
          console.error("Error en la insercion de los datos");
        }
      }
    };
  });
}

function CancelarYRestaurarVenta() {
  loadContent("views/ventas/ordenventa.php").then(() => {
    restaurarCopiaSeguridadVenta();
    activarInputs();
  });
}

function añadirProductoOrdenVenta() {
  const cantidad = parseFloat(document.getElementById("productquantity").value);
  const precioUnitario = parseFloat(
    document.getElementById("productprice").value
  );
  let descuento = parseFloat(document.getElementById("productdiscount").value);
  const unidad = document.getElementById("productunit").selectedOptions[0].text;
  descuento = isNaN(descuento) ? 0 : descuento;
  const descuentoAplicado =
    isNaN(descuento) || descuento < 0 || descuento > 100 ? 0 : descuento;

  const rowData = window.clickedRowData;

  if (cantidad && unidad) {
    if (rowData) {
      const idPro = rowData[0];
      const nombreProducto = rowData[1];
      const precioReal = parseFloat(rowData[3]);

      // Verificar que el producto a agregar no esté actualmente agregado
      let productosAgregadosEl = document.querySelectorAll(
        "#ordertable tbody tr td:nth-child(2)"
      );
      let productosAgregados = [];

      productosAgregadosEl.forEach((td) => {
        productosAgregados.push(td.innerText);
      });

      if (productosAgregados.includes(nombreProducto)) {
        alert("El producto ya ha sido agregado.");
        return; // Sale de la función si el producto ya existe
      }

      let datosProducto = [];
      let addToProducts = true; // Variable para controlar la adición a productosAgregados

      if (document.getElementById("productstock")) {
        const stock = parseFloat(document.getElementById("productstock").value);
        if (cantidad > stock) {
          alert("No hay stock suficiente");
          addToProducts = false; // No agrega el producto si no hay suficiente stock
        }
      }

      if (addToProducts) {
        productosAgregados.push(nombreProducto);
        datosProducto = [
          idPro,
          nombreProducto,
          cantidad,
          unidad,
          precioUnitario,
          precioReal,
          (cantidad * precioUnitario * (1 - descuentoAplicado / 100)).toFixed(
            2
          ),
        ];

        const tablaExterna = document
          .getElementById("ordertable")
          .getElementsByTagName("tbody")[0];
        const nuevaFila = tablaExterna.insertRow();
        nuevaFila.setAttribute("onclick", "seleccionarFila(this)");
        datosProducto.forEach((contenido, index) => {
          const celda = nuevaFila.insertCell();

          // Aplicar estilos y atributos según el índice
          switch (index) {
            case 0:
              celda.style.display = "none";
              celda.textContent = contenido;
              break;
            case 1:
              // Aquí puedes agregar estilos adicionales si es necesario
              celda.colSpan = "1";
              celda.textContent = contenido;
              break;
            case 2:
              celda.classList.add("textcenter");
              celda.textContent = contenido;
              break;
            case 3:
              celda.classList.add("textcenter");
              celda.textContent = contenido;
              break;
            default:
              celda.textContent = contenido;
              celda.classList.add("textright");
              break;
          }
        });

        // Limpiar datos del formulario
        window.clickedRowData = null;
        document.getElementById("productname").value = "Seleccione Producto";
        document.getElementById("productprice").value = null;
        document.getElementById("productdiscount").value = null;
        document.getElementById("productquantity").value = null;
        document.getElementById("productunit").value = null;

        if (document.getElementById("productstock")) {
          document.getElementById("productstock").value = null;
        }

        // Actualiza tabla de precios
        actualizarTablaPrecios();
      }
    }
  } else {
    const añadirProductoBoton = document.getElementById("addproduct");
    if (!añadirProductoBoton.classList.contains("order__btn--inactive")) {
      alert("La cantidad y la unidad no deben estar vacías.");
    }
  }
}

// Función Cancelar en el listado/productos/proveedores
function CancelarYRestaurarVenta() {
  loadContent("views/ventas/OrdenVenta.php").then(() => {
    restaurarCopiaSeguridadVenta(copiaSeguridadFormulario);
    activarInputs();
  });
}
