<?php 

		function verifPassword($password){
			if(preg_match("/.{8,}/im", $password)){
				if(preg_match("/[A-Z]+/im", $password)){
					if(preg_match("/[0-9]+/im", $password)){
							return true;
					}
		    	}
		    }
		    return false;
		}
	    function verifAdresse($adresse){
			if(preg_match("/[0-9]+( |, |,)[A-Za-z]+/im", $adresse))
				return true;
			else		
		    	return false;
	    }
	    function verifCodePostal($codepostal){
			if(preg_match("/[0-9]{2,}/im", $codepostal))
				return true;
			else		
		    	return false;
	    }

session_start();
require('config.php');

	if(isset($_SESSION['login']))
		header("location:accueil.php");

	if(!empty($_POST['valider'])){

		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$adresse=$_POST['adresse'];
		$ville=$_POST['ville'];
		$codepostal=$_POST['codepostal'];
		$password=$_POST['password'];


		if(verifPassword($password) && verifAdresse($adresse) && verifCodePostal($codepostal))
		{
			$query1 = "select * from lecteurs where lecnom = '$nom'";
			$result1=mysqli_query($BD,$query1);
			if(!$result1){
			$query = "INSERT into `lecteurs` (lecnom, lecprenom ,lecadresse ,lecville ,leccodepostal ,lecmotdepasse) 
					  VALUES ('$nom','$prenom','$adresse','$ville','$codepostal','$password')";
			mysqli_query($BD,$query);

			$_SESSION['login']=$nom;
			$_SESSION['prenom']=$prenom;
			$_SESSION['adresse']=$adresse;
			$_SESSION['ville']=$ville;
			$_SESSION['codepostal']=$codepostal;

			header("location:lecteurV.php");
			}else{
				$error_message="Nom d'utilisateur déjà utilisé";
			}
		}
		else
		{
			if(verifAdresse($adresse) && verifPassword($password))
	    		$verifCodePostal_message="Veuillez entrer un code postal valide, exemple:'80000' ";
	    	else if(verifPassword($password) && verifCodePostal($codepostal))
	    		$verifAdresse_message="Veuillez entrer une adresse valide, exemple:'71, Rue Amsterdam' ";
			else
			    $verifPassword_message="Veuillez entrer un mot de passe valide, avec au moins 8 caractères, une lettre en majuscule et un chiffre";
			    $verifPassword_message="Veuillez entrer un mot de passe valide, avec au moins 8 caractères, une lettre en majuscule et un chiffre";
		}
		
	}
	    

?>

<!DOCTYPE html>
<html>
<head>
	<title>Gestion du lecteur</title>
</head>
<body>

	<h1><b>Gestion du lecteur</b></h1>

	<h4><b>Enregistrement d'un lecteur</b></h4>
	Si vous êtes un nouveau lecteur, veuillez vous enregistrer en remplissant le formulaire ci-dessous:
	<table>
		<form action="" method="POST">
			<tr>
				<td><br>Nom</td>
				<td><br>: <input type="text" name="nom" required/></td>
			</tr>
			<tr>
				<td>Prénom</td>
				<td>: <input type="text" name="prenom" required/></td>
			</tr>
			<tr>
				<td>Mot de passe</td>
				<td>: <input type="password" name="password" required/></td>
			</tr>
			<tr>
				<td>Adresse</td>
				<td>: <input type="text" name="adresse" required/></td>
			</tr>
			<tr>
				<td>Code Postal</td>
				<td>: <input type="text" name="codepostal" required/></td>
			</tr>
			<tr>
				<td>Ville</td>
				<td>: <input type="text" name="ville" required/></td>
			</tr>
			<tr>
				<td></td>
				<td align="right"><input type="submit" name="valider" value="Valider"></td>
			</tr>
		</form>
	</table>
				<span style="color:red;"><b>
				<?php 
					if(!empty($error_message)) echo $error_message;
					if(!empty($verifPassword_message)) echo $verifPassword_message;
					else if(!empty($verifAdresse_message)) echo $verifAdresse_message; 
					if(!empty($verifCodePostal_message)) echo $codepostal_message;
				?>
				</b></span>
	<br><br><hr>Si vous êtes déjà inscrits, <a href="login.php">cliquez ici</a> pour vous connecter.

</body>
</html>