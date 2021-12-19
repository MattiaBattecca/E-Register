<?php
include('../template/template_header_studente.php');
include('../dal.php');
$id_std = $_GET["id"];
$id_mat =  $_GET["materia"];
$voti = voti($id_std, $id_mat);
$mat = materia_by_id($id_mat);
$std = nome_std($id_std);
?>
 
<div class="container" id="cerca_classe" ">
    <h2>Voti <?=$mat[0]?> - <?=$std[0]?></h2> 
        <?php foreach($voti as $record){ ?>
            <?=$record[1]?><hr>
        <?php } ?>

</div>

<?php
include('../template/template_footer.php');
?>