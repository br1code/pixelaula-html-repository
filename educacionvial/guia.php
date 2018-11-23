<?php
require './headerS.php';
?>
<div class="container">
    <center><h1>Indice: </h1></center><br>
    <div class="row">
        <div class="offset-md-2 offset-lg-2 col-md-8 col-lg-8 offset-md-2 offset-lg-2">
            <ul class="list-group">
              <button type="button" class="btn btn-primary" onclick="redir3(1)"><li class="list-group-item list-group-item-primary">Tipos de Licencias</li></button><br>
                <button type="button" class="btn btn-success" onclick="redir3(2)"><li class="list-group-item list-group-item-secondary">Señales</li></button><br>
                <button type="button" class="btn btn-primary" onclick="redir3(3)"><li class="list-group-item list-group-item-primary">Tips</li></button><br>
                <button type="button" class="btn btn-success" onclick="redir3(4)"><li class="list-group-item list-group-item-secondary">Concientizacion</li></button><br>
            </ul>
        </div>
    </div>
</div>
<script>
    function redir3(red){
            switch(red){
                case 1: 
                    location.href = './licencias.php';
                    break;
                case 2: 
                    location.href = './senales.php';
                    break;
                case 3:
                    location.href = './guia.php';
                    break;
                case 4:
                    location.href = './guia.php';
                    break;
        }
    }
</script>