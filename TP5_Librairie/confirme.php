<?php 

session_start();

	if(!isset($_SESSION['login']))
		header("location:accueil.php");
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Confirmation réussie</title>
 </head>
 <body>
 		<h1>Confirmation de votre réservation</h1><br><br>
 		Votre réservation est confirmée sous le numéro : <?php echo $_GET['codeRes']; ?><br>
 		<table>
 			<tr><td>Date de la réservation:</td> <td><?php echo $_GET['dateRes']; ?></td></tr>
 			<tr><td>Date du retour: </td><td style="color:red;"><?php echo $_GET['dateRet']; ?><td></tr>
 		</table>

 		<br><hr>Vous pouvez réserver d'autres livres en <a href="accueil.php">cliquant ici</a>.
 </body>
 </html>