<?php
//recuperer les données venant de la page HTML
$titre = isset($_POST["titre"])? $_POST["titre"] : "";
$auteur = isset($_POST["auteur"])? $_POST["auteur"] : "";
$annee = isset($_POST["annee"])? $_POST["annee"] : "";
$editeur = isset($_POST["editeur"])? $_POST["editeur"] : "";
//identifier votre BDD
$database = "livres";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost |votre login = root |votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
//si le bouton est cliqué
if ($_POST["button1"]) {
if ($db_found) {
$sql = "SELECT * FROM books";
if ($titre != "") {
//on cherche le livre avec les paramètres titre et auteur
$sql .= " WHERE Titre LIKE '%$titre%'";
if ($auteur != "") {
$sql .= " AND Auteur LIKE '%$auteur%'";
}
}
$result = mysqli_query($db_handle, $sql);
//tester s'il y a de résultat
if (mysqli_num_rows($result) == 0) {
//le livre recherché n'existe pas
echo "Book not found";
} else {
//on trouve le livre recherché
while ($data = mysqli_fetch_assoc($result)) {
echo "ID: " . $data['ID'] . "<br>";
echo "Titre: " . $data['Titre'] . "<br>";
echo "Auteur: " . $data['Auteur'] . "<br>";
echo "Année: " . $data['Annee'] . "<br>";
echo "Editeur: " . $data['Editeur'] . "<br>";
echo "<br>";
}
}
} else {
echo "Database not found";
}
}
//fermer la connexion
mysqli_close($db_handle);
Web dynamique 2020
Page | 10
?>