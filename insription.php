<?php
//récuperer les données de la page HTML
$email = isset($_POST["email"])? $_POST["email"] :"";
$MDp = isset($_POST["mdp"])? $_POST["mdp"] :"";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] :"";
$nom = isset($_POST["nom"])? $_POST["nom"] :"";
$adresse = isset($_POST["adresse"])? $_POST["adresse"] :"";
$paiement = isset($_POST["paiement"])? $_POST["paiement"] :"";
$choix1 = isset($_POST["choix1"])? $_POST["choix1"] :"";
 

//identifier votre BDD
$database ='client';

$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


//si le  bouton  est cliqué
if (isset($_POST['soumettre']) && $choix1 =="accepté" && $email !="" && $MDp !="" && $prenom!= "" && $nom !="" &&
$adresse != "" && $paiement !="" ) {
if ($db_found) {
$sql = "SELECT * FROM clients";

// on regarde si l'email existe deja
if ($email != "") {
$sql .= " WHERE Email LIKE '%$email%'";
}

$result = mysqli_query($db_handle, $sql);

if (mysqli_num_rows($result) != 0) {
echo "email non valide";
} 

else {
	// ajout dans la bdd
$sql = "INSERT INTO clients(Nom, Prenom, Email, Adresse, Paiement, MDP, Clause)
 VALUES('$nom', '$prenom', '$email', '$adresse','$paiement', '$MDp', '$choix1' )";

$result = mysqli_query($db_handle, $sql);
echo "Add successful. <br>";
//on afficher le livre ajouté
$sql = "SELECT * FROM clients";
if ($email != "") {
$sql .= " WHERE Email LIKE '%$email%'";

}
$result = mysqli_query($db_handle, $sql);
while ($data = mysqli_fetch_assoc($result)) {
echo "Nom: " . $data['Nom'] . "<br>";
			echo "Prenom: " . $data['Prenom'] . "<br>";
			echo "Email: " . $data['Email'] . "<br>";
			echo "Adresse: " . $data['Adresse'] . "<br>";
			echo "Clause : " . $data['Clause']. "<br>";
			$sth = $data['Paiement'];
			 echo "Paiement : ".'<input type="password" value="' . htmlspecialchars($sth) . '" />'."\n";
			 $ID= $data['ID'];
}


} else {
echo "Database not found";
}
}
//fermer la connexion
else{echo "remplir tout les champs";}
mysqli_close($db_handle);

?>
