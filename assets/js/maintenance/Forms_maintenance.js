function listarProvincia(ubigeo) {
    // Crear una solicitud XMLHttpRequest
    if (ubigeo == "0") {
        return;
    }
    const xhr = new XMLHttpRequest();
    const url = "/Alvaplast-project/Controller/maintenance_models/ubigeoController.php"; // Ruta del controlador PHP

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
                    const selectProvincia = document.getElementById("selectProvincia");

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
                console.log(xhr.responseText);
                // Hubo un error en la solicitud
                console.error("Error en la solicitud.");
            }
        }
    };
}

function listarDistrito(idprovincia) {
    // Crear una solicitud XMLHttpRequest
    const xhr = new XMLHttpRequest();
    const url = "/Alvaplast-project/Controller/maintenance_models/ubigeoController.php"; // Ruta del controlador PHP

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
                    const selectDistrito = document.getElementById("selectDistrito");

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