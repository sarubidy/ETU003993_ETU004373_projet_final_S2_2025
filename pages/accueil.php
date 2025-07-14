<?php
session_start();
require("../includer/fonction.php");
$_nom = $_SESSION['nom'];
$ID_M = $_SESSION['ID_M'];
$val=aff_all_objet();
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
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">RE<span class="text-primary">NT</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
<ul>
    <li>
        <a href="select.php">Filtrage par categorie</a>
    </li>
    <li>
        <a href="deco.php">Déconnection</a>
    </li>
</ul>
</nav>

<form action="traitements/traitement_ajouter_objet.php" method="post" enctype="multipart/form-data">
    <p>Nom de l'objet : <input type="text" name="nom_obj" required></p>

    <p>
        Catégorie :
        <select name="id_c" required>
            <?php foreach($donne as $result) { ?>
                <option value="<?= $result["id"] ?>"><?= $result["nom"] ?></option>
            <?php } ?>
        </select>
    </p>

    <p>Images (optionnel) :</p>
    <input type="file" name="images[]" accept="image/*" multiple>

    <br><br>
    <input type="submit" value="Valider">
</form>


    
<h3 class="text-center">Bienvenu <?= $_nom ?></h3>
<h1>Liste des objet</h1>
<table class="table">
  <thead class="text-center">
    <tr class="bg-primary">
      <th scope="col">Objet</th>
      <th scope="col">Membre</th>
      <th scope="col">Emprunt</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
        <?php while($ls = mysqli_fetch_assoc($val))  {  ?>
                <tr>
                    <td><a href="objet.php?num=<?= $ls['id'];?>"><?= $ls['objet'];?></a></td>
                    <td><a href="profil.php?num=<?= $ls['id_m'] ?>"><?= $ls['proprietaire'];?></a></td>
                    <td><?= $ls['date_retour'];?></td>
                    <td><?= $ls['disp'];?></td>
                    <td><a href="dispo.php?id=<?= $ls['id'];?>&prop=<?= $ls['proprietaire'];?>"><button>Emprunter</button></a></td>
                </tr>
        <?php }  ?>
  </tbody>
</table>
</body>
</html>
