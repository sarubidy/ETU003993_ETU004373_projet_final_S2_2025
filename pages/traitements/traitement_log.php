<?php
session_start();
require("../../includer/fonction.php");
$mail = $_POST['mail'];
$mdp = $_POST['passe'];

$donnes = login($mail,$mdp);

if($donnes==0)
{
    header('Location:../login.php?num=1');
    exit;
}

$_SESSION['nom'] = $donnes['nom'];
$_SESSION['genre'] = $donnes['genre'];
$_SESSION['mail'] = $donnes['Email'];
$_SESSION['ID_M'] = $donnes['id_membre'];
    header('Location:../accueil.php');
    exit;

?>
