<?php 
require("connection.php");

function login($mail,$mdp)
{
    $sql="SELECT * FROM s2_membre WHERE Email ='$mail' AND MotDepasse ='$mdp' ";
    $connect = mysqli_query(dbconnect(), $sql);
    $donnees = mysqli_fetch_assoc($connect);
    return $donnees;
}

function verif_insc($mail)
{
    $requette = "SELECT * FROM s2_membre  WHERE Email = '$mail'";
    $resultat = mysqli_query(dbconnect(), $requette);
    $val = mysqli_fetch_assoc($resultat);
    return $val;
}

function inscr($nom,$naissance,$mail,$mdp,$genre,$ville)
{
    $sql="INSERT INTO s2_membre(nom,date_de_naissance,Email,MotDepasse,genre,ville) value('$nom' ,'$naissance' ,'$mail' ,'$mdp','$genre' ,'$ville')";
    $inscrit = mysqli_query(dbconnect(), $sql);
}

function list_cat() {
    $sql="SELECT s2_categorie_objet.id_categorie as id,s2_categorie_objet.nom_categorie as nom FROM s2_categorie_objet";
    $connect = mysqli_query(dbconnect(), $sql);
    $resultat=[];
    while($donnees = mysqli_fetch_assoc($connect)){
        $resultat[]= $donnees ;  
    }
    return $resultat;
}

function aff_objet($objet)
{
    $sql="SELECT 
                s2_objet.nom_objet AS objet,
                s2_categorie_objet.nom_categorie AS categorie,
                s2_emprunt.date_retour AS date_retour,
                s2_membre.nom AS proprietaire
            FROM s2_objet
            JOIN s2_membre ON s2_objet.id_membre = s2_membre.id_membre
            JOIN s2_categorie_objet ON s2_objet.id_categorie = s2_categorie_objet.id_categorie
            LEFT JOIN s2_emprunt ON s2_objet.id_objet = s2_emprunt.id_objet
            WHERE s2_categorie_objet.nom_categorie ='$objet'
            ORDER BY s2_objet.id_objet DESC
    ";
    $connect = mysqli_query(dbconnect(), $sql);
    return $connect;
}

function aff_all_objet()
{
    $sql="SELECT s2_objet.id_objet AS id,
                s2_objet.nom_objet AS objet,
                s2_categorie_objet.nom_categorie AS categorie,
                s2_emprunt.date_retour AS date_retour,
                s2_membre.nom AS proprietaire,
                s2_membre.id_membre AS id_m,
                s2_objet.dispo AS disp
            FROM s2_objet
            JOIN s2_membre ON s2_objet.id_membre = s2_membre.id_membre
            JOIN s2_categorie_objet ON s2_objet.id_categorie = s2_categorie_objet.id_categorie
            LEFT JOIN s2_emprunt ON s2_objet.id_objet = s2_emprunt.id_objet
            ORDER BY s2_objet.id_objet DESC";
    $connect = mysqli_query(dbconnect(), $sql);
    return $connect;
}

function ajouter_obj($nom, $id_c , $id_m)
{
    $sql = "INSERT INTO s2_objet(nom_objet, id_categorie, id_membre) VALUES(?, ?, ?)";
    $stmt = mysqli_prepare(dbconnect(), $sql);
    mysqli_stmt_bind_param($stmt, "sii", $nom, $id_c, $id_m);
    mysqli_stmt_execute($stmt);
}

function get_id_objet($nom, $id_c, $id_m)
{
    $sql = "SELECT id_objet FROM s2_objet
            WHERE nom_objet = ? AND id_categorie = ? AND id_membre = ?
            ORDER BY id_objet DESC LIMIT 1";
    $stmt = mysqli_prepare(dbconnect(), $sql);
    mysqli_stmt_bind_param($stmt, "sii", $nom, $id_c, $id_m);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    return $row['id_objet'] ?? null;
}

function ajouter_image_objet($id_o, $nom_image)
{
    $sql = "INSERT INTO s2_images_objet(id_objet, nom_image) VALUES(?, ?)";
    $stmt = mysqli_prepare(dbconnect(), $sql);
    mysqli_stmt_bind_param($stmt, "is", $id_o, $nom_image);
    mysqli_stmt_execute($stmt);
}


function get_infos_objet($id_objet)
{
    $sql = "
        SELECT o.nom_objet, c.nom_categorie, m.nom AS nom_membre, m.ville
        FROM s2_objet o
        JOIN s2_categorie_objet c ON o.id_categorie = c.id_categorie
        JOIN s2_membre m ON o.id_membre = m.id_membre
        WHERE o.id_objet = $id_objet
    ";
    $req = mysqli_query(dbconnect(), $sql);
    return mysqli_fetch_assoc($req);
}

function get_images_objet($id_objet)
{
    $sql = "SELECT nom_image FROM s2_images_objet WHERE id_objet = $id_objet";
    $req = mysqli_query(dbconnect(), $sql);
    $images = [];
    while ($row = mysqli_fetch_assoc($req)) {
        $images[] = $row['nom_image'];
    }
    return $images;
}

function get_historique_emprunts($id_objet)
{
    $sql = "SELECT  e.date_emprunt, e.date_retour, m.nom AS emprunteur
        FROM s2_emprunt e
        JOIN s2_membre m ON e.id_membre = m.id_membre
        WHERE e.id_objet = $id_objet
        ORDER BY e.date_emprunt DESC
    ";
    $req = mysqli_query(dbconnect(), $sql);
    $historique = [];
    while ($e = mysqli_fetch_assoc($req)) {
        $historique[] = $e;
    }
    return $historique;
}
function profil($num){
    $requette = "SELECT * FROM s2_membre  
    WHERE id_membre = '$num'";
    $resultat = mysqli_query(dbconnect(), $requette);
    $val = mysqli_fetch_assoc($resultat);
    return $val;
}

function supprimer_image_objet($id_objet, $nom_image) {
    $img_escaped = mysqli_real_escape_string(dbconnect(), $nom_image);
    $id = intval($id_objet);

    $chemin = __DIR__ . "/../assets/uploads/" . $img_escaped;
    if (file_exists($chemin)) {
        unlink($chemin);
    }

    $sql = "DELETE FROM s2_images_objet WHERE id_objet = $id AND nom_image = '$img_escaped'";
    mysqli_query(dbconnect(), $sql);
}

/*function status($obj,$memb){
       $sql = "SELECT  e.date_emprunt, e.date_retour, m.nom AS emprunteur
        FROM s2_emprunt e
        JOIN s2_membre m ON e.id_membre = m.id_membre
        WHERE e.id_objet = $id_objet ";

}*/

?>
