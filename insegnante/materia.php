<?php
include('../template/template_header_studente.php');
include('../dal.php');
$id_prof = $_GET["id"];
$id_cls = $_GET["classe"];
?>
 
<div class="container" id="cerca_classe">
    <h2>Materie della classe </h2>
    <?php 
    foreach(materie_del_prof_nella_classe($id_prof, $id_cls) as $mat){
    ?>
        <a href="voti.php?id=<?=$id_prof ?>&classe=<?=$id_cls?>&materia=<?=$mat[0]?>" class="btn"><?=$mat[1]?></a>
    <?php 
    }
    ?>
</div>
<?php
include('../template/template_footer.php');
?>