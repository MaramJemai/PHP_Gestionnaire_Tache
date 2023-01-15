<?php
session_start();
include("index.php");
$con = mysqli_connect('127.0.0.1:3306','root','','gestionnaire') or die('Unable To connect');
$dept = "SELECT * FROM departements";
$list = mysqli_query($con,$dept);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ajouter un employé</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> Remplir le forulaire </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="ajout1.php" method="post">
                            <div class="form-group" >
                                    <label>Nom , Prénom</label>
                                    <input type="text" class="form-control" placeholder="Nom , Prénom" name="nom">
                            </div>
                            <div class="form-group" >
                                    <label>Profil</label>
                                    <input type="text" class="form-control" placeholder="Profil" name="profil">
                            </div>

                            <div class="form-group" >
                                <label>Département </label>
                                <select class="form-control" name="dept_id">
                                    <?php while ($row = mysqli_fetch_array($list)):?>
                                        <option value="<?php echo $row[0];?>"><?php echo $row[1]; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group" >
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" placeholder="E-mail" name="email">
                            </div>
                            <div class="form-group" >
                                    <label>Mot de passe</label>
                                    <input type="password" class="form-control" placeholder="Mot de passe" name="mdp">
                            </div>
                            <div class="form-group" >
                                    <label>Verifier mot de passe</label>
                                    <input type="password" class="form-control" placeholder="Verifier mot de passe" name="mdpv">
                            </div>
                            <div class="form-group">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="genre" id="optionsRadios1" value="femme" checked>Femme
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="genre" id="optionsRadios2" value="homme">Homme
                                        </label>
                                    </div>
                            <div>
                            <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
