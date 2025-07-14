<?php
require("../includer/fonction.php");

if (!isset($_GET['num'])) {
    die("Aucun objet sélectionné.");
}

$id_objet = intval($_GET['num']);

$objet = get_infos_objet($id_objet);
$images = get_images_objet($id_objet);
$emprunts = get_historique_emprunts($id_objet);
if (isset($_GET['suppr_image'])) {
    $nom_image = $_GET['suppr_image'];
    supprimer_image_objet($id_objet, $nom_image);
    header("Location: objet.php?num=" . $id_objet);
    exit;
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche de l'objet</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            padding: 30px;
            font-family: 'Segoe UI', sans-serif;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        h1, h2, h3 {
            color: #343a40;
        }
        .images-container img {
            border: 2px solid #ddd;
            border-radius: 6px;
            transition: transform 0.3s ease;
        }
        .images-container img:hover {
            transform: scale(1.05);
        }
        .images-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .table th {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">RE<span class="text-primary">NT</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
  <a href="accueil.php" class="btn btn-primary ms-2">retour</a>
</nav>
    <div class="container">
        <h1 class="text-center mb-4">Fiche de l'objet</h1>

        <h2><?= $objet['nom_objet'] ?></h2>
        <p><strong>Catégorie :</strong> <?= $objet['nom_categorie'] ?></p>
        <p><strong>Propriétaire :</strong> <?= $objet['nom_membre'] ?> (<?= $objet['ville'] ?>)</p>

        <h3>Images</h3>
        <?php if (count($images) > 0) { ?>
            <div class="images-container">
                <?php foreach ($images as $index => $img) { ?>
                    <img src="../assets/uploads/<?= $img ?>" style="width: <?= $index === 0 ? '200px' : '100px' ?>;">
                <?php } ?>
            </div>
        <?php } else { ?>
            <p class="text-muted">Aucune image disponible.</p>
        <?php } ?>

        <h3 class="mt-4">Historique des emprunts</h3>
        <?php if (count($emprunts) > 0) { ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Emprunteur</th>
                            <th>Date d'emprunt</th>
                            <th>Date de retour</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($emprunts as $emp) { ?>
                            <tr>
                                <td><?= $emp['emprunteur'] ?></td>
                                <td><?= $emp['date_emprunt'] ?></td>
                                <td><?= $emp['date_retour'] ?? '<i>Non retourné</i>' ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <p class="text-muted">Aucun emprunt enregistré.</p>
        <?php } ?>
    </div>
</body>
</html>
