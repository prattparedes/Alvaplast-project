document.querySelector(".main__content").addEventListener("click", function (event) {

    if (event.target.classList.contains("money_submit")) {
        event.preventDefault();
        // Obtener los datos del formulario
        const id = document.getElementById("codigo").value;
        const descripcion = document.getElementById("descripcion").value; // Obtener la descripción del formulario
        const abreviatura = document.getElementById("abreviatura").value; // Obtener la abreviatura del formulario
        const metodo = event.target.innerHTML;
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
                    alert(xhr.responseText);
                    loadModalContent("currencieslist");
                } else {
                    // Hubo un error en la solicitud
                    console.error('Error en la solicitud.');
                }
            }
        };
    }
});



document.querySelector(".main__content").addEventListener("click", function (event) {

    if (event.target.classList.contains("buy_submit")) {
        event.preventDefault();
        // Obtener los datos del formulario
        const idCompra = document.getElementById("numerocompra").innerHTML;
        const fecha = document.getElementById("fecha").value; // Obtener la descripción del formulario
        const total = document.getElementById("productTotal").innerHTML; // Obtener la abreviatura del formulario
        const subtotal = document.getElementById("productsubtotal").innerHTML;
        const igv = document.getElementById("productigv").innerHTML;
        const idMoneda = document.getElementById("moneda").value;
        const numeroDocumento = "001";
        const serieDocumento = idCompra;
        const idProveedor = document.getElementById("idproveedor").value;
        const idAlmacen = document.getElementById("almacen").value;
        const tipoPago = document.getElementById("tipoPago").value;
        const idPersonal = 2;
        const cadena = event.target.innerHTML.split(' ');
        const metodo = cadena[0];


        // Crear una solicitud XMLHttpRequest
        const xhr = new XMLHttpRequest();
        const url = "/Alvaplast-project/Controller/CompraController.php"; // Ruta del controlador PHP

        // Configurar la solicitud
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        console.log(metodo, fecha);
        if (idCompra && idAlmacen) {
            // Enviar los datos del formulario incluyendo descripcion y abreviatura
            xhr.send("idCompra=" + idCompra + "&fecha=" + fecha + "&total=" + total + "&subtotal=" + subtotal + "&igv=" + igv + "&idMoneda=" + idMoneda + "&numeroDocumento=" + numeroDocumento + "&serieDocumento=" + serieDocumento + "&idProveedor=" + idProveedor + "&idAlmacen=" + idAlmacen + "&tipoPago=" + tipoPago + "&idPersonal=" + idPersonal + "&metodo=" + metodo);

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
                    obtenerDatosTabla(idCompra, metodo);
                } else {
                    // Hubo un error en la solicitud
                    console.error('Error en la solicitud.');
                }
            }
        };
    }
});

//Función para recuperar datos de la tabla órdenes compra/venta y mandarlos al backend
function obtenerDatosTabla(idCompra, metodo) {
    const tabla = document.getElementById("ordertable");
    const filas = tabla.querySelectorAll("tbody tr");

    filas.forEach((fila) => {
        const columnas = fila.querySelectorAll("td");
        //Asignar los datos para mandar a la casa 
        const idProducto = columnas[0].textContent.trim();
        const cantidad = columnas[2].textContent.trim();
        const precioCompra = columnas[4].textContent.trim();
        const descuento = columnas[5].textContent.trim();
        const subTotal = columnas[6].textContent.trim();
        // comenzamos con el protocolo http
        const http = new XMLHttpRequest();
        const url = "/Alvaplast-project/Controller/CompraProductoController.php";
        //configuración de la solicitud
        http.open("POST", url, true);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        if (precioCompra && subTotal) {
            //Enviamos los datos al controlador
            http.send("idCompra=" + idCompra + "&idProducto=" + idProducto + "&cantidad=" + cantidad + "&precioCompra=" + precioCompra + "&descuento=" + descuento + "&subtotal=" + subTotal + "&metodo=" + metodo);
        } else {
            alert("faltan datos")
        }

        http.onreadystatechange = function () {
            if (http.readyState === XMLHttpRequest.DONE) {
                if (http.status === 200) {
                    // La solicitud se completó correctamente
                    // Puedes manejar la respuesta del servidor aquí
                    console.log(http.responseText);
                    loadContent("views/buyorder.php");
                } else {
                    // Hubo un error en la solicitud
                    console.error('Error en la insercion de los datos');
                }
            }
        }
    });

}

function RegistrarDatosTabla() {
    const tabla = document.getElementById("ordertable");
    const filas = tabla.querySelectorAll("tbody tr");
    const datos = [];

    filas.forEach((fila) => {
        const columnas = fila.querySelectorAll("td");
        const datosFila = [];

        // Obtener datos de la primera, tercera, cuarta y quinta columna
        datosFila.push(columnas[0].textContent.trim()); // Primera columna
        datosFila.push(columnas[2].textContent.trim()); // Tercera columna
        datosFila.push(columnas[4].textContent.trim()); // Cuarta columna
        datosFila.push(columnas[5].textContent.trim()); // Quinta columna
        datosFila.push(columnas[6].textContent.trim()); // Quinta columna

        datos.push(datosFila);
    });

    return datos;
}