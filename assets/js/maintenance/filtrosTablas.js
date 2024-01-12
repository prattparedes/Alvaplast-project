//Filtrar clientes en mantenimiento
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

// Filtrar Vehículos Mantenimiento
function FiltrarVehiculosMantenimiento() {
  const filtroInput = document.getElementById("filtroVehiculos");
  const filtro = filtroInput.value.toLowerCase().trim();

  const filasProductos = document.querySelectorAll("#vehicletable tbody tr");
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

// Filtrar Lineas Mantenimiento
function FiltrarLineasMantenimiento() {
  const filtroInput = document.getElementById("filtroLineas");
  const filtro = filtroInput.value.toLowerCase().trim();

  const filasProductos = document.querySelectorAll("#productlinesTable tbody tr");
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

// Filtrar Proveedores Mantenimiento
function FiltrarProveedoresNombre() {
  const filtroNombreInput = document.getElementById("filtroProveedorNombre");
  const filtroRucInput = document.getElementById("filtroProveedorRuc");

  const filtroNombre = filtroNombreInput.value.toLowerCase().trim();
  const filtroRuc = filtroRucInput.value.toLowerCase().trim();

  const filasProveedores = document.querySelectorAll("#providersTable tbody tr");
  filasProveedores.forEach((fila) => {
    const nombreProveedor = fila
      .querySelector("td:nth-child(2)")
      .textContent.toLowerCase()
      .trim();
    const rucProveedor = fila
      .querySelector("td:nth-child(3)")
      .textContent.toLowerCase()
      .trim();

    // Comprobar si ambos filtros coinciden
    const cumpleFiltroNombre = nombreProveedor.includes(filtroNombre);
    const cumpleFiltroRuc = rucProveedor.includes(filtroRuc);

    if (cumpleFiltroNombre && cumpleFiltroRuc) {
      fila.style.display = "table-row";
    } else {
      fila.style.display = "none";
    }
  });
}

// Filtrar Clientes Mantenimiento
function FiltrarClientesNombre() {
  const filtroNombreInput = document.getElementById("filtroClienteNombre");
  const filtroRucInput = document.getElementById("filtroClienteRuc");
  const filtroDNIInput = document.getElementById("filtroClienteDNI");

  const filtroNombre = filtroNombreInput.value.toLowerCase().trim();
  const filtroRuc = filtroRucInput.value.toLowerCase().trim();
  const filtroDNI = filtroDNIInput.value.toLowerCase().trim();

  const filasClientes = document.querySelectorAll("#clientsTable tbody tr");
  filasClientes.forEach((fila) => {
    const nombreCliente = fila
      .querySelector("td:nth-child(2)")
      .textContent.toLowerCase()
      .trim();
    const rucCliente = fila
      .querySelector("td:nth-child(3)")
      .textContent.toLowerCase()
      .trim();
    const dniCliente = fila
      .querySelector("td:nth-child(4)")
      .textContent.toLowerCase()
      .trim();

    // Comprobar si ambos filtros coinciden
    const cumpleFiltroNombre = nombreCliente.includes(filtroNombre);
    const cumpleFiltroRuc = rucCliente.includes(filtroRuc);
    const cumpleFiltroDNI = dniCliente.includes(filtroDNI);

    if (cumpleFiltroNombre && cumpleFiltroRuc && cumpleFiltroDNI) {
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