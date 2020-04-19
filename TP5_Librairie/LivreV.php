<?php 

session_start();

		if(!isset($_SESSION['login']))
		header("location:login.php");


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
				<td><br>Nom de l'auteur</td>
				<td style="color:green;"><br>: <?php  echo $_SESSION['nomA']; ?> </td>
			</tr>
			<tr>
				<td>Prénom de l'auteur</td>
				<td style="color:green;">: <?php echo $_SESSION['prenomA']; ?></td>
			</tr>
			<tr>
				<td>Titre</td>
				<td style="color:green;">: <?php echo $_SESSION['titre']; ?></td>
			</tr>
			<tr>
				<td>Catégorie</td>
				<td style="color:green;">: <?php echo $_SESSION['categorie']; ?></td>
			</tr>
			<tr>
				<td>Numéro ISBN</td>
				<td style="color:green;">: <?php echo $_SESSION['ISBN']; ?></td>
			</tr>
	</table>
	<br>Pour revenir à la page d'accueil, <a href="accueil.php">cliquez ici</a>.

 </body>
 </html>