// Abrir modal desde los botones, seleccionar producto, icono de los tres puntos.
document
  .querySelector(".main__content")
  .addEventListener("click", function (event) {
    const modalBackground = document.querySelector(".modal__background");

    if (
      event.target.id === "openModalButton" ||
      event.target.id === "threeDotsButton" ||
      event.target.id === "threeDotsIco" ||
      event.target.id === "selectproduct"
    ) {
      const btn = document.getElementById(event.target.id);

      if (!btn.classList.contains("order__btn--inactive")) {
        modalBackground.classList.remove("modal__inactive");
      }
    }

    if (event.target.id === "closeModalButton") {
      modalBackground.classList.add("modal__inactive");
    }
  });

