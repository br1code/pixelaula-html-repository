<?php
if($_POST["err"] == 0)
{ 
include '.././db/db.php';
$admin = $_POST["admin"];   
$password = $_POST["password"];
$rs = "SELECT * FROM admin WHERE nombre = '$admin'";
$result = mysqli_query($link,$rs);
if($row = mysqli_fetch_array($result))
{
    if($row["password"] == $password){
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['admin'] = $admin;
        echo "<center><p style='color: green;'>Bienvenido ".$_SESSION['admin']."</p></center>";
        echo "<meta http-equiv='refresh' content='2;URL=./panel.php' />";
    }else{
        echo "<center><p style='color: red;'>Contraseña incorrecta</center>";
    }
}else{
    echo "<center><p style='color: red;'>Nombre de administrador incorrecto</center>";
}
}else{
    echo "<center><p style='color: red;'>Alguno de los campos se encuentra vacio</center>";
}
?>