<?php
session_start();
$n=$_SESSION['nom'];
$p=$_SESSION['profil'];
$d=$_SESSION['departement'];
$e=$_SESSION['email'];
include('index.php');
echo"
<div id='page-wrapper'>
<div class='row'>
    <div class='col-lg-12'>
        <h1 class='page-header'>Profil de l'utilisateur</h1>
    </div>
</div>
<style>
h5{font-weight: bold}
</style>
        <div class='col-lg-4'>
        <div class='well'>
            <h4>Information Personnelle</h4>
            <hr>
            <br>
            <h5 >Nom</h5>
            $n
            <h5>Profil</h5>
            $p
            <h5>Département</h5>
            $d
        </div>
    </div>
    <div class='col-lg-4'>
    <div class='well'>
        <h4>Contact</h4>
        <hr>
        <br>
        <h5>Email</h5>
                 $e
        </div>
</div>
"
?>
</body>
    </html>