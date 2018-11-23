<?php
require '.././db/db.php';

$delete = "DELETE FROM sugerencia WHERE id = " . $_POST["id"];
$rs = mysqli_query($link, $delete);
if($rs){
    echo "<center><p style='color:white;background-color:red;'>La sugerencia ha sido eliminada</p></center>";
    ?>
    <script type="text/javascript">
    function actualizar(){
        location.reload(true);
    }
    function volver(){
        location.href = './verSugerencias.php';
    }
    if(<?php echo $_POST['pag'];?> == 1){
        setInterval("actualizar()",2000);
    }else{
        setInterval("volver()",2000);
    }
    </script>
<?php
}
?>