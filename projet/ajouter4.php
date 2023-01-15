<?php
session_start();
include("index.php");
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ajouter un département</h1>
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
                            <form role="form" action="ajout4.php" method="post">
                            <div class="form-group" >
                                    <label>Nom </label>
                                    <input type="text" class="form-control" placeholder="Nom" name="nom">
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