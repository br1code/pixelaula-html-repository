$(document).ready(function() {
	// Crear funcion que genera el boton de inicio y pantalla principal
	
	function pantallaInicial() {
		pntInicial = "<p class='h3 text-center main-button-container'>¿Estás listo?... Juguemos<br><br><br><a class='btn btn-outline btn-xl start-button' href='#' role='button'>Comenzar desafío</a></p>";
		$(".mainArea").html(pntInicial);
	}
	
	pantallaInicial();
	
	//crear funcion, generarHTML(), que se dispare al apretar el boton inciar y genere la trivia
	
	$("body").on("click", ".start-button", function(event){
		event.preventDefault();
		mezclarOpciones(arrPreguntas,arrOpciones,arrImagenes,respuestasCorrectas);
		clickSound.play();
		generarHTML();
		temporizador();
		
	}); // cierro boton start
	
	$("body").on("click", ".answer", function(event){
		clickSound.play();
		respuestaElegida = $(this).text();
		if(respuestaElegida === respuestasCorrectas[contPreguntas]) {
			clearInterval(reloj);
			generateWin();
		}
		else {
			clearInterval(reloj);
			generateLoss();
		}
	}); // cierro .answer click
	
	$("body").on("click", ".reset-button", function(event){
		clickSound.play();
		resetearJuego();
	}); // cierro reset-button click
	
});  

function perderPorTiempo() {
	cuentaSinRespuesta++;
	triviaHTML = "<p class='text-center timer-p'>Tiempo restante: <span class='timer'>" + tiempo + "</span></p>" + "<p class='text-center'>Se terminó el tiempo, amigo!  La respuesta correcta era: " + respuestasCorrectas[contPreguntas] + "</p>" + "<img class='center-block img-wrong' src='img/x.png'>";
	$(".mainArea").html(triviaHTML);
	setTimeout(esperar, 4000);  //  4000ms (4s) hasta que muestra proxima pregunta
}

function generateWin() {
	correctaSound.play();
	cuentaCorrectas++;
	triviaHTML = "<p class='text-center timer-p'>Tiempo restante: <span class='timer'>" + tiempo + "</span></p>" + "<p class='text-center'>Correcto! La respuesta es: " + respuestasCorrectas[contPreguntas] + "</p><img class='center-block img-right' src='preg_img/" + arrImagenes[contPreguntas] + "'>" ;
	$(".mainArea").html(triviaHTML);
	setTimeout(esperar, 4000);  //  4000ms (4s) hasta que muestra proxima pregunta
}

function generateLoss() {
	incorrectaSound.play()
	cuentaIncorrectas++;
	triviaHTML = "<p class='text-center timer-p'>tiempo restante: <span class='timer'>" + tiempo + "</span></p>" + "<p class='text-center'>Ay... casi! La respuesta era: "+ respuestasCorrectas[contPreguntas] + "</p>" + "<img class='center-block img-wrong' src='img/x.png'>";
	$(".mainArea").html(triviaHTML);
	setTimeout(esperar, 4000); //  4000ms (4s) hasta que muestra proxima pregunta
}

function generarHTML() {
	triviaHTML = "<p class='text-center timer-p'>Tiempo restante: <span class='timer'>30</span><div style='text-align: center'></p><p class='text-center'>" + arrPreguntas[contPreguntas] + "</p><p class='first-answer answer'>A. " + arrOpciones[contPreguntas][0] + "</p><p class='answer'>B. "+arrOpciones[contPreguntas][1]+"</p><p class='answer'>C. "+arrOpciones[contPreguntas][2]+"</p><p class='answer'>D. "+arrOpciones[contPreguntas][3]+"</p></div>";
	$(".mainArea").html(triviaHTML);
}

function esperar() {
	if (contPreguntas < 7) {
		contPreguntas++;
		generarHTML();
		tiempo = 30;
		temporizador();
	}
	else {
		pantallaFinal();
	}
}

function temporizador() {
	reloj = setInterval(()=>{
		if (tiempo === 0) {
			clearInterval(reloj);
			perderPorTiempo();
		}
		if (tiempo > 0) {
			tiempo--;
		}
		$(".timer").html(tiempo);
	}, 1000);
}

function pantallaFinal() {
	//triviaHTML = "<p class='text-center timer-p'>Tiempo restante: <span class='timer'>" + tiempo + "</span></p>" + "<p class='text-center'>Listo!<br>A ver como te fue..." + "</p>" + "<p class='summary-correct'>Correctas: " + cuentaCorrectas + "</p>" + "<p>Incorrectas: " + cuentaIncorrectas + "</p>" + "<p>Sin contestar: " + cuentaSinRespuesta + "</p>" + "<p class='text-center reset-button-container'><a class='btn btn-outline btn-xl reset-button' href='#' role='button'>Jugar de vuelta!</a></p>";
	triviaHTML = "<p class='text-center timer-p'>Tiempo restante: <span class='timer'>" + tiempo + "</span></p>" + "<p class='text-center'>Listo!<br>A ver como te fue..." + "</p>" + calcEsterellas(cuentaCorrectas) + "<p class='summary-correct'>Correctas: " + cuentaCorrectas + "<br>Sin contestar: " + cuentaSinRespuesta + "</p>"+ "<p class='text-center reset-button-container'><a class='btn btn-outline btn-xl reset-button' href='#' role='button'>Jugar de vuelta!</a></p>";
	//triviaHTML += ; 
	$(".mainArea").html(triviaHTML);
}

function resetearJuego() {
	contPreguntas = 0;
	cuentaCorrectas = 0;
	cuentaIncorrectas = 0;
	cuentaSinRespuesta = 0;
	tiempo = 30;
	generarHTML();
	temporizador();
}


function cargaDesdeBD(php, db_col) {
	var xhttp;    
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if(db_col ==="pregunta"){arrPreguntas = this.responseText.split("|");}
			else if(db_col === "archivo_img"){arrImagenes = this.responseText.split("|");}
			else if(db_col === "opcion_correcta"){respuestasCorrectas = this.responseText.split("|");}
		}
	};
	xhttp.open("GET", php + "?db_col="+ db_col , true);
	xhttp.send();
}

function cargarOpciones() {
	var xhttp;
	arrOpciones = [];
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			this.responseText.split("|")
			.forEach(opc=>{
				arrOpciones.push(opc.split(","))
			});
		}
	};
	xhttp.open("GET", "scripts/cargarOpciones.php" , true);
	xhttp.send();
}
function mezclarOpciones(a, b, c, d) {
	for (let i = a.length - 1; i > 0; i--) {
		const j = Math.floor(Math.random() * (i + 1));
		[a[i], a[j]] = [a[j], a[i]];
		[b[i], b[j]] = [b[j], b[i]];
		[c[i], c[j]] = [c[j], c[i]];
		[d[i], d[j]] = [d[j], d[i]];
	}
}
function calcEsterellas(correctas){
	if (correctas === 0)
	{
		return "";		
	} else if (correctas >= 1 && correctas < 3) {
		return "<div style='text-align:center'><img src='img/est.png' height='90rem'></div>";
	} else if(correctas >= 3 && correctas < 8){
		return "<div style='text-align:center'><img src='img/est.png' height='90rem'><img src='img/est.png' height='90rem'></div>"
	} else if (correctas === 8) {
		return "<div style='text-align:center'><img src='img/est.png' height='90rem'><img src='img/est.png' height='90rem'><img src='img/est.png' height='90rem'></div>"
	}
}

//DECLARACION DE VARIABLES GLOBALES
var pntInicial;
var triviaHTML;
var tiempo = 30;
var contPreguntas = 0;
var respuestaElegida;
var reloj;
var cuentaCorrectas = 0;
var cuentaIncorrectas = 0;
var cuentaSinRespuesta = 0;
var clickSound = new Audio("sound/button-click.mp3");
var correctaSound = new Audio("sound/iajuu.mp3");
var incorrectaSound = new Audio("sound/no.mp3");
//CARGA DE PREGUNTAS Y RESPUESTAS DESDE BASE DE DATOS
cargaDesdeBD("scripts/cargarPreguntas.php", "pregunta");
cargaDesdeBD("scripts/cargarPreguntas.php", "opcion_correcta");
cargaDesdeBD("scripts/cargarPreguntas.php", "archivo_img");
cargarOpciones();