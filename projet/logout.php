<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["nom"]);
header("Location:signin.php");
?>