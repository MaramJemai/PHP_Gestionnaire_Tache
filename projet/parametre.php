<?php
session_start();
$id=$_SESSION['id'];
include("index.php");
?>
<div id='page-wrapper'>
<div class='row'>
    <div class='col-lg-12'>
        <h1 class='page-header'>Paramétres du compte</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'> Changer votre mot de passe </div>
            <div class='panel-body'>
            <div class="row">
            <div class="col-lg-6">
                <form role="form" action="changer.php" method="post">
                <div class="form-group" >
                                    <label>Ancien mot de passe</label>
                                    <input type="password" class="form-control" placeholder="Mot de passe" name="mdp">
                            </div>
                            
                            <div class="form-group" >
                                    <label>Nouveau mot de passe</label>
                                    <input type="password" class="form-control" placeholder="Mot de passe" name="nmdp">
                            </div>
                            <div class="form-group" >
                                    <label>Verifier nouveau mot de passe</label>
                                    <input type="password" class="form-control" placeholder="Verifier mot de passe" name="nmdpv">
                            </div>

                            
<button  type="submit" class="btn btn-primary" name="submit" value="Submit">Changer</button>

</form>
            </div>
        </div>
    </div>
</div>


</body>
    </html>