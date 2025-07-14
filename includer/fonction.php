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
    $donnees = mysqli_fetch_assoc($connect);
    $connect = mysqli_query(dbconnect(), $sql);
    $resultat=[];
    while($donnees = mysqli_fetch_assoc($connect)){
        $resultat[]= $donnees ;  
    }
    return $resultat;
}

function aff_objet($objet)
{
    $sql="SELECT s2_objet.nom_objet as obj,s2_categorie_objet.nom_categorie as categorie,s2_emprunt.date_retour as emp,s2_membre.nom as nom
    FROM s2_objet
    JOIN s2_membre ON s2_objet.id_membre = s2_membre.id_membre
    JOIN s2_categorie_objet ON s2_objet.id_categorie = s2_categorie_objet.id_categorie
    JOIN s2_emprunt ON s2_objet.id_objet = s2_emprunt.id_objet
    WHERE s2_categorie_objet.nom_categorie ='$objet'";
    $connect = mysqli_query(dbconnect(), $sql);
    return $connect;
}

?>
