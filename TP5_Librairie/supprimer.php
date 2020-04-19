<?php 

session_start();
require('config.php');

		if(!isset($_SESSION['login']))
		header("location:accueil.php");

	$code=$_GET['code'];
	$query = "update livres set livdejareserve=0 where livcode='$code' ";
	$result= mysqli_query($BD,$query);
	$query1 = "delete from emprunts where empcodelivre='$code'" ;
	$result1= mysqli_query($BD,$query1);
	if($result AND $result1)
		header("location:accueil.php");
	else
		echo "ERREUR";
 ?>

