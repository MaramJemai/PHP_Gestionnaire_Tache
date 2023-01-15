<?php
session_start();
    require_once("employe.php");
    $employe=new employe();
    $id=$_SESSION['id'];
    $res = $employe->connexion()->query("SELECT * from employes where id=$id");
    $le_employe=$res->fetch();
    if(($le_employe[5]==$_POST['mdp'])  && ($_POST['nmdp']==$_POST['nmdpv']))
    $le_employe[5]=$_POST['nmdp'];
    $employe->setMdp($le_employe[5]);
    $r=$employe->changer($id);
    if($r)
    header("location:profil.php");
    else echo "echec de modificationn";
   
?>