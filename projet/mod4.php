<?php
require_once("departement.php");
$dept=new departement();
$id=$_REQUEST['dd'];
$res=$dept->connexion()->query("SELECT nom FROM departements WHERE id=$id");
$le_dept=$res->fetch();
$le_dept[1]=$_POST['nom'];
$dept->setNom($le_dept[1]);
$r=$dept->modifier($id);
if($r)
header("Location:liste4.php");
else
echo "echec de modification ";
?>
