window.onload = function() {
  cargarContenido('inicio/inicio'); // Cargar contenido de "Inicio" al cargar la página
};

function cargarContenido(pagina) {
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById('contenido').innerHTML = this.responseText;
          // Reaplicar estilos y scripts si es necesario
          aplicarEstilos();
      }
  };
  xhttp.open('GET', pagina + '.html', true);
  xhttp.send();
}

function aplicarEstilos() {
  // Aquí puedes reaplicar cualquier estilo o script necesario
  // por ejemplo, si usas alguna librería JavaScript que necesita inicialización
}
