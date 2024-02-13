// Activar los botones/formulario y desactivarlos en Sección Facturación
document.querySelector(".main__content").addEventListener("click", function (event) {
  if (event.target.id === "newbill") {
    const botones = document.querySelectorAll('.order__btn:not(#openModalButton)');
    const botonesInactivos = document.querySelectorAll('.order__btn--inactive');
    const formularios = document.querySelectorAll("input, select");
    if (!elementosActivados) {
      botonesInactivos.forEach(function (boton) {
        boton.classList.remove('order__btn--inactive');
      });

      formularios.forEach(function (formulario) {
        formulario.removeAttribute("disabled");
      });

      botones[0].classList.add('order__btn--red');
      botones[0].innerHTML = "Cancelar orden X";
      elementosActivados = true;
    } else {
      botones.forEach(function (boton, index) {
        if (index !== 0) {
          boton.classList.add('order__btn--inactive');
        }
      });

      formularios.forEach(function (formulario) {
        formulario.setAttribute("disabled", "disabled");
      });

      botones[0].classList.remove('order__btn--red');
      botones[0].innerHTML = `Generar Orden de Venta <i class="bi bi-plus-circle"></i>`;

      elementosActivados = false;
    }

    if (buscarActivo) {
      document.getElementById('openModalButton').classList.add('order__btn--inactive');
      buscarActivo = false;
    } else {
      document.getElementById('openModalButton').classList.remove('order__btn--inactive');
      buscarActivo = true;
    }
  }
});

function mostrarFacturacion(tbodyId) {
  document.getElementById("facturable").style.display = "none";
  document.getElementById("noFacturable").style.display = "none";


  document.getElementById(tbodyId).style.display = 'table-row-group'

}

function CancelaryRestaurarFacturación() {
  onload('views/ventas/facturacion.php').then(() => {
    //RestaurarCopiaFacturación
  })
}
/*  */



/*document.querySelector(".main__content").addEventListener("click", function (event) {
  if (event.target.id == "exportarBtn") {
    const table = document.getElementById('ordertable');

    // Convierte la tabla a una hoja de cálculo
    const ws = XLSX.utils.table_to_sheet(table);

    // Crea un libro de trabajo y agrega la hoja de cálculo al libro
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, 'Hoja1');

    // Crea un archivo Excel y guarda el contenido en un blob
    const blob = XLSX.write(wb, { bookType: 'xlsx', mimeType: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', type: 'blob' });

    // Crea un enlace de descarga y simula un clic para iniciar la descarga
    const link = document.createElement('a');
    link.href = window.URL.createObjectURL(blob);
    link.download = 'datos.xlsx';
    link.click();
  }
})*/




document.querySelector(".main__content").addEventListener("click", function (event) {
  if (event.target.classList.contains("bill_submit")) {
    event.preventDefault();

    const idCaja = document.getElementById("caja").value
    const idOperacion = document.getElementById("idOperacion").value
    const idAlmacen = document.getElementById("almacen").value
    const idDocumento = document.getElementById("tipoDocumento").value
    const numeroDocumento = document.getElementById("numero1").value
    const serieDocumento = document.getElementById("numero2").value
    const tipoMovimiento = document.getElementById("tipoOperacion").value
    const monto = document.getElementById("inicial").value
    const fecha = document.getElementById("fecha2").value
    const metodo = event.target.innerHTML
    const ruc = document.getElementById("rucDni").value
    const xhr = new XMLHttpRequest();
    const url = "/Alvaplast-project/Controller/movimientos/MovimientoController.php";

    xhr.open("POST", url, true)
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    if (idCaja, idOperacion) {
      xhr.send("idCaja=" + idCaja + "&idOperacion=" + idOperacion + "&idAlmacen=" + idAlmacen + "&idDocumento=" + idDocumento + "&numeroDocumento=" + numeroDocumento + "&serieDocumento=" + serieDocumento + "&tipoMovimiento=" + tipoMovimiento + "&monto=" + monto + "&fecha=" + fecha + "&metodo=" + metodo);
    } else {
      alert("faltan datos")
    }



    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // La solicitud se completó correctamente
          // Puedes manejar la respuesta del servidor aquí
          console.log(xhr.responseText);
          //Envio de los datos de CompraProducto
          var idMovimiento = xhr.responseText;
          mandarDatosKardex(fecha, numeroDocumento, serieDocumento, idDocumento, idAlmacen, idMovimiento, monto, ruc, metodo)
        } else {
          // Hubo un error en la solicitud
          console.error('Error en la solicitud.');
        }
      }
    };
  }
});