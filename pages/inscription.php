<?php 
require('../includer/connection.php');
$num=0;
$error=" ";
if(isset($_GET['num']))
{
    if($_GET['num'] == 1)
    {
        $error = 'Veuillez remplir tous les champs';
    }
    if($_GET['num'] == 2)
    {
        $error = "L'adresse E-mail est déja utilisé par un(e) autre utilisateur/ice ";
    }
    if($_GET['num'] == 3)
    {
        $error = "Mot de passe incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Document</title>
</head>

<body>
    
        <form action="traitements/traitement_inscr.php" method="post">
        
            <p>Nom: <input type="text" name="nom" required></p>
        
            
            <p>Date de naissance: <input type="date" name="naissance" required></p>
        
            
            <p>Adresse E-mail: <input type="email" name="mail" required></p>
        
        
            <p>Genre: <select name="genre">
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
            </select>
        </p>
        
        
            <p>Ville: <input type="text" name="ville" required></p>
        
               
            <p>Mot de passe: <input type="password" name="passe" required></p>
        
                
            <p>Confirmer votre mot de passe: <input type="password" name="passe2" required></p>
        
            <input type="submit" value="s'inscrire" class="connexion">
        </form>
        <br>
        <p><span class="erreur"><?=$error;?></span></p>

        <br>
        <br>
        <span class="ann"><a href="index.php">Anuler</a></span>    
</body>
</html>