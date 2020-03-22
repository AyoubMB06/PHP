<?php  



try{ 

	if(!$fichier=fopen("exo2.txt","rb")){
		throw new Exception("Erreur d'ouverture du fichier");
	}

	$ligne1=fgets($fichier);
	$ligne2=fgets($fichier);
	$ligne3=fgets($fichier);

	$ligne=array($ligne1,$ligne2,$ligne3);

	foreach ($ligne as $ligne) {
		echo "$ligne <br>";
	}

} 

catch(Exception $e) { 
    die($e->getMessage());
}



?>