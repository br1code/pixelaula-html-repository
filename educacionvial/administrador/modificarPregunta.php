<?php
$id = $_POST['id'];
$dif = $_POST['sel'];
$preg = $_POST['pregunta'];
$respC = $_POST['respuestaC'];
$respI1 = $_POST['respuestaI1'];
$respI2 = $_POST['respuestaI2'];
include '.././db/db.php';

$preguntaUpd = "UPDATE preguntas SET pregunta = '$preg', nivel = '$dif' WHERE id_pregunta = '$id'";
$preguntaUpd_query = mysqli_query($link,$preguntaUpd); 

$respCUpd = "UPDATE respuestas SET respuesta = '$respC' WHERE id_pregunta = '$id' AND valor = 0";
$respCUpd_query = mysqli_query($link,$respCUpd); 

$respI1Upd = "UPDATE respuestas SET respuesta = '$respI1' WHERE id_pregunta = '$id' AND valor = 1";
$respI1Upd_query = mysqli_query($link,$respI1Upd); 

$respI2Upd = "UPDATE respuestas SET respuesta = '$respI2' WHERE id_pregunta = '$id' AND valor = 2";
$respI2Upd_query = mysqli_query($link,$respI2Upd); 

if($preguntaUpd_query && $respCUpd_query && $respI1Upd_query && $respI2Upd_query){
    echo "Se ha modificado la pregunta correctamente";
    ?>
    <script>
        function volver(){
            location.href = './listaPreg.php';
        }
        setInterval("volver()",2000);
    </script>
<?php
}else{
    echo "Fallido";
}