<?php 
    require 'headerS.php';
    session_start();
    $_SESSION['pregReal'] = array();
?>
<div class="container">   
    <div id="empezar" class="row offset-md-4 col-md-3">
        <center>
            <label>Cantidad de preguntas: </label><br>
            <select class="custom-select" id="preguntas">
                <option selected disabled>Elija una cantidad...</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
            </select><br><br>
            <label>Dificultad </label><br>
            <select class="custom-select" id="dif">
                <option selected disabled>Elija una dificultad...</option>
                <option value="0">Facil</option>
                <option value="1">Normal</option>
                <option value="2">Dificil</option>
                <option value="3">Aleatorio</option>
            </select>
            <small id="selHelp" class="form-text text-muted">En modo aleatorio recibira preguntas de cualquier dificultad.</small>
            <br>
            <button type="button" class="btn btn-primary btn-lg" onclick="getPreg(0,1)">Empezar</button>
        </center>
    </div> 
    <div id="test"></div>
</div>
<script>
var preg = 0;
var selectPreg = document.getElementById('preguntas');
selectPreg.addEventListener('change',
  function(){
    var selectedOption1 = this.options[selectPreg.selectedIndex];
    preg = selectedOption1.value;
    //console.log(preg);
  });

var dif = 0;
var selectDif = document.getElementById('dif');
selectDif.addEventListener('change',
  function(){
    var selectedOption2 = this.options[selectDif.selectedIndex];
    dif = selectedOption2.value;
    //console.log(dif);
  });
function getPreg(correctas,totalPreg){
        var url = "./preguntas.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {correctas:correctas,totalPreg:totalPreg,preg:preg,dif:dif},
            success:function(datos)
            {
                $("#test").html(datos);
            }
        })
    document.getElementById("empezar").style = "display: none;"
}
</script>