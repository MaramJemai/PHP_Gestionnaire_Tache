<?php
session_start();
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
                        <h1 class="page-header">Ajouter une tache</h1>
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
                            <form role="form" action="ajout2.php" method="post">
                                <div class="form-group">
                                    <label>priorité</label>
                                    <select class="form-control" name="priorite">
                                            <option class='rouge'>tres urgente</option>
                                            <option class='orange'>urgente</option>
                                            <option class='jaune'>normale</option>
                                    </select>
                                </div>
                                <div class="form-group" >
                                <label>Objet </label>
                                <select class="form-control" name="objet">
                                    <?php while ($row1 = mysqli_fetch_array($list1)):?>
                                        <option value="<?php echo $row1[0];?>"><?php echo $row1[1]; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                                <div class="form-group" >
                                            <label>Détails de la tache</label>
                                            <input class="form-control" placeholder="Details" name="details">
                                </div>
                                <div class="form-group" >
                                            <label>Date limite</label>
                                            <input class="form-control" type="date" name="date_l" >
                                </div>
                                <div class="form-group" >
                                            <label>Realiser par </label>
                                            <select class="form-control" name="recu">
                                                <?php while ($row = mysqli_fetch_array($list)):?>
                                                    <option value="<?php echo $row[0];?>"><?php echo $row[1]; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                </div>
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
