<?php
$vnom=$_POST['nom'];
require_once("departement.php");
$dep=new departement();
$dep->setNom($vnom);
$retour=$dep->ajouter();
header("Location:dash.php?retour=$retour");
?>