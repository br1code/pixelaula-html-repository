<?php
    session_start();
    if(empty($_SESSION['admin'])){
        header("location:index.php");
    }else{
?>
<!DOCTYPE html>
<html>
<head>
    <link href=".././css/bootstrap.min.css" rel="stylesheet">
    <link href=".././css/main.css" rel="stylesheet">
    <link href=".././css/bootstrap-grid.min.css" rel="stylesheet">    
    <link href=".././css/bootstrap-reboot.min.css" rel="stylesheet">
    <script type="text/javascript" src=".././js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src=".././js/bootstrap.min.js"></script>
    <script type="text/javascript" src=".././js/bootstrap.bundle.min.js"></script>
    <title>Administrador</title>
</head>
<body>
    <div class="header">
        <a href="./verSugerencias.php"><div class="btnhead2">Sugerencias</div></a>
        <a href="./formPregunta.php"><div class="btnhead2">Registrar Pregunta</div></a>
        <a href="./listaPreg.php"><div class="btnhead2">Modificar Pregunta</div></a>
        <a href="./../cuenta/logout.php"><div class="btnhead">Cerrar Sesion</div></a>
        <div class="btnhead"><?php echo $_SESSION['admin'];?></div>
    </div>
    
<?php
    }
?>