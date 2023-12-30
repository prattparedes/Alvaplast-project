// Añadir Moneda del listado del modal a los datos para editar
document
    .querySelector(".main__content")
    .addEventListener("dblclick", function (event) {
        const isModalTable = event.target.closest("#currenciesTable");

        if (isModalTable) {
            const fila = event.target.closest("tr");

            // Validar que no sea una fila de encabezado (header)
            if (fila.querySelectorAll("th").length > 0) {
                // Es una fila de encabezado, no hacer nada o mostrar un mensaje
                console.log("No se puede seleccionar un encabezado de tabla.");
                return; // Detener la ejecución aquí si es un encabezado de tabla
            }


            const columnas = fila.querySelectorAll("td");

            // Crear un array con el contenido de las celdas de la fila clickeada
            const contenidoFila = Array.from(columnas).map(
                (columna) => columna.innerText
            );

            // Obtener elementos del array
            const monedaCodigo = contenidoFila[0];
            const monedaDescripcion = contenidoFila[1];
            const monedaSimbolo = contenidoFila[2];

            // Cambiar el HTML de los spans por los datos
            document.getElementById("codigo").value = monedaCodigo;
            document.getElementById("descripcion").value = monedaDescripcion;
            document.getElementById("abreviatura").value = monedaSimbolo;
        }
    });



// Añadir Vehículo del listado del modal a los datos para editar
document
    .querySelector(".main__content")
    .addEventListener("dblclick", function (event) {
        const isModalTable = event.target.closest("#vehicletable");

        if (isModalTable) {
            const fila = event.target.closest("tr");
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
    });


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
