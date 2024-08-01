function mostrarMenu() {
    var barra = document.getElementById("barraNavegacao");
    if (barra.className === "barranavegacao") {
       barra.className += " responsivo";
    } else {
       barra.className = "barranavegacao";
    }
 }