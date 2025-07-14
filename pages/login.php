<?php 
session_start();
require('../includer/connection.php');
$error = "";
if(isset($_GET['num'])) {
    if($_GET['num'] == 1) {
        $error = 'Veuillez remplir tous les champs';
    }
    if($_GET['num'] == 3) {
        $error = "Mot de passe incorrect";
    }
}
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
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">RE<span class="text-primary">NT</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
    <div class="container mt-4 d-flex flex-column justify-content-center align-items-center" style="min-height:90vh;">
        <div class="card shadow-sm p-4" style="max-width: 400px; width:100%;">
            <h3 class="mb-4 text-center">Connexion</h3>
            <?php if($error) { ?>
                <div class="alert alert-danger py-2"><?= $error ?></div>
            <?php } ?>
            <form action="traitements/traitement_log.php" method="post">
                <div class="mb-3">
                    <label for="mail" class="form-label">Adresse E-mail</label>
                    <input type="email" class="form-control" id="mail" name="mail" required>
                </div>
                <div class="mb-4">
                    <label for="passe" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="passe" name="passe" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-2">Se connecter</button>
            </form>
            <a href="index.php" class="btn btn-outline-secondary w-100">Annuler</a>
        </div>
    </div>
</body>
</html>