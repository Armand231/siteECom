<?php
$photo= isset($_POST["img"])? $_POST["img"] : "";



if (isset($_POST['button2'])) {

 if ($photo == "img") {
 	include("casimage.html");
   
 }
 else {

 include('additem.php'); 
}
}
?>