function listarProvincia(ubigeo) {
    // Crear una solicitud XMLHttpRequest
    if (ubigeo == "0") {
        return;
    }
    const xhr = new XMLHttpRequest();
    const url = "/Controller/maintenance_models/ubigeoController.php"; // Ruta del controlador PHP

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
                // Hubo un error en la solicitud
                console.error("Error en la solicitud.");
            }
        }
    };
}

function listarDistrito(idprovincia) {
    // Crear una solicitud XMLHttpRequest
    const xhr = new XMLHttpRequest();
    const url = "/Controller/maintenance_models/ubigeoController.php"; // Ruta del controlador PHP

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
    if (event.target.classList.contains("product_submit")) {
        event.preventDefault();
        // Obtener los datos del formulario
        const idProducto = document.getElementById("codigo").value;
        const idLinea = document.getElementById("linea").value;
        const idMarca = document.getElementById("marca").value;
        const idUnidad = document.getElementById("unidad").value;
        const nombre = document.getElementById("nombre").value;
        const procedencia = document.getElementById("procedencia").value;
        const checkbox = document.getElementById("estado");
        var estado;
        if (checkbox.checked) {
            estado = checkbox.value;
        } else {
            estado = "0";
        }
        const precio_venta = document.getElementById("precioVenta").value
        const precio_compra = document.getElementById("precioCompra").value
        const descripcion = document.getElementById("descripcion").value;
        const stockmin = document.getElementById("stockMinimo").value
        const stockmax = document.getElementById("stockMaximo").value
        const volumen = document.getElementById("volumen").value
        const idMoneda = document.getElementById("moneda").value
        const mod = document.getElementById("metodo").value;
        if (mod == "0" || !mod || mod == "") {
            var metodo = event.target.innerHTML;
        } else {
            var metodo = mod
        }
        // Crear una solicitud XMLHttpRequest
        const xhr = new XMLHttpRequest();
        const url = "/Controller/maintenance_models/ProductoController.php"; // Ruta del controlador PHP

        // Configurar la solicitud
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        if (idLinea) {
            // Enviar los datos del formulario incluyendo descripcion y abreviatura
            xhr.send("idProducto=" + idProducto + "&idLinea=" + idLinea + "&idMarca=" + idMarca + "&idUnidad=" + idUnidad + "&nombre=" + nombre + "&procedencia=" + procedencia + "&estado=" + estado + "&precio_venta=" + precio_venta + "&precio_compra=" + precio_compra + "&descripcion=" + descripcion + "&stockmin=" + stockmin + "&stockmax=" + stockmax + "&metodo=" + metodo + "&volumen=" + volumen + "&idMoneda=" + idMoneda);
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
                    loadContent("views/modals/maintenance_modals/productosModel.php")
                    botónNuevoMantenimiento();
                } else {
                    // Hubo un error en la solicitud
                    console.error('Error en la solicitud.');
                }
            }
        };
    }
});
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
        const mod = document.getElementById("metodo").value

        if (mod == "modificar") {
            var metodo = mod
        } else {
            var metodo = event.target.innerHTML;
        }
        // Crear una solicitud XMLHttpRequest
        const xhr = new XMLHttpRequest();
        const url = "/Controller/maintenance_models/ClienteController.php"; // Ruta del controlador PHP

        // Configurar la solicitud
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
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
                    loadContent('views/modals/maintenance_modals/clienteModel.php');

                } else {
                    // Hubo un error en la solicitud
                    console.error('Error en la solicitud.');
                }
            }
        };
    }
});

//Funcion para mandar datos al ProveedorController
document.querySelector(".main__content").addEventListener("click", function (event) {

    if (event.target.classList.contains("provider_submit")) {
        event.preventDefault();
        // Obtener los datos del formulario
        const idProveedor = document.getElementById("codigo").value;
        const idUbigeo = document.getElementById("distrito").value;
        const razonSocial = document.getElementById("razonSocial").value;
        const ruc = document.getElementById("ruc").value;
        const direccion = document.getElementById("direccion").value;
        const telefono = document.getElementById("telefono").value;
        const fax = document.getElementById("fax").value;
        const contacto = document.getElementById("contacto").value;
        const email = document.getElementById("email").value;
        //const descripcion = document.getElementById("descripcion").value;
        const checkbox = document.getElementById("estado");
        var estado = (checkbox.checked) ? checkbox.value : "0";
        const mod = document.getElementById("metodo").value
        if (mod == "modificar") {
            var metodo = mod
        } else {

            var metodo = event.target.innerHTML;
        }
        // Crear una solicitud XMLHttpRequest
        const xhr = new XMLHttpRequest();
        const url = "/Controller/maintenance_models/ProveedorController.php"; // Ruta del controlador PHP

        // Configurar la solicitud
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        if (razonSocial) {
            // Enviar los datos del formulario incluyendo descripcion y abreviatura
            xhr.send("idProveedor=" + idProveedor + "&idUbigeo=" + idUbigeo + "&razonSocial=" + razonSocial + "&ruc=" + ruc + "&direccion=" + direccion + "&telefono=" + telefono + "&fax=" + fax + "&contacto=" + contacto + "&email=" + email + "&estado=" + estado + "&metodo=" + metodo);
        } else {
            //"&descripcion=" + descripcion
            alert("faltan datos")
        }
        // Manejar la respuesta del servidor
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // La solicitud se completó correctamente
                    // Puedes manejar la respuesta del servidor aquí
                    alert(xhr.responseText);
                    loadContent('views/modals/maintenance_modals/proveedorModel.php');
                } else {
                    // Hubo un error en la solicitud
                    console.error('Error en la solicitud.');
                }
            }
        };
    }
});

//Funcion para mandar datos al lineaController
document.querySelector(".main__content").addEventListener("click", function (event) {

    if (event.target.classList.contains("line_submit")) {
        event.preventDefault();
        // Obtener los datos del formulario
        const idLinea = document.getElementById("codigo").value;
        const descripcion = document.getElementById("descripcion").value; // Obtener la descripción del formulario // Obtener la abreviatura del formulario
        const mod = document.getElementById("metodo").value
        if (mod == "modificar") {
            var metodo = mod
        } else {

            var metodo = event.target.innerHTML;
        }
        // Crear una solicitud XMLHttpRequest
        const xhr = new XMLHttpRequest();
        const url = "/Controller/maintenance_models/LineaController.php"; // Ruta del controlador PHP

        // Configurar la solicitud
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        if (descripcion) {
            // Enviar los datos del formulario incluyendo descripcion y abreviatura
            xhr.send("idLinea=" + idLinea + "&descripcion=" + descripcion + "&metodo=" + metodo);
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
                    loadContent('views/modals/maintenance_modals/productolineaModel.php');
                } else {
                    // Hubo un error en la solicitud
                    console.error('Error en la solicitud.');
                }
            }
        };
    }
});

//Formulario de envio de datos para la marcaController
document.querySelector(".main__content").addEventListener("click", function (event) {

    if (event.target.classList.contains("brand_submit")) {
        event.preventDefault();
        // Obtener los datos del formulario
        const idMarca = document.getElementById("codigo").value;
        const descripcion = document.getElementById("descripcion").value;
        const mod = document.getElementById("metodo").value
        if (mod == "modificar") {
            var metodo = mod
        } else {
            var metodo = event.target.innerHTML;
        }
        // Crear una solicitud XMLHttpRequest
        const xhr = new XMLHttpRequest();
        const url = "/Controller/maintenance_models/MarcaController.php"; // Ruta del controlador PHP

        // Configurar la solicitud
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        if (descripcion) {
            // Enviar los datos del formulario incluyendo descripcion y abreviatura
            xhr.send("idMarca=" + idMarca + "&descripcion=" + descripcion + "&metodo=" + metodo);
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
                    loadContent('views/modals/maintenance_modals/productosmarcaModel.php');
                } else {
                    // Hubo un error en la solicitud
                    console.error('Error en la solicitud.');
                }
            }
        };
    }
});
//Formulario de envio de datos para la unidadontroller
document.querySelector(".main__content").addEventListener("click", function (event) {

    if (event.target.classList.contains("unit_submit")) {
        event.preventDefault();
        // Obtener los datos del formulario
        const idMarca = document.getElementById("codigo").value;
        const abreviatura = document.getElementById("abreviatura").value;
        const descripcion = document.getElementById("descripcion").value;
        const mod = document.getElementById("metodo").value;
        if (mod == "modificar") {
            var metodo = mod
        } else {
            var metodo = event.target.innerHTML
        }
        // Crear una solicitud XMLHttpRequest
        const xhr = new XMLHttpRequest();
        const url = "/Controller/maintenance_models/UnidadController.php"; // Ruta del controlador PHP

        // Configurar la solicitud
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        if (descripcion && descripcion) {
            // Enviar los datos del formulario incluyendo descripcion y abreviatura
            xhr.send("idUnidad=" + idMarca + "&abreviatura=" + abreviatura + "&descripcion=" + descripcion + "&metodo=" + metodo);
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
                    loadContent('views/modals/maintenance_modals/productounidadModel.php');
                } else {
                    // Hubo un error en la solicitud
                    console.error('Error en la solicitud.');
                }
            }
        };
    }
});

//Formulario de envio de datos para la moneda Controller
document.querySelector(".main__content").addEventListener("click", function (event) {

    if (event.target.classList.contains("money_submit")) {
        event.preventDefault();
        // Obtener los datos del formulario
        const id = document.getElementById("codigo").value;
        const descripcion = document.getElementById("descripcion").value; // Obtener la descripción del formulario
        const abreviatura = document.getElementById("abreviatura").value; // Obtener la abreviatura del formulario
        if (abreviatura.includes('&')) {
            return alert('el caracter & no es valido para la abreviatura')
        }
        const mod = document.getElementById("metodo").value
        if (mod == "modificar") {
            var metodo = mod
        } else {
            var metodo = event.target.innerHTML;
        }
        // Crear una solicitud XMLHttpRequest
        const xhr = new XMLHttpRequest();
        const url = "/Controller/maintenance_models/MonedaController.php"; // Ruta del controlador PHP

        // Configurar la solicitud
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

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
                    alert(xhr.responseText);
                    loadContent('views/modals/maintenance_modals/monedaModel.php');
                } else {
                    // Hubo un error en la solicitud
                    console.error('Error en la solicitud.');
                }
            }
        };
    }
});
//Formulario de envio de datos para el sucursal Controller
document.querySelector(".main__content").addEventListener("click", function (event) {

    if (event.target.classList.contains("branch_submit")) {
        event.preventDefault();
        // Obtener los datos del formulario
        const idSucursal = document.getElementById("codigo").value;
        const descripcion = document.getElementById("descripcion").value; // Obtener la descripción del formulario
        const direccion = document.getElementById("direccion").value;   // Obtener la abreviatura del formulario
        const telefono = document.getElementById("telefono").value;
        const mod = document.getElementById("metodo").value
        if (mod == "modificar") {
            var metodo = mod
        } else {
            var metodo = event.target.innerHTML
        }

        // Crear una solicitud XMLHttpRequest
        const xhr = new XMLHttpRequest();
        const url = "/Controller/maintenance_models/SucursalController.php"; // Ruta del controlador PHP

        // Configurar la solicitud
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        if (descripcion && direccion && telefono) {
            // Enviar los datos del formulario incluyendo descripcion y abreviatura
            xhr.send("idSucursal=" + idSucursal + "&descripcion=" + descripcion + "&direccion=" + direccion + "&telefono=" + telefono + "&metodo=" + metodo);
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
                    loadContent('views/modals/maintenance_modals/sucursalModel.php');
                } else {
                    // Hubo un error en la solicitud
                    console.error('Error en la solicitud.');
                }
            }
        };
    }
});
//Formulario de envio de datos para el almacen Controller
document.querySelector(".main__content").addEventListener("click", function (event) {

    if (event.target.classList.contains("store_submit")) {
        event.preventDefault();
        // Obtener los datos del formulario
        const id_almacen = document.getElementById("codigo").value;   // Obtener la abreviatura del formulario
        const idSucursal = document.getElementById("sucursal").value;
        const descripcion = document.getElementById("descripcion").value; // Obtener la descripción del formulario
        const codFAct = document.getElementById("facturacion").value;
        const mod = document.getElementById("metodo").value
        if (mod == "modificar") {
            var metodo = mod
        } else {
            var metodo = event.target.innerHTML;
        }

        // Crear una solicitud XMLHttpRequest
        const xhr = new XMLHttpRequest();
        const url = "/Controller/maintenance_models/AlmacenController.php"; // Ruta del controlador PHP

        // Configurar la solicitud
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        if (descripcion) {
            // Enviar los datos del formulario incluyendo descripcion y abreviatura
            xhr.send("idAlmacen=" + id_almacen + "&idSucursal=" + idSucursal + "&descripcion=" + descripcion + "&metodo=" + metodo + "&cod_facturacion=" + codFAct);
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
                    loadContent('views/modals/maintenance_modals/almacenModel.php');
                } else {
                    // Hubo un error en la solicitud
                    console.error('Error en la solicitud.');
                }
            }
        };
    }
});

//Formulario de envio de datos para el vehiculo Controller
document.querySelector(".main__content").addEventListener("click", function (event) {

    if (event.target.classList.contains("vehicle_submit")) {
        event.preventDefault();
        // Obtener los datos del formulario
        const idVehiculo = document.getElementById("codigo").value;   // Obtener la abreviatura del formulario
        const placa = document.getElementById("placa").value;
        const tipo_vehiculoSelect = document.getElementById("tipo");
        const tipo_vehiculo = tipo_vehiculoSelect.options[tipo_vehiculoSelect.selectedIndex].text;
        const marcaSelect = document.getElementById("marca");
        const marca = marcaSelect.options[marcaSelect.selectedIndex].text;
        const modelo = document.getElementById("modelo").value;
        const mod = document.getElementById("metodo").value
        if (mod == "modificar") {
            var metodo = mod
        } else {

            var metodo = event.target.innerHTML;
        }

        // Crear una solicitud XMLHttpRequest
        const xhr = new XMLHttpRequest();
        const url = "/Controller/maintenance_models/VehiculoController.php"; // Ruta del controlador PHP

        // Configurar la solicitud
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        if (placa) {
            // Enviar los datos del formulario incluyendo descripcion y abreviatura
            xhr.send("idVehiculo=" + idVehiculo + "&placa=" + placa + "&marca=" + marca + "&modelo=" + modelo + "&tipo=" + tipo_vehiculo + "&metodo=" + metodo);
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
                    loadContent('views/modals/maintenance_modals/vehiculoModel.php');
                } else {
                    // Hubo un error en la solicitud
                    console.error('Error en la solicitud.');
                }
            }
        };
    }
});

//Formulario de envio de datos para el documento Controller
document.querySelector(".main__content").addEventListener("click", function (event) {

    if (event.target.classList.contains("document_submit")) {
        event.preventDefault();
        // Obtener los datos del formulario
        const idDocumento = document.getElementById("codigo").value;   // Obtener la abreviatura del formulario
        const abreviatura = document.getElementById("abreviatura").value;
        if (abreviatura.includes("&")) {
            return alert("no puede usar el caracter & para la abreviatura")
        }
        const descripcion = document.getElementById("descripcion").value;
        const mod = document.getElementById("metodo").value
        if (mod == "modificar") {
            var metodo = mod
        } else {
            var metodo = event.target.innerHTML;
        }

        // Crear una solicitud XMLHttpRequest
        const xhr = new XMLHttpRequest();
        const url = "/Controller/maintenance_models/DocumentoController.php"; // Ruta del controlador PHP

        // Configurar la solicitud
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        if (abreviatura) {
            // Enviar los datos del formulario incluyendo descripcion y abreviatura
            xhr.send("idDocumento=" + idDocumento + "&abreviatura=" + abreviatura + "&descripcion=" + descripcion + "&metodo=" + metodo);
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
                    loadContent('views/modals/maintenance_modals/documentoModel.php');
                } else {
                    // Hubo un error en la solicitud
                    console.error('Error en la solicitud.');
                }
            }
        };
    }
});
//Formulario de envio de datos para el TransportistaController
document.querySelector(".main__content").addEventListener("click", function (event) {

    if (event.target.classList.contains("carrier_submit")) {
        event.preventDefault();
        // Obtener los datos del formulario
        const idTrans = document.getElementById("codigo").value;
        const nombre = document.getElementById("nombres").value;
        const ap_paterno = document.getElementById("paterno").value;
        const ap_materno = document.getElementById("materno").value;
        const dni = document.getElementById("dni").value;
        const ruc = document.getElementById("ruc").value;
        const licencia = document.getElementById("licencia").value;
        const direccion = document.getElementById("direccion").value;
        const telefono = document.getElementById("telefono").value;
        const celular = document.getElementById("celular").value;
        const estado = "A";
        const mod = document.getElementById("metodo").value
        if (mod == "modificar") {
            var metodo = mod
        } else {
            var metodo = event.target.innerHTML;
        }
        // Crear una solicitud XMLHttpRequest
        const xhr = new XMLHttpRequest();
        const url = "/Controller/maintenance_models/TransportistaController.php"; // Ruta del controlador PHP

        // Configurar la solicitud
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        if (nombre) {
            // Enviar los datos del formulario incluyendo descripcion y abreviatura
            xhr.send("idTrans=" + idTrans + "&nombre=" + nombre + "&ap_paterno=" + ap_paterno + "&ap_materno=" + ap_materno + "&dni=" + dni + "&ruc=" + ruc + "&licencia=" + licencia + "&direccion=" + direccion + "&telefono=" + telefono + "&celular=" + celular + "&estado=" + estado + "&metodo=" + metodo);
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
                    loadContent('views/modals/maintenance_modals/transportistaModel.php');
                } else {
                    // Hubo un error en la solicitud
                    console.error('Error en la solicitud.');
                }
            }
        };
    }
});
