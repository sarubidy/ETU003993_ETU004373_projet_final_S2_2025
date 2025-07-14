<?php
session_start();
require("../includer/fonction.php");
$_nom = $_SESSION['nom'];
$ID_M = $_SESSION['ID_M'];
echo "Bienvenu $_nom";
$donne = aff_objet();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="table table-dark table-sm">
        <thead class="table-dark">
            <tr>
                <th scope="col">Nom du département </th>
                <th scope="col">Manager</th>
                <th scope="col">Nombre d'employés</th>
            </tr>
        </thead>
        <tbody class="table-group-divider table-index">
            <?php while ($donne = mysqli_fetch_assoc($sortie)){?>
                <tr>
                    <td><?=$donne['dept_name']; ?></td>
                    <td><?=$donne['nom']," ",$donne['prenom']?> </td>
                    <td><?=$donne['nombre']; ?></td>
                </tr>
            <?php } mysqli_free_result($sortie); ?>
        </tbody>
    </table>
</body>
</html>
