<?php 

session_start();
require('config.php');

	if(!isset($_SESSION['login']))
		header("location:login.php");

	if(!empty($_POST['valider'])){

		$nomA=$_POST['nomA'];
		$prenomA=$_POST['prenomA'];
		$titre=$_POST['titre'];
		$categorie=$_POST['categorie'];
		$ISBN=$_POST['ISBN'];

		$query = "INSERT into livres (livnomaut, livprenomaut, livtitre, livcategorie, livISBN, livdejareserve) 
				  VALUES ('$nomA','$prenomA','$titre','$categorie','$ISBN',0)";
		$result = mysqli_query($BD,$query);
		if($result){
			$_SESSION['nomA']=$nomA;
			$_SESSION['prenomA']=$prenomA;
			$_SESSION['titre']=$titre;
			$_SESSION['categorie']=$categorie;
			$_SESSION['ISBN']=$ISBN;
			header("location:LivreV.php");
		}
		else
			$error_message = "Erreur lors de l'ajout du Livre! Réssayer plus tard.";
	}



 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Ajout d'un Livre</title>
</head>
<body>

	<h1><b>Enregistrement d'un Livre</b></h1>
	<table>
		<form action="" method="POST">
			<tr>
				<td><br>Nom de l'auteur</td>
				<td><br>: <input type="text" name="nomA" required/></td>
			</tr>
			<tr>
				<td>Prénom de l'auteur</td>
				<td>: <input type="text" name="prenomA" required/></td>
			</tr>
			<tr>
				<td>Titre</td>
				<td>: <input type="text" name="titre" required/></td>
			</tr>
			<tr>
				<td>Catégorie</td>
				<td>: 
					<SELECT name="categorie" size="1">
						<OPTION selected>Roman
						<OPTION>Science-fiction
						<OPTION>Junior
					</SELECT>
				</td>
			</tr>
			<tr>
				<td>Numéro ISBN</td>
				<td>: <input type="text" name="ISBN" required/></td>
			</tr>
			<tr>
				<td><input type="submit" name="valider" value="Enregistrer"></td>
				<td></td>
			</tr>
		</form>
	</table>
	<span style="color:red;"><?php if(!empty($error_message)) echo $error_message; ?> </span>

</body>
</html>