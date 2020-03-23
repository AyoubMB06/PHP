<?php
session_start();
//initialisation des varibles (1)
if(! isset($_POST["envoi"])) $_POST["envoi"]="";
if(! isset($_SESSION['prixTotal'])) $_SESSION['prixTotal']=0;
if(! isset($_SESSION['code'])) $_SESSION['code']=0;
if(! isset($_SESSION['article'])) $_SESSION['article']="";
if(! isset($_SESSION['prix'])) $_SESSION['prix']=0;
//AJOUTER
if($_POST["envoi"]=="AJOUTER"&& $_POST["code"]!=""&& $_POST["article"]!=""&& $_POST["prix"]!="")
{
$code=$_POST["code"]; //(2)
$article= $_POST["article"]; //(3)
$prix= $_POST["prix"]; //(4)
$_SESSION['code']= $_SESSION['code']."//".$code; 
$_SESSION['article']= $_SESSION['article']."//".$article; 
$_SESSION['prix']= $_SESSION['prix']."//".$prix; 
}
//VERIFIER
if($_POST["envoi"]=="VERIFIER")
{
echo "<table border=\"2\" align=\"center\" colspan=\"2\">";
echo "<tr><td colspan=\"10\"><b>Récapitulatif de votre commande</b></td>";
echo "<tr><th>&nbsp;code&nbsp;</th><th>&nbsp;article&nbsp;</ th><th>&nbsp;
prix&nbsp;</th><br>";

$total=0;
$tab_code=explode("//",$_SESSION['code']); // (8)
$tab_article=explode("//",$_SESSION['article']); //(9)
$tab_prix=explode("//",$_SESSION['prix']); //(10)
for($i=1;$i<count($tab_code);$i++) //(11)
{
echo "<tr><td>{$tab_code[$i]}</td><td>{$tab_article[$i]}</td><td>
".sprintf("%01.2f", $tab_prix[$i])."</td>";
$_SESSION['prixTotal']+=$tab_prix[$i]; // (12)
}
echo "<tr><td colspan=2> PRIX TOTAL </td><td>".sprintf("%01.2f", $_SESSION['prixTotal'])."
</td>";
echo "</table> <br>";
}
//ENREGISTRER
if($_POST["envoi"]=="ENREGISTRER")
{
$idfile=fopen("commande.txt",'w');
//
$tab_code=explode("//",$_SESSION['code']);
$tab_article=explode("//",$_SESSION['article']);
$tab_prix=explode("//",$_SESSION['prix']);
for($i=0;$i<count($tab_code);$i++) //(13)
{
fwrite($idfile, $tab_code[$i]." ; ".$tab_article[$i]." ; ".$tab_prix[$i].";\n");
}
fclose($idfile);
}
//LOGOUT
if($_POST["envoi"]=="LOGOUT")
{
session_unset(); 
session_destroy(); 
echo "<h3>La session est terminée</h3>";
}
$_POST["envoi"]=""; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
	  <meta charset="utf-8">
  <title>Mon Panier</title>
  <link rel="shortcut icon" type="image/png" href="logo1.png">

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link href="css/style.css" rel="stylesheet">
    <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
  <link href="favicon.ico" rel="shortcut icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate-css/animate.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Gestion de panier</title>
	<style> 
            form{ 
            width: 50%; 
            } 
            label { 
                display: inline-block; 
                float: left; 
                clear: left; 
                width: 90px; 
                margin:5px; 
                text-align: left; 
            } 
            input[type="text"] { 
                width:250px; 
                margin:5px 0px; 
            } 
            .gfg { 
                font-size:40px; 
                color:green; 
                font-weight:bold; 
            } 
        </style> 
</head>
<header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#hero"><img src="img/logo1.png" alt="" title="" /></img></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php#hero">Acceuil</a></li>
          <li><a href="index.php#about">A propos de nous</a></li>
          <li><a href="Produits.php" >Nos Produits</a></li>
          <li class="menu-has-children"><a href="">Mon Profil</a>
          	<ul>
              <li><a href="login.php">Se connecter</a></li>
              <li><a href="panier.php">Mon Panier</a></li>
              <li><a href="logout.php">Deconnection</a></li>
            </ul>
          </li>
          <li><a href="Contact.php" >Contactez nous</a></li>
        </ul>
      </nav>
    </div>
  </header>
<body>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"
?enctype="application/x-www-form-urlencoded">
<fieldset>
<br>
<legend><b>Saisies d'articles:</b></legend>
	<label>code : </label><input type="text" name="code">
<br> 
	<label>article : </label><input type="text" name="article">
<br>
	<label>prix :</label><input type="text" name="prix">
<br>
<br>
<table>
	<td colspan="3" align="center">
		<input type="submit" name="envoi" value="AJOUTER" />
		<input type="submit" name="envoi" value="VERIFIER" />
		<input type="submit" name="envoi" value="ENREGISTRER" />
		<input type="submit" name="envoi" value="LOGOUT" />
	</td>
</table>
</fieldset>
</form>

</body>
</html>
