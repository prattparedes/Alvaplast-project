document.querySelector(".main__content").addEventListener("click", function (event) {

    if (event.target.id === "money_submit") {
        event.preventDefault();
        // Obtener los datos del formulario
        const id = document.getElementById("id").value;
        const descripcion = document.getElementById("descripcion").value; // Obtener la descripción del formulario
        const abreviatura = document.getElementById("abreviatura").value; // Obtener la abreviatura del formulario
        const boton = document.getElementById("money_submit");
        const metodo = boton.innerHTML;
        // Crear una solicitud XMLHttpRequest
        const xhr = new XMLHttpRequest();
        const url = "/Alvaplast-project/Controller/MonedaController.php"; // Ruta del controlador PHP

        // Configurar la solicitud
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        console.log()
        if (descripcion && abreviatura) {
            // Enviar los datos del formulario incluyendo descripcion y abreviatura
            xhr.send("descripcion=" + descripcion + "&abreviatura=" + abreviatura + "&metodo=" + metodo + "&id=" + id);
        } else {
            alert("faltan datos")
        }
        // Manejar la respuesta del servidor
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // La solicitud se completó correctamente
                    // Puedes manejar la respuesta del servidor aquí
                    if (xhr.responseText != "1") {
                        alert('Hubo un error al registrar' + xhr.responseText);
                        document.getElementById('descripcion').value = "";
                        document.getElementById('abreviatura').value = "";
                        console.log(xhr.responseText)
                    } else {
                        alert("Moneda Registrada");
                        loadModalContent("currencieslist");
                    }

                } else {
                    // Hubo un error en la solicitud
                    console.error('Error en la solicitud.');
                }
            }
        };
    }
});