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

let datosProducto = [];

// Añadir nueva fila en la tabla de órdenes de venta/compra
function añadirProductoOrden() {
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
      const precioReal = parseFloat(rowData[5]);

      let productosAgregadosEl = document.querySelectorAll(
        "#ordertable tbody tr td:nth-child(2)"
      );
      let productosAgregados = [];

      productosAgregadosEl.forEach((td) => {
        productosAgregados.push(td.innerText);
      });

      console.log(productosAgregados);

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
          (cantidad * precioUnitario * (1 - descuentoAplicado / 100)).toFixed(
            2
          ),
        ];

        const tablaExterna = document
          .getElementById("ordertable")
          .getElementsByTagName("tbody")[0];
        const nuevaFila = tablaExterna.insertRow();
        console.log(datosProducto);
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
            default:
              celda.textContent = contenido;
              celda.classList.add("textright");
              break;
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