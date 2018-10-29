var audio = new Audio('bep.wav');
var audio2 = new Audio('beep2.wav');
var audio3 = new Audio('beep3.wav');
var correcto = new Audio('correcto.wav');
var error = new Audio('error.mp3');

var droppedIn = false;

function drag_start(event){
   event.dataTransfer.dropEffect = "move";
   event.dataTransfer.setData("text", event.target.getAttribute('id') );
}

function drag_enter(event) {
    //Np se usa, posible funcion a agregar.
}

function drag_leave(event){
    event.preventDefault();
}

function drag_drop(event){
    audio2.play();
    event.preventDefault();
    var elem_id = event.dataTransfer.getData("text");
    event.target.appendChild( document.getElementById(elem_id) );
    document.getElementById(elem_id).removeAttribute("draggable");
    document.getElementById(elem_id).style.cursor = "default";
    droppedIn = true;
}

function drag_end(event){
    //No se usa, posible funcion a agregar.
    if(droppedIn == false){
    }
 droppedIn = false;
}

function readDropZone(){
    
    var creacion = "";
    for(var i=0; i < document.getElementById("drop_zone").children.length; i++){
       creacion += document.getElementById("drop_zone").children[i].id;
    }
    if(creacion != "pájaro"){
        error.play();
        swal("Ups.", "Algo no estaba en su lugar.", "error")
        .then((value) => {
            location.reload(true);
        });
          
    }
    else{
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'tiburon.html';
        });}
}

function readDropZone2(){
    var creacion = "";
    for(var i=0; i < document.getElementById("drop_zone").children.length; i++){
       creacion += document.getElementById("drop_zone").children[i].id;
    }
    if(creacion != "tiburón"){
        error.play();
        swal("Ups.", "Algo no estaba en su lugar.", "error")
        .then((value) => {
            location.reload(true);
        });
          
    }
    else{
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'delfin.html';
        });}
}

function readDropZone3(){
    var creacion = "";
    for(var i=0; i < document.getElementById("drop_zone").children.length; i++){
       creacion += document.getElementById("drop_zone").children[i].id;
    }

    if(creacion != "delfín"){
        error.play();
        swal("Ups.", "Algo no estaba en su lugar.", "error")
        .then((value) => {
            location.reload(true);
        });
    }
    else{
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'abeja.html';
        });
    }
}

function readDropZone4(){
    var creacion = "";
    for(var i=0; i < document.getElementById("drop_zone").children.length; i++){
       creacion += document.getElementById("drop_zone").children[i].id;
    }
    if(creacion == "abejA"){
        correcto.play(); 
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'pez.html';
        });
    }  
    else if(creacion ==  "Abeja"){
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'pez.html';
        });
    }
        else{
            error.play();
            swal("Ups.", "Algo no estaba en su lugar.", "error")
            .then((value) => {
            location.reload(true);
        });
        }
}

function readDropZone5(){
    var creacion = "";
    for(var i=0; i < document.getElementById("drop_zone").children.length; i++){
       creacion += document.getElementById("drop_zone").children[i].id;
    }
    if(creacion != "pez"){
        error.play();
        swal("Ups.", "Algo no estaba en su lugar.", "error")
        .then((value) => {
            location.reload(true);
        });
    }
    else{
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'zorro.html';
        });
    }
}

function readDropZone6(){
    var creacion = "";
    for(var i=0; i < document.getElementById("drop_zone").children.length; i++){
       creacion += document.getElementById("drop_zone").children[i].id;
    }
    if(creacion == "12345" ){
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'raton.html';
        });
    }
    else if(creacion == "12435"){
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'raton.html';
        });
    }
        else if(creacion == "15342"){
            correcto.play();
            swal("Yay!", "Muy bien!", "success")
            .then((value) => {
            document.location = 'raton.html';
        });
        }
            else if(creacion == "15432"){
                correcto.play();
                swal("Yay!", "Muy bien!", "success")
                .then((value) => {
                document.location = 'raton.html';
                });
            }
            else{
                error.play();
                swal("Ups.", "Algo no estaba en su lugar.", "error")
                .then((value) => {
                location.reload(true);
        });
            }
}


function readDropZone7(){
    var creacion = "";
    for(var i=0; i < document.getElementById("drop_zone").children.length; i++){
       creacion += document.getElementById("drop_zone").children[i].id;
    }
    if(creacion == "ratón"){
        correcto.play(); 
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'vaca.html';
        });
    }
    else{
        error.play();
        swal("Ups.", "Algo no estaba en su lugar.", "error")
        .then((value) => {
            location.reload(true);
        });
        }
}

function readDropZone8(){
    var creacion = "";
    for(var i=0; i < document.getElementById("drop_zone").children.length; i++){
       creacion += document.getElementById("drop_zone").children[i].id;
    }
    if(creacion == "va1ca2"){ 
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'leon.html';
        });
    }  
    else if(creacion ==  "va2ca1"){
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'leon.html';
        });
    }
        else{
            error.play();
            swal("Ups.", "Algo no estaba en su lugar.", "error")
            .then((value) => {
            location.reload(true);
        });
        }
}

function readDropZone9(){
    var creacion = "";
    for(var i=0; i < document.getElementById("drop_zone").children.length; i++){
       creacion += document.getElementById("drop_zone").children[i].id;
    }
    if(creacion == "león"){ 
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'buho.html';
        });
    }
    else{
        error.play();
        swal("Ups.", "Algo no estaba en su lugar.", "error")
        .then((value) => {
        location.reload(true);
        });
        }
}

function readDropZone10(){
    var creacion = "";
    for(var i=0; i < document.getElementById("drop_zone").children.length; i++){
       creacion += document.getElementById("drop_zone").children[i].id;
    }
    if(creacion == "búho"){ 
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'jirafa.html';
        });
    }
    else{
        error.play();
        swal("Ups.", "Algo no estaba en su lugar.", "error")
        .then((value) => {
        location.reload(true);
        });
        }
}

function readDropZone11(){
    var creacion = "";
    for(var i=0; i < document.getElementById("drop_zone").children.length; i++){
       creacion += document.getElementById("drop_zone").children[i].id;
    }
    if(creacion == "jira1fa2"){ 
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'avestruz.html';
        });
    }  
    else if(creacion ==  "jira2fa1"){
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'avestruz.html';
        });
    }
        else{
            error.play();
            swal("Ups.", "Algo no estaba en su lugar.", "error")
            .then((value) => {
            location.reload(true);
        });
        }
}

function readDropZone12(){
    var creacion = "";
    for(var i=0; i < document.getElementById("drop_zone").children.length; i++){
       creacion += document.getElementById("drop_zone").children[i].id;
    }
    if(creacion == "avestruz"){ 
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'cisne.html';
        });
    }
    else{
        error.play();
        swal("Ups.", "Algo no estaba en su lugar.", "error")
        .then((value) => {
        location.reload(true);
        });
        }
}

function readDropZone13(){
    var creacion = "";
    for(var i=0; i < document.getElementById("drop_zone").children.length; i++){
       creacion += document.getElementById("drop_zone").children[i].id;
    }
    if(creacion == "cis1ne"){ 
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'koala.html';
        });
    }  
    else if(creacion ==  "cis2ne"){
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'koala.html';
        });
    }
        else{
            error.play();
            swal("Ups.", "Algo no estaba en su lugar.", "error")
            .then((value) => {
            location.reload(true);
        });
        }
}

function readDropZone14(){
    var creacion = "";
    for(var i=0; i < document.getElementById("drop_zone").children.length; i++){
       creacion += document.getElementById("drop_zone").children[i].id;
    }
    if(creacion == "koa1la2"){ 
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'oveja.html';
        });
    }  
    else if(creacion ==  "koa2la1"){
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'oveja.html';
        });
    }
        else{
            error.play();
            swal("Ups.", "Algo no estaba en su lugar.", "error")
            .then((value) => {
            location.reload(true);
        });
        }
}

function readDropZone15(){
    var creacion = "";
    for(var i=0; i < document.getElementById("drop_zone").children.length; i++){
       creacion += document.getElementById("drop_zone").children[i].id;
    }
    if(creacion == "oveja"){ 
        correcto.play();
        swal("Yay!", "Muy bien!", "success")
        .then((value) => {
        document.location = 'fin.html';
        });
    }
    else{
        error.play();
        swal("Ups.", "Algo no estaba en su lugar.", "error")
        .then((value) => {
        location.reload(true);
        });
        }
}