<?php
    require '.././db/db.php';
    if($_POST['preg'] != ""){
        $preg_query3 = mysqli_query($link,"SELECT * FROM preguntas WHERE pregunta LIKE '%".$_POST['preg']."%'");
    }else{
        $preg_query3 = mysqli_query($link,"SELECT * FROM preguntas");
    }   
    if(mysqli_num_rows($preg_query3) > 0){
        while ($pregunta3 = mysqli_fetch_array($preg_query3)){
?>

        <div class="input-group">
          <input type="text" class="form-control" value='<?php echo $pregunta3['pregunta'];?>' disabled aria-label="Pregunta" aria-describedby="button-addon4">
          <div class="input-group-append" id="button-addon4">
            <button class="btn btn-outline-secondary" type="button" style="color: blue;" onclick="redirPreg(<?php echo $pregunta3['id_pregunta'];?>)">Ver Pregunta</button>
          </div>
        </div>
        
        <br>
    
<?php
        }
    }else{
        echo "No se han encontrado coincidencias...";
    }
?>