<?php

//function qui va se vérifier la combinaison pseudo, password
function verifier_combinaison_pseudo_password($pseudo,$password_d){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$password_d = sha1($password_d);
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = $conn->query("SELECT COUNT(*) FROM utilisateurs WHERE pseudo ='$pseudo' AND password='$password_d'");
	$fetch = $query->fetch();
	//die(json_encode($fetch[0]));
	return (int)$fetch[0];
}

?>