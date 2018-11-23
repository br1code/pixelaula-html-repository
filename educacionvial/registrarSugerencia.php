<?php
if($_POST['err'] == 0){
    $dif = $_POST['sel'];
    $pregunta = $_POST['pregunta'];
    $respC = $_POST['respuestaC'];
    $respI1 = $_POST['respuestaI1'];
    $respI2 = $_POST['respuestaI2'];
    $idSenal = $_POST['selSen'];
    include './db/db.php';

    if($idSenal == 0){
        $sugIns = "INSERT INTO sugerencia (pregunta,respC,respI2,respI3,dificultad) VALUES ('$pregunta','$respC','$respI1','$respI2','$dif')";
    }else{
        $sugIns = "INSERT INTO sugerencia (pregunta,respC,respI2,respI3,dificultad,id_senal) VALUES ('$pregunta','$respC','$respI1','$respI2','$dif','$idSenal')";
    }
    $sugIns_query = mysqli_query($link,$sugIns); 

    if($sugIns_query){
        echo "<center><p style='color:green;'>Se ha registrado la sugerencia correctamente</p></center>";
        ?>
        <script>
            function volver(){
                location.href = './index.php';
            }
            setInterval("volver()",2000);
        </script>
    <?php
    }else{
        echo "Fallido! Ocurrio un error en la base de datos";
    }
}else{
    echo "<center><p style='color:red;'>Alguno de los campos se encuentra vacio. Por favor revise el formulario.</p></center>";
}