<?php
include('../template/template_header_studente.php');
include('../dal.php');
$id_std = $_GET["id_std"];
$id_prof = $_GET["id_prof"];
$id_mat =  $_GET["id_mat"];
$voti = voti($id_std, $id_mat);
$mat = materia_by_id($id_mat);
$std = nome_std($id_std);
?>
 
<div class="container" id="cerca_classe" >
    <h2>Voti <?=$mat[0]?> - <?=$std[0]?></h2> 

    <div class="voti">
        <?php foreach($voti as $record){ ?>
            <a href="edit_voto.php?id_prof=<?=$id_prof?>&id_std=<?=$id_std?>&id_mat=<?=$id_mat?>&id_voto=<?=$record[0]?>" class="btnsmall"> <?=$record[1]?></a>
        <?php } ?>

    </div>
    <p class="dist">
        <a href="inserisci_voto.php?id_prof=<?=$id_prof?>&id_std=<?=$id_std?>&id_mat=<?=$id_mat?>" class="btn ">Inserisci</a></p>
</div>

<?php
include('../template/template_footer.php');
?>
