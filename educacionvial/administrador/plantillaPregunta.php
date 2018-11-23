<?php
require 'admHeader.php';
include '.././db/db.php';
$preg2 = $_GET['preg'];
$preg_query3 = mysqli_query($link,"SELECT * FROM preguntas WHERE id_pregunta = '$preg2'");
$pregPorId = mysqli_fetch_array($preg_query3);

function dificultad($dif){
    if($dif == 0){
        return "<option value='0' selected>Facil</option><option value='0'>Normal</option><option value='2'>Dificil</option>";
    }elseif($dif == 1){
        return "<option value='0'>Facil</option><option value='1' selected>Normal</option><option value='2'>Dificil</option>";
    }elseif($dif == 2){
        return "<option value='0'>Facil</option><option value='2'>Normal</option><option value='2' selected>Dificil</option>";
    }
}

$respuestas2 = [
    "Correcta" => "",
    "Incorrecta1" => "",
    "Incorrecta2" => ""
];
$resp2_query = mysqli_query($link,"SELECT * FROM respuestas WHERE id_pregunta = '".$preg2."'");
    while($resPorId = mysqli_fetch_array($resp2_query)){
        if($resPorId['valor'] == 0){
            $respuestas2["Correcta"] = $resPorId['respuesta'];
        }elseif($resPorId['valor'] == 1){
            $respuestas2["Incorrecta1"] = $resPorId['respuesta'];
        }else{
             $respuestas2["Incorrecta2"] = $resPorId['respuesta'];
        }
    }
?>
<div class="container">
    <center><h1>Modificar pregunta</h1></center><br>
    <!--/Pregunta/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Pregunta:</span>
      </div>
      <input type="text" class="form-control" id="pregunta" value='<?php echo $pregPorId['pregunta'];?>' aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <!--/Respuesta 1/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Respuesta Correcta:</span>
      </div>
      <input type="text" class="form-control" id="respuestaC" value='<?php echo $respuestas2["Correcta"];?>' aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <!--/Respuesta 2/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Respuesta Incorrecta:</span>
      </div>
      <input type="text" class="form-control" id="respuestaI1" value='<?php echo $respuestas2["Incorrecta1"];?>' aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <!--/Respuesta3/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Respuesta Incorrecta:</span>
      </div>
      <input type="text" class="form-control" id="respuestaI2" value='<?php echo $respuestas2["Incorrecta2"];?>' aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <!--/Dificultad/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Dificultad:</label>
      </div>
      <select class="custom-select" id="inputGroupSelect02">
          <?php echo dificultad($pregPorId['nivel']);?>
      </select>
    </div>
    <!--/Confimar o Eliminar/-->
    <center>
        <button type="button" class="btn btn-success btn-lg" onclick="modPregunta(<?php echo $pregPorId['id_pregunta'];?>)">Modificar</button>
        <button type="button" onclick="borrarPreg(<?php echo $pregPorId['id_pregunta']; ?>)" class="btn btn-danger btn-lg">Eliminar</button>
    </center><br><br>
</div>
<div class="col-md-12 col-sm-12 col-lg-12" id="msj" style="position: fixed;"></div>
<script>
function borrarPreg(id){
    var url = "./eliminarPregunta.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {id:id},
            success:function(datos)
            {
                $("#msj").html(datos);
            }
        })
    }
    
var select = document.getElementById('inputGroupSelect02');
var selectedOption = select.options[select.selectedIndex];
sel = selectedOption.value;
//alert(sel);
    select.addEventListener('change',
      function(){
        var selectedOption = select.options[select.selectedIndex];
        sel = selectedOption.value;
        //alert(sel);
      });
    
function modPregunta(id){
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
    var url = "./modificarPregunta.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {id:id,sel:sel,pregunta:n[0],respuestaC:n[1],respuestaI1:n[2],respuestaI2:n[3]},
            success:function(datos)
            {
                $("#msj").html(datos);
            }
        })
}
</script>

