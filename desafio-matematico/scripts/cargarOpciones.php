<?php

$DB_HOST = "us-cdbr-iron-east-01.cleardb.net";
$DB_DATABASE = "heroku_89006519200a5c9";
$DB_USERNAME = "b63c2ed4ddb4f3";
$DB_PASSWORD = "00fec8f7";
$con = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
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