<?php
session_start();
try{
$db = new PDO('mysql:host=localhost;dbname=id12786864_users','id12786864_users','123456');
}

catch(Exception $e){ 
    die('Erreur : '.$e->getMessage());}

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
  <title>Contactez-nous</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <link href="css/style.css" rel="stylesheet">
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
          <li><a href="Produits.php" >Nos Produits</a></li>
          <li class="menu-has-children"><a href="">Mon Profil</a>
            <ul>
              <li><a href="login.php">Se connecter</a></li>
              <li><a href="panier.php">Mon Panier</a></li>
              <li><a href="logout.php">Deconnection</a></li>
            </ul>
          </li>
          <li><a href="#" >Contactez nous</a></li>
        </ul>
      </nav>
    </div>
  </header>


<section id="contact">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Contactez nous</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Laissez nous vos commentaires!</p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-md-push-2">
          <div class="info">
            <div>
              <i class="fa fa-map-marker"></i>
              <p>N°107 Quartier Rmel <br>V Tarrast, Inezgane</p>
            </div>

            <div>
              <i class="fa fa-envelope"></i>
              <p>info@exemple.com</p>
            </div>

            <div>
              <i class="fa fa-phone"></i>
              <p>+212(6) 78 35 31 66</p>
            </div>

          </div>
        </div>

        <div class="col-md-5 col-md-push-2">
          <div class="form">
            <div id="sendmessage">Ton message a été envoyé, Merci!</div>
            <div id="errormessage"></div>
            <form action="add.php" method="GET">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nom" data-rule="minlen:4" data-msg="Entrez au moins 4 caractères" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Entrez un email valide" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" data-rule="minlen:4" data-msg="Entrez au moins 8 caractères à propos du sujet" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Ecrivez quelque chose pour nous" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">Envoyez le commentaire</button></div>
            </form>
          </div>
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