<?php
session_start();
$date = date('y-m-d');
    $vpriorite = $_POST['priorite'];
    $vdate_c = $date ;
    $vdonnee = $_SESSION["id"];
    $vobjet = $_POST['objet'];
    $vdetails = $_POST['details'];
    $vetat = 'Demande envoyée';
    $vdate_l = $_POST['date_l'];
    $vrecu = $_POST['recu'];
    require_once("tache.php");
    $tache = new tache();
    //if($tache->verifier($vobjet,$vrecu))
    //{
    $tache->setPriorite($vpriorite);
    $tache->setDate_c($vdate_c);
    $tache->setDonnee($vdonnee);
    $tache->setObjet($vobjet);
    $tache->setDetails($vdetails);
    $tache->setEtat($vetat);
    $tache->setDate_l($vdate_l);
    $tache->setRecu($vrecu);
    $retour=$tache->ajouter();
//}
    header("Location:dash.php?retour=$retour");
    //else 
    //header("Location:ajouter2.php?retour=$retour");

?>

