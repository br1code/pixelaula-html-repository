<?php
$dif = $_POST['sel'];
$pregunta = $_POST['pregunta'];
$respC = $_POST['respuestaC'];
$respI1 = $_POST['respuestaI1'];
$respI2 = $_POST['respuestaI2'];
include '.././db/db.php';

$preguntaIns = "INSERT INTO preguntas (pregunta,nivel) VALUES ('$pregunta','$dif')";
$preguntaIns_query = mysqli_query($link,$preguntaIns); 

$lastId="SELECT MAX(id_pregunta) AS lastId FROM preguntas";
$lastId_query =  mysqli_query($link,$lastId);
$last_id_preg = mysqli_fetch_array($lastId_query);
$id_preg=$last_id_preg["lastId"];

$respC = "INSERT INTO respuestas (respuesta,valor,id_pregunta) VALUES ('$respC','0','$id_preg')";
$respC_query = mysqli_query($link,$respC); 

$respI1 = "INSERT INTO respuestas (respuesta,valor,id_pregunta) VALUES ('$respI1','1','$id_preg')";
$respI1_query = mysqli_query($link,$respI1); 

$respI2 = "INSERT INTO respuestas (respuesta,valor,id_pregunta) VALUES ('$respI2','2','$id_preg')";
$respI2_query = mysqli_query($link,$respI2); 

if($preguntaIns_query && $respC_query && $respI1_query && $respI2_query){
    echo "Se ha registrado la pregunta correctamente";
    ?>
    <script>
        function volver(){
            location.href = './index.php';
        }
        setInterval("volver()",2000);
    </script>
<?php
}else{
    echo "Fallido";
}