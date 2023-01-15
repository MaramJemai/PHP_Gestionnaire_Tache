<?php
    require_once("employe.php");
    $employe=new employe();
    $id=$_REQUEST['dd'];
    $r=$employe->supprimer($id);
    if($r)
    header("location:supprimer1.php");
    else echo "erreur de suppresion";
?>