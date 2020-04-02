<?php 

$email = $_GET['email'];
$mdp = $_GET['password'];

function verifEmail($email){
	if (preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/im',$email)) 
		return true;
	else 
		return false;
}

function verifPassword($mdp){
	if(preg_match("/.{8,}/im", $mdp)){
		if(preg_match("/[A-Z]+/im", $mdp)){
			if (preg_match("/[*&%$#@!?\/]{1}/im", $mdp)) {
				if(preg_match("/[0-9]+/im", $mdp)){
					return true;
				}
			}
		}
	}
		return false;
}

try{ 

	if
		(!$fichier = fopen('login.txt','r') OR !$fichier1 = fopen('login.txt','r')){
				throw new Exception("Erreur d'ouverture du fichier");
			}

	else
		if(verifEmail($email) && verifPassword($mdp)){
				$fichierAll=fread($fichier1, filesize('login.txt'));
				if(preg_match('/'.$email.'/i', $fichierAll)){
					while(!feof($fichier)){
						$ligne = fgets($fichier);
						if(preg_match('/'.$email.'/i', $ligne) && preg_match('/'.$mdp.'/i', $ligne)){
							echo "Authentification réussie!";
							die();
						}
					}
					echo "Mot de passe incorrect!";
				}
				else
					echo "Login inexistant";
		}
		else{
				if(verifEmail($email))
					echo "Veuillez entrer un mot de passe valide!";
				else
					echo "Veuillez entrer un login valide"; 
		}
}
catch(Exception $e) { 
    die($e->getMessage());
}

fclose($fichier);
fclose($fichier1);


?>

