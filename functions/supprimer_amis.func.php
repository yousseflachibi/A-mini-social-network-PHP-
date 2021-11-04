<?php

// la function  qui va nous permettre de supprimer un ami
function supprimer_amis(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$pseudo = htmlentities($_GET['pseudo']);
	
	$pseudo_ = $_SESSION['pseudo'];
	$query = $conn->prepare("DELETE FROM amis WHERE 
		(pseudo_exp='".$pseudo."' AND pseudo_dest = '".$pseudo_."') 
		OR
		(pseudo_dest='".$pseudo."' AND pseudo_exp = '".$pseudo_."')
		");
	var_dump(("DELETE FROM amis WHERE 
		(pseudo_exp='".$pseudo."' AND pseudo_dest = '".$pseudo_."') 
		OR
		(pseudo_dest='".$pseudo_."' AND pseudo_exp = '".$pseudo."')
		"));
	$query->execute();
}

?>	