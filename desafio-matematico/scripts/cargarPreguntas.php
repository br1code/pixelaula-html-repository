<?php
$db_col = $_GET['db_col'];
$con = mysqli_connect('localhost','root','','des_matematico');
if (!$con) {
    die('Imposible conectar a la base de datos: ' . mysqli_error($con));
}

mysqli_select_db($con,"des_matematico");
$sql="SELECT ". $db_col ." FROM preguntas";
$result = mysqli_query($con,$sql);
$arrayPreguntas = array();
while($row = mysqli_fetch_array($result)) {
    $arrayPreguntas [] = $row[$db_col];
}
echo implode("|", $arrayPreguntas);
mysqli_close($con);