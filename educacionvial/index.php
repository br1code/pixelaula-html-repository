<?php
require './headerS.php';
?>
<div class="container">
    <center><h1>Educación Víal</h1></center>
    <p>Esta sección tiene la finalidad de informar acerca de las señales, y dar algunos tips, a los adolecentes que esten aprendiendo (o quieran aprender) a manejar. La informacion que brinda esta pagina servira para darles conocimientos basicos necesarios pero que a la vez pueden prevenir accidentes y ademas darles una ayuda con el examente teorico. (Al realizar las actividades de esta pagina no estaran eximidos del examen teorico ni tampoco alcanzara para prepararse para ellos, solo es una introduccion y una ayuda).</p>
    <center>
        <button class="btn btn-outline-primary btn-lg" onclick="redir2(0)">Quiero Aprender!!!</button>
        <button class="btn btn-outline-success btn-lg" onclick="redir2(1)">Hacer Test!!!</button>
    </center>
</div>
<script>
    function redir2(red){
            if(red == 0){
                location.href = './guia.php';
            }else{
                location.href = './test.php';
            }
        }
</script>