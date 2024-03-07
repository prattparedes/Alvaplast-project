// Nueva Orden de Compra
function nuevaOrdenCompra() {
  limpiarFormularioCompra();
  document.getElementById("fecha").value = establecerFechaHora();
  document.getElementById("moneda").value = "1";
  document.getElementById("sucursal").value = "1";
  document.getElementById("almacen").value = "1";
  document.getElementById("tipoPago").value = "E";

  activarInputs();
  document
    .getElementById("btnRegister")
    .classList.remove("order__btn--inactive");
  document.getElementById("btnModify").classList.add("order__btn--inactive");
  document.getElementById("btnDelete").classList.add("order__btn--inactive");

  // Conseguir id de compra nuevo
  const xhr = new XMLHttpRequest();
  const url = "/Alvaplast-project/Controller/compras/CompraController.php"; // Ruta del controlador PHP
  xhr.open("GET", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("idCompra=" + 999999999);

  // Manejar la respuesta del servidor
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Puedes manejar la respuesta del servidor aquí
        console.log(xhr.responseText);
        document.getElementById("idCompra").value = xhr.responseText.replace(
          /^"|"$/g,
          ""
        );
      } else {
        console.error("Error en la solicitud.");
      }
    }
  };

  document.getElementById("overlay").style.display = "none";
  document.getElementById("alertModal").style.display = "none";
}

// Función para ir al listado de proveedores
function abrirListadoProveedor() {
  if (!document.getElementById("proveedor").disabled) {
    guardarCopiaSeguridadCompra(copiaSeguridadFormulario);
    loadContent("views/modals/listadoproveedores.php");
  }
}

// Función para seleccionar Proveedor y Pasarlo al Formulario
function seleccionarProveedor(fila) {
  const columnas = fila.querySelectorAll("td");

  // Crear un array con el contenido de las celdas de la fila clickeada
  const contenidoFila = Array.from(columnas).map(
    (columna) => columna.innerText
  );

  // Obtener elementos del array
  const providerID = contenidoFila[0];
  const providerName = contenidoFila[1];
  const providerDirection = contenidoFila[3];

  // Cambiar al formulario y luego cambiar el html
  loadContent("views/compras/ordencompra.php").then(() => {
    //----------------------------
    document
      .getElementById("btnRegister")
      .classList.remove("order__btn--inactive");
    // Cambiar el HTML de los spans por los datos
    restaurarCopiaSeguridadCompra(copiaSeguridadFormulario);
    document.getElementById("idproveedor").value = providerID;
    document.getElementById("proveedor").value = providerName;
    document.getElementById("direccion").value = providerDirection;
    activarInputs();
    cambiarMoneda(copiaSeguridadFormulario.moneda);
    // Ver si había productos en la tabla para activar moneda
    if (copiaSeguridadFormulario.productos.length > 0) {
      document.getElementById("moneda").setAttribute("disabled", "disabled");
    }
  });
}

// Función para ir al listado de productos
function abrirListadoProductosCompra() {
  if (!document.getElementById("productname").disabled) {
    guardarCopiaSeguridadCompra(copiaSeguridadFormulario);
    loadContent("views/modals/listadoproductoscompras.php");
  }
}

// Función para seleccionar Producto y pasarlo al formulario
function seleccionarProductoCompra(fila) {
  const columnas = fila.querySelectorAll("td");

  // Crear un array con el contenido de las celdas de la fila clickeada
  const contenidoFila = Array.from(columnas).map(
    (columna) => columna.innerText
  );

  // Guardar los datos de la fila en una variable global para ser usada más tarde
  window.clickedRowData = contenidoFila;

  // Obtener elementos del array
  const productUnit = contenidoFila[7];
  const productName = contenidoFila[1];
  const productPrice = contenidoFila[6];

  // Cambiar al formulario y luego cambiar el html
  loadContent("views/compras/ordencompra.php").then(() => {
    document
      .getElementById("btnRegister")
      .classList.remove("order__btn--inactive");
    document.getElementById("productunit").value = productUnit;
    document.getElementById("productname").value = productName;
    document.getElementById("productprice").value = productPrice;
    activarInputs();
    document.getElementById("productunit").setAttribute("disabled", "disabled");
    document.getElementById("productquantity").removeAttribute("disabled");
    document.getElementById("productprice").removeAttribute("disabled");
    document.getElementById("productdiscount").removeAttribute("disabled");
    restaurarCopiaSeguridadCompra(copiaSeguridadFormulario);
    cambiarMoneda(copiaSeguridadFormulario.moneda);
    // Ver si había productos en la tabla para activar moneda
    if (copiaSeguridadFormulario.productos.length > 0) {
      document.getElementById("moneda").setAttribute("disabled", "disabled");
    }
  });

  // Verificar si existe el elemento productstock
  const productStockElement = document.getElementById("productstock");
  if (productStockElement) {
    const productStock = contenidoFila[7];
    productStockElement.innerText = productStock;
    document
      .getElementById("productstock")
      .setAttribute("disabled", "disabled");
  }
}

function abrirListadoCompras() {
  if (
    document
      .getElementById("btnSearch")
      .classList.contains("order__btn--inactive")
  ) {
    return;
  }
  guardarCopiaSeguridadCompra(copiaSeguridadFormulario);
  loadContent("views/modals/listaordencompra.php");
}

// Función para seleccionar una Orden de Compra y llenar el formulario
async function seleccionarOrdenCompra(fila) {
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
      document
        .getElementById("btnModify")
        .classList.remove("order__btn--inactive");
      document
        .getElementById("btnDelete")
        .classList.remove("order__btn--inactive");
      if (datosCompra.id_moneda === "2") {
        document.getElementById("descuento--div").style.opacity = "1";
        document.getElementById("productdiscount").style.display = "block";
      }
    });
  } catch (error) {
    console.error(error);
  }
}

// Limpiar todo el formulario compra
function limpiarFormularioCompra() {
  // Limpiar tabla de precios
  const productSubtotal1 = document.getElementById("productsubtotal1");
  const productSubtotal2 = document.getElementById("productsubtotal2");
  const productDescuento = document.getElementById("productDescuento");
  const productIgv = document.getElementById("productigv");
  const productTotal = document.getElementById("productTotal");

  productSubtotal1.innerHTML = 0.0;
  productSubtotal2.innerHTML = 0.0;
  productDescuento.innerHTML = 0.0;
  productIgv.innerHTML = 0.0;
  productTotal.innerHTML = 0.0;

  // Limpiar formulario de compra
  const formInputs = document.querySelectorAll(
    "#almacen, #descripcion, #direccion, #fecha, #moneda, #proveedor, #sucursal, #tipoPago"
  );
  formInputs.forEach((input) => {
    if (input.tagName === "SELECT") {
      input.value = "";
    } else {
      input.value = "";
    }
  });

  // Limpiar tabla de orden
  const orderTable = document.getElementById("ordertable");
  const orderTableBody = orderTable.querySelector("tbody");
  orderTableBody.innerHTML = "";
}

// Función para Modificar la Compra
function modificarCompra() {
  let botonModificar = document.getElementById("btnModify");
  if (botonModificar.classList.contains("order__btn--inactive")) {
    return;
  }

  if (botonModificar.innerHTML === "Editar") {
    guardarCopiaSeguridadCompra(copiaSeguridadFormularioInicial);
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
    restaurarCopiaSeguridadCompra(copiaSeguridadFormularioInicial);
    desactivarInputs();
    cambiarMoneda(copiaSeguridadFormularioInicial.moneda);
    document.getElementById("metodo").value = "0";
    botonModificar.innerHTML = "Editar";
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
function guardarCopiaSeguridadCompra(formulario) {
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
      id_compra: document.getElementById("idCompra").value,
      proveedor: document.getElementById("proveedor").value,
      id_proveedor: document.getElementById("idproveedor").value,
      direccion: document.getElementById("direccion").value,
      sucursal: document.getElementById("sucursal").value,
      moneda: document.getElementById("moneda").value,
      almacen: document.getElementById("almacen").value,
      tipoPago: document.getElementById("tipoPago").value,
      fecha: document.getElementById("fecha").value,
      descripcion: document.getElementById("descripcion").value,
      modificarActivo: document.getElementById("btnModify").innerHTML,
      metodo: document.getElementById("metodo").value,
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
      id_compra: document.getElementById("idCompra").value,
      proveedor: document.getElementById("proveedor").value,
      id_proveedor: document.getElementById("idproveedor").value,
      direccion: document.getElementById("direccion").value,
      sucursal: document.getElementById("sucursal").value,
      moneda: document.getElementById("moneda").value,
      almacen: document.getElementById("almacen").value,
      tipoPago: document.getElementById("tipoPago").value,
      fecha: document.getElementById("fecha").value,
      descripcion: document.getElementById("descripcion").value,
      modificarActivo: document.getElementById("btnModify").innerHTML,
      metodo: document.getElementById("metodo").value,
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
function restaurarCopiaSeguridadCompra(formulario) {
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
          nuevaCelda.setAttribute("ondblclick", "seleccionarCelda(this)");
          nuevaCelda.classList.add("textcenter");
          nuevaCelda.textContent = columna;
          break;
        case 4:
          nuevaCelda.setAttribute("ondblclick", "seleccionarCelda(this)");
          nuevaCelda.textContent = columna;
          nuevaCelda.classList.add("textright");
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
  document.getElementById("proveedor").value = copy.proveedor;
  document.getElementById("idproveedor").value = copy.id_proveedor;
  document.getElementById("direccion").value = copy.direccion;
  document.getElementById("sucursal").value = copy.sucursal;
  document.getElementById("moneda").value = copy.moneda;
  document.getElementById("almacen").value = copy.almacen;
  document.getElementById("tipoPago").value = copy.tipoPago;
  document.getElementById("fecha").value = copy.fecha;
  document.getElementById("descripcion").value = copy.descripcion;
  document.getElementById("metodo").value = copy.metodo;
  document.getElementById("idCompra").value = copy.id_compra;

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

// Función para pasar los datos obtenidos de la lista de compras al formulario de compras
function rellenarFormularioCompra(datosCompra, datosProductos, datosProveedor) {
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
  const idProveedor = document.getElementById("idproveedor");

  //Rellenar Formulario
  proveedorInput.value = datosProveedor.razon_social;
  direccionInput.value = datosProveedor.direccion;
  sucursalSelect.value = 1;
  monedaSelect.value = datosCompra.id_moneda;
  almacenSelect.value = datosCompra.id_almacen;
  tipoPagoSelect.value = datosCompra.tipo_pago;
  fechaInput.value = datosCompra.fecha_compra;
  igvCheckbox.checked = true;
  descripcionTextarea.value =
    datosCompra.descripcion !== undefined ? datosCompra.descripcion : "";
  idCompraInput.value = "00" + datosCompra.id_compra;
  idProveedor.value = datosCompra.id_proveedor;

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
        <td class="textright" ondblclick="seleccionarCelda(this)">${producto.cantidad}</td>
        <td class="textright">${producto.abreviatura}</td>
        <td class="textright" ondblclick="seleccionarCelda(this)">${producto.precio_compra}</td>
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

function filtrarOrdenCompra(filtro) {
  const filasOrdenes = document.querySelectorAll("#buyorderlist tbody tr");
  filasOrdenes.forEach((fila) => {
    const nombreProducto = fila
      .querySelector("td:nth-child(1)")
      .textContent.toLowerCase()
      .trim();

    if (nombreProducto.includes(filtro)) {
      fila.style.display = "table-row";
    } else {
      fila.style.display = "none";
    }
  });
}

function filtrarProveedorCompra(filtro) {
  const filasproveedores = document.querySelectorAll("#providertable tbody tr");
  filasproveedores.forEach((fila) => {
    const nombreProducto = fila
      .querySelector("td:nth-child(2)")
      .textContent.toLowerCase()
      .trim();

    if (nombreProducto.includes(filtro)) {
      fila.style.display = "table-row";
    } else {
      fila.style.display = "none";
    }
  });
}

function filtrarProductosCompra(filtro) {
  const filasProductos = document.querySelectorAll(
    "#listaProductosCompra tbody tr"
  );
  filasProductos.forEach((fila) => {
    const nombreProducto = fila
      .querySelector("td:nth-child(2)")
      .textContent.toLowerCase()
      .trim();

    if (nombreProducto.includes(filtro)) {
      fila.style.display = "table-row";
    } else {
      fila.style.display = "none";
    }
  });
}

// Añadir nueva fila en la tabla de órdenes de venta/compra
function añadirProductoOrdenCompra() {
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
          descuento,
          (cantidad * precioUnitario * (1 - descuentoAplicado / 100)).toFixed(
            2
          ),
        ];

        const tablaExterna = document
          .getElementById("ordertable")
          .getElementsByTagName("tbody")[0];
        function seleccionarFila(fila) {
          // Convertir la lista estática en un array
          const columnas = Array.from(fila.querySelectorAll("td"));

          // Verificar si alguna columna está seleccionada
          const estaSeleccionada = columnas.some((columna) => {
            return columna.classList.contains("columna__seleccionada");
          });

          // Si la fila está seleccionada, deseleccionarla
          if (estaSeleccionada) {
            columnas.forEach((columna) => {
              columna.classList.remove("columna__seleccionada");
            });
          } else {
            // Si la fila no está seleccionada, seleccionarla
            // Obtener todas las filas de la tabla
            const filas = fila.parentElement.querySelectorAll("tr");

            // Deseleccionar todas las filas
            filas.forEach((fila) => {
              fila.querySelectorAll("td").forEach((columna) => {
                columna.classList.remove("columna__seleccionada");
              });
            });

            // Seleccionar la fila deseada
            columnas.forEach((columna) => {
              columna.classList.add("columna__seleccionada");
            });
          }
        }

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
              celda.setAttribute("ondblclick", "seleccionarCelda(this)");
              celda.textContent = contenido;
              break;
            case 4:
              celda.setAttribute("ondblclick", "seleccionarCelda(this)");
              celda.textContent = contenido;
              celda.classList.add("textright");
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

        document.getElementById("moneda").setAttribute("disabled", "disabled");

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

function listarAlmacenes(data) {
  if (!data || data == "0") {
    const selectAlmacen = document.getElementById("almacen");
    Array.from(selectAlmacen.options).forEach(function (option) {
      option.style.display = "none";
    });
    return;
  }

  const url = `/Alvaplast-project/Controller/maintenance_models/AlmacenController.php?idSucursal=${data}`;

  fetch(url)
    .then((response) => {
      if (!response.ok) {
        throw new Error(
          `La solicitud falló con el código de estado ${response.status}`
        );
      }
      return response.json(); // o response.json() si esperas un JSON
    })
    .then((data) => {
      // Manejar la respuesta aquí
      console.log(data);

      const selectAlmacen = document.getElementById("almacen");

      if (selectAlmacen.selectedIndex !== -1) {
        // Encuentra la opción seleccionada actualmente
        var opcionSeleccionada =
          selectAlmacen.options[selectAlmacen.selectedIndex];

        // Deselecciona la opción
        opcionSeleccionada.selected = false;
      }

      Array.from(selectAlmacen.options).forEach(function (option) {
        option.style.display = "none";
      });
      // Habilitar todas las opciones existentes
      data.forEach((almacen) => {
        for (let i = 0; i < selectAlmacen.options.length; i++) {
          let found = false; // Indica si se encontró una coincidencia
          if (almacen.id_almacen == selectAlmacen.options[i].value) {
            found = true; // No necesitas seguir buscando si ya encontraste una coincidencia
            selectAlmacen.options[i].style.display = "block";
            break;
          }
        }
      });
    })
    .catch((error) => {
      // Manejar errores aquí
      console.error("Error en la solicitud:", error);
    });
}

document
  .querySelector(".main__content")
  .addEventListener("click", function (event) {
    if (event.target.classList.contains("buy_submit")) {
      event.preventDefault();
      // Obtener los datos del formulario
      const idCompra = document.getElementById("idCompra").value;
      const fecha = document.getElementById("fecha").value; // Obtener la descripción del formulario
      const total = document.getElementById("productTotal").innerHTML; // Obtener la abreviatura del formulario
      const subtotal = document.getElementById("productsubtotal2").innerHTML;
      const igv = document.getElementById("productigv").innerHTML;
      const idMoneda = document.getElementById("moneda").value;
      const numeroDocumento = document.getElementById("numeroDocumento").value;
      const serieDocumento = idCompra;
      const idProveedor = document.getElementById("idproveedor").value;
      const idAlmacen = document.getElementById("almacen").value;
      const Almacen = document.getElementById("almacen").selectedIndex;
      const nombreAlmacen =
        document.getElementById("almacen").options[Almacen].text;
      const tipoPago = document.getElementById("tipoPago").value;
      const idPersonal = 2;
      const mod = document.getElementById("metodo").value;
      if (mod == "0") {
        var metodo = event.target.innerHTML;
      } else {
        var metodo = mod;
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
      const url = "/Alvaplast-project/Controller/compras/CompraController.php"; // Ruta del controlador PHP

      // Configurar la solicitud
      xhr.open("POST", url, true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      console.log(metodo, fecha, tipoPago);
      if (idCompra && idAlmacen) {
        // Enviar los datos del formulario incluyendo descripcion y abreviatura
        xhr.send(
          "idCompra=" +
            idCompra +
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
            "&idProveedor=" +
            idProveedor +
            "&idAlmacen=" +
            idAlmacen +
            "&tipoPago=" +
            tipoPago +
            "&idPersonal=" +
            idPersonal +
            "&metodo=" +
            metodo
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
              loadContent("views/compras/ordenCompra.php");
            }
            RegistrarDatosTablaCompra(
              idCompra,
              metodo,
              idAlmacen,
              nombreAlmacen
            );
          } else {
            // Hubo un error en la solicitud
            console.error("Error en la solicitud.");
          }
        }
      };
    }
  });

async function registrarCompraKardex() {
  // Cerramos el alert
  document.getElementById("overlay").style.display = "none";
  document.getElementById("alertModal").style.display = "none";

  let idCompra = document.getElementById("idCompra").value;
  // Esperar a que se complete obtenerDatosOCKardex
  await obtenerDatosOCKardex(idCompra);
}

function RegistrarDatosTablaCompra(idCompra, metodo, idalmacen, almacen) {
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
      "/Alvaplast-project/Controller/compras/CompraProductoController.php";
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
          " &metodo=" +
          metodo +
          "&idAlmacen=" +
          idalmacen +
          "&nombreProducto=" +
          nombreProducto +
          "&nombreAlmacen=" +
          almacen
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
            abrirAlertaConfirmación("Deseas registrar la compra en Kardex?", registrarCompraKardex, nuevaOrdenCompra);
          }
        } else {
          // Hubo un error en la solicitud
          console.error("Error en la insercion de los datos");
        }
      }
    };
  });
}

// Función Cancelar en el listado/productos/proveedores
function CancelarYRestaurarCompra() {
  loadContent("views/compras/ordencompra.php").then(() => {
    restaurarCopiaSeguridadCompra(copiaSeguridadFormulario);
    activarInputs();
    // Ver si había productos en la tabla para activar moneda
    if (copiaSeguridadFormulario.productos.length > 0) {
      document.getElementById("moneda").setAttribute("disabled", "disabled");
    }
    cambiarMoneda(copiaSeguridadFormulario.moneda);
  });
}

// Función Cambio de Moneda
function cambiarMoneda(moneda) {
  let tabla = document.getElementById("ordertable");
  const tfoot = tabla.querySelector("tfoot");

  const descuentoTd = Array.from(tfoot.querySelectorAll("td")).find((td) =>
    td.textContent.includes("Descuento")
  );
  const igvTd = Array.from(tfoot.querySelectorAll("td")).find((td) =>
    td.textContent.includes("IGV")
  );
  const totalTd = Array.from(tfoot.querySelectorAll("td")).find((td) =>
    td.textContent.includes("Total")
  );

  if (moneda === "1") {
    document.getElementById("descuento--div").style.opacity = "0";
    document
      .getElementById("productdiscount")
      .setAttribute("disabled", "disabled");

    descuentoTd.textContent = "Descuento S/.";
    igvTd.textContent = "IGV S/.";
    totalTd.textContent = "Total S/.";
  } else if (moneda === "2") {
    document.getElementById("descuento--div").style.opacity = "1";
    document.getElementById("productdiscount").style.display = "block";

    descuentoTd.textContent = "Descuento $";
    igvTd.textContent = "IGV $";
    totalTd.textContent = "Total $";
  }
}

//Repote compras---------------------------
function exportarTablaExcelorden() {
  // Obtener la fecha y hora del sistema
  var fechaHora = new Date().toLocaleString();

  // Crear una hoja de cálculo nueva
  var workbook = XLSX.utils.book_new();

  // Obtener los datos de la tabla
  var tbody = document.getElementById("ordertable").getElementsByTagName("tbody")[0];
  var tfoot = document.getElementById("ordertable").getElementsByTagName("tfoot")[0];
  var data = [];

  // Agregar título y dirección
  var titleRow = ["AlvaPlastic"];
  data.push(titleRow);
  var contenido = "AV. CANTO GRANDE Nº 3546-3548 S.J.L - Telf. 2787802 / 947316259";
  var direccion = [contenido];
  data.push(direccion);

  // Agregar proveedor y autorizado
  var proveedor = ["PROVEEDOR:"];
  data.push(proveedor);
  var autorizado = ["AUTORIZADO: SUSAN PAREDES VILLANUEVA"];
  data.push(autorizado);

  // Agregar espacio vacío
  var vac = [""];
  data.push(vac);

  // Agregar fecha y hora del sistema
  var fechaHoraRow = ["Fecha/Hora:", fechaHora];
  data.push(fechaHoraRow);

  // Agregar fila de encabezados
  var encabezados = ["Producto", "Cantidad", "Unidad", "PreCompra", "Descuento", "Total"];
  data.push(encabezados);

  // Iterar sobre las filas de la tabla (tbody)
  for (var i = 0; i < tbody.rows.length; i++) {
      var rowData = [];
      var cells = tbody.rows[i].cells;

      // Iterar sobre las celdas de cada fila, comenzando desde la segunda celda
      for (var j = 1; j < cells.length; j++) {
          rowData.push(cells[j].textContent);
      }

      // Agregar los datos de la fila al conjunto de datos
      data.push(rowData);
  }

  // Iterar sobre las filas del tfoot
  for (var i = 0; i < tfoot.rows.length; i++) {
      var rowData = [];
      var cells = tfoot.rows[i].cells;

      // Agregar celdas en blanco antes de las celdas con contenido
      for (var k = 0; k < 4; k++) {
          rowData.push("");
      }

      // Iterar sobre las celdas de cada fila
      for (var j = 0; j < cells.length; j++) {
          rowData.push(cells[j].textContent);
      }

      // Agregar los datos de la fila al conjunto de datos
      data.push(rowData);
  }

  // Convertir los datos a un formato de hoja de cálculo
  var worksheet = XLSX.utils.aoa_to_sheet(data);

  // Ajustar automáticamente el ancho de las columnas
  var columnWidths = getColumnWidths(data);
  worksheet['!cols'] = columnWidths;

  // Agregar la hoja al libro de trabajo
  XLSX.utils.book_append_sheet(workbook, worksheet, "Datos");

  // Generar el archivo Excel y guardarlo en el cliente
  XLSX.writeFile(workbook, "OrdenCompra" + ".xlsx");
}


//-------------------------------------------------------------------

// Función para calcular el ancho de las columnas basado en el contenido
function getColumnWidths(data) {
  var widths = [];
  for (var i = 0; i < data[0].length; i++) {
      var maxLength = 0;
      for (var j = 0; j < data.length; j++) {
          var length = data[j][i] ? data[j][i].toString().length : 0;
          if (length > maxLength) {
              maxLength = length;
          }
      }
      var width = { wch: maxLength + 2 }; // Add extra padding
      widths.push(width);
  }
  return widths;
}