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

//Formulario de envio de datos para el ClienteController
document.querySelector(".main__content").addEventListener("click", function (event) {

    if (event.target.classList.contains("client_submit")) {
        event.preventDefault();
        // Obtener los datos del formulario
        const idCliente = document.getElementById("codigo").value;
        const razonSocial = document.getElementById("razonSocial").value;
        const ruc = document.getElementById("ruc").value;
        const dni = document.getElementById("dni").value;
        const direccion = document.getElementById("direccion").value;
        const telefono = document.getElementById("telefono").value;
        const celular = document.getElementById("celular").value;
        const estado = document.getElementById("estado").value;
        const tipoCliente = document.getElementById("tipoCliente").value;
        const distritoOption = document.getElementById("distrito");
        const distrito = distritoOption.options[distritoOption.selectedIndex].text;
        const idUbigeo = distritoOption.value;
        const metodo = event.target.innerHTML;
        // Crear una solicitud XMLHttpRequest
        const xhr = new XMLHttpRequest();
        const url = "/Alvaplast-project/Controller/maintenance_models/ClienteController.php"; // Ruta del controlador PHP

        // Configurar la solicitud
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        console.log()
        if (razonSocial && dni) {
            // Enviar los datos del formulario incluyendo descripcion y abreviatura
            xhr.send("idCliente=" + idCliente + "&razonSocial=" + razonSocial + "&ruc=" + ruc + "&dni=" + dni + "&direccion=" + direccion + "&telefono=" + telefono + "&celular=" + celular + "&estado=" + estado + "&tipoCliente=" + tipoCliente + "&distrito=" + distrito + "&idUbigeo=" + idUbigeo + "&metodo=" + metodo);
        } else {
            alert("faltan datos")
        }
        // Manejar la respuesta del servidor
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // La solicitud se completó correctamente
                    // Puedes manejar la respuesta del servidor aquí
                    alert(xhr.responseText);
                    loadMaintenanceContent('clientmodal');

                } else {
                    // Hubo un error en la solicitud
                    console.error('Error en la solicitud.');
                }
            }
        };
    }
});