function loadContent(page) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.querySelector(".main__content").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", page, true);
  xhttp.send();
  productosAgregados = [];
}
