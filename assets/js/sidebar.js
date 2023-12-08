const links = document.querySelectorAll('.nav-pills a')

links.forEach(link => {
  link.addEventListener('click', function (event) {
    event.preventDefault(); // Evita el comportamiento predeterminado del enlace

    // Recorre todos los enlaces y elimina la clase "active" y agrega "text-white"
    links.forEach(otherLink => {
      otherLink.classList.remove('active');
      otherLink.classList.add('text-white');
    });

    // Agrega la clase "active" y elimina "text-white" al enlace clickeado
    this.classList.add('active');
    this.classList.remove('text-white');
  });
});

function loadContent(page) {
  // Realiza una petición AJAX para cargar el contenido de la página
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.querySelector('.main__content').innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", page, true);
  xhttp.send();
}