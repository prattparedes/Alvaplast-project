// Variable para controlar la copia de seguridad del formulario en que te encuentres
let copiaSeguridadFormulario = {};
let copiaSeguridadFormularioInicial = {};

// Función para establecer la fecha actual
function establecerFechaHora() {
  const fecha = new Date(); // Obtener la fecha actual

  // Obtener los componentes de la fecha
  const year = fecha.getFullYear();
  const month = (fecha.getMonth() + 1).toString().padStart(2, "0"); // El mes comienza desde 0
  const day = fecha.getDate().toString().padStart(2, "0");
  const hours = fecha.getHours().toString().padStart(2, "0");
  const minutes = fecha.getMinutes().toString().padStart(2, "0");

  // Construir la cadena en el formato deseado
  const fechaHora = `${year}-${month}-${day} ${hours}:${minutes}:00`;

  // Establecer el valor en el input datetime-local
  return fechaHora;
}

// Función para activar todos los inputs, selects, etc.
function activarInputs() {
  elementosFormulario = document.querySelectorAll(
    "input, select, textarea, a, button"
  );
  elementosFormulario.forEach(function (elemento) {
    elemento.removeAttribute("disabled");
  });

  if (document.getElementById("titulo").innerHTML === "ORDEN DE COMPRA") {
    document.getElementById("direccion").setAttribute("disabled", "disabled");
  }
  if (document.getElementById("titulo").innerHTML === "ORDEN DE VENTA" || document.getElementById("titulo").innerHTML === "FACTURACIÓN" ) {
    document.getElementById("direccion").setAttribute("disabled", "disabled");
    document.getElementById("rucDni").setAttribute("disabled", "disabled");
    document.getElementById("inicial").setAttribute("disabled", "disabled");
    document.getElementById("montocuo").setAttribute("disabled", "disabled");
    document.getElementById("montofin").setAttribute("disabled", "disabled");
    document.getElementById("cuotas").setAttribute("disabled", "disabled");
    document.getElementById("moneda").setAttribute("disabled", "disabled");
  }

  if ((document.getElementById("titulo").innerHTML === "FACTURACIÓN")) {
    document.getElementById("cliente").setAttribute("disabled", "disabled");
    document.getElementById("moneda").setAttribute("disabled", "disabled");
    document.getElementById("marcaVehiculo").setAttribute("disabled", "disabled");
    return
  }

  document.getElementById("productunit").setAttribute("disabled", "disabled");
  document
    .getElementById("productquantity")
    .setAttribute("disabled", "disabled");
  document.getElementById("productprice").setAttribute("disabled", "disabled");
  if (document.getElementById('productdiscount')) {
    document
    .getElementById("productdiscount")
    .setAttribute("disabled", "disabled");
  }
  if (document.getElementById("productstock")) {
    document
      .getElementById("productstock")
      .setAttribute("disabled", "disabled");
  }
}

function desactivarInputs() {
  elementosFormulario = document.querySelectorAll(
    "input, select, textarea, a, button"
  );
  elementosFormulario.forEach(function (elemento) {
    elemento.setAttribute("disabled", "disabled");
  });

  selectsNavbar = document.querySelectorAll(".dropdown-toggle");
  selectsNavbar.forEach((selectNav) => {
    selectNav.removeAttribute("disabled");
  });
}

// Función para actualizar la tabla de precios en las ordenes de compra y venta
function actualizarTablaPrecios() {
  const ordertable = document.getElementById("ordertable");

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
  const productSubtotal1 = document.getElementById("productsubtotal1");
  const productSubtotal2 = document.getElementById("productsubtotal2");
  const productDescuento = document.getElementById("productDescuento");
  const productIgv = document.getElementById("productigv");
  const productTotal = document.getElementById("productTotal");

  productSubtotal1.innerText = (total - igv).toFixed(2);
  productDescuento.innerText = totalDescuento.toFixed(2);
  productSubtotal2.innerText = (total - igv).toFixed(2);
  productIgv.innerText = igv.toFixed(2);
  productTotal.innerText = total.toFixed(2);

  // Actualizar Inicial/Monto final/cuotas/monto cuotas en caso de estar en ventas
  if (document.getElementById("inicial")) {
    document.getElementById("inicial").value = total.toFixed(2);
    document.getElementById("cuotas").value = 0;
    document.getElementById("montofin").value = 0;
    document.getElementById("montocuo").value = 0;
  }
}

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

function eliminarFilas() {
  if (document.getElementById("productname").disabled) {
    return;
  }

  let filas = document.querySelectorAll("#detalle_venta tr");
  filas.forEach(function (fila) {
    let columnasSeleccionadas = fila.querySelectorAll(
      "td.columna__seleccionada"
    );
    if (columnasSeleccionadas.length > 0) {
      fila.remove();
    }

    actualizarTablaPrecios();
  });

  let filasactualizadas = document.querySelectorAll("#detalle_venta tr");
  if (filasactualizadas.length === 0) {
      document.getElementById("moneda").removeAttribute("disabled");
  }
}

// Función para modificar cantidad
let celdaSeleccionada;
function seleccionarCelda(celda) {
  if (document.getElementById('productname').disabled){
    return
  }
  celdaSeleccionada = celda;
  openAlertModal();
}