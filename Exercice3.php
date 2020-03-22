<?php  



try{ 

	if(!$fichier=fopen("exo2.txt","rb")){
		throw new Exception("Erreur d'ouverture du fichier");
	}

	$ligne1=fgets($fichier);
	$ligne2=fgets($fichier);
	$ligne3=fgets($fichier);

	$tab1=explode('|', $ligne1);
	$tab2=explode('|', $ligne2);
	$tab3=explode('|', $ligne3);
} 

catch(Exception $e) { 
    die($e->getMessage());
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Exercice3</title>
</head>
<body>
	<h1>Centrale d'achats</h1>
	<h3>Commande clients</h3>
	<table border="1" width="100%" cellpadding="5px">
		<tr bgcolor="#1e90ff">
			<th>Numéro de commmandes</td>
			<th>Numéro Client</th>
			<th>Date de commande</th>
			<th>Designation article</th>
			<th>Quantité (Pal)</th>
			<th>Prix unitaire(Dh)</th>
		</tr>
		<tr align="right">
		<?php foreach ($tab1 as $tab1) { ?>
			<td><?php echo "$tab1"; ?></td>
		<?php } ?>
		</tr>
		<tr align="right">
		<?php foreach ($tab2 as $tab2) { ?>
			<td><?php echo "$tab2"; ?></td>
		<?php } ?>
		</tr>
		<tr align="right">
		<?php foreach ($tab3 as $tab3) { ?>
			<td><?php echo "$tab3"; ?></td>
		<?php } ?>
		</tr>

	</table>

</body>
</html>
