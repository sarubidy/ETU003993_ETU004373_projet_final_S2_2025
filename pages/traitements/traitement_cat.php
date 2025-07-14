<?php
require("../../includer/fonction.php");
$cat=$_POST['categorie'];
header("Location:../select.php?cat=$cat");
?>
