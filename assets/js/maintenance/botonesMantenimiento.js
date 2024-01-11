// Activar o Desactivar botones dentro de una vista de mantenimiento
function botonesMantenimiento(botonpulsado) {
  const botonesModificarEliminar = document.querySelectorAll(
    ".maintenanceform__btn--inactive"
  );
  const botonGrabar = document.querySelectorAll(".maintenanceform__btn")[1];
}

// Desactivar botones modificarEliminar
function botonNuevo() {
  const botonesModificarEliminar = document.querySelectorAll(
    ".maintenanceform__btn"
  );

  const botonModificar = botonesModificarEliminar[2];
  const botonEliminar = botonesModificarEliminar[3];

  botonModificar.classList.add("maintenanceform__btn--inactive");
  botonEliminar.classList.add("maintenanceform__btn--inactive");

  const botonGrabar = document.querySelectorAll(".maintenanceform__btn")[1];
  botonGrabar.classList.remove("maintenanceform__btn--inactive");

  //Borrar Todos los inputs-selects
  const elementos = document.querySelectorAll("input, select");
  elementos.forEach((elemento) => {
    if (elemento.tagName === "INPUT") {
      elemento.value = ""; // Para los inputs, se establece el valor como una cadena vacía
    } else if (elemento.tagName === "SELECT") {
      elemento.selectedIndex = 0; // Para los selects, se establece el índice seleccionado como el primer elemento (el valor por defecto)
    }
  });
}

// botón modificar y sus funciones
function botonModificar() {
    const elementos = document.querySelectorAll('input, select, textarea');
  
    elementos.forEach(elemento => {
        elemento.disabled = false;
      }
    );

    // Desactivar botón Nuevo y Eliminar, activar Grabar
    const botones = document.querySelectorAll(".maintenanceform__btn");

    if (botones[2].innerHTML === "Modificar") {
        botones[0].classList.add("maintenanceform__btn--inactive")
        botones[1].classList.remove("maintenanceform__btn--inactive")
        botones[3].classList.add("maintenanceform__btn--inactive")
        botones[2].innerHTML = "Cancelar"
    } else {
        botones[2].innerHTML = "Modificar"
        botones[0].classList.remove("maintenanceform__btn--inactive")
        botones[1].classList.add("maintenanceform__btn--inactive")
        botones[3].classList.remove("maintenanceform__btn--inactive")
    }
  }

// botón eliminar y sus funciones
function botonEliminar() {
    // Abrir alerta
    openAlertModal()
    contentAlertModal("Desea eliminar los datos de esta Moneda?")
    const valorAlerta = valorAlertModal()
    //
  }