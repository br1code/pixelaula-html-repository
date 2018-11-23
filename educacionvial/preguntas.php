<?php

$correctas = $_POST['correctas'];
$totalPreg = $_POST['totalPreg'];
$cantPregElegidas = $_POST['preg'];
$dificultadElegida = $_POST['dif'];
session_start();
    //func
if($totalPreg <= $cantPregElegidas){
 
    require './Pregunta.php';
    require './db/db.php';

    $arrayRegistros = array();
    $respuestas = array();
    $valores = array();
    if($dificultadElegida != 3){
        $reg_query = mysqli_query($link,"SELECT id_pregunta FROM preguntas WHERE nivel = '$dificultadElegida'");
    }else{
        $reg_query = mysqli_query($link,"SELECT id_pregunta FROM preguntas");
    }
    while($registros = mysqli_fetch_array($reg_query)){
        array_push($arrayRegistros, $registros['id_pregunta']);
    }
    //$indice = $arrayRegistros[];
    $num = array_rand($arrayRegistros);
    $indice = $arrayRegistros[$num];
    
    if(!in_array($indice, $_SESSION['pregReal'])){
        array_push($_SESSION['pregReal'], $indice);
        //echo var_dump($_SESSION['pregReal']) . "<br>";
        $preg_query = mysqli_query($link,"SELECT * FROM preguntas WHERE id_pregunta = $indice");
        $preg = mysqli_fetch_array($preg_query);

        $pregunta = new Pregunta($preg['pregunta'], $preg['id_pregunta']);
        $idPregunta = $pregunta->getIdPregunta();

        $resp_query = mysqli_query($link,"SELECT * FROM respuestas WHERE id_pregunta = $idPregunta ORDER BY RAND()");
        while($resp = mysqli_fetch_array($resp_query)){
            array_push($respuestas,$resp['respuesta']);
            array_push($valores,$resp['valor']);
        }
        $pregunta->setRespuestas($respuestas[0],$respuestas[1],$respuestas[2]);
        $pregunta->setValores($valores[0],$valores[1],$valores[2]);

        if(isset($preg['id_senal'])){
            $senalCons = $preg['id_senal'];
            $senal_query = mysqli_query($link,"SELECT * FROM senal WHERE id = $senalCons");
            $senal = mysqli_fetch_array($senal_query);
            $pregunta->setImg($senal['img']);
            echo "<div class='container'><h1 class='display-4'>" . $pregunta->getPregunta() ."</h1><center><img src='".$pregunta->getImg()."'></center><br><br><button type='button' class='btn btn-outline-dark btn-lg btn-block' onclick='comprobar(". $pregunta->getVal1() .",".$correctas.",".$totalPreg.")'>" . $pregunta->getResp1() . "</button><br><br><button type='button' class='btn btn-outline-dark btn-lg btn-block' onclick='comprobar(". $pregunta->getVal2() .",".$correctas.",".$totalPreg.")'>" . $pregunta->getresp2() . "</button><br><br><button type='button' class='btn btn-outline-dark btn-lg btn-block' onclick='comprobar(". $pregunta->getVal3() .",".$correctas.",".$totalPreg.")'>". $pregunta->getresp3() . "</button><div id='salida'></div></div><br><br>";
        }else{
            echo "<div class='container'><h1 class='display-4'>" . $pregunta->getPregunta() ."</h1><br><br><button type='button' class='btn btn-outline-dark btn-lg btn-block' onclick='comprobar(". $pregunta->getVal1() .",".$correctas.",".$totalPreg.")'>" . $pregunta->getResp1() . "</button><br><br><button type='button' class='btn btn-outline-dark btn-lg btn-block' onclick='comprobar(". $pregunta->getVal2() .",".$correctas.",".$totalPreg.")'>" . $pregunta->getresp2() . "</button><br><br><button type='button' class='btn btn-outline-dark btn-lg btn-block' onclick='comprobar(". $pregunta->getVal3() .",".$correctas.",".$totalPreg.")'>". $pregunta->getresp3() . "</button><div id='salida'></div></div><br><br>";
        }

        echo "<center><div style='width: 25%;' class='border border-primary'>Correctas totales: " . $correctas. "</div></center>";
        $pregRestantes = ($cantPregElegidas + 1) - $totalPreg;
        echo "Preguntas restantes: " . $pregRestantes;
        if($pregunta->getVal1() == 0){
            $correcta = $pregunta->getResp1();
        }elseif($pregunta->getVal2() == 0){
            $correcta = $pregunta->getResp2();
        }elseif($pregunta->getVal3() == 0){
            $correcta = $pregunta->getResp3();
        }
    }else{
?>
    <script>getPreg(<?php echo $correctas; ?>,<?php echo $totalPreg;?>)</script>
<?php
    }
}else{
    echo "Test Finalizado";
    echo $correctas . "/" . $cantPregElegidas;
     //Vaciar sesión
     $_SESSION = array();
     //Destruir Sesión
     session_destroy();
}

?>

<script>
 function comprobar(valor,correctas,totalPreg,pregReal){
        var pregunta = '<?php echo $pregunta->getPregunta(); ?>';
        var correcta = '<?php echo $correcta; ?>';
        var url = "./verificacion.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {valor:valor,correctas:correctas,correcta:correcta,pregunta:pregunta,totalPreg:totalPreg,pregReal:pregReal},
            success:function(datos)
            {
                $("#test").html(datos);
            }
        })
    }
</script>