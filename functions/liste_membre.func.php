<?php

//la function qui va recupere le pseudo et l'avatar du membre sauf de celui connecté
function recuperer_pseudo_avatar(){

	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$info = array();
	$pseudo = $_SESSION['pseudo'];
	$query = $conn->query("SELECT pseudo, avatar FROM utilisateurs WHERE pseudo != '{$_SESSION['pseudo']}'");
	$fetch = $query->fetchall();
	//print_r($fetch);
	return $fetch;
}

?>