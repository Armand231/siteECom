<?php
//recuperer les données venant de la page HTML
$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";


$erreur = "";
if ($pseudo == "") { 

	$erreur .= "pseudo est vide. <br>"; }
	if ($email == "") {
		$erreur .= "email est vide. <br>"; 
	}

	$connexion = false;


//identifier votre BDD
	$database = "piscine20";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost | votre login = root |votre password = <rien>
	$db_handle = mysqli_connect('localhost', 'root', '')or die('could not connect to database');;
	$db_found = mysqli_select_db($db_handle, $database);
	
	
	if ($_POST["button2"]) {
		if ($db_found) {
			$sql  = "SELECT * FROM idvend  WHERE pseudo LIKE '%$pseudo%'  AND email LIKE '%$email%'";


$result = mysqli_query($db_handle, $sql);
if (mysqli_num_rows($result) !== 0) {
		//le livre recherché n'existe pas
	session_start();
        $_SESSION['email'] = $email;
        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';
$_SESSION['favcolor'] = 'green';
$_SESSION['animal']   = 'cat';
$_SESSION['time']     = time();




} else {

	echo 'Mauvais identifiant ou mot de passe !';



	
}}}

?>


