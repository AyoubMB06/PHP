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
 
 <head>
  <meta charset="utf-8">
  <title>Nos Produits</title>
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


</head>
<body>


<header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#hero"><img src="img/logo1.png" alt="" title="" /></img></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php#hero">Acceuil</a></li>
          <li><a href="index.php#about">A propos de nous</a></li>
          <li><a href="#" >Nos Produits</a></li>
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
      <!-- #nav-menu-container -->
    </div>
  </header>


<section id="portfolio">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Nos Produits</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Ci-dessous, vous pouvez voir les produits les plus appréciés. Vous trouverez tout d'entre eux dans notre store.</p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(img/x1.jpg);" href="panier.php" target="_blank">
            <div class="details">
              <h6>code: N°1</h6>
              <h4>Veste</h4>
              <span>800 MAD</span>
            </div>
          </a>
        </div>

        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(img/x2.jpg);" href="panier.php" target="_blank">
            <div class="details">
              <h6>code: N°2</h6>
              <h4>Jeans</h4>
              <span>350 MAD</span>
            </div>
          </a>
        </div>

        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(img/x3.jpg);" href="panier.php" target="_blank">
            <div class="details">
              <h6>code: N°3</h6>
              <h4>Tshirt</h4>
              <span>300 MAD</span>
            </div>
          </a>
        </div>

        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(img/x4.jpg);" href="panier.php" target="_blank">
            <div class="details">
              <h6>code: N°4</h6>
              <h4>Pull</h4>
              <span>400 MAD</span>
            </div>
          </a>
        </div>

        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(img/x5.jpg);" href="panier.php" target="_blank">
            <div class="details">
              <h6>code: N°5</h6>
              <h4>Baskets</h4>
              <span>900 MAD</span>
            </div>
          </a>
        </div>

        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(img/x6.jpeg);" href="panier.php" target="_blank">
            <div class="details">
              <h6>code: N°6</h6>
              <h4>Chaussures</h4>
              <span>250 MAD</span>
            </div>
          </a>
        </div>

        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(img/x7.jpg);" href="panier.php">
            <div class="details">
              <h6>code: N°7</h6>
              <h4>Bonnet</h4>
              <span>99 MAD</span>
            </div>
          </a>
        </div>

        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(img/x8.jpg);" href="panier.php" target="_blank">
            <div class="details">
              <h6>code: N°8</h6>
              <h4>Cachecol</h4>
              <span>50 MAD</span>
            </div>
          </a>
        </div>

      </div>
    </div>
  </section>




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