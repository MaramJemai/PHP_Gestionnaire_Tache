<?php
    require_once("tache.php");
    $tache=new tache();
    $id=$_REQUEST['dd'];
    $res = $tache->connexion()->query("SELECT * from taches where id=$id");
    $la_tache=$res->fetch();
    $la_tache[1]=$_POST['priorite'];
    $la_tache[5]=$_POST['details'];
    $la_tache[6]=$_POST['etat'];
    $la_tache[7]=$_POST['date_l'];
    $la_tache[8]=$_POST['recu'];
    $tache->setPriorite($la_tache[1]);
    $tache->setDetails($la_tache[5]);
    $tache->setEtat($la_tache[6]);
    $tache->setDate_l($la_tache[7]);
    $tache->setRecu($la_tache[8]);
    $r=$tache->modifier($id);
    if($r)
    header("location:liste2.php");
    else echo "echec de modificationn";
?>