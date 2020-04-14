<!DOCTYPE html>
<html>
<head>
  <title>Supprimer Vendeurs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styleDeletI.css">
  <script type="text/javascript">
    $(document).ready(function(){
      $('.header').height($(window).height());
    });
  </script>
</head>
<body>

  <nav class="navbar navbar-expand-md">
    <a class="navbar-brand" href="acceuilP.html">Ebay ECE</a>
    <img style=" **margin-top: -55px;**" alt="Logo" src="LogoEce.png" class="pull-left">
    <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main-navigation">
      <ul class="navbar-nav">
        <li class="nav-item"> <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
            Catégories
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Férailles ou trésor</a>
            <a class="dropdown-item" href="#">Bon pour le musée</a>
            <a class="dropdown-item" href="#">Accessoire VIP</a>

          </div>
        </div>


        <li class="nav-item"><a class="nav-link" href="#">Achat</a></li>
        <li class="nav-item"><a class="nav-link" href="idVendeur.html">Vendre</a></li>
        <li class="nav-item"><a class="nav-link" href="VCompte.html">Votre Compte</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Panier</a></li>
        <li class="nav-item"><a class="nav-link" href="adminPage.html">Admin</a></li>
      </ul>
    </div>
  </nav>
<?php session_start(); 
 $query="";
  if(isset($_SESSION['ID'])) { ?>
  <h2>Item disponible</h2>
    <table>
      <tr>
        <th>Nom</th>
        <th>photos </th>
        <th>vidéos </th>
        <th>prix</th>
        
      </tr>


     <?php
$database ='client';


$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


$collection = array();


$itemnb = isset($_POST["itemnb"])? $_POST["itemnb"] :0;
$itemindex = 1;
 while($itemindex <= $itemnb){
  
  if(isset($_POST["item". $itemindex])){
    $collection[$itemindex] = $_POST["item". $itemindex];
  }

  $itemindex = $itemindex+1;
 }
 
 $query = "select * from items where ID in (";

 $itemindex = 1;
 while($itemindex <= $itemnb){
  if ($itemindex != 1)
    $query = $query . ",";
    $query = $query . $collection[$itemindex] ;
     $itemindex = $itemindex+1;
   }



$query = $query . ")";
$_SESSION['Itm'] = $query;


}

if ($db_found) {

   $result = mysqli_query($db_handle, $query);
//regarder s'il y a des résultats 
  if(mysqli_num_rows($result) == 0){
  echo "information incorrect"; 
  
   
  }
  else{
    while($data = mysqli_fetch_assoc($result)){ ?>
      <tr>
                <td> <?php echo $data['nom']; ?><br/></td>
                <td> <?php echo $data['photo']; ?><br/></td>
                <td> <?php echo $data['video']; ?><br/></td>
                <td> <?php echo $data['prix']; ?><br/></td>
                
              </tr> <?php }
    }
}

else {
  echo "Database not found";
}


mysqli_close($db_handle);
?>


      </table>
 <input type="submit" name="soumettre1" align="center" value="valider commande">
 <a href="#">retour</a>

    </body>
    </html>
