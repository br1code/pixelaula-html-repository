<?php
    require '.././db/db.php';
    require './admHeader.php';
?>
<div class="col-md-12 col-sm-12 col-lg-12" style="position:fixed;z-index: 5;" id="msj"></div>
<div class="container">
    <center><h1>Lista de preguntas registradas: </h1></center><br>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Buscar Pregunta:</span>
      </div>
      <input type="text" class="form-control" id="buscador" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" onkeypress="buscar()" oninput="buscar()" placeholder="Buscar por nombre de pregunta...">
    </div>
    <div id="resultados">
<?php
    $preg_query2 = mysqli_query($link,"SELECT * FROM preguntas");
    if(mysqli_num_rows($preg_query2) > 0){
        while ($pregunta2 = mysqli_fetch_array($preg_query2)){
?>

        <div class="input-group">
          <input type="text" class="form-control" value='<?php echo $pregunta2['pregunta'];?>' disabled aria-label="Pregunta" aria-describedby="button-addon4">
          <div class="input-group-append" id="button-addon4">
            <button class="btn btn-outline-secondary" type="button" style="color: blue;" onclick="redirPreg(<?php echo $pregunta2['id_pregunta'];?>)">Ver Pregunta</button>
          </div>
        </div>
        
        <br>
    
<?php
        }
    }else{
        echo "No hay preguntas registradas por el momento...";
    }
?>
    </div>
</div>
<script>
function redirPreg(id){
    location.href = './plantillaPregunta.php?preg=' + id;
}
    
function buscar(){
    var preg = document.getElementById('buscador').value;
    var url = "./buscarPregunta.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {preg:preg},
            success:function(datos)
            {
                $("#resultados").html(datos);
            }
        })
}
</script>
 