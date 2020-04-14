<?php
$msg = "";
$msg_class = "";
  //identifier votre BDD
$database = "piscine20";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
//Partie 1: Rechercher un livre
//*****************************


if (isset($_POST['button2'])) {
    // for the database
  
  $nom = isset($_POST["nom"])? $_POST["nom"] : "";
  $description = isset($_POST["description"])? $_POST["description"] : "";
  $categ = isset($_POST["typeI"])? $_POST["typeI"] : "";
  $prix = isset($_POST["prix"])? $_POST["prix"] : "";
  $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    // For image upload
  $target_dir = "images/";
  $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
  if($_FILES['profileImage']['size'] > 200000) {
    $msg = "Image size should not be greated than 200Kb";
    $msg_class = "alert-danger";
  }
    // check if file exists
  if(file_exists($target_file)) {
    $msg = "File already exists";
    $msg_class = "alert-danger";
  }
    // Upload image only if no errors
  if (empty($error)) {
    if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {




      $sql = "INSERT INTO item (nom ,photos, description, prix, catégorie ) VALUES (' $nom','$profileImageName','$description','$prix','$categ') ";

      $result = mysqli_query($db_handle, $sql);

      echo "Add successful. <br>";
//on afficher le livre ajouté
      $sql = "SELECT * FROM item WHERE nom LIKE '%$nom%' AND prix LIKE '%$prix%'";





      $result = mysqli_query($db_handle, $sql);
      while ($data = mysqli_fetch_assoc($result)) {
        echo "ID: " . $data['numId'] . "<br>";
        echo "Nom: " . $data['nom'] . "<br>";
        echo "description: " . $data['description'] . "<br>";
        echo "Prix: " . $data['prix'] . "<br>"; ?>
        <img src="<?php echo 'images/'. $data['photos'] ;?>" id="profileDisplay"> <br/><?php






      } 
    }else {
      $error = "There was an erro uploading the file";
      $msg = "alert-danger";
    }
  }
}
?>