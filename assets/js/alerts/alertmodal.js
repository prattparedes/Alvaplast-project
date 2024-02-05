function openAlertModal() {
  document.getElementById("overlay").style.display = "block";
  document.getElementById("alertModal").style.display = "block";
}

async function closeAlertModal(confirm) {
  document.getElementById("overlay").style.display = "none";
  document.getElementById("alertModal").style.display = "none";
  if (confirm) {
    registrarCompraKardex()
  } else {
    loadContent("views/ordencompra.php");
  }
}
