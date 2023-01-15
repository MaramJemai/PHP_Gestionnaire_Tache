<?php
require_once("departement.php");
$dept=new departement();
$id=$_REQUEST['dd'];
$r=$dept->supprimer($id);
if($r)
header("Location:supprimer4.php");
else echo "echec de suppression";
?>