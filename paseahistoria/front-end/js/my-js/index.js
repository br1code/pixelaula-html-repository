function startChapter(info) {
    if (typeof info !== 'undefined') {

    } else {
        info = "intro";
    }
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200)
		{
			window.location.href = "/paseahistoria/HTML/history-main.html";
		}
	};
    xmlhttp.open("POST","/paseahistoria/history/chapters-class/prepareChapter.php");
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xmlhttp.send("info=" + info);
}

function updateName(name) {
	if (name === undefined || name === null || name === "undefined" || name === ""){
		return;
	}

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200)
		{
			document.getElementById("username").innerHTML="¡Hola " + name + "!";
			document.getElementById("TellUsYourName").innerHTML = "¿No sos " + name + "? Cambiar nombre:";
			document.getElementById("username-input").value = null;
		}
	};
    xmlhttp.open("POST","/paseahistoria/server-logic/userInfo.php");
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xmlhttp.send("name=" + name);
}

function checkName() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200)
		{
			name = JSON.parse(this.responseText);
			if (name == "false") {
				return;
			} else {
				updateName(name);
			}
		}
	};
    xmlhttp.open("POST","/paseahistoria/server-logic/userProvide.php");
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xmlhttp.send();
}