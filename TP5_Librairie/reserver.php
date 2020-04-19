<?php 

session_start();
require('config.php');

	if(!isset($_SESSION['login']))
	header("location:accueil.php");

	$code=$_GET['code'];
	$nom=$_SESSION['login'];

	$query= "select * from livres where livcode='$code'";
	$result=mysqli_query($BD,$query);
	$row=mysqli_fetch_assoc($result);

	function genererCode($length=10){
	    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $string = '';
	    for($i=0; $i<$length; $i++){
	        $string .= $chars[rand(0, strlen($chars)-1)];
	    }
	    return $string;
	}

	if(!empty($_POST['valider'])){
		$codeRes=genererCode();
		$dateRes=date("Y-m-d");
		$dateRet = date('Y-m-d', strtotime($dateRes) + (24 * 3600 * 5));
		$query1 = "INSERT into `emprunts` (	empnum, empdate, empdateret, empcodelivre, empnomlect )
				   VALUES ('$codeRes','$dateRes','$dateRet','$code','$nom')";
		$result1 = mysqli_query($BD,$query1);
		$query2 = "update livres set livdejareserve=1 where livcode='$code'";
		$result2 = mysqli_query($BD,$query2);
		if($result1 AND $result2)
			header("location:confirme.php?codeRes=$codeRes&dateRes=$dateRes&dateRet=$dateRet");
		else
			$error_message = "Erreur MySQL";
	}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Réservation du Livre</title>
 	 <style type="text/css">
 		body {
			margin-left: 20px;
			margin-top: 20px;
		}
 	</style>
 </head>
 <body>
 		<h1>Réserver un livre</h1><br>
 		Vous désirez réserver le livre suivant:<br>
 		<form action="" method="POST">
 		<table border="1">
 			<tr>
 				<td style="color:red;">Code du livre</td>
 				<td><?php echo $row['livcode'] ?></td>
 			</tr> 			
 			<tr>
 				<td style="color:red;">Nom de l'auteur</td>
 				<td><?php echo $row['livnomaut'] ?></td>
 			</tr> 			
 			<tr>
 				<td style="color:red;">Prénom de l'auteur</td>
 				<td><?php echo $row['livprenomaut'] ?></td>
 			</tr> 			
 			<tr>
 				<td style="color:red;">Titre</td>
 				<td><?php echo $row['livtitre'] ?></td>
 			</tr> 			
 			<tr>
 				<td style="color:red;">Catégorie</td>
 				<td><?php echo $row['livcategorie'] ?></td>
 			</tr> 			
 			<tr>
 				<td style="color:red;">ISBN</td>
 				<td><?php echo $row['livISBN'] ?></td>
 			</tr>
 		</table>
 				<br><input type="submit" name="valider" value="confirmer">
 		</form>
 		<?php if(!empty($error_message)) echo $error_message; ?>
 </body>
 </html>