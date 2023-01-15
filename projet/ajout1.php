<?php
    $vnom = $_POST['nom'];
    $vprofil = $_POST['profil'];
    $vdept_id = $_POST['dept_id'];
    $vemail = $_POST['email'];
    $vmdp = $_POST['mdp'];
    $vmdpv = $_POST['mdpv'];
    $vgenre = $_POST['genre'];
    require_once("employe.php");
    $employe = new employe();
    $employe->setNom($vnom);
    $employe->setProfil($vprofil);
    $employe->setDeptId($vdept_id);
    $employe->setEmail($vemail);
    $employe->setGenre($vgenre);
    if($vmdp!=$vmdpv)
    { header("Location:signup.php");
    echo "<div class='alert'>
        <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
        This is an alert box.
      </div>";    }
    else
    {   
    $employe->setMdp($vmdp);
    $retour=$employe->ajouter();
    header("Location:signin.php?retour=$retour");
  }
?>