<?php
session_start();
?>

<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style1.css" media="screen" type="text/css" />
          <title>Login</title>
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
              <li><a href="logout.php">Deconnection</a></li>
            </ul>
          </li>
          <li><a href="Contact.php" >Contactez nous</a></li>
        </ul>
      </nav>
    </div>
  </header>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="index.php" method="POST">
                <h2 align="center">Connexion à MB Store</h2>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN' >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
        </div>
    </body>
</html>