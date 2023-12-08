// Abrir modal desde los botones, seleccionar producto, icono de los tres puntos.
document.querySelector(".main__content").addEventListener("click", function (event) {
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
      const descuento = parseFloat(
        document.getElementById("productdiscount").value
      );
      const unidad = document.getElementById("productunit").value;

      const descuentoAplicado =
        isNaN(descuento) || descuento < 0 || descuento > 100 ? 0 : descuento;

      const rowData = window.clickedRowData;

      if (cantidad && unidad) {
        if (rowData) {
          const nombreProducto = rowData[1];
          const precioReal = parseFloat(rowData[5]);

          let datosProducto = [];

          if (document.getElementById("productstock")) {
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
          } else {
            datosProducto = [
              nombreProducto,
              cantidad,
              unidad,
              precioUnitario,
              descuento,
              (
                cantidad *
                precioUnitario *
                (1 - descuentoAplicado / 100)
              ).toFixed(2),
            ];
          }

          const tablaExterna = document
            .getElementById("ordertable")
            .getElementsByTagName("tbody")[0];
          const nuevaFila = tablaExterna.insertRow();

          datosProducto.forEach((contenido) => {
            console.log(contenido);
            const celda = nuevaFila.insertCell();
            celda.innerText = contenido;
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
        }
      } else {
        const añadirProductoBoton = document.getElementById("addproduct");
        if (!añadirProductoBoton.classList.contains("order__btn--inactive")) {
          alert("La cantidad y la unidad no deben estar vacías.");
        }
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

// Borrar todos los datos de un formulario dentro de modal
