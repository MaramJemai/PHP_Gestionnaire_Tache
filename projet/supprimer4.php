<?php
session_start();
if(!$_SESSION['nom']) 
{echo "<h1>Veillez connectez !</h1>";}
else include("index.php");
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Employés</h1>
            </div>
        </div>
    </div>
<?php
require_once("departement.php");
 $dept=new departement ();
 $les_depts=$dept->selectionner_tout();
 $nbr=count($les_depts);

 echo "<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                Départements
            </div>
            <div class='panel-body'>";
if( $nbr==0){
echo "<b>pas de départements  !</b>";}
else{
echo "<table  class='table table-striped table-bordered table-hover' id='dataTables-example'>";
 echo "<thead><tr><th width=50px >id</th><th width=50px >Nom</th><th width=50px>Supprimer</th></tr></thead><tbody>";
foreach ($les_depts as $item) {
echo "<tr style='fontsize:3'><td width=50px >". $item[0] . "</td><td width=50px >" . $item[1]."</td>" ;
echo "<td width=50px>
<a href='supp4.php?dd=$item[0]'><i style ='font-size: 25px ; color:#E34234' class='fa fa-trash'></i></a>
</td></tr>";
}
echo "</tbody></table></div>
</div>
</div>
</div>
";
}
?>
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
</body>
</html>
<button type="button" class="btn btn-primary">Primary</button>