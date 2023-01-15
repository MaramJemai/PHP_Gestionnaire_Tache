<?php
session_start();
require_once("employe.php");
include("index.php");
$con = mysqli_connect('127.0.0.1:3306','root','','gestionnaire') or die('Unable To connect');
$emp = "SELECT * FROM departements";
$list = mysqli_query($con,$emp);
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Modifier un employé
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
                                    $employe = new employe();
                                    $id = $_REQUEST['dd'];
                                    $res = $employe->connexion()->query("SELECT * from employes where id=$id");
                                    $le_employe=$res->fetch();
                                    echo"
                                    <form role='form' action='mod1.php?dd=$id' method='post'>
                                    <div class='form-group' >
                                            <label>Nom , Prénom</label>
                                            <input class='form-control' placeholder='Nom , Prénom' value='$le_employe[1]' name='nom'>
                                    </div>
                                    <div class='form-group' >
                                            <label>Profil</label>
                                            <input class='form-control' placeholder='Profil' value='$le_employe[2]' name='profil'>
                                    </div>
                                    <div class='form-group' >
                                    <label>Département</label>
                                    <select class='form-control' value='$le_employe[3]' name='dept_id'>";
                                         while ($row = mysqli_fetch_array($list)):
                                           echo" <option value="; echo $row[0] ; echo ">"; echo $row[1]; echo"</option>";
                                        endwhile; echo " 
                                    </select>
                                    </div>                   
                                    <div class='form-group' >
                                        <label>E-mail</label>
                                        <input type='email' class='form-control' placeholder='E-mail' value='$le_employe[4]' name='email'>
                                    </div>
                                    <div class='form-group' >
                                            <label>Mot de passe</label>
                                            <input type='password' class='form-control' placeholder='Mot de passe' value='$le_employe[5]' name='mdp'>
                                    </div>
                                    
                                    <input type='submit' name='submit' class='btn btn-lg btn-success btn-block' value='Submit'>

                                    </form>";
                                    ?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
    </div>
</body>
</html>
