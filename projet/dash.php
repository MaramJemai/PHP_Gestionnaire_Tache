<?php
session_start();
$id=$_SESSION['id'];
if(!$_SESSION['nom']) 
{echo "<h1>Veillez se connectez ! </h1>";}
else include("index.php");
$con = mysqli_connect('127.0.0.1:3306','root','','gestionnaire') or die('Unable To connect');
if($id==1)
    $tas = "SELECT * FROM taches WHERE etat!='Demande envoyée'";
else 
    $tas = "SELECT * FROM taches WHERE recu=$id AND etat != 'Demande envoyée'";
$list = mysqli_query($con,$tas);
$a=0;
$e=0;
$t=0 ;
$date = date('y-m-d');
$date1 = date('y-m-d', strtotime(' + 3 days')); 
while ($row = mysqli_fetch_array($list)):
    $date2 = date('y-m-d', strtotime($row[7]));
                if($row[6]=='Términée')
                    $t=$t+1;
                elseif($date2< $date)
                    $e=$e+1;
                elseif($date2 >= $date && $date2<= $date1 )
                    $a=$a+1;
endwhile;
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tableau de bord</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-smile-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $t ; ?></div>
                                    <div>Taches effectuees!</div>
                                </div>
                            </div>
                        </div>
                        <a href="teffectuee.php">
                            <div class="panel-footer">
                                <span class="pull-left">Voir Détails</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-meh-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $a ; ?></div>
                                    <div>Tache presque expiree!</div>
                                </div>
                            </div>
                        </div>
                        <a href="tpresque.php">
                            <div class="panel-footer">
                                <span class="pull-left">Voir Détails</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-frown-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $e ; ?></div>
                                    <div>Taches expirees!</div>
                                </div>
                            </div>
                        </div>
                        <a href="texpiree.php">
                            <div class="panel-footer">
                                <span class="pull-left">Voir Détails</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
</body>

</html>
