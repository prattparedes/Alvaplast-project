// Variable para controlar la copia de seguridad del formulario en que te encuentres
let copiaSeguridadFormulario = {};

// Función para establecer la fecha actual
function establecerFechaHora() {
  const fecha = new Date(); // Obtener la fecha actual

  // Obtener los componentes de la fecha
  const year = fecha.getFullYear();
  const month = (fecha.getMonth() + 1).toString().padStart(2, '0'); // El mes comienza desde 0
  const day = fecha.getDate().toString().padStart(2, '0');
  const hours = fecha.getHours().toString().padStart(2, '0');
  const minutes = fecha.getMinutes().toString().padStart(2, '0');

  // Construir la cadena en el formato deseado
  const fechaHora = `${year}-${month}-${day} ${hours}:${minutes}:00`;

  // Establecer el valor en el input datetime-local
  return fechaHora;
}

// Función para activar todos los inputs, selects, etc.
function activarInputs() {
  elementosFormulario = document.querySelectorAll("input, select, textarea");
  elementosFormulario.forEach(function (elemento) {
    elemento.removeAttribute("disabled");
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
}
