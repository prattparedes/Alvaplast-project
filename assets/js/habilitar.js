
  // Verificar si el botón debería estar habilitado al cargar la página
  window.onload = function() {
    var botonHabilitado = getCookie("botonHabilitado");
    if (botonHabilitado === "true") {
      document.getElementById("btnRegister").removeAttribute("disabled");
    }
  };

  function nuevaOrdenCompras() {
    // Habilitar el botón y almacenar el estado en una cookie
    document.getElementById("btnRegister").removeAttribute("disabled");
    setCookie("botonHabilitado", "true");
  }

  // Función para establecer una cookie
  function setCookie(name, value) {
    document.cookie = name + "=" + value + "; path=/";
  }

  // Función para obtener el valor de una cookie
  function getCookie(name) {
    var cookieName = name + "=";
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
      var cookie = cookies[i].trim();
      if (cookie.indexOf(cookieName) === 0) {
        return cookie.substring(cookieName.length, cookie.length);
      }
    }
    return "";
  }
