<?php 
require("../../includer/fonction.php");
$nom = $_POST['nom'];
$naissance = $_POST['naissance'];
$mail = $_POST['mail'];
$mdp = $_POST['passe'];
$mdp2 = $_POST['passe2'];
$ville = $_POST['ville'];
$genre = $_POST['genre'];

if($mdp == $mdp2)
{
    $val = verif_insc($mail);
    if($val!=0)
    {
        header('Location:../inscription.php?num=2');
    }else
    {
        inscr($nom,$naissance,$mail,$mdp,$genre, $ville);
        header('Location:../login.php');
    }
}else
{
    header('Location:../inscription.php?num=3');
    exit;
}
?>
