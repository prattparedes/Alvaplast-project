// Abrir modal desde los botones arriba de los formularios
document
  .querySelector(".main__content")
  .addEventListener("click", function (event) {
    if (event.target.id === "openModalButton") {
      var modalBackground = document.querySelector(".modal__background");

      // Remover la clase "modal__inactive"
      modalBackground.classList.remove("modal__inactive");
    }

    if (event.target.id === "closeModalButton") {
      var modalBackground = document.querySelector(".modal__background");

      // Agregar la clase "modal__inactive"
      modalBackground.classList.add("modal__inactive");
    }
  });

// Abrir modal a través de los tres botones en el formulario
document
  .querySelector(".main__content")
  .addEventListener("click", function (event) {
    if (
      event.target.id === "threeDotsButton" ||
      event.target.id === "threeDotsIco"
    ) {
      var modalBackground = document.querySelector(".modal__background");

      // Remover la clase "modal__inactive"
      modalBackground.classList.remove("modal__inactive");
    }
  });

// Carga Dinámica de los modals
function loadModalContent(modalName) {
  document.querySelector(
    ".modal__content--dynamic"
  ).innerHTML = `<img src="assets/img/tube-spinner.svg" alt="Cargando..." class="modal__loading" style="width: 30%;">`;

  setTimeout(() => {
    fetch(`views/modals/${modalName}.php`)
      .then((response) => response.text())
      .then((data) => {
        document.querySelector(".modal__content--dynamic").innerHTML = data;
      })
      .catch((error) => console.error("Error:", error));
  }, 120);
}

// Foto subida al modal de productos
document.querySelector(".main__content").addEventListener("change", function (event) {
  if (event.target.id === "foto") {
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
  }
});
