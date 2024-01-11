// Añadir Vehículo del listado a los datos para editar
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#vehicletable");

    if (isModalTable) {
      const fila = event.target.closest("tr");
      if (fila && fila.querySelectorAll("td").length > 0) {
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
    }
  });

// Añadir Moneda del listado a los datos para editar
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#currenciesTable");

    if (isModalTable) {
      const fila = event.target.closest("tr");

      if (fila && fila.querySelectorAll("td").length > 0) {
        const columnas = fila.querySelectorAll("td");
        console.log(fila);

        // Resto del código...
        const contenidoFila = Array.from(columnas).map(
          (columna) => columna.innerText
        );
        const monedaCodigo = contenidoFila[0];
        const monedaDescripcion = contenidoFila[1];
        const monedaSimbolo = contenidoFila[2];

        document.getElementById("codigo").value = monedaCodigo;
        document.getElementById("descripcion").value = monedaDescripcion;
        document.getElementById("abreviatura").value = monedaSimbolo;

        //Activar botones Modificar-Eliminar
        const botonesModificarEliminar = document.querySelectorAll(
          ".maintenanceform__btn--inactive"
        );
        botonesModificarEliminar.forEach((boton) => boton.classList.remove("maintenanceform__btn--inactive"))

        // Desactivar Grabar
        const botonGrabar = document.querySelectorAll(
          ".maintenanceform__btn"
        )[1];
        botonGrabar.classList.add("maintenanceform__btn--inactive")

        // Desactivar inputs-selects-textareas del documento
        const elementos = document.querySelectorAll('input, select, textarea');
  
        elementos.forEach(elemento => {
          elemento.disabled = true;
        });
      }
    }
  });

// Añadir Transportista del listado a los datos editables
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#carrierstable");

    if (isModalTable) {
      const fila = event.target.closest("tr");

      if (fila && fila.querySelectorAll("td").length > 0) {
        const columnas = fila.querySelectorAll("td");
        console.log(fila);

        // Resto del código...
        const contenidoFila = Array.from(columnas).map(
          (columna) => columna.innerText
        );
        const transportistaCodigo = contenidoFila[0];
        const transportistaNombres = contenidoFila[1];
        const transportistaApPaterno = contenidoFila[2];
        const transportistaApMaterno = contenidoFila[3];
        const transportistaRuc = contenidoFila[4];
        const transportistaDNI = contenidoFila[5];
        const transportistaLicencia = contenidoFila[6];

        document.getElementById("codigo").innerHTML = transportistaCodigo;
        document.getElementById("nombres").value = transportistaNombres;
        document.getElementById("paterno").value = transportistaApPaterno;
        document.getElementById("materno").value = transportistaApMaterno;
        document.getElementById("ruc").value = transportistaRuc;
        document.getElementById("dni").value = transportistaDNI;
        document.getElementById("licencia").value = transportistaLicencia;
      }
    }
  });

// Añadir Documento del listado a los datos editables
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#documentsTable");

    if (isModalTable) {
      const fila = event.target.closest("tr");

      if (fila && fila.querySelectorAll("td").length > 0) {
        const columnas = fila.querySelectorAll("td");
        console.log(fila);

        // Resto del código...
        const contenidoFila = Array.from(columnas).map(
          (columna) => columna.innerText
        );
        const documentoCodigo = contenidoFila[0];
        const documentoAbreviatura = contenidoFila[1];
        const documentoDescripcion = contenidoFila[2];

        document.getElementById("codigo").innerHTML = documentoCodigo;
        document.getElementById("abreviatura").value = documentoAbreviatura;
        document.getElementById("descripcion").value = documentoDescripcion;
      }
    }
  });
// Añadir Almacen del listado a los datos editables
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#storestable");

    if (isModalTable) {
      const fila = event.target.closest("tr");

      if (fila && fila.querySelectorAll("td").length > 0) {
        const columnas = fila.querySelectorAll("td");
        console.log(fila);

        // Resto del código...
        const contenidoFila = Array.from(columnas).map(
          (columna) => columna.innerText
        );

        const almacenCodigo = contenidoFila[0];
        const almacenSucursal = contenidoFila[1];
        console.log(almacenSucursal);
        const almacenDescripcion = contenidoFila[2];

        document.getElementById("codigo").innerHTML = almacenCodigo;
        document.getElementById("sucursal").value = almacenSucursal;
        document.getElementById("descripcion").value = almacenDescripcion;
      }
    }
  });

// Añadir Sucursal del listado a los datos editables
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#branchstable");

    if (isModalTable) {
      const fila = event.target.closest("tr");

      if (fila && fila.querySelectorAll("td").length > 0) {
        const columnas = fila.querySelectorAll("td");
        console.log(fila);

        // Resto del código...
        const contenidoFila = Array.from(columnas).map(
          (columna) => columna.innerText
        );

        const sucursalCodigo = contenidoFila[0];
        const sucursalDescripcion = contenidoFila[1];
        const sucursalDireccion = contenidoFila[2];
        const sucursalTelefono = contenidoFila[3];

        document.getElementById("codigo").innerHTML = sucursalCodigo;
        document.getElementById("descripcion").value = sucursalDescripcion;
        document.getElementById("direccion").value = sucursalDireccion;
        document.getElementById("telefono").value = sucursalTelefono;
      }
    }
  });

// Añadir Unidad del listado a los datos editables
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#unitsTable");

    if (isModalTable) {
      const fila = event.target.closest("tr");

      if (fila && fila.querySelectorAll("td").length > 0) {
        const columnas = fila.querySelectorAll("td");
        console.log(fila);

        // Resto del código...
        const contenidoFila = Array.from(columnas).map(
          (columna) => columna.innerText
        );

        const unidadID = contenidoFila[0];
        const unidadCodigoUnidad = contenidoFila[1];
        const unidadDescripcion = contenidoFila[2];

        document.getElementById("codigo").innerHTML = unidadID;
        document.getElementById("abreviatura").value = unidadCodigoUnidad;
        document.getElementById("descripcion").value = unidadDescripcion;
      }
    }
  });

// Añadir Marca del listado a los datos editables
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#brandsTable");

    if (isModalTable) {
      const fila = event.target.closest("tr");

      if (fila && fila.querySelectorAll("td").length > 0) {
        const columnas = fila.querySelectorAll("td");
        console.log(fila);

        // Resto del código...
        const contenidoFila = Array.from(columnas).map(
          (columna) => columna.innerText
        );

        const marcaID = contenidoFila[0];
        const marcaDescripcion = contenidoFila[1];

        document.getElementById("codigo").innerHTML = marcaID;
        document.getElementById("descripcion").value = marcaDescripcion;
      }
    }
  });

// Añadir Línea del listado a los datos editables
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#productlinesTable");

    if (isModalTable) {
      const fila = event.target.closest("tr");

      if (fila && fila.querySelectorAll("td").length > 0) {
        const columnas = fila.querySelectorAll("td");
        console.log(fila);

        // Resto del código...
        const contenidoFila = Array.from(columnas).map(
          (columna) => columna.innerText
        );

        const lineaCódigo = contenidoFila[0];
        const lineaDescripcion = contenidoFila[1];

        document.getElementById("codigo").innerHTML = lineaCódigo;
        document.getElementById("descripcion").value = lineaDescripcion;
      }
    }
  });

// Añadir Proveedor del listado a los datos editables
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#providersTable");

    if (isModalTable) {
      const fila = event.target.closest("tr");

      if (fila && fila.querySelectorAll("td").length > 0) {
        const columnas = fila.querySelectorAll("td");
        console.log(fila);

        // Resto del código...
        const contenidoFila = Array.from(columnas).map(
          (columna) => columna.innerText
        );

        const proveedorCódigo = contenidoFila[0];
        const proveedorNombre = contenidoFila[1];
        const proveedorRuc = contenidoFila[2];
        const proveedorDireccion = contenidoFila[3];
        const proveedorEmail = contenidoFila[6];
        const proveedorTelefono = contenidoFila[4];
        const proveedorDescripcion = contenidoFila[7];
        const proveedorFax = contenidoFila[5];
        const proveedorContacto = contenidoFila[8];
        const proveedorEstado = contenidoFila[9];

        // ubigeo
        const proveedorUbicacion = contenidoFila[10];
        const dosPrimeros = proveedorUbicacion.substring(0, 2);
        const cuatroDigitos = proveedorUbicacion.substring(0, 4);

        const primerNumero = dosPrimeros + "0000"; // Dos primeros dígitos + 4 ceros
        const segundoNumero = cuatroDigitos + "00"; // 4 primeros dígitos s + 2 ceros
        const tercerNumero = proveedorUbicacion; // Los 6 dígitos originales

        document.getElementById("codigo").innerHTML = proveedorCódigo;
        document.getElementById("razonSocial").value = proveedorNombre;
        document.getElementById("ruc").value = proveedorRuc;
        document.getElementById("direccion").value = proveedorDireccion;
        document.getElementById("email").value = proveedorEmail;
        document.getElementById("telefono").value = proveedorTelefono;
        document.getElementById("descripcion").value = proveedorDescripcion;
        document.getElementById("fax").value = proveedorFax;
        document.getElementById("contacto").value = proveedorContacto;
        document.getElementById("estado").value = proveedorEstado;

        document.getElementById("departamento").value = primerNumero;
        listarProvincia(primerNumero);
        document.getElementById("provincia").value = segundoNumero;
        listarDistrito(segundoNumero);
        document.getElementById("distrito").value = tercerNumero;
      }
    }
  });

function listarProvincia(ubigeo) {
  // Crear una solicitud XMLHttpRequest
  const xhr = new XMLHttpRequest();
  const url = "/Alvaplast-project/Controller/ubigeoController.php"; // Ruta del controlador PHP

  // Configurar la solicitud
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  // Enviar los datos del formulario incluyendo id_almacen y id_producto
  xhr.send("id_ubigeo=" + ubigeo);

  // Manejar la respuesta del servidor
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // La solicitud se completó correctamente
        if (xhr.responseText) {
          // Convertir la respuesta JSON en un objeto JavaScript
          const provincias = JSON.parse(xhr.responseText);
          const parsedProvincias = JSON.parse(provincias);

          // Obtener el select de provincias
          const selectProvincia = document.getElementById("provincia");

          // Limpiar las opciones existentes del select
          selectProvincia.innerHTML = "";

          // Agregar las nuevas opciones al select
          parsedProvincias.forEach((provincia) => {
            const option = document.createElement("option");
            option.value = provincia.id_ubigeo;
            option.textContent = provincia.descripcion;
            selectProvincia.appendChild(option);
          });
        }
      } else {
        // Hubo un error en la solicitud
        console.error("Error en la solicitud.");
      }
    }
  };
}

function listarDistrito(idprovincia) {
  // Crear una solicitud XMLHttpRequest
  const xhr = new XMLHttpRequest();
  const url = "/Alvaplast-project/Controller/ubigeoController.php"; // Ruta del controlador PHP

  // Configurar la solicitud
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  // Enviar los datos del formulario incluyendo id_almacen y id_producto
  xhr.send("id_provincia=" + idprovincia);

  // Manejar la respuesta del servidor
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // La solicitud se completó correctamente
        if (xhr.responseText) {
          // Convertir la respuesta JSON en un objeto JavaScript
          const distritos = JSON.parse(xhr.responseText);
          const parsedDistritos = JSON.parse(distritos);

          // Obtener el select de provincias
          const selectDistrito = document.getElementById("distrito");

          // Limpiar las opciones existentes del select
          selectDistrito.innerHTML = "";

          // Agregar las nuevas opciones al select
          parsedDistritos.forEach((provincia) => {
            const option = document.createElement("option");
            option.value = provincia.id_ubigeo;
            option.textContent = provincia.descripcion;
            selectDistrito.appendChild(option);
          });
        }
      } else {
        // Hubo un error en la solicitud
        console.error("Error en la solicitud.");
      }
    }
  };
}

//// Añadir Cliente del listado a los datos editables
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#clientsTable");

    if (isModalTable) {
      const fila = event.target.closest("tr");

      if (fila && fila.querySelectorAll("td").length > 0) {
        const columnas = fila.querySelectorAll("td");
        console.log(fila);

        // Resto del código...
        const contenidoFila = Array.from(columnas).map(
          (columna) => columna.innerText
        );

        const clienteCódigo = contenidoFila[0];
        const clienteNombre = contenidoFila[1];
        const clienteRuc = contenidoFila[2];
        const clienteDNI = contenidoFila[3];
        const clienteDireccion = contenidoFila[4];
        const clienteTelefono = contenidoFila[5];
        const clienteCelular = contenidoFila[6];
        const clienteTipo = contenidoFila[9];
        const clienteEstado = contenidoFila[10];

        // ubigeo
        const clienteUbicacion = contenidoFila[8];
        const dosPrimeros = clienteUbicacion.substring(0, 2);
        const cuatroDigitos = clienteUbicacion.substring(0, 4);

        const primerNumero = dosPrimeros + "0000"; // Dos primeros dígitos + 4 ceros
        const segundoNumero = cuatroDigitos + "00"; // 4 primeros dígitos s + 2 ceros
        const tercerNumero = clienteUbicacion; // Los 6 dígitos originales

        document.getElementById("codigo").innerHTML = clienteCódigo;
        document.getElementById("razonSocial").value = clienteNombre;
        document.getElementById("ruc").value = clienteRuc;
        document.getElementById("direccion").value = clienteDireccion;
        document.getElementById("dni").value = clienteDNI;
        document.getElementById("telefono").value = clienteTelefono;
        document.getElementById("celular").value = clienteCelular;
        document.getElementById("tipoCliente").value = clienteTipo;
        document.getElementById("estado").value = clienteEstado;

        document.getElementById("departamento").value = primerNumero;
        listarProvincia(primerNumero);
        document.getElementById("provincia").value = segundoNumero;
        listarDistrito(segundoNumero);
        document.getElementById("distrito").value = tercerNumero;
      }
    }
  });

//// Añadir Producto del listado a los datos editables
document
  .querySelector(".main__content")
  .addEventListener("dblclick", function (event) {
    const isModalTable = event.target.closest("#productsTable");

    if (isModalTable) {
      const fila = event.target.closest("tr");

      if (fila && fila.querySelectorAll("td").length > 0) {
        const columnas = fila.querySelectorAll("td");
        console.log(fila);

        // Resto del código...
        const contenidoFila = Array.from(columnas).map(
          (columna) => columna.innerText
        );

        const productoCódigo = contenidoFila[0];
        const productoNombre = contenidoFila[1];
        const productoProcedencia = contenidoFila[12];
        const productoMoneda = contenidoFila[11];
        const productoDescripcion = contenidoFila[16];
        const productoMarca = contenidoFila[13];
        const productoLinea = contenidoFila[14];
        const productoUnidad = contenidoFila[17];
        const productoVolumen = contenidoFila[7];
        const productoPrecioVenta = contenidoFila[2];
        const productoPrecioCompra = contenidoFila[3];
        const productoStockMinimo = contenidoFila[8];
        const productoStockMaximo = contenidoFila[9];
        const productoEstado = contenidoFila[18];

        document.getElementById("codigo").innerHTML = productoCódigo;
        document.getElementById("procedencia").value = productoProcedencia;
        document.getElementById("nombre").value = productoNombre;
        document.getElementById("linea").value = productoLinea;
        document.getElementById("moneda").value = productoMoneda;
        document.getElementById("precioCompra").value = productoPrecioCompra;
        document.getElementById("precioVenta").value = productoPrecioVenta;
        document.getElementById("descripcion").value = productoDescripcion;
        document.getElementById("marca").value = productoMarca;
        document.getElementById("unidad").value = productoUnidad;
        document.getElementById("volumen").value = productoVolumen;
        document.getElementById("stockMinimo").value = productoStockMinimo;
        document.getElementById("stockMaximo").value = productoStockMaximo;
        document.getElementById("estado").checked = productoEstado === "1";

        // const hexString = contenidoFila[15]; // Tu cadena hexadecimal
        // const byteArray = hexString
        //   .match(/.{1,2}/g)
        //   .map((byte) => parseInt(byte, 16)); // Convierte a un array de bytes

        // const byteArrayUint = new Uint8Array(byteArray); // Convierte el array de bytes a Uint8Array
        // const blob = new Blob([byteArrayUint], { type: "image/png" }); // Crea un blob con el tipo de imagen correspondiente

        // const reader = new FileReader();
        // reader.readAsDataURL(blob);

        // reader.onloadend = function () {
        //   const base64data = reader.result; // Aquí obtienes la representación base64 de la imagen
        //   document.getElementById("imagenMostrada").src = base64data; // Asigna la imagen al src del elemento
        // };
      }
    }
  });

function listarProductosMantenimiento() {
  // Mostrar la fila de carga antes de hacer la solicitud AJAX
  mostrarFilaDeCargaProductos();

  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // Inserta la tabla en el contenedor
        document.getElementById("productsTableBody").innerHTML =
          xhr.responseText;
      } else {
        console.error("Error al cargar la tabla.");
      }
    }
  };
  xhr.open(
    "GET",
    "/Alvaplast-project/views/modals/maintenance_modals/products_table.php",
    true
  );
  xhr.send();
}

function mostrarFilaDeCargaProductos() {
  const productsTableBody = document.getElementById("productsTableBody");
  productsTableBody.innerHTML = ""; // Limpiar el contenido existente

  const filaCarga = document.createElement("tr");

  // Agregar once celdas con los tres puntos suspensivos en cada una
  for (let i = 0; i < 11; i++) {
    const celdaCarga = document.createElement("td");
    celdaCarga.textContent = "...";
    filaCarga.appendChild(celdaCarga);
  }

  // Agregar la fila de carga al tbody
  productsTableBody.appendChild(filaCarga);
}
