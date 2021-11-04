<?php


//la fonction qui va supprimer la l'invitation
function supprimer_invitation(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$pseudo = htmlentities($_GET['pseudo']);
	$info = array();
	$pseudo_ = $_SESSION['pseudo'];
	$query = $conn->prepare("DELETE FROM amis WHERE pseudo_exp = '".$pseudo_."' AND pseudo_dest = '".$pseudo."'");
	$query->execute();
}
?>