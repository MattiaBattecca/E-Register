<?php
include('dal.php');

$classe = $_GET['cerca_classe'];
if(strlen($classe)==2){
    $id = classe($classe);
    if($id >= 0){
        header("Location: cerca.php?id_classe=".$id);
    }
    else{
        header("Location: classenontrovata.php");
    }
}

else{
    header("Location: classenontrovata.php");
}

?>