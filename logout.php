<?php
session_start();

                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:login.php");
                   }
                }

?>

<html>
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
              <li><a href="panier.php">Mon Panier</a></li>
            </ul>
          </li>
          <li><a href="Contact.php" >Contactez nous</a></li>
        </ul>
      </nav>
    </div>
  </header>
    <body style='background:#fff;'>
        <div id="content">
            <?php

                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:login.php");
                   }
                }
            
?>
            <a href='index.php?deconnexion=true'><span><h2 align="right">Déconnexion</h2></span></a>
            
            <!-- tester si l'utilisateur est connecté -->

            
        </div>
    </body>
</html>