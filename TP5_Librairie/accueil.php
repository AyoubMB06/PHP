<?php 

session_start();
require('config.php');
	

	$nom=$_SESSION['login'];

	$query= "select * from livres where livdejareserve=0";
	$result=mysqli_query($BD,$query);
	$rows=mysqli_fetch_all($result, MYSQLI_ASSOC);	

	$query1= "select * from livres where livdejareserve=1 AND livcode in(select empcodelivre from emprunts where empnomlect = '$nom')";
	$result1=mysqli_query($BD,$query1);
	$rows1=mysqli_fetch_all($result1, MYSQLI_ASSOC);

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Accueil</title>
 	<style type="text/css">
 		body {
			margin-left: 20px;
			margin-top: 20px;
		}
 	</style>
 </head>
 <body >
 	<p align="right"><b><a href="logout.php" style="color:red;">Se déconnecter</a></b></p>
 	<h1 align="center"><u>Centre de la bibliothèqe virtuelle.</u></h1>
 	<h3>Bienvenue <?php echo $_SESSION['login'] ; ?> à notre bibliothèque virtuelle.<br></h3>
 	<br><b>Voici la liste des ouvrages disponibles à la réservation:</b>
 	<table border="1" cellpadding="5">
 		<tr style="color:red;">
 			<td>CodeLivre</td>
 			<td>NomAuteur</td>
 			<td>PrenomAuteur</td>
 			<td>Titre</td>
 			<td>Categorie</td>
 			<td>ISBN</td>
 		</tr>
 		<?php foreach ($rows as $row) { ?>
 		<tr>
 			<td><?php echo $row['livcode']; ?></td>
 			<td><?php echo $row['livnomaut']; ?></td>
 			<td><?php echo $row['livprenomaut']; ?></td>
 			<td><?php echo $row['livtitre']; ?></td>
 			<td><?php echo $row['livcategorie']; ?></td>
 			<td><?php echo $row['livISBN']; ?></td>
 			<td><a href="reserver.php?code=<?php echo $row['livcode']; ?>">Réserver</a></td>
 		</tr>
 		<?php } ?>
 	</table> 	
 	<br><b>Voici la liste de vos réservations:</b>
 	<table border="1" cellpadding="5">
 		<tr style="color:red;">
 			<td>CodeLivre</td>
 			<td>NomAuteur</td>
 			<td>PrenomAuteur</td>
 			<td>Titre</td>
 			<td>Categorie</td>
 			<td>ISBN</td>
 			<td></td>
 		</tr>
 		<?php foreach ($rows1 as $row1) { ?>
 		<tr>
 			<td><?php echo $row1['livcode']; ?></td>
 			<td><?php echo $row1['livnomaut']; ?></td>
 			<td><?php echo $row1['livprenomaut']; ?></td>
 			<td><?php echo $row1['livtitre']; ?></td>
 			<td><?php echo $row1['livcategorie']; ?></td>
 			<td><?php echo $row1['livISBN']; ?></td>
 			<td><a href="supprimer.php?code=<?php echo $row1['livcode']; ?>">Supprimer</a></td>
 		</tr>
 		<?php } ?>
 	</table> 
 </body>
 </html>