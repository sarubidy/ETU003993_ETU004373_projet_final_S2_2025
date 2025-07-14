<?php
require("../includer/fonction.php");
$num=$_GET["num"];
$donne=profil($num);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
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
  <a href="accueil.php" class="btn btn-primary ms-2">retour</a>
</nav>
    <div class="container">
    <div class="col-md-8 p-3">
    <h5 class="mb-3 fw-bold text-success">Edit Profile</h5>
    <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center fs-5 fst-italic">
            <strong>Nom :</strong><?= $donne['nom'] ?>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center fs-5 fst-italic">
            <strong>Date de naissance :</strong><?= date('d M Y', strtotime($donne['date_de_naissance'])); ?>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center fs-5 fst-italic">
            <strong>Genre :</strong><?= $donne['genre'] ?>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center fs-5 fst-italic">
            <strong>Ville :</strong><?= $donne['ville'] ?>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center fs-5 fst-italic">
            <strong>Email:</strong><?= $donne['Email'] ?>
        </li>
    </ul>
</div>
    </div>
</body>
</html>