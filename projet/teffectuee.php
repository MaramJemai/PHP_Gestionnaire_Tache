<?php
session_start();
$id=$_SESSION['id'];
if(!$_SESSION['nom']) 
{echo "<h1>Veillez se connectez ! </h1>";}
else include("index.php");
?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Taches effectuées</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>


<?php
require_once("tache.php");
 $tache=new tache ();
 if($id != 1) :
    $les_taches=$tache->edits11($id);
 else :
    $les_taches=$tache->edits1();
 endif;
 $nbr=count($les_taches);

 
 require_once("employe.php");
 $employe=new employe ();
 $les_employes=$employe->editAll();

 require_once("objet.php");
$obj=new objet ();
$les_objets=$obj->selectionner_tout();

 echo "<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                taches
            </div>
            <div class='panel-body'>";
if( $nbr==0){
echo "<b>Pas de taches !</b>";}
else{
echo "<table  class='table table-striped table-bordered table-hover' id='dataTables-example'>";
 echo "<thead><tr><th width=50px >Id</th><th width=50px >Priorité</th><th width=50px>Date de creation</th><th width=50px>Donnée par</th><th width=50px>Objet</th><th width=50px>Détails</th><th width=50px>Situation</th><th width=50px >Date limite</th><th width=50px >Réaliser par</th></tr></thead><tbody>";
foreach ($les_taches as $item) {

    
    foreach ($les_employes as $item1){
        if($item[3]==$item1[0]):
           $item[3]= $item1[1];
        endif;
        if($item[8]==$item1[0]):
            $item[8]= $item1[1];
         endif;
       }
       foreach ($les_objets as $item2){
        if($item[4]==$item2[0]):
           $item[4]= $item2[1];
        endif;}
echo "<tr style='fontsize:3'><td width=50px >". $item[0] . "</td><td width=50px >" . $item[1]."</td><td width=50px>" .$item[2]."</td><td width=50px>" . $item[3]."</td><td width=50px>" .$item[4]."</td><td width=50px>" . $item[5]."</td><td width=50px>" .$item[6]."</td><td width=50px>".$item[7]."</td><td width=50px>".$item[8]."</td>" ;
echo "</tr>";
}
echo "</tbody></table></div>
</div>
</div>
</div>
";
}
?>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
      <!-- Page-Level Demo Scripts - Tables - Use for reference -->
      <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
