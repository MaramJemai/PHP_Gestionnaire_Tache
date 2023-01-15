<?php
require_once("objet.php");
$objet=new objet();
$id=$_REQUEST['dd'];
$res=$objet->connexion()->query("SELECT * FROM objets where id=$id");
$le_objet=$res->fetch();
$le_objet[1]=$_POST['nom'];
$le_objet[2]=$_POST['dept_id'];
$objet->setNom($le_objet[1]);
$objet->setDeptId($le_objet[2]);
/*$objet->setDeptId($_POST['dept_id']);
$objet->setNom($_POST['nom']);*/

$r=$objet->modifier($id);
if($r)
header("Location:liste3.php");
else
echo "echec de modification ";
?>