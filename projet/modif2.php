<?php
session_start();
$id=$_SESSION["id"];
require_once("tache.php");
$con = mysqli_connect('127.0.0.1:3306','root','','gestionnaire') or die('Unable To connect');
$emp = "SELECT * FROM employes";
$list = mysqli_query($con,$emp);
include("index.php");
$obj = "SELECT * FROM objets";
$list1 = mysqli_query($con,$obj);
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Modifier une tache
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Remplir le forulaire
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <?php
                                    $tache = new tache();
                                    $id = $_REQUEST['dd'];
                                    $res = $tache->connexion()->query("SELECT * from taches where id=$id");
                                    $la_tache=$res->fetch();
                                    echo"
                                    <form role='form' action='mod2.php?dd=$id' method='post'>
                                    <div class='form-group'>
                                            <label>priority</label>
                                            <select class='form-control' value='$la_tache[1]' name='priorite'>
                                                <option class='rouge'>trés urgente</option>
                                                <option class='orange'>Ugente</option>
                                                <option class='jaune'>Pas urgente</option>
                                            </select>
                                    </div>
                                    <div class='form-group' >
                                            <label>Détails</label>
                                            <input class='form-control' placeholder='Détails' value='$la_tache[5]' name='details'>
                                    </div>
                                    <div class='form-group'>
                                            <label>Etat</label>
                                            <select class='form-control' value='$la_tache[6]' name='etat'>
                                            <option>Demande envoyée</option>
                                            <option>En cours</option>
                                            <option>Términée</option>
                                            <option>Bloquée</option>";
                                                if($id==1)
                                                echo "<option>Verifiée</option>";
                                    echo"
                                            </select>
                                    </div>
                                    <div class='form-group'>
                                            <label>Date limite</label>
                                            <input class='form-control' type='date' value='$la_tache[7]' name='date_l' >
                                    </div>
                                    <div class='form-group' >
                                            <label>Réalisée par</label>
                                            <select class='form-control' value='$la_tache[8]' name='recu'>";
                                                 while ($row = mysqli_fetch_array($list)):
                                                   echo" <option value="; echo $row[0] ; echo ">"; echo $row[1]; echo"</option>";
                                                endwhile; echo " 
                                            </select>
                                    </div>
                                    <input type='submit' name='submit' class='btn btn-lg btn-success btn-block' value='Submit'>

                                    </form>";
                                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
