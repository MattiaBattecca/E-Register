<?php
include('../dal.php');
$id_std =  $_GET["id_std"];
$id_mat =  $_GET["id_mat"];
$id_prof = $_GET["id_prof"];
$id_voto = $_GET["id_voto"];
delete_voto( $id_voto);
header("Location: situazione_studente.php?id_prof=$id_prof&id_std=$id_std&id_mat=$id_mat");
?>