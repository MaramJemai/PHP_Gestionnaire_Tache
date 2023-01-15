<?php
session_start();
require_once("departement.php");
include("index.php");
?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Modifier un Département
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
                                    $dept = new departement();
                                    $id =$_REQUEST['dd'];
                                    $res = $dept->connexion()->query("SELECT * from departements where id=$id");
                                    $le_departement=$res->fetch();
                                    echo"
                                    <form role='form' action='mod4.php?dd=$id' method='post'>
                                    <div class='form-group' >
                                            <label>Nom</label>
                                            <input class='form-control' placeholder='Nom , Prénom' value='$le_departement[1]' name='nom'>
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
