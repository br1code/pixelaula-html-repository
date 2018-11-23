<?php
    session_start();
    if(empty($_SESSION['admin'])){
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
<div class="container">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <center><h1>Ingreso de Administrador:</h1></center>
        </div>
            <div class="offset-lg-4 offset-sm-2 offset-md-4 col-lg-4 col-sm-8 col-md-4" style="margin-top: 10%;">
            <center>
                <div class="form-group">
                     <label for="admin">Nombre Usuario</label>
                        <input type="text" class="form-control" id="admin" aria-describedby="emailHelp" placeholder="Ingresar nombre de usuario ...">
                        <small id="emailHelp" class="form-text text-muted">Recuerde respetar minusculas, mayusculas y espacios.</small>
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Ingresar Contraseña...">
                      </div>
                    <input type="button" class="btn btn-primary" value="Ingresar" onclick="loginAdm()">
            </center>
            </div>
        <br>
        <div class="col-md-12 col-sm-12 col-lg-12" id="msLog"></div>
</div>
</body>
<script type="text/javascript">
    function loginAdm()
    {
        var n = [];
        var err = 0;
        var etiquetas = ["admin","password"];
        var eLen = etiquetas.length;
        for(var i = 0; ((i < eLen) && (err == 0)); i++)
        {
            if(document.getElementById(etiquetas[i]).value != "")
            {
                n[i] = document.getElementById(etiquetas[i]).value;
            }else{
                err = 1;
            }
        }
        var url = ".././cuenta/loginAdm.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {err:err,admin:n[0],password:n[1]},
            success:function(datos)
            {
                $("#msLog").html(datos);
            }
        })
    }
</script>
<?php
    }else{
        header("location:panel.php");
    }
?>