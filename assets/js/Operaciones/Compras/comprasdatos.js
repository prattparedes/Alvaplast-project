// Añadir Proveedor, Dirección e ID al formulario órden de compra
document
    .querySelector(".main__content")
    .addEventListener("dblclick", function (event) {
        const isModalTable = event.target.closest("#providertable");
        if (isModalTable) {
            const fila = event.target.closest("tr");
            const columnas = fila.querySelectorAll("td");

            // Crear un array con el contenido de las celdas de la fila clickeada
            const contenidoFila = Array.from(columnas).map(
                (columna) => columna.innerText
            );

            // Obtener elementos del array
            const providerID = contenidoFila[0];
            const providerName = contenidoFila[1];
            const providerDirection = contenidoFila[3];

            // Cambiar el HTML de los spans por los datos
            document.getElementById("idproveedor").value = providerID;
            document.getElementById("proveedor").value = providerName;
            document.getElementById("direccion").value = providerDirection;

            // Cerrar el modal
            var modalBackground = document.querySelector(".modal__background");
            modalBackground.classList.add("modal__inactive");
        }
    });