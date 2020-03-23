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
echo "<table border=\"1\">";
echo "<tr><td colspan=\"3\"><b>Récapitulatif de votre commande</b></td>";
echo "<tr><th>&nbsp;code&nbsp;</th><th>&nbsp;article&nbsp;</ th><th>&nbsp;
?prix&nbsp;</th>";

$total=0;
$tab_code=explode("//",$_SESSION['code']); // (8)
$tab_article=explode("//",$_SESSION['article']); //(9)
$tab_prix=explode("//",$_SESSION['prix']); //(10)
for($i=1;$i<count($tab_code);$i++) //(11)
{
echo "<tr><td>{$tab_code[$i]}</td><td>{$tab_article[$i]}</td><td>
?".sprintf("%01.2f", $tab_prix[$i])."</td>";
$_SESSION['prixTotal']+=$tab_prix[$i]; // (12)
}
echo "<tr><td colspan=2> PRIX TOTAL </td><td>".sprintf("%01.2f", $_SESSION['prixTotal'])."
?</td>";
echo "</table>";
}
//ENREGISTRER
if($_POST["envoi"]=="ENREGISTRER")
{
$idfile=fopen("commande.txt",w);
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






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>The MB Store</title>
    <link rel="shortcut icon" type="image/png" href="logo1.png">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
  <link href="favicon.ico" rel="shortcut icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate-css/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">


</head>

<body>
  <div id="preloader"></div>

  <!--==========================
  Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <div class="wow fadeIn">
        <div class="hero-logo">
          <img class="" src="img/logo1.png" alt="Imperial">
        </div>

        <h1>Welcome to MB store</h1>
        <h2>On offre <span class="rotating">nouvelle collection, prix raisonnables, livraison gratuite</span></h2>
        <div class="actions">
          <a href="Produits.php" class="btn-get-started">Commander</a>
          <a href="Contact.php" class="btn-services">Nous Contacter</a>
        </div>
      </div>
    </div>
  </section>

  
<section id="subscribe">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-8">
          <h3 class="subscribe-title">Abonnez-vous pour recevoir les nouveautés.</h3>
          <p class="subscribe-text">Rejoignez nos plus de 1000 abonnés et accédez aux derniers outils, cadeaux, annonces de produits et bien plus encore!</p>
        </div>
        <div class="col-md-4 subscribe-btn-container">
          <a class="subscribe-btn" href="#">Abonnez-vous maintenant!</a>
        </div>
      </div>
    </div>
  </section>



  <!--==========================
  Header Section
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#hero"><img src="img/logo1.png" alt="" title="" /></img></a>
 
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Acceuil</a></li>
          <li><a href="#about">A propos de nous</a></li>
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

  <section id="about">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">A propos de nous</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Une société d'eCommerce qui vient parcourir le monde fashion</p>
        </div>
      </div>
    </div>
    <div class="container about-container wow fadeInUp">
      <div class="row">

        <div class="col-lg-6 about-img">
          <img src="img/ecomm.jpg" alt="">
        </div>

        <div class="col-md-6 about-content">
          <br></br>
          <br></br>
          <h2 class="about-title">Nous fournissons d'excellents services et promotions.</h2>
          <p class="about-text">
            Il y a plus de 3 ans, j'ai commencé à tout faire pour réaliser mon rêve et devenir créateur de mode. Tout d'abord commencé en tant que blogueur mode sur les réseaux sociaux et après cela, j'ai essayé de créer mon premier design de vêtements. Ceci est mon deuxième pop-up store avec le lancement d'une nouvelle collection.
          </p>
        </div>
      </div>
    </div>
  </section>


  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- Required JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/morphext/morphext.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/stickyjs/sticky.js"></script>
  <script src="lib/easing/easing.js"></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="js/custom.js"></script>

  <script src="contactform/contactform.js"></script>


</body>

</html>
