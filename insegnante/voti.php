<?php
include('../template/template_header_studente.php');
include('../dal.php');
$id_prof = $_GET["id"];
$id_classe = $_GET["classe"];
$id_mat =  $_GET["materia"];
$cls_name = classe_from_id($id_classe);
$classe = classe_sel_studenti($id_classe);
$mat = materia_by_id($id_mat);
?>
 
<div class="container" id="cerca_classe">
    <h2>Voti <?=$cls_name?> - <?=$mat[0]?></h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Voti</th>
        </tr> 
        <?php foreach($classe as $record){ ?>
        <tr>
            <td><?=$record[1]?></td>
            <td><?=$record[2]?></td>
            <td><a class="btnsmall" href="situazione_studente.php?id=<?=$record[0]?>&materia=<?=$id_mat?>">Visualizza</a></td>
        </tr> 
        <?php } ?>
    </table>

</div>

<?php
include('../template/template_footer.php');
?>