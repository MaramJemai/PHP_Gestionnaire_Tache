<?php
session_start();
require_once("objet.php");
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
                                    $obj = new objet();
                                    $id = $_REQUEST['dd'];
                                    $res = $obj->connexion()->query("SELECT * from objets where id=$id");
                                    $le_objet=$res->fetch();
                                    echo"
                                    <form role='form' action='mod3.php?dd=$id' method='post'>
                                    <div class='form-group' >
                                            <label>Nom</label>
                                            <input class='form-control' placeholder='Nom' value='$le_objet[1]' name='nom'>
                                    </div>
                                    <div class='form-group' >
                                    <label>Département</label>
                                    <select class='form-control' value='$le_objet[2]' name='dept_id'>";
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
