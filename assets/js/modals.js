// Foto subida al modal de productos
document
  .querySelector(".main__content")
  .addEventListener("click", function (event) {
    if (event.target.id === "selectImageButton" || event.target.id === "foto") {
      if (event.target.id === "selectImageButton") {
        document.getElementById("foto").click(); // Simula el clic en el input file al hacer clic en el botón
      }

      document
        .getElementById("foto")
        .addEventListener("change", function (event) {
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
        });
    }
  });

let datosProducto = [];
