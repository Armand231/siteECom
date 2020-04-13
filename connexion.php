
<?php
  
  //identifier votre BDD
$database = "piscine20";
//connectez-vous de votre BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database) or die(mysql_error());
?>


