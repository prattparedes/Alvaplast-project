function openAlertModal() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('alertModal').style.display = 'block';
  }
  
  function closeAlertModal(confirm) {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('alertModal').style.display = 'none';
    if (confirm) {
      // Lógica para "Sí"
    } else {
      // Lógica para "No"
    }
  }

function contentAlertModal(contenido) {
  const texto = document.getElementById("alertText");
  texto.innerHTML = contenido;
}

function valorAlertModal(valor) {
  return valor
}