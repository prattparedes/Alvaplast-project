// Abrir modal desde los botones, seleccionar producto, icono de los tres puntos.
document
  .querySelector(".main__content")
  .addEventListener("click", function (event) {
    const modalBackground = document.querySelector(".modal__background");

    if (
      event.target.id === "openModalButton" ||
      event.target.id === "threeDotsButton" ||
      event.target.id === "threeDotsIco" ||
      event.target.id === "selectproduct"
    ) {
      const btn = document.getElementById(event.target.id);

      if (!btn.classList.contains("order__btn--inactive")) {
        modalBackground.classList.remove("modal__inactive");
      }
    }

    if (
      event.target.id === "closeModalButton" ||
      event.target.classList.contains("closeModalButton")
    ) {
      modalBackground.classList.add("modal__inactive");
    }
  });

// Carga Dinámica de los modals
function loadModalContent(modalName) {
  document.querySelector(
    ".modal__content--dynamic"
  ).innerHTML = `<img src="assets/img/tube-spinner.svg" alt="Cargando..." class="modal__loading" style="width: 30%;">`;

  fetch(`views/modals/${modalName}.php`)
    .then((response) => response.text())
    .then((data) => {
      document.querySelector(".modal__content--dynamic").innerHTML = data;
    })
    .catch((error) => console.error("Error:", error));
}

// Foto subida al modal de productos
document
  .querySelector(".main__content")
  .addEventListener("click", function (event) {
    if (event.target.id === "selectImageButton" || event.target.id === "foto") {
      if (event.target.id === "selectImageButton") {
        document.getElementById("foto").click(); // Simula el clic en el input file al hacer clic en el botón
      }

      document
        .getElementById("foto")
        .addEventListener("change", function (event) {
          const inputFoto = event.target;
          const imagenMostrada = document.getElementById("imagenMostrada");

          const file = inputFoto.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
              if (imagenMostrada) {
                imagenMostrada.src = e.target.result;
              }
            };
            reader.readAsDataURL(file);
          }
        });
    }
  });

// Añadir producto de la tabla de modal a producto seleccionado
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#modaltable");

    if (isModalTable) {
      const fila = event.target.closest("tr");
      const columnas = fila.querySelectorAll("td");

      // Crear un array con el contenido de las celdas de la fila clickeada
      const contenidoFila = Array.from(columnas).map(
        (columna) => columna.innerText
      );

      // Guardar los datos de la fila en una variable global para ser usada más tarde
      window.clickedRowData = contenidoFila;

      // Obtener elementos del array
      const productUnit = contenidoFila[3];
      const productName = contenidoFila[1];
      const productPrice = contenidoFila[6];

      // Cambiar el HTML de los spans por los datos
      document.getElementById("productunit").value = productUnit;
      document.getElementById("productname").innerText = productName;
      document.getElementById("productprice").value = productPrice;

      // Verificar si existe el elemento productstock
      const productStockElement = document.getElementById("productstock");
      if (productStockElement) {
        const productStock = contenidoFila[7];
        productStockElement.innerText = productStock;
      }

      // Cerrar el modal
      var modalBackground = document.querySelector(".modal__background");
      modalBackground.classList.add("modal__inactive");
    }
  });

// Añadir Proveedor, Dirección e ID al formulario órden de compra
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#providertable");

    if (isModalTable) {
      const fila = event.target.closest("tr");
      const columnas = fila.querySelectorAll("td");

      // Crear un array con el contenido de las celdas de la fila clickeada
      const contenidoFila = Array.from(columnas).map(
        (columna) => columna.innerText
      );

      // Obtener elementos del array
      const providerID = contenidoFila[0];
      const providerName = contenidoFila[1];
      const providerDirection = contenidoFila[3];

      // Cambiar el HTML de los spans por los datos
      document.getElementById("idproveedor").value = providerID;
      document.getElementById("proveedor").value = providerName;
      document.getElementById("direccion").value = providerDirection;

      // Cerrar el modal
      var modalBackground = document.querySelector(".modal__background");
      modalBackground.classList.add("modal__inactive");
    }
  });

// Añadir Proveedor, Dirección e ID al formulario órden de compra
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#clienttable");

    if (isModalTable) {
      const fila = event.target.closest("tr");
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

      // Cambiar el HTML de los spans por los datos
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

      // Cerrar el modal
      var modalBackground = document.querySelector(".modal__background");
      modalBackground.classList.add("modal__inactive");
    }
  });

// Añadir nueva fila en la tabla de órdenes de venta/compra
let datosProducto = [];
document
  .querySelector(".main__content")
  .addEventListener("click", function (event) {
    if (event.target.id === "addproduct") {
      const cantidad = parseFloat(
        document.getElementById("productquantity").value
      );
      const precioUnitario = parseFloat(
        document.getElementById("productprice").value
      );
      let descuento = parseFloat(
        document.getElementById("productdiscount").value
      );
      const unidad = document.getElementById("productunit").value;

      descuento = isNaN(descuento) ? 0 : descuento;
      const descuentoAplicado =
        isNaN(descuento) || descuento < 0 || descuento > 100 ? 0 : descuento;
      const rowData = window.clickedRowData;

      if (cantidad && unidad) {
        if (rowData) {
          const idPro = rowData[0];
          const nombreProducto = rowData[1];
          const precioReal = parseFloat(rowData[5]);

          if (productosAgregados.includes(nombreProducto)) {
            alert("El producto ya ha sido agregado.");
            return; // Sale de la función si el producto ya existe
          }

          let datosProducto = [];
          let addToProducts = true; // Variable para controlar la adición a productosAgregados

          if (document.getElementById("productstock")) {
            const stock = parseFloat(
              document.getElementById("productstock").innerText
            );
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
              (
                cantidad *
                precioUnitario *
                (1 - descuentoAplicado / 100)
              ).toFixed(2),
            ];

            const tablaExterna = document
              .getElementById("ordertable")
              .getElementsByTagName("tbody")[0];
            const nuevaFila = tablaExterna.insertRow();

            datosProducto.forEach((contenido, index) => {
              const celda = nuevaFila.insertCell();
              celda.textContent = contenido;

              if (index === 0) {
                celda.style.display = "none";
              }
              if (index === datosProducto.length - 1) {
                agregarCeldaEliminar(nuevaFila);
              }
            });

            // Limpiar datos del formulario
            window.clickedRowData = null;
            document.getElementById("productname").innerText = "NINGUNO";
            document.getElementById("productprice").value = null;
            document.getElementById("productdiscount").value = null;
            document.getElementById("productquantity").value = null;
            document.getElementById("productunit").value = null;

            if (document.getElementById("productstock")) {
              document.getElementById("productstock").innerText = null;
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
  });

function actualizarTablaPrecios() {
  const ordertable = document.getElementById("ordertable");
  const preciosTable = document.getElementById("preciosTable");

  // Obtener las filas de la tabla de productos
  const filasProductos = Array.from(ordertable.querySelectorAll("tbody tr"));

  let totalPrecioCompra = 0;
  let totalDescuento = 0;
  let total = 0;

  // Calcular totales recorriendo las filas de la tabla de productos
  filasProductos.forEach((fila) => {
    const cells = fila.querySelectorAll("td");

    const cantidad = parseInt(cells[2].innerText);
    const precio = parseFloat(cells[4].innerText);
    const totalFila = parseFloat(cells[6].innerText); // Total de la fila

    totalPrecioCompra += cantidad * precio;
    total += totalFila; // Sumar el total de la fila directamente
  });

  // Calcular total de descuento
  totalDescuento = totalPrecioCompra - total;

  // Resto del cálculo
  const igv = total * 0.18; // Suponiendo un IGV del 18%

  // Actualizar la fila de la tabla de precios
  const preciosRow = preciosTable.querySelector("tbody tr");
  const cellsPrecios = preciosRow.querySelectorAll("td");

  cellsPrecios[0].innerText = (total - igv).toFixed(2);
  cellsPrecios[1].innerText = totalDescuento.toFixed(2);
  cellsPrecios[2].innerText = (total - igv).toFixed(2);
  cellsPrecios[3].innerText = igv.toFixed(2);
  cellsPrecios[4].innerText = total.toFixed(2);
}

// Función para crear celda que elimina filas en las tablas
function agregarCeldaEliminar(fila) {
  const celda = fila.insertCell();
  celda.style.textAlign = "center";
  const eliminar = document.createElement("span");
  eliminar.textContent = "X";
  eliminar.style.color = "red";
  eliminar.style.fontWeight = "700";
  eliminar.style.cursor = "pointer";
  celda.appendChild(eliminar);
}

// Función para crear celda que elimina filas en las tablas
function agregarCeldaEliminar(fila) {
  const celda = fila.insertCell();
  celda.style.textAlign = "center";
  const eliminar = document.createElement("span");
  eliminar.textContent = "X";
  eliminar.style.color = "red";
  eliminar.style.fontWeight = "700";
  eliminar.style.cursor = "pointer";
  celda.appendChild(eliminar);
}

// Eliminar producto de la tabla de órdenes
document.addEventListener("click", function (event) {
  if (
    event.target.tagName === "SPAN" &&
    event.target.textContent === "X" &&
    !event.target.classList.contains("productspan--inactive")
  ) {
    const rowToDelete = event.target.closest("tr");

    const table = rowToDelete.closest("table");
    if (table && table.id === "ordertable") {
      const productName = rowToDelete.cells[0].textContent; // Nombre del producto en la primera celda

      // Eliminar el nombre del producto de la lista de productos agregados
      const index = productosAgregados.indexOf(productName);
      if (index !== -1) {
        productosAgregados.splice(index, 1);
      }

      rowToDelete.remove();
      //Actualiza tabla de precios
      actualizarTablaPrecios();
    }
  }
});

// Botón Modificar Habilitar y Deshabilitar inputs
let modificarActivo = false;
document.addEventListener("click", function (event) {
  if (
    event.target.id === "modificarFormulario" &&
    !event.target.classList.contains("order__btn--inactive")
  ) {
    //Referenciar elementos
    const botónModificar = document.getElementById("modificarFormulario");
    const botonSeleccionarProducto = document.getElementById("selectproduct");
    const botonAñadirProducto = document.getElementById("addproduct");
    const botonTresPuntos = document.getElementById("threeDotsButton");
    const iconoTresPuntos = document.getElementById("threeDotsIco");
    const formularios = document.querySelectorAll("input, select, textarea");
    const spanProductos = document.querySelectorAll(".productspan");

    if (!modificarActivo) {
      guardarCopiaSeguridadCompra();
      modificarActivo = true;
      //Quitar el disabled a los inputs y botones del formulario
      elementosActivados = true;
      botónModificar.innerHTML = `Cancelar <i class="bi bi-x-circle"></i>`;
      formularios.forEach(function (formulario) {
        formulario.removeAttribute("disabled");
      });
      botonSeleccionarProducto.classList.remove("order__btn--inactive");
      botonAñadirProducto.classList.remove("order__btn--inactive");
      botonTresPuntos.classList.remove("order__btn--inactive");
      iconoTresPuntos.classList.remove("order__btn--inactive");

      // Quitar la clase inactiva al span de la tabla de productos

      spanProductos.forEach((span) => {
        span.classList.remove("productspan--inactive");
      });
    } else {
      restaurarCopiaSeguridadCompra();
      //Quitar el disabled a los inputs y botones del formulario
      modificarActivo = false;
      elementosActivados = false;
      botónModificar.innerHTML = `Modificar <i class="bi bi-pencil-square"></i>`;

      formularios.forEach(function (formulario) {
        formulario.setAttribute("disabled", "disabled");
      });

      botonSeleccionarProducto.classList.add("order__btn--inactive");
      botonAñadirProducto.classList.add("order__btn--inactive");
      botonTresPuntos.classList.add("order__btn--inactive");
      iconoTresPuntos.classList.add("order__btn--inactive");

      // Quitar la clase inactiva al span de la tabla de productos
      spanProductos.forEach((span) => {
        span.classList.add("productspan--inactive");
      });
    }
  }
});

// Guardar Copia Seguridad de un Formulario si se cancela modificaciones
let copiaSeguridadFormulario = {};
function guardarCopiaSeguridadCompra() {
  console.log("haciendo copia de seguridad");
  // Obtener filas de la tabla productos
  const tablaProductos = document.getElementById("ordertable");
  const filasProductos = tablaProductos.querySelectorAll("tbody tr");

  // Obtener tabla precios
  const preciosTabla = document.getElementById("preciosTable");
  const celdasPrecios = preciosTabla.querySelectorAll("tbody td");
  const datosPrecios = [];

  // Guardar datos de la tabla de precios en un array
  celdasPrecios.forEach((celda, index) => {
    if (index < 5) {
      datosPrecios.push(celda.innerText);
    }
  });

  // Guardar las claves y valores principales
  copiaSeguridadFormulario = {
    proveedor: document.getElementById("proveedor").value,
    direccion: document.getElementById("direccion").value,
    sucursal: document.getElementById("sucursal").value,
    moneda: document.getElementById("moneda").value,
    almacen: document.getElementById("almacen").value,
    tipoPago: document.getElementById("tipoPago").value,
    fecha: document.getElementById("fecha").value,
    descripcion: document.getElementById("descripcion").value,
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
}

//Restaurar copia de seguridad
function restaurarCopiaSeguridadCompra() {
  console.log("restaurando");
  // Restaurar los valores de la tabla de precios
  const preciosTabla = document.getElementById("preciosTable");
  const celdasPrecios = preciosTabla.querySelectorAll("tbody td");

  copiaSeguridadFormulario.precios.forEach((precio, index) => {
    if (index < 5) {
      celdasPrecios[index].innerText = precio;
    }
  });

  // Restaurar los valores de la tabla de productos
  const tablaProductos = document.getElementById("ordertable");
  const cuerpoTablaProductos = tablaProductos.querySelector("tbody");

  // Limpiar la tabla de productos antes de restaurar los datos
  cuerpoTablaProductos.innerHTML = "";

  copiaSeguridadFormulario.productos.forEach((producto) => {
    const nuevaFila = document.createElement("tr");

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

      // Aplicar display: none al primer td (con id="id_producto")
      if (index === 0) {
        nuevaCelda.id = "id_producto";
        nuevaCelda.style.display = "none";
      }

      nuevaFila.appendChild(nuevaCelda);
    });

    cuerpoTablaProductos.appendChild(nuevaFila);
  });

  // Restaurar los valores principales del formulario
  document.getElementById("proveedor").value =
    copiaSeguridadFormulario.proveedor;
  document.getElementById("direccion").value =
    copiaSeguridadFormulario.direccion;
  document.getElementById("sucursal").value = copiaSeguridadFormulario.sucursal;
  document.getElementById("moneda").value = copiaSeguridadFormulario.moneda;
  document.getElementById("almacen").value = copiaSeguridadFormulario.almacen;
  document.getElementById("tipoPago").value = copiaSeguridadFormulario.tipoPago;
  document.getElementById("fecha").value = copiaSeguridadFormulario.fecha;
  document.getElementById("descripcion").value =
    copiaSeguridadFormulario.descripcion;
}

// Pasar datos del Listado de Órdenes de Compra al formulario compras (Botón Consultar)
document
  .querySelector(".main__content")
  .addEventListener("dblclick", async function (event) {
    const isModalTable = event.target.closest("#buyorderslist");

    if (!isModalTable) return;

    const fila = event.target.closest("tr");
    const columnas = fila.querySelectorAll("td");

    // Obtener el valor de la segunda columna (posición 1 en base a índices)
    const valorSegundaColumna = columnas[1].innerText.trim().substring(3);

    // URLs dinámicas basadas en los valores extraídos
    const urlCompra = `http://localhost/Alvaplast-project/Controller/CompraController.php?idCompra=${valorSegundaColumna}`;
    const urlCompraProducto = `http://localhost/Alvaplast-project/Controller/CompraProductoController.php?idCompra=${valorSegundaColumna}`;

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
      const urlProveedor = `http://localhost/Alvaplast-project/Controller/ProveedorController.php?idProveedor=${datosCompra.id_proveedor}`;
      const responseProveedor = await fetch(urlProveedor);

      if (!responseProveedor.ok) {
        throw new Error("Error al obtener los datos del proveedor.");
      }

      const [datosProveedor] = await responseProveedor.json();

      // Hacer algo con los datos obtenidos
      rellenarFormularioCompra(
        datosCompra,
        datosCompraProducto,
        datosProveedor
      );
      console.log("Datos Compra:", datosCompra);
      console.log("Datos Compra Producto:", datosCompraProducto);
      console.log("Dirección del proveedor:", datosProveedor.direccion);

      // Ejemplo: asignar la dirección del proveedor a un campo del formulario
      // document.getElementById('campoDireccionProveedor').value = datosProveedor.direccion;

      // ... resto del código para manipular los datos según sea necesario
    } catch (error) {
      console.error(error);
    }

    // Cerrar el modal
    var modalBackground = document.querySelector(".modal__background");
    modalBackground.classList.add("modal__inactive");

    // Cambiar estado de botones
    const botónNuevaOrder = document.getElementById("neworder");
    const botonesInactivos = document.querySelectorAll(".order__btn--inactive");
    botónNuevaOrder.innerHTML = "Nueva Orden de Compra X";
    botónNuevaOrder.classList.add("order__btn--red");

    document
      .getElementById("openModalButton")
      .classList.add("order__btn--inactive");
    buscarActivo = false;

    botonesInactivos.forEach(function (boton) {
      boton.classList.remove("order__btn--inactive");
    });
    document.getElementById("fecha").value = establecerFechaHora();
    elementosActivados = true;
  });

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

  // Rellenar Productos
  const tablaProductos = document.getElementById("ordertable");
  tablaProductos.querySelector("tbody").innerHTML = "";

  // Iterar sobre los datos de productos y añadir filas a la tabla
  datosProductos.forEach((producto) => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td style="display: none;">${producto.id_producto}</td>
      <td>${producto.nombre_producto}</td>
      <td>${producto.cantidad}</td>
      <td>${producto.abreviatura}</td>
      <td>${producto.precio_compra}</td>
      <td>${producto.descuento}</td>
      <td>${producto.Sub_Total}</td>
      <td style="text-align: center;"><span style="color: red; font-weight: 700; cursor: pointer;" class="productspan productspan--inactive">X</span></td>
    `;
    tablaProductos.querySelector("tbody").appendChild(row);
  });

  // Obtener las celdas de la tabla por su ID
  const productSubtotalCell = document.getElementById("productsubtotal");
  const productIgvCell = document.getElementById("productigv");
  const productTotalCell = document.getElementById("productTotal");

  // Asignar valores a las celdas de la tabla con los datos de la compra
  productSubtotalCell.textContent = datosCompra.subtotal;
  productIgvCell.textContent = datosCompra.igv;
  productTotalCell.textContent = datosCompra.total;
}

// Borrar todos los datos de un formulario dentro de modal
