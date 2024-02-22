
//Función para recuperar datos de la tabla órdenes compra/venta y mandarlos al backend


/*function RegistrarDatosTabla() {
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
}*/


const facturaData = {
    numero: Number,
    producto: String,
    cantidad: Number,
    precio: Number,
    fecha: Date,
    cliente: String,
    total: Number
}


let factura = {

}

const generarPDF = () => {
    const pdf = new JsPDF();

}