<?php



try{ 

	if
		(!$fichierGLOB = fopen('commandes.php','r') OR !$fichier1 = fopen('pscde01_CLI1001.txt','w') OR !$fichier2 = fopen('psccl01_CLI1004.txt','w')){
				throw new Exception("Erreur d'ouverture du fichier");
			}

	else
		while(!feof($fichierGLOB)){
			$Ligne = fgets($fichierGLOB);
			if(preg_match('/CLI1001/', $Ligne)){
				fputs($fichier1, $Ligne  . "\r\n"); 
			}
			else
				fputs($fichier2, $Ligne  . "\r\n");	
		}


} 

catch(Exception $e) { 
    die($e->getMessage());
}

fclose($fichierGLOB);
fclose($fichier1);
fclose($fichier2);

?>