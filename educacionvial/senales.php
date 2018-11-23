<?php
require './headerS.php';
require './db/db.php';
$cont = 0;
$sen_query = mysqli_query($link,"SELECT * FROM senal ORDER BY tipo ASC");
/*
0 = informativas
1 = preventivas
2 = reglamentacion
3 = transitorias
*/
?>
<div class="container">
    <?php
        while ($senal = mysqli_fetch_array($sen_query)){
            $cont++;
            if($cont == 1){
    ?>
            <div class="card-deck">
            <?php 
            } 
            ?>
            <div class="card" style="width: 12rem; height: auto; margin: 1rem;">
              <img class="card-img-top" src="<?php echo $senal['img']; ?>" alt="">
              <div class="card-body">
                <h5 class="card-title"><?php echo $senal['senal']; ?></h5>
                <p class="card-text"><?php echo $senal['descripcion']; ?></p>
                <a href="" class="btn btn-primary">
                    <?php 
                        switch($senal['tipo']){
                            case 0: echo "Informativa";
                                break;
                            case 1: echo "Preventiva";
                                break;
                            case 2: echo "Reglamentación";
                                break;
                            case 3: echo "Transitoria";
                        }
                    ?>
                </a>
              </div>
            </div>
        <?php
            if($cont == 3){
                $cont = 0;
        ?> 
    </div>
    <?php 
        }
    }
    ?>
</div>

