<?php
require_once("objet.php");
$objet=new objet();
$id=$_REQUEST['dd'];
$r=$objet->supprimer($id);
if($r)
header("Location:supprimer3.php");
else
echo ('echec de suppression');
?>