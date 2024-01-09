// Añadir Staff del listado a los datos para editar
function llenarFormularioStaff(fila) {
  const columnas = fila.querySelectorAll("td");

  const contenidoFila = Array.from(columnas).map(
    (columna) => columna.innerText
  );

  // Obtener elementos del array
  const staffCodigo = contenidoFila[0];
  const staffNombres = contenidoFila[1];
  const staffPaterno = contenidoFila[2];
  const staffMaterno = contenidoFila[3];
  const staffDNI = contenidoFila[4];
  const staffDireccion = contenidoFila[5];
  const staffTelefono = contenidoFila[6];
  const staffCargo = contenidoFila[7];
  const staffEstado = contenidoFila[8];
  const staffusuario = contenidoFila[9];
  const staffclave = contenidoFila[10];
  const staffcelular = contenidoFila[11];

  // Insertar elementos
  document.getElementById("codigo").innerText = staffCodigo;
  document.getElementById("nombres").value = staffNombres;
  document.getElementById("paterno").value = staffPaterno;
  document.getElementById("materno").value = staffMaterno;
  document.getElementById("dni").value = staffDNI;
  document.getElementById("cargo").value = staffCargo;
  document.getElementById("direccion").value = staffDireccion;
  document.getElementById("telefono").value = staffTelefono;
  document.getElementById("celular").value = staffTelefono;
  document.getElementById("estado").value = staffEstado;
  document.getElementById("usuario").value = staffusuario;
  document.getElementById("clave").value = staffclave;
  document.getElementById("clave2").value = staffclave;
  document.getElementById("celular").value = staffcelular;
}

// Modal de Permisos Personal
function cargarPermisosPersonal() {
  const modalBackground = document.querySelector(".modal__background");
  const personalSeleccionado = document.getElementById("usuario").value;

  if (!personalSeleccionado) {
    alert("Seleccione usuario");
    return;
  } else {
    modalBackground.classList.remove("modal__inactive");

    loadModalContent("staffpermissions")
      .then(() => {
        document.getElementById("usuarioPersonal").innerHTML = personalSeleccionado;
      })
      .catch((error) => {
        // Manejo de errores si el fetch falla
        console.error('Error al cargar contenido del modal:', error);
      });
  }
}
