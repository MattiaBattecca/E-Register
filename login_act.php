<?php
include('dal.php');
$username = $_POST["username"];
$password = $_POST["password"];


$id = log_insegnante($username, $password);
if($id>=0){
    header("Location: insegnante/insegnante.php?id=".$id);
}
else{
    $id=log_studente($username, $password);

    if($id>=0){
        header("Location: studente/studente.php?id=".$id);
    }
    else{
        header("Location: login_credenzialierrate.php");
    }
}
?> 