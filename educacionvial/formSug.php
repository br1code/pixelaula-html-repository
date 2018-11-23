<?php
require 'headerS.php';
?>
<div class="container">
    <center><h1>Sugerir una pregunta</h1></center><br>
    <small class="text-muted">Los campos con * son obligatorios</small>
    <!--/Pregunta/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">*Pregunta a sugerir:</span>
      </div>
      <input type="text" class="form-control" id="sugPregunta" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <!--/Respuesta 1/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">*Respuesta Correcta:</span>
      </div>
      <input type="text" class="form-control" id="sugRespC" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <!--/Respuesta 2/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">*Respuesta Incorrecta:</span>
      </div>
      <input type="text" class="form-control" id="sugRespI1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <!--/Respuesta3/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">*Respuesta Incorrecta:</span>
      </div>
      <input type="text" class="form-control" id="sugRespI2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <!--/Dificultad/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">*Dificultad:</label>
      </div>
      <select class="custom-select" id="inputGroupSelect01">
          <option selected disabled value="4">Elija una dificultad...</option>
          <option value="0">Facil</option>
          <option value="1">Normal</option>
          <option value="2">Dificil</option>
      </select>
    </div>
    <!--Señal-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="senal">¿Desea elegir una señal?:</label>
      </div>
      <select class="custom-select" id="senal">
          <option selected disabled value="0">Sin señal...</option>
          <?php
          require './db/db.php';
          $señalesForm_query = mysqli_query($link,"SELECT id,senal FROM senal");
          while($sen = mysqli_fetch_array($señalesForm_query)){
              echo "<option value='".$sen['id']."'>".$sen['senal']."</option>";
          }
          ?>
      </select>
    </div>
    <!--/Confimar o Eliminar/-->
    <center>
        <button type="button" class="btn btn-success btn-lg" onclick="regSug()">Enviar</button>
    </center><br><br>
</div>
<div class="col-md-12 col-sm-12 col-lg-12" id="msj" style="position: fixed;"></div>
<script>
var select = document.getElementById('inputGroupSelect01');
var selectedOption = select.options[select.selectedIndex];
sel = selectedOption.value;
//alert(sel);
select.addEventListener('change',
  function(){
    var selectedOption = select.options[select.selectedIndex];
    sel = selectedOption.value;
    //alert(sel);
  });
    
var selectSen = document.getElementById('senal');
var selectedSenOption = selectSen.options[selectSen.selectedIndex];
selSen = selectedSenOption.value;
//alert(selSen);
selectSen.addEventListener('change',
  function(){
    var selectedSenOption = selectSen.options[selectSen.selectedIndex];
    selSen = selectedSenOption.value;
    //alert(selSen);
  });
function regSug(){
    var n = [];
    var err = 0;
    var etiquetas = ["sugPregunta","sugRespC","sugRespI1","sugRespI2"];
    var eLen = etiquetas.length;
    for(var i = 0; ((i < eLen) && (err == 0)); i++)
    {
        if(document.getElementById(etiquetas[i]).value != "" && sel != 4)
        {
            n[i] = document.getElementById(etiquetas[i]).value;
        }else{
            err = 1;
        }
    }
    var url = "./registrarSugerencia.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {err:err,sel:sel,pregunta:n[0],respuestaC:n[1],respuestaI1:n[2],respuestaI2:n[3],selSen:selSen},
            success:function(datos)
            {
                $("#msj").html(datos);
            }
        })
}
    function check(){
        alert("Ok");
    }
</script>