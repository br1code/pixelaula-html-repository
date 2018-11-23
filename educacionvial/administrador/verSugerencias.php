<?php
    require '.././db/db.php';
    require './admHeader.php';
?>
<div class="col-md-12 col-sm-12 col-lg-12" style="position:fixed;z-index: 5;" id="msj"></div>
<div class="container">
    <center><h1>Lista de sugerencias recibidas: </h1></center><br>
<?php 
    $sug_query = mysqli_query($link,"SELECT * FROM sugerencia");
    if(mysqli_num_rows($sug_query) > 0){
    while ($sugerencia = mysqli_fetch_array($sug_query)){
?>
        
        <div class="input-group">
          <input type="text" class="form-control" value="<?php echo $sugerencia['pregunta'] ?>" disabled aria-label="Pregunta" aria-describedby="button-addon4">
          <div class="input-group-append" id="button-addon4">
            <button class="btn btn-outline-secondary" type="button" style="color: lightgreen;" onclick="redirSug(<?php echo $sugerencia['id'];?>)">Registrar</button>
            <button class="btn btn-outline-secondary" type="button" style="color: red;" onclick="borrarSug(<?php echo $sugerencia['id'];?>,1)">Descartar</button>
          </div>
        </div>
        
        <br>
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
    function redirSug(id){
        location.href = './plantillaSugerencia.php?sugerencia=' + id;
    }
</script>
<?php
        }
    }else{
        echo "<center><p>No se encuentran sugerencias registradas...</p></center>";
    }
?>
</div>