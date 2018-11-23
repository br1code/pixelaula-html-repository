<?php
    require_once 'ecuaciones.php';
    $tema = $_POST['temaJuego'];
    $ecuacion = new ecuacion();
    switch ($tema) {
        case 'Comparacion de Numeros Decimales':
        $calculo = $ecuacion->compDeDecimales();
            break;
        case 'Suma y Resta de Numeros Enteros':
        $calculo = $ecuacion->sumRest();
            break;
        case 'Conversion de Fracciones a Numero Decimal':
        $calculo = $ecuacion->fracDec();
            break;
        case 'Calculo de Porcentaje de un Numero':
        $calculo = $ecuacion->porcentaje();
            break;
        case 'Completar Secuencias Numericas':
        $calculo = $ecuacion->secNum();
            break;
        case 'Informacion del Proyecto y Licencias':
        $calculo = $ecuacion->lol();
            break;
    }
    header('Content-Type: application/json');
    echo json_encode($calculo);
?>