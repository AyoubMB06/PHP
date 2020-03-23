<?php 
session_start();

$n = $_GET['name'];
$e = $_GET['email'];
$s = $_GET['subject'];
$m = $_GET['message'];

try{
$db = new PDO('mysql:host=localhost;dbname=id12786864_users','id12786864_users','123456');

$sql = "insert into users values (NULL,?,?,?,?)";
$stmt = $db->prepare($sql);

$stmt->bindValue(1,$n,PDO::PARAM_STR);
$stmt->bindValue(2,$e,PDO::PARAM_STR);
$stmt->bindValue(3,$s,PDO::PARAM_STR);
$stmt->bindValue(4,$m,PDO::PARAM_STR);


$stmt->execute();

header('location:Contact.php');
}

catch(Exception $e){ 
	die('Erreur : '.$e->getMessage());}

?>