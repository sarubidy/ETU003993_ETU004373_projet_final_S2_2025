<?php
require("../../includer/fonction.php");
$cat=$_POST['categorie'];
header("Location:../accueil.php?cat=$cat");
?>
