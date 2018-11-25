function goToEraMenu() {
    window.location.href = "eraMenu.html";
}

function waitAndCall() {
    setTimeout(getObject(), 500);
}

function getObject() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200)
		{
            elements = JSON.parse(this.responseText);
            updateFinishScreen(elements);
		}
	};
    xmlhttp.open("POST","/paseahistoria/server-logic/userInfo.php");
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xmlhttp.send();
}

function updateFinishScreen(elements) {
	document.getElementById("congratulations").innerHTML = "¡Felicitaciones " + elements[0] + "!";
	document.getElementById("congratulations-upper-text").innerHTML = "Conseguiste una parte de: " + elements[1];
	document.getElementById('trophy-object').src="../front-end/images/objects/" + elements[2] + ".png";
	document.getElementById('congratulations-lower-text').innerHTML= elements[3];
}