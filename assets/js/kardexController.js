document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isKardexTable = event.target.closest("#productosKardex");
    const almacenSelect = document.getElementById("almacenSelect");
    const id_almacen = almacenSelect.value;

    if (id_almacen === "0") {
      alert("Selecciona un almacén");
      return;
    }

    if (isKardexTable) {
      const fila = event.target.closest("tr");
      if (!fila) return; // Si no se hace clic en una fila, salimos

      const id_producto = fila.cells[0].textContent.trim();

      // Mostrar la fila de carga antes de enviar la solicitud
      mostrarFilaDeCarga();

      // Crear una solicitud XMLHttpRequest
      const xhr = new XMLHttpRequest();
      const url = "/Alvaplast-project/Controller/KardexController.php"; // Ruta del controlador PHP

      // Configurar la solicitud
      xhr.open("POST", url, true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      if (id_almacen && id_producto) {
        // Enviar los datos del formulario incluyendo id_almacen y id_producto
        xhr.send("id_almacen=" + id_almacen + "&id_producto=" + id_producto);
      } else {
        alert("Selecciona un producto válido");
      }

      // Manejar la respuesta del servidor
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // La solicitud se completó correctamente
            if (xhr.responseText) {
              actualizarTablaMovimientosKardex(xhr.responseText);
            } else {
              alert("Movimientos del producto obtenidos");
            }
          } else {
            // Hubo un error en la solicitud
            console.error("Error en la solicitud.");
          }
        }
      };
    }
  });

function actualizarTablaMovimientosKardex(datos) {
  const movimientosKardex = document.getElementById("movimientosKardex");
  const tbody = movimientosKardex.getElementsByTagName("tbody")[0];
  tbody.innerHTML = ""; // Limpiar tabla existente

  // Parsear la respuesta JSON a un array de objetos
  const movimientos = JSON.parse(datos);

  // Agregar stock fisico final
  if (movimientos.length > 0) {
    const spanStock = document.getElementById("stockfinal");
    if (movimientos[0].tipo === "V") {
      saldoFisicoFinal = movimientos[0].stock - movimientos[0].cantidad;
    } else {
      saldoFisicoFinal = movimientos[0].stock + movimientos[0].cantidad;
    }
    spanStock.innerHTML = saldoFisicoFinal;
  }

  // Iterar sobre los datos y agregar filas a la tabla
  movimientos.forEach((movimiento) => {
    const fila = document.createElement("tr");

    // Crear celdas con los datos correspondientes
    const fecha = document.createElement("td");
    fecha.textContent = movimiento.fecha;

    const proveedorCliente = document.createElement("td");
    proveedorCliente.textContent = movimiento.Nombre;

    const motivo = document.createElement("td");
    motivo.textContent = movimiento.tipo === "V" ? "Venta" : "Compra";

    const documento = document.createElement("td");
    documento.textContent =
      movimiento.tipodocumento +
      "/" +
      movimiento.nro_documento +
      "-" +
      movimiento.serie_documento;

    const monto = document.createElement("td");
    monto.textContent = movimiento.total;

    const inicio = document.createElement("td");
    inicio.textContent = movimiento.stock;

    // Crear celdas para ingreso, salida, y saldo
    const ingreso = document.createElement("td");
    const salida = document.createElement("td");
    const saldo = document.createElement("td");

    // Determinar los valores de ingreso, salida y saldo según el tipo de movimiento
    let ingresoValue = 0;
    let salidaValue = 0;
    let saldoValue = 0;

    if (movimiento.tipo === "V") {
      // Si es venta
      salidaValue = parseFloat(movimiento.cantidad);
      saldoValue =
        parseFloat(movimiento.stock) - parseFloat(movimiento.cantidad);
    } else if (movimiento.tipo === "C") {
      // Si es compra
      ingresoValue = parseFloat(movimiento.cantidad);
      saldoValue =
        parseFloat(movimiento.stock) + parseFloat(movimiento.cantidad);
    }

    // Formatear los valores a dos decimales y asignarlos a las celdas
    ingreso.textContent = ingresoValue.toFixed(2);
    salida.textContent = salidaValue.toFixed(2);
    saldo.textContent = saldoValue.toFixed(2);

    // Agregar las celdas a la fila
    fila.appendChild(fecha);
    fila.appendChild(proveedorCliente);
    fila.appendChild(motivo);
    fila.appendChild(documento);
    fila.appendChild(monto);
    fila.appendChild(inicio);
    fila.appendChild(ingreso);
    fila.appendChild(salida);
    fila.appendChild(saldo);

    // Agregar la fila al tbody de la tabla
    tbody.appendChild(fila);
  });
}

function mostrarFilaDeCarga() {
  const movimientosKardex = document.getElementById("movimientosKardex");
  const tbody = movimientosKardex.getElementsByTagName("tbody")[0];
  tbody.innerHTML = ""; // Limpiar el contenido existente del tbody

  const filaCarga = document.createElement("tr");

  // Agregar nueve celdas con los tres puntos suspensivos en cada una
  for (let i = 0; i < 9; i++) {
    const celdaCarga = document.createElement("td");
    celdaCarga.textContent = "...";
    filaCarga.appendChild(celdaCarga);
  }

  // Agregar la fila de carga al tbody
  tbody.appendChild(filaCarga);
}
