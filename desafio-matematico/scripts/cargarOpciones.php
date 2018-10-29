<?php

$con = mysqli_connect('localhost','root','','des_matematico');
if (!$con) {
    die('Imposible conectar a la base de datos: ' . mysqli_error($con));
}

mysqli_select_db($con,"des_matematico");
$sql="SELECT  opcion_a ,  opcion_b ,  opcion_c ,  opcion_d FROM  preguntas";
$result = mysqli_query($con,$sql);
$arr = array();
while($row = mysqli_fetch_array($result)) {
    $temp = "";
    $temp .= $row["opcion_a"] . ",";
    $temp .= $row["opcion_b"] . ",";
    $temp .= $row["opcion_c"] . ",";
    $temp .= $row["opcion_d"];
    $arr [] = $temp;
}
echo implode("|", $arr);
mysqli_close($con);