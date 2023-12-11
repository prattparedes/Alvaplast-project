// Activar los botones/formulario y desactivarlos en Sección orden de Venta/Compra
let elementosActivados = false; // Control de estado para los elementos
let buscarActivo = true; // Control de estado para el quinto botón

document.querySelector(".main__content").addEventListener("click", function (event) {
    if (event.target.id === "neworder") {
      const botones = document.querySelectorAll('.order__btn:not(#openModalButton)');
      const botonSeleccionarProducto = document.getElementById('selectproduct');
      const botonAñadirProducto = document.getElementById('addproduct');
      const botonTresPuntos = document.getElementById('threeDotsButton');
      const iconoTresPuntos = document.getElementById('threeDotsIco');
      const botonesInactivos = document.querySelectorAll('.order__btn--inactive');
      const formularios = document.querySelectorAll("input, select, textarea");
  
      if (!elementosActivados) {
        botonesInactivos.forEach(function (boton) {
          boton.classList.remove('order__btn--inactive');
        });
  
        formularios.forEach(function (formulario) {
          formulario.removeAttribute("disabled");
        });
  
        botonSeleccionarProducto.classList.remove('order__btn--inactive');
        botonAñadirProducto.classList.remove('order__btn--inactive');
        botonTresPuntos.classList.remove('order__btn--inactive');
        iconoTresPuntos.classList.remove('order__btn--inactive');
  
        botones[0].classList.add('order__btn--red');
        botones[0].innerHTML = "Cancelar orden X";
        elementosActivados = true;
      } else {
        botones.forEach(function (boton, index) {
          if (index !== 0) {
            boton.classList.add('order__btn--inactive');
          }
        });
  
        formularios.forEach(function (formulario) {
          formulario.setAttribute("disabled", "disabled");
        });
  
        botonSeleccionarProducto.classList.add('order__btn--inactive');
        botonAñadirProducto.classList.add('order__btn--inactive');
        botonTresPuntos.classList.add('order__btn--inactive');
        iconoTresPuntos.classList.add('order__btn--inactive');
  
        botones[0].classList.remove('order__btn--red');
        botones[0].innerHTML = `Generar Orden de Venta <i class="bi bi-plus-circle"></i>`;
  
        elementosActivados = false;
      }
      
      if (buscarActivo) {
        document.getElementById('openModalButton').classList.add('order__btn--inactive');
        buscarActivo = false;
      } else {
        document.getElementById('openModalButton').classList.remove('order__btn--inactive');
        buscarActivo = true;
      }
    }
  });
  

// Activar los botones/formulario y desactivarlos en Sección Facturación
document.querySelector(".main__content").addEventListener("click", function (event) {
    if (event.target.id === "newbill") {
      const botones = document.querySelectorAll('.order__btn:not(#openModalButton)');
      const botonesInactivos = document.querySelectorAll('.order__btn--inactive');
      const formularios = document.querySelectorAll("input, select");
      if (!elementosActivados) {
        botonesInactivos.forEach(function (boton) {
          boton.classList.remove('order__btn--inactive');
        });
  
        formularios.forEach(function (formulario) {
          formulario.removeAttribute("disabled");
        });
  
        botones[0].classList.add('order__btn--red');
        botones[0].innerHTML = "Cancelar orden X";
        elementosActivados = true;
      } else {
        botones.forEach(function (boton, index) {
          if (index !== 0) {
            boton.classList.add('order__btn--inactive');
          }
        });
  
        formularios.forEach(function (formulario) {
          formulario.setAttribute("disabled", "disabled");
        });
  
        botones[0].classList.remove('order__btn--red');
        botones[0].innerHTML = `Generar Orden de Venta <i class="bi bi-plus-circle"></i>`;
  
        elementosActivados = false;
      }
      
      if (buscarActivo) {
        document.getElementById('openModalButton').classList.add('order__btn--inactive');
        buscarActivo = false;
      } else {
        document.getElementById('openModalButton').classList.remove('order__btn--inactive');
        buscarActivo = true;
      }
    }
  });