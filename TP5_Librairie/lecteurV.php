<?php 

session_start();
	if(!isset($_SESSION['login']))
		header("location:accueil.php");
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Validation du Lecteur</title>
 </head>
 <body>
 	
 	<h1>Validation du Lecteur</h1>

 		<table>
			<tr>
				<td><br>Nom</td>
				<td style="color:green;"><br>: <?php  echo $_SESSION['nom']; ?> </td>
			</tr>
			<tr>
				<td>Prénom</td>
				<td style="color:green;">: <?php echo $_SESSION['prenom']; ?></td>
			</tr>
			<tr>
				<td>Adresse</td>
				<td style="color:green;">: <?php echo $_SESSION['adresse']; ?></td>
			</tr>
			<tr>
				<td>Ville</td>
				<td style="color:green;">: <?php echo $_SESSION['ville']; ?></td>
			</tr>
			<tr>
				<td>Code Postal</td>
				<td style="color:green;">: <?php echo $_SESSION['codepostal']; ?></td>
			</tr>
	</table>
	<br>Vous êtes enregistrés dans la base de la bibliothèque.<br>Vous avez maintenant la possibilité de réserver des livres en <a href="login.php">cliquant ici</a>.

 </body>
 </html>