<?php 

$jour  = $_GET['Jour'];
$mois  = $_GET['MOIS'];
$annee = $_GET['ANNEE'];

?>
 

<!DOCTYPE html>
<html>
<head>
	<title>CheckDate</title>
</head>
<body>
	<h1>Validation de la date</h1>
	<?php
		echo "La date saisie est: $jour/$mois/$annee <br>";
		if ($mois==2 AND $jour>29) {
			echo "Le mois de <b style='color: red;'>Fevrier</b> ne peut pas compter 30 ou 31 jours, MAX 29";
		}
		elseif($mois==2 AND $annee%4!=0 AND $jour>28)
			echo "L'année $annee est non bissextile : Date <b style='color: red;'>invalide</b>"; 
		else
			echo "La date saisie est <b style='color: green;'>valide</b> "; 
	?>
</body>
</html>