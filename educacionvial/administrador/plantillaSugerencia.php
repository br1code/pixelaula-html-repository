<?php
require 'admHeader.php';
include '.././db/db.php';
$sugerencia = $_GET['sugerencia'];
$sugerencia_query = mysqli_query($link,"SELECT * FROM sugerencia WHERE id = '".$sugerencia."'");
$sugPorId = mysqli_fetch_array($sugerencia_query);

function dificultad($dif){
    if($dif == 0){
        return "<option value='0' selected>Facil</option><option value='0'>Normal</option><option value='2'>Dificil</option>";
    }elseif($dif == 1){
        return "<option value='0'>Facil</option><option value='1' selected>Normal</option><option value='2'>Dificil</option>";
    }elseif($dif == 2){
        return "<option value='0'>Facil</option><option value='2'>Normal</option><option value='2' selected>Dificil</option>";
    }
}
function senal($sen){
    $options = "<option disabled>Señales</option>";
    require '.././db/db.php';
    $señalesForm2_query = mysqli_query($link,"SELECT id,senal FROM senal");
    while($sen2 = mysqli_fetch_array($señalesForm2_query)){
        if($sen2['id'] == $sen){
            $options .= "<option value='".$sen2['id']."' selected>".$sen2['senal']."</option>";
        }else{
            $options .= "<option value='".$sen2['id']."'>".$sen2['senal']."</option>";
        }
    }
    return $options;
}

?>
<div class="container">
    <center><h1>Registrar pregunta sugerida</h1></center><br>
    <!--/Pregunta/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Pregunta Sugerida:</span>
      </div>
      <input type="text" class="form-control" id="pregunta" value='<?php echo $sugPorId['pregunta'];?>' aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <!--/Respuesta 1/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Respuesta Correcta:</span>
      </div>
      <input type="text" class="form-control" id="respuestaC" value='<?php echo $sugPorId['respC'];?>' aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <!--/Respuesta 2/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Respuesta Incorrecta:</span>
      </div>
      <input type="text" class="form-control" id="respuestaI1" value='<?php echo $sugPorId['respI2'];?>' aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <!--/Respuesta3/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Respuesta Incorrecta:</span>
      </div>
      <input type="text" class="form-control" id="respuestaI2" value='<?php echo $sugPorId['respI3'];?>' aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <!--/Dificultad/-->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Dificultad:</label>
      </div>
      <select class="custom-select" id="inputGroupSelect01">
          <?php echo dificultad($sugPorId['dificultad']);?>
      </select>
    </div>
    <!--img-->
    <?php 
        if(isset($sugPorId['id_senal'])){
            echo "<div class='input-group mb-3'><div class='input-group-prepend'><label class='input-group-text' for='inputGroupSelect08'>Señal:</label></div><select class='custom-select' id='inputGroupSelect08'>".senal($sugPorId['id_senal'])."</select></div>";
            $verSelSen2 = 0;
        }else{
            echo "No se ha seleccionado señal en esta sugerencia <br><br>";
            $verSelSen2 = 1;
        }
    ?>
    <!--/Confimar o Eliminar/-->
    <center>
        <button type="button" class="btn btn-success btn-lg" onclick="modSug(<?php echo $sugerencia;?>)">Registrar</button>
        <button type="button" onclick="borrarSug(<?php echo $sugerencia; ?>,2)" class="btn btn-danger btn-lg">Eliminar</button>
    </center><br><br>
</div>
<div class="col-md-12 col-sm-12 col-lg-12" id="msj" style="position: fixed;"></div>
<script>
function borrarSug(id,pag){
        var url = "./eliminarSugerencia.php";
            $.ajax({
                type: "POST",
                url: url,
                data: {id:id,pag:pag},
                success:function(datos)
                {
                    $("#msj").html(datos);
                }
            })
    }
    
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
    
var verSelSen2 = <?php echo $verSelSen2;?>;
if(verSelSen2 == 0){   
    var selectSen2 = document.getElementById('inputGroupSelect08');
    var selectedSen2Option = selectSen2.options[select.selectedIndex];
    selSen2 = selectedSen2Option.value;
    //alert(selSen2);
        selectSen2.addEventListener('change',
          function(){
            var selectedSen2Option = selectSen2.options[selectSen2.selectedIndex];
            selSen2 = selectedSen2Option.value;
            //alert(selSen2);
          });
}else{
    selSen2 = 0;
    //alert(selSen2);
}
    
function modSug(id){
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
    var url = "./modificarSugerencia.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {err:err,id:id,sel:sel,pregunta:n[0],respuestaC:n[1],respuestaI1:n[2],respuestaI2:n[3],selSen2:selSen2},
            success:function(datos)
            {
                $("#msj").html(datos);
            }
        })
}
</script>