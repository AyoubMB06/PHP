<?php 

session_start();
require('config.php');
	
	if(isset($_SESSION['login']))
		header("location:accueil.php");

	if(!empty($_POST['valider'])){

		$nom = $_POST['nom'];
		$password = $_POST['password'];

		$query = "select * from lecteurs where lecnom='$nom' AND lecmotdepasse='$password'";
		$result = mysqli_query($BD,$query);
		if($result){
			$_SESSION['login']=$nom;
			header("location:Accueil.php");
		}else{
			$error_message="Nom d'utilisateur ou mot de passe incorrect!";
		}
	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Authentification du Lecteur</title>
</head>
<body>
	<h1><b>Authentification du Lecteur</b></h1>
	<table>
		<form action="" method="POST">
			<tr>
				<td>Nom du lecteur</td>
				<td>: <input type="text" name="nom"></td>
			</tr>	
			<tr>
				<td>Mot de passe</td>
				<td>: <input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td align="right"><input type="submit" name="valider" value="Se connecter"></td>
			</tr>
		</form>
	</table>
	<span style="color:red;"><?php if(!empty($error_message)) echo $error_message; ?> </span>
	<br><br><hr>Si vous n'avez pas encore de compte, <a href="ajoutLecteur.php">cliquez ici</a> pour vous inscrire.

</body>
</html>