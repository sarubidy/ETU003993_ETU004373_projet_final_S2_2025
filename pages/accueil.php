<?php
session_start();
require("../includer/fonction.php");
$_nom = $_SESSION['nom'];
$ID_M = $_SESSION['ID_M'];
echo "Bienvenu $_nom";
$donne = list_cat();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<form action="traitements/traitement_cat.php" method="post">
        <select name="categorie">
            <?php foreach($donne as $result) { ?>
                <option value="<?= $result["nom"] ?>"><?= $result["nom"] ?></option>
           <?php } ?>
        </select>
        <input type="submit" value="ok">
</form>
    <?php if(isset($_GET['cat']))  {  
        $val=aff_objet($_GET['cat']) ?>
        <table border="1px">
            <th>Objet</th>
            <th>Membre</th>
            <th>Emprunt</th>
            
            <?php while($ls = mysqli_fetch_assoc($val))  {  ?>
                <tr>
                    <td><?= $ls['obj']?></td>
                    <td><?= $ls['nom']?></td>
                    <td><?= $ls['emp']?></td>
                </tr>
            <?php }  ?>
        </table>

       <?php }  ?>
       <a href="deco.php">Déconnection</a>
</body>
</html>
