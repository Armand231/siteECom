<?php

//récupérer les données venant de formulaire
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$description = isset($_POST["description"])? $_POST["description"] : "";
$categ = isset($_POST["typeI"])? $_POST["typeI"] : "";
$prix = isset($_POST["prix"])? $_POST["prix"] : "";
$photo= isset($_POST["img"])? $_POST["img"] : "";

//identifier votre BDD
$database = "piscine20";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
//Partie 1: Rechercher un livre
//*****************************



    if ($db_found) {




       $sql = "INSERT INTO item (nom ,description, prix, catégorie ) VALUES (' $nom','$description','$prix','$categ') ";

       $result = mysqli_query($db_handle, $sql);

       echo "Add successful. <br>";
//on afficher le livre ajouté
       $sql = "SELECT * FROM item WHERE nom LIKE '%$nom%' AND prix LIKE '%$prix%'";
   

   $result = mysqli_query($db_handle, $sql);
   while ($data = mysqli_fetch_assoc($result)) {
    echo "ID: " . $data['numId'] . "<br>";
    echo "Nom: " . $data['nom'] . "<br>";
    echo "description: " . $data['description'] . "<br>";
    echo "Prix: " . $data['prix'] . "<br>";

}
}
else {
    echo "Database not found";
}
}


?>