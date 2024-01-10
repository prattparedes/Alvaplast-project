function FiltrarClientesMantenimiento() {
  const filtroInput = document.getElementById("filtroClientes");
  const filtro = filtroInput.value.toLowerCase().trim();

  const filasProductos = document.querySelectorAll("#clientsTable tbody tr");
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

// Producto Mantenimiento   
let filtroLinea = null;
function FiltrarProductosMantenimiento(filtro) {
    const filasProductos = document.querySelectorAll("#productsTable tbody tr");
    filasProductos.forEach((fila) => {
      const nombreProducto = fila
        .querySelector("td:nth-child(2)")
        .textContent.toLowerCase()
        .trim();
  
      // Aplicar filtro por texto
      if (nombreProducto.includes(filtro) && (!filtroLinea || CumpleFiltroLinea(fila, filtroLinea))) {
        fila.style.display = "table-row";
      } else {
        fila.style.display = "none";
      }
    });
  }

  function FiltrarLineaProductosMantenimiento(filtro) {
    if (filtro === "0") {
      filtroLinea = null; // Limpiar el filtro de línea si el valor es "0"
    } else {
      filtroLinea = filtro;
    }
  
    const filasProductos = document.querySelectorAll("#productsTable tbody tr");
    filasProductos.forEach((fila) => {
      if (!filtroLinea || CumpleFiltroLinea(fila, filtroLinea)) {
        fila.style.display = "table-row";
      } else {
        fila.style.display = "none";
      }
    });
  }

function CumpleFiltroLinea(fila, filtro) {
    const idLinea = fila
      .querySelector("td:nth-child(15)")
      .textContent.toLowerCase()
      .trim();
    return parseFloat(idLinea) === parseFloat(filtro);
  }