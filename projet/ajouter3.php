<?php
session_start();
include("index.php");
$con = mysqli_connect('127.0.0.1:3306','root','','gestionnaire') or die('Unable To connect');
$emp = "SELECT * FROM departements";
$list = mysqli_query($con,$emp);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ajouter un Objet</h1>
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
                        <form role="form" action="ajout3.php" method="post">
                            <div class="form-group" >
                                    <label>Nom </label>
                                    <input type="text" class="form-control" placeholder="Nom" name="nom">
                            </div>
                            <div class="form-group" >
                                <label>Département </label>
                                <select class="form-control" name="dept_id">
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
