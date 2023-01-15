<?php
$vnom=$_POST['nom'];
$vdept_id=$_POST['dept_id'];
require_once("objet.php");
$objet=new objet();
$objet->setNom($vnom);
$objet->setDeptId($vdept_id);
$retour=$objet->ajouter();
header("Location:dash.php?retour=$retour");
?>