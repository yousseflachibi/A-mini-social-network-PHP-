<?php

// la function  qui va refuser l'invitation
function refuser_invitation(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$pseudo = htmlentities($_GET['pseudo']);
	
	$pseudo_ = $_SESSION['pseudo'];
	$query = $conn->prepare("DELETE FROM amis WHERE pseudo_exp='".$pseudo."' 
		 AND pseudo_dest = '".$pseudo_."'");
	$query->execute();
}

?>