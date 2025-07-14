<?php
session_start();
require("../includer/fonction.php");
$_nom = $_SESSION['nom'];
$ID_M = $_SESSION['ID_M'];
$donne = list_cat();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <title>Documents</title>
</head>
<body class="bg-light">
    <nav class="navbar navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <span class="navbar-brand mb-0 h1 fw-bold">RE<span class="text-primary">NT</span></span>
            <span class="fw-bold">Bienvenu <?= $_nom ?></span>
        </div>
    </nav>
    <div class="container">
        <h3>Filtrage par catégorie</h3>
        <form class="mb-4" action="traitements/traitement_cat.php" method="post">
            <div class="row g-2 align-items-end">
                <div class="col-md-8">
                    <label class="form-label fw-bold">Catégorie:</label>
                    <select name="categorie" class="form-select">
                        <?php foreach($donne as $result) { ?>
                            <option value="<?= $result["nom"]?>"><?= $result["nom"]?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">OK</button>
                </div>
            </div>
        </form>
        <?php if(isset($_GET['cat'])){  
            $val = aff_objet($_GET['cat']); ?>
            <h5 class="mb-3">Liste des objets</h5>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php while($ls = mysqli_fetch_assoc($val)) { ?>
                    <div class="col">
                        <div class="card h-100 text-center">
                            <img src="<?= !empty($ls['image']) ? $ls['image'] : '../assets/uploads/defaut.png' ?>" class="card-img-top" alt="Image Objet" style="max-height: 180px; object-fit: cover;">
                            <div class="card-body">
                                <h6 class="card-title"><?= $ls['objet'] ?></h6>
                                <p class="card-text mb-1"><strong>Membre:</strong> <?= $ls['proprietaire'] ?></p>
                                <p class="card-text"><strong>Emprunt:</strong> <?= $ls['date_retour'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="mt-4">
            <a href="accueil.php" class="btn btn-secondary">Retour</a>
        </div>
    </div>
</body>
</html>