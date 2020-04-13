<!DOCTYPE html>
<html>
<head>
	<title>Supprimer Item</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styleDeletI.css">
	
		
	<script type="text/javascript" src="deleteItemS.js"></script>

	

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


	<h2>Item disponible</h2>
	<form method="POST" action="deleteitem.php" enctype="multipart/form-data">
		<table id="tab" >
			<tr>
				
				<th>ID de l'item</th>
				<th>Nom de l'article</th>
				<th>Description</th>
				<th>Prix</th>
				<th>Categorie</th>
				<th>Modif</th>
			</tr>



			<?php
			$database = "piscine20";
		//connectez-vous de votre BDD
			$db_handle = mysqli_connect('localhost', 'root', '');
			$db_found = mysqli_select_db($db_handle, $database);
			if ($db_found) {

				$sql = "SELECT * FROM item";


				$result = mysqli_query($db_handle, $sql);
				if (mysqli_num_rows($result) == 0) {
					echo "Book not found";} 
					else {


						while ($data = mysqli_fetch_assoc($result)) { ?>




								


							<tr></td>
								<td> <?php echo $data['numId']; ?><br/></td>
								<td> <?php echo $data['nom']; ?><br/></td>
								<td> <?php echo $data['description']; ?><br/></td>
								<td> <?php echo $data['prix']; ?><br/></td>
								<td> <?php echo $data['catégorie']; ?>
								<td><input type="radio" name="choix" ?><br/></td>
							</tr>

						<?php 	}
					}
				} else {
					echo "Database not found";
				}?>


			</table>
<td colspan="2" align="center">
					<button id="supp" onclick="show()" >Supprimer</button></td>

								
					
		</body>
		</html>