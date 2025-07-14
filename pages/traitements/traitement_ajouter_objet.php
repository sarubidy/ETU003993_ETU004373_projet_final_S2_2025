<?php
session_start();
require("../../includer/fonction.php");

$nom = $_POST['nom_obj'];
$id_c = $_POST['id_c'];
$id_m = $_SESSION['ID_M'];

ajouter_obj($nom, $id_c, $id_m);
$id_objet = get_id_objet($nom, $id_c, $id_m);

// Traitement des images
$uploadDir = __DIR__ . '/../../assets/uploads/';
$maxSize = 2 * 1024 * 1024;
$allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/avif'];

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

foreach ($_FILES['images']['tmp_name'] as $index => $tmpName) {
    if (!is_uploaded_file($tmpName)) continue;

    $error = $_FILES['images']['error'][$index];
    $size = $_FILES['images']['size'][$index];
    $name = $_FILES['images']['name'][$index];

    if ($error !== UPLOAD_ERR_OK || $size > $maxSize) continue;

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $tmpName);
    finfo_close($finfo);

    if (!in_array($mime, $allowedMimeTypes)) continue;

    $extension = pathinfo($name, PATHINFO_EXTENSION);
    $newName = time() . '_' . uniqid() . '.' . $extension;

    if (move_uploaded_file($tmpName, $uploadDir . $newName)) {
        ajouter_image_objet($id_objet, $newName);
    }
}

// Redirection après insertion
header("Location: ../accueil.php");
exit;
