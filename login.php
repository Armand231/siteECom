<?php
session_start();
header('Location: acceuil.html'); 
//récuperer les données de la page HTML
$email = isset($_POST["email"])? $_POST["email"] :"";
$MDp = isset($_POST["mdp"])? $_POST["mdp"] :"";


//identifier votre BDD
$database ='client';


$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


//si le  bouton  est cliqué
if (isset($_POST['soumettre']) && $email != "" && $MDp != "") {
if ($db_found) {
$sql = "SELECT * FROM clients WHERE Email = '$email' AND MDP = '$MDp'";


	$result = mysqli_query($db_handle, $sql);
//regarder s'il y a des résultats 
	if(mysqli_num_rows($result) == 0){
	echo "information incorrect";	
	
	 
	}
	else{
		while($data = mysqli_fetch_assoc($result)){
			echo "Nom: " . $data['Nom'] . "<br>";
			echo "Prenom: " . $data['Prenom'] . "<br>";
			echo "Email: " . $data['Email'] . "<br>";
			echo "Adresse: " . $data['Adresse'] . "<br>";
			echo "paiement: " . $data['Paiement'] . "<br>";
			echo "ID : ". $data['ID']. "<br>";
			$_SESSION['ID'] = $data['ID'];
		}
	}
}

else {
	echo "Database not found";
}
}
else { echo "manque des champs";}


//fermer la connexion

mysqli_close($db_handle);


?>
