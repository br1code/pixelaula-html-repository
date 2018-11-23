<?php
require 'admHeader.php';
?>
<div class="container">
    <center><h1>Registrar pregunta</h1></center><br>
    <!--/Pregunta/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Pregunta:</span>
      </div>
      <input type="text" class="form-control" id="pregunta" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <!--/Respuesta 1/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Respuesta Correcta:</span>
      </div>
      <input type="text" class="form-control" id="respuestaC" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <!--/Respuesta 2/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Respuesta Incorrecta:</span>
      </div>
      <input type="text" class="form-control" id="respuestaI1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <!--/Respuesta3/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Respuesta Incorrecta:</span>
      </div>
      <input type="text" class="form-control" id="respuestaI2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <!--/Dificultad/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect03">Dificultad:</label>
      </div>
      <select class="custom-select" id="inputGroupSelect03">
          <option selected disabled>Elegir dificultad...</option>
          <option value="0">Facil</option>
          <option value="1">Normal</option>
          <option value="2">Dificil</option>
      </select>
    </div>
    <!--/Confimar o Eliminar/-->
    <center>
        <button type="button" class="btn btn-success btn-lg" onclick="regPregunta()">Registrar</button>
    </center><br><br>
</div>
<div class="col-md-12 col-sm-12 col-lg-12" id="msj" style="position: fixed;"></div>
<script>
var select = document.getElementById('inputGroupSelect03');
var selectedOption = select.options[select.selectedIndex];
sel = selectedOption.value;
//alert(sel);
    select.addEventListener('change',
      function(){
        var selectedOption = select.options[select.selectedIndex];
        sel = selectedOption.value;
        //alert(sel);
      });
    
function regPregunta(){
    var n = [];
    var err = 0;
    var etiquetas = ["pregunta","respuestaC","respuestaI1","respuestaI2"];
    var eLen = etiquetas.length;
    for(var i = 0; ((i < eLen) && (err == 0)); i++)
    {
        if(document.getElementById(etiquetas[i]).value != "")
        {
            n[i] = document.getElementById(etiquetas[i]).value;
        }else{
            err = 1;
        }
    }
    var url = "./registrarPregunta.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {sel:sel,pregunta:n[0],respuestaC:n[1],respuestaI1:n[2],respuestaI2:n[3]},
            success:function(datos)
            {
                $("#msj").html(datos);
            }
        })
}
</script>