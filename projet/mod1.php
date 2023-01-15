<?php
    require_once("employe.php");
    $employe=new employe();
    $id=$_REQUEST['dd'];
    $res = $employe->connexion()->query("SELECT * from employes where id=$id");
    $le_employe=$res->fetch();
    $le_employe[1]=$_POST['nom'];
    $le_employe[2]=$_POST['profil'];
    $le_employe[3]=$_POST['dept_id'];
    $le_employe[4]=$_POST['email'];
    $le_employe[5]=$_POST['mdp'];
    $employe->setNom($le_employe[1]);
    $employe->setProfil($le_employe[2]);
    $employe->setDeptId($le_employe[3]);
    $employe->setEmail($le_employe[4]);
    $employe->setMdp($le_employe[5]);
    $r=$employe->modifier($id);
    if($r)
    header("location:liste1.php");
    else echo "echec de modificationn";
   
?>