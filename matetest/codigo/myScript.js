var intervalo, i, puntaje, ecuacionString;


function carga() {
    i = 30;
    puntaje = 0;
    intervalo = setInterval(juego, 1000);
    ajaxEcuacion();
}


function juego() {
    document.getElementById("contador").innerHTML = "Tiempo Restante: " + i;
    i--;
    if (i == 0) {
        clearInterval(intervalo);
        reintentar();
    }
}


function calcular() {
    if (document.getElementById("cajaTxt").value == ecuacionString[1]) {
        puntaje += i;
        document.getElementById("puntaje").innerHTML = "Puntaje = " + puntaje;
        ajaxEcuacion();
        i = 30;
    } else {
        clearInterval(intervalo);
        reintentar();
    }
    document.getElementById("cajaTxt").value = '';
    document.getElementById("cajaTxt").focus();
}


function checkEnter() {
    if (event.keyCode === 13) {
        document.getElementById("boton").click();
    }
}


function reintentar() {
    if (document.getElementById("reintentar").style.display != "block") {
        document.getElementById("reintentar").style.display = "block";
        document.getElementById("pantalla").style.display = "none";
	} else {
        document.getElementById("reintentar").style.display = "none";
        document.getElementById("pantalla").style.display = "block";
        document.getElementById("puntaje").innerHTML = "Puntaje = 0";
    }
}
/*      AJAX DE ACA PARA ABAJO      */
function ajaxCargaJuego (url) {
    url = url
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("juego").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST", "paginas/" + url, true);
    xhttp.send();
}


function ajaxTema (url) {
    url = url
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("temaDiv").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST", "paginas/" + url, true);
    xhttp.send();
}


function ajaxEcuacion() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        ecuacionString = JSON.parse(this.responseText);
        document.getElementById("ecuacion").innerHTML = ecuacionString[0];

      }
    };
    xmlhttp.open("POST", "codigo/getEcuacion.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("temaJuego=" + document.getElementById("temaHeader").innerHTML);
}
