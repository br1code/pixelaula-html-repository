<?php
require './headerS.php';
require './db/db.php';
$cont = 0;
$clas_query = mysqli_query($link,"SELECT clase, subclase, automovil FROM licencia ORDER BY subclase ASC");
?>
<div class="container">
     <div class="row">
      <div class="col-4">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Licencias</a>
    <?php
        $automoviles = array();
        $con = 0;
        while ($licenciaClas = mysqli_fetch_array($clas_query)){
            array_push($automoviles, $licenciaClas['automovil']);
    ?>
         <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#" role="tab" aria-controls="profile" onclick="showAutomovil(<?php echo $con;?>)"><?php echo $licenciaClas['subclase'];?></a>
<?php
            $con++;
}
?>
        </div>
      </div>
      <div class="col-8">
        <div class="tab-content" id="nav-tabContent" style="position: fixed;">
             <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">Esta sección informa sobre las clases y subclases de licencias existentes y los vehiculos correspondientes a ellas. Para saber la informacion sobre cada una haga click en alguna de las subclases listadas.</div>
        </div>
      </div>
</div>
<script>
    var a = <?php echo json_encode($automoviles); ?>;
    function showAutomovil(contador){
       document.getElementById("nav-tabContent").innerHTML = a[contador];
    }
</script>