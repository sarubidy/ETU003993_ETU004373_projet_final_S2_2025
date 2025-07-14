<?php 
session_start();
require('../includer/connection.php');

$num=0;
$error=" ";
if(isset($_GET['num']))
{
    if($_GET['num'] == 1)
    {
        $error = 'Veuillez remplir tous les champs';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/js/bootstrap.bundle.min.js"></script>    <title>Document</title>
</head>
<body >

   <div class="main_a">
        <form action="traitements/traitement_log.php" method="post">
            <div class="form">
                <p>Adresse E-mail: <input type="email" name="mail"></p>
            </div>
            <div class="form">
                <p>Mot de passe: <input type="password" name="passe"></p>
            </div>
            
            <input type="submit" value="se connecter" class="connexion">

        </form>
        <br>
        <span class="erreur"><?= $error; ?></span>
        <br>
        <br>
        <span class="ann"><a href="index.php">Anuler</a></span>
    </div>
</body>
</html>