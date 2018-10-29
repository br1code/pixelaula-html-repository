
//En esta linea estan los id de las respuestas correctas

$imagenesPaises = ["Rusia", "Japon", "Francia", "Mexico", "Alemania", "Argentina", "Australia", "Italia", "Portugal", "Sudafrica","China", "España", "Brasil", "Canada", "Grecia", "Egipto", "Estados Unidos", "Cuba", "Monaco", "Peru", "Turquia", "Holanda","Ucrania", "Korea del Sur","Nigeria", "India", "Panama", "Marruecos", "Gran Bretania", "Finlandia", "Fin del juego"];


var num = 0;
document.getElementById("imagen").src = "img/imagen" + num + ".jpg";

var elemento = document.getElementById("imagen");

    elemento.className = $imagenesPaises[num];


if(document.getElementById("imagen").src != "imagen1.jpg"){
	document.getElementById($imagenesPaises[num]).style.display = 'block';
}

function verificarRespuesta(resp){
	num++;

	if(num <= 30){

		//Cambia las respuestas y las imagenes
		document.getElementById("imagen").src = "img/imagen" + num + ".jpg";
	
		var elemento = document.getElementById("imagen");
		elemento.className = $imagenesPaises[num];
		//imagen.src = "imagen" + num + ".jgp";
		
		//Este FOR es para ir pasando las imagenes
		for(i = 0 ; i <= 30 ; i++){
			if(i != num){
				document.getElementById($imagenesPaises[i]).style.display = 'none';
			}
			
		}
		
		document.getElementById($imagenesPaises[num]).style.display = 'block';

		//validando la respuesta
		if(resp.name == resp.value){
			console.log('correcto');
			alert("Respuesta correcta");
		}else{
			console.log('Incorrecto');
			alert("Respuesta incorrecta");
		}
	}else{

		/*se terminaron las imagenes,y el juego notifica el fin de juego
		y automaticamente envia al usuario al menu de inicio*/
		
		

		document.getElementById($imagenesPaises[i-1]).style.display = 'none';

		alert("Gracias por jugarlo");
		num = 30;

		location.href ="index.html";
	}
 
	

	
}



