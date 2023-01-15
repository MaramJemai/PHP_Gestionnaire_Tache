<?php
session_start();
$id=$_SESSION['id'];
if(!$_SESSION['nom']) 
{echo "<h1>Veillez se connectez</h1>";}
else include("index.php");
?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Liste des objets</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
<?php
require_once("objet.php");
$obj=new objet ();
$les_objs=$obj->selectionner_tout();
$nbr=count($les_objs); 
require_once("departement.php");
$dept=new departement ();
$les_depts=$dept->selectionner_tout();
 echo "<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                Les objets
            </div>
            <div class='panel-body'>";
if( $nbr==0){
echo "<b>Pas d'objets ! </b>";}
else{
echo "<table  class='table table-striped table-bordered table-hover' id='dataTables-example'>";
 echo "<thead><tr><th width=50px >Id</th><th width=50px >Nom</th><th width=50px>Département</th></tr></thead><tbody>";
foreach ($les_objs as $item) {
    foreach ($les_depts as $item1){
        if($item[2]==$item1[0]):
           $item[2]= $item1[1];
        endif;
       }
echo "<tr style='fontsize:3'><td width=50px >". $item[0] . "</td><td width=50px >" . $item[1]."</td><td width=50px>" .$item[2]."</td>" ;
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
