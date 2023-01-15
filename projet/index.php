<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>tableau de bord</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php 
                        
                        require_once("tache.php");
                        $tache = new tache ();
                        $les_taches=$tache->demande($_SESSION['id']);
                        $nbr=count($les_taches);
                        
                         require_once("employe.php");
                         $employe=new employe ();
                         $les_employes=$employe->editAll();
                              
                         require_once("objet.php");
                         $obj=new objet ();
                         $les_objets=$obj->selectionner_tout();
                        ?>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="logo.png" width="165px" hight="70px">
            </div>
            <!-- /.navbar-header -->
            
            <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
            <?php
 foreach ($les_taches as $item) {
    foreach ($les_employes as $item1){
        if($item[3]==$item1[0]):
           $item[3]= $item1[1];
        endif;
       
       if($item[8]==$item1[0]):
            $item[8]= $item1[1];
         endif;}
    foreach ($les_objets as $item2){
            if($item[4]==$item2[0]):
               $item[4]= $item2[1];
            endif;}
                        
                        echo "
                        <li>
                            <a href='demande.php'>
                                <div>
                                    <strong>$item[3]</strong>
                                    <span class='pull-right text-muted'>
                                        <em>$item[2]</em>
                                    </span>
                                </div>
                                <div>$item[4]</div>
                            </a>
                        </li>
                        <li class='divider'></li>
                        ";}?>
                    
                            <a class="text-center" href="demande.php">
                                <strong>Consulter les demandes </strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
    
            
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profil.php"><i class="fa fa-user fa-fw"></i>Profile</a>
                        </li>
                        <li><a href="parametre.php"><i class="fa fa-gear fa-fw"></i> Paramétre</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <style>
                                #user{border-radius:50% }
                                #name{ text-align: center }
                            
                            </style>
                            <?php
                            $image=$_SESSION['genre'];
                            if($image == 'femme')
                               echo " <img id='user'src='usr.png' width='200' hight='200'>";
                            else
                                echo " <img id='usr'src='user.png' width='200' hight='200'>";    
                            ?>
                            <p id="name" style="font-size: 37px ; color:#5F9EA0" > <?php echo $_SESSION["nom"]; ?></p>                             </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="dash.php"><i class="fa fa-dashboard fa-fw"></i> Tableau de bord</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Gerer les taches<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="ajouter2.php">Ajouter une tache</a>
                                </li>
                                <li>
                                    <a href="modifier2.php">Modifier une tache</a>
                                </li>
                                <li>
                                <a href="supprimer2.php">Supprimer une tache</a>
                                </li>
                                <li>
                                <a href="liste2.php">Lister les taches</a>
                                </li>
                            </ul>
                        </li>
<?php
if($_SESSION['nom']=='Nahed K') echo"
                        <li>
                            <a href='#'><i class='fa fa-sitemap fa-fw'></i> Gerer les utilisateurs<span class='fa arrow'></span></a>
                            <ul class='nav nav-second-level'>
                                <li>
                                    <a href='ajouter1.php'>Ajouter un utilisateur</a>
                                </li>
                                <li>
                                    <a href='modifier1.php'>Modifier un utilisateur</a>
                                </li>
                                <li>
                                <a href='supprimer1.php'>Supprimer un utilisater</a>
                                </li>
                                <li>
                                <a href='liste1.php'>Lister les utilisateurs</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href='#'><i class='fa fa-sitemap fa-fw'></i> Gerer les objets<span class='fa arrow'></span></a>
                            <ul class='nav nav-second-level'>
                                <li>
                                    <a href='ajouter3.php'>Ajouter un objet</a>
                                </li>
                                <li>
                                    <a href='modifier3.php'>Modifier un objet</a>
                                </li>
                                <li>
                                <a href='supprimer3.php'>Supprimer un objet</a>
                                </li>
                                <li>
                                <a href='liste3.php'>Lister les objets</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href='#'><i class='fa fa-sitemap fa-fw'></i> Gerer les départements<span class='fa arrow'></span></a>
                            <ul class='nav nav-second-level'>
                                <li>
                                    <a href='ajouter4.php'>Ajouter un département</a>
                                </li>
                                <li>
                                    <a href='modifier4.php'>Modifier un département</a>
                                </li>
                                <li>
                                <a href='supprimer4.php'>Supprimer un département</a>
                                </li>
                                <li>
                                <a href='liste4.php'>Lister les départements</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        "





                       ?>
                    </ul>
                </div>
            </div>
        </nav>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/metisMenu/metisMenu.min.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>