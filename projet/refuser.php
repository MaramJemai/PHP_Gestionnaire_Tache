<?php
    require_once("tache.php");
    $tache=new tache();
    $id=$_REQUEST['dd'];
    $r=$tache->supprimer($id);
    if($r)
    header("location:demande.php");
    else echo "erreur de suppresion";
?>