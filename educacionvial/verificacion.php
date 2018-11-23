<?php

$valor = $_POST['valor'];
$correctas = $_POST['correctas'];
$RespCorrecta = $_POST['correcta'];
$pregunta = $_POST['pregunta'];
$total = $_POST['totalPreg'];

if($valor == 0){
    $correctas++;
    echo "<center><div id='msj' class='border border-success' style='width: 25%;'>Correcta</div></center><br>";
    echo "<div class='border border-dark' style='text-align: center;'><p>La pregunta realizada fue:<b> ".$pregunta."</b></p></div><br><div class='border border-success' style='text-align: center;'><p>Su respuesta fue:<b> ".$RespCorrecta." </b></div><br><div class='border border-success' style='text-align: center;'>Cantidad total de correctas hasta el momento:<b> " . $correctas . "</b></div>";
}elseif($valor == 1 || $valor == 2){
    echo "<center><div id='msj' class='border border-danger' style='width: 25%;'>Incorrecta</div></center><br>";
    echo "<div id='msj' class='border border-dark' style='text-align: center;'>La pregunta realizada fue: <b>" . $pregunta . "</b><br></div><br>";
    echo "<div id='msj' class='border border-success' style='text-align: center;'>La respuesta correcta es: <b>" . $RespCorrecta. "</b></div>";
}
    $total++;
    echo "<center><br><button type='button' class='btn btn-primary btn-lg' onclick='getPreg(".$correctas.", ".$total.")' id='empezar'>Continuar</button></center>";