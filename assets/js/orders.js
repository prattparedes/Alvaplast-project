function establecerFechaHora() {
  const fecha = new Date(); // Obtener la fecha actual

  // Obtener los componentes de la fecha
  const year = fecha.getFullYear();
  const month = (fecha.getMonth() + 1).toString().padStart(2, '0'); // El mes comienza desde 0
  const day = fecha.getDate().toString().padStart(2, '0');
  const hours = fecha.getHours().toString().padStart(2, '0');
  const minutes = fecha.getMinutes().toString().padStart(2, '0');

  // Construir la cadena en el formato deseado
  const fechaHora = `${year}-${month}-${day} ${hours}:${minutes}:00`;

  // Establecer el valor en el input datetime-local
  return fechaHora;
}

