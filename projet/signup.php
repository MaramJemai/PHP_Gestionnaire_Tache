<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Créer un compte</title>
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Créer un compte</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="ajout1.php" method="post">
                            <fieldset>
                                <div class="form-group" >
                                    <input class="form-control" placeholder="Nom" name="nom" type="text" autofocus>
                                </div>
                                <div class="form-group" >
                                    <input class="form-control" placeholder="Profil" name="profil" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <select id="departement" name="dept_id" class="form-control">
                                      <option value="0">Choisir une département</option>
                                      <option value="1">Marketing digital</option>
                                      <option value="2">Développement web</option>
                                      <option value="3">Développement mobile</option>
                                      <option value="4">Design</option>
                                    </select>
                                <div>
                                    <br>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mot de passe" name="mdp" type="password" >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Confirmer Mot de passe" name="mdpv" type="password" >
                                </div>
                                
                                <div class="form-group">
                                    <label>Je suis</label>
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
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="I agree the terms and conditions">J'accepte les termes et les conditions
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">S'inscrire</button>
                                Déja un membre ? <a href="signin.php">Connecter</a>
                            </fieldset>
                        </form>
<?php
if(isset($_REQUEST['retour']))
{
  $res=$_REQUEST['retour'];
  if($res)
  echo "<center><b><span style='color:green'>welcome</span></b></center>";
  else
  echo "<center><b><span style='color:red'>password incorrect</span></b></center>";
}
?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
