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

    if (event.target.id === "closeModalButton") {
      modalBackground.classList.add("modal__inactive");
    }
  });

// Carga Dinámica de los modals
function loadModalContent(modalName) {
  document.querySelector(
    ".modal__content--dynamic"
  ).innerHTML = `<img src="assets/img/tube-spinner.svg" alt="Cargando..." class="modal__loading" style="width: 30%;">`;

  setTimeout(() => {
    fetch(`views/modals/${modalName}.php`)
      .then((response) => response.text())
      .then((data) => {
        document.querySelector(".modal__content--dynamic").innerHTML = data;
      })
      .catch((error) => console.error("Error:", error));
  }, 120);
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
      const productName = contenidoFila[1];
      const productPrice = contenidoFila[6];

      // Cambiar el HTML de los spans por los datos
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
let productosAgregados = []; // Lista para llevar registro de productos
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

              if (index === datosProducto.length - 1) {
                agregarCeldaEliminar(nuevaFila);
              }
            });

            // Resto del código para limpiar datos del formulario y actualizar tabla de precios
            // ...

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

    const cantidad = parseInt(cells[1].innerText);
    const precio = parseFloat(cells[3].innerText);
    const totalFila = parseFloat(cells[5].innerText); // Total de la fila

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

// Eliminar producto de la tabla de órdenes
document.addEventListener("click", function (event) {
  if (event.target.tagName === "SPAN" && event.target.textContent === "X") {
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

// Añadir Vehículo del listado del modal a los datos para editar
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#vehicletable");

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
      const vehiculoCodigo = contenidoFila[0];
      const vehiculoPlaca = contenidoFila[1];
      const vehiculoModelo = contenidoFila[2];
      const vehiculoTipo = contenidoFila[3];
      const vehiculoMarca = contenidoFila[4];

      // Cambiar el HTML de los spans por los datos
      document.getElementById("codigo").innerText = vehiculoCodigo;
      document.getElementById("placa").value = vehiculoPlaca;
      document.getElementById("modelo").value = vehiculoModelo;

      // Asignar valor seleccionado al select 'tipo'
      const tipoSelect = document.getElementById("tipo");
      const marcaInput = document.getElementById("marca");

      for (let i = 0; i < tipoSelect.options.length; i++) {
        if (tipoSelect.options[i].value === vehiculoTipo) {
          tipoSelect.options[i].selected = true;
          break;
        }
      }

      marcaInput.value = vehiculoMarca;
    }
  });

// Añadir Moneda del listado del modal a los datos para editar
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#currenciesTable");

    if (isModalTable) {
      const fila = event.target.closest("tr");
      const columnas = fila.querySelectorAll("td");

      // Crear un array con el contenido de las celdas de la fila clickeada
      const contenidoFila = Array.from(columnas).map(
        (columna) => columna.innerText
      );

      // Obtener elementos del array
      const monedaCodigo = contenidoFila[0];
      const monedaDescripcion = contenidoFila[1];
      const monedaSimbolo = contenidoFila[2];

      // Cambiar el HTML de los spans por los datos
      document.getElementById("codigo").innerText = monedaCodigo;
      document.getElementById("descripcion").value = monedaDescripcion;
      document.getElementById("abreviatura").value = monedaSimbolo;
    }
  });

// Borrar todos los datos de un formulario dentro de modal
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#vehicletable");

    if (isModalTable) {
      const fila = event.target.closest("tr");
      const columnas = fila.querySelectorAll("td");

      // Crear un array con el contenido de las celdas de la fila clickeada
      const contenidoFila = Array.from(columnas).map(
        (columna) => columna.innerText
      );

      // Guardar los datos de la fila en una variable global para ser usada más tarde
      window.clickedRowData = contenidoFila;

      console.log(contenidoFila);

      // Obtener elementos del array
      const vehiculoCodigo = contenidoFila[0];
      const vehiculoPlaca = contenidoFila[1];
      const vehiculoModelo = contenidoFila[2];
      const vehiculoTipo = contenidoFila[3];
      const vehiculoMarca = contenidoFila[4];

      // Cambiar el HTML de los spans por los datos
      document.getElementById("codigo").innerText = vehiculoCodigo;
      document.getElementById("placa").value = vehiculoPlaca;
      document.getElementById("modelo").value = vehiculoModelo;

      // Asignar valor seleccionado al select 'tipo'
      const tipoSelect = document.getElementById("tipo");
      const marcaInput = document.getElementById("marca");

      for (let i = 0; i < tipoSelect.options.length; i++) {
        if (tipoSelect.options[i].value === vehiculoTipo) {
          tipoSelect.options[i].selected = true;
          break;
        }
      }

      marcaInput.value = vehiculoMarca;
    }
  });