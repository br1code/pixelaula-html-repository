<?php
require '.././db/db.php';

$delete2 = "DELETE FROM preguntas WHERE id_pregunta = " . $_POST["id"];
$rs2 = mysqli_query($link, $delete2);
if($rs2){
    echo "<center><p style='color:white;background-color:red;'>La pregunta ha sido eliminada</p></center>";
    ?>
    <script type="text/javascript">
    function volver(){
        location.href = './listaPreg.php';
    }
        setInterval("volver()",2000);
    </script>
<?php
}else{
    echo "Intento Fallido";
}
?>