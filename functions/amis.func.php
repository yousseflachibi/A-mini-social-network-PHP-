<?php
// la function  qui va recuperer les informations de la personne choisi par l'utilisateur

//la function qui va recuperer la liste d'amis de l'expediteur
function liste_amis_exp(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$info = array();
	$pseudo_ = $_SESSION['pseudo'];
	$query = $conn->query("SELECT pseudo_dest, avatar FROM amis INNER JOIN utilisateurs ON utilisateurs.pseudo = amis.pseudo_dest WHERE pseudo_exp = '".$pseudo_."' and active = 1");
	$fetch = $query->fetchall();
	//print_r($fetch);
	return $fetch;
}

//la function qui va recuperer la liste d'amis du destinataire
function liste_amis_dest(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$info = array();
	$pseudo_ = $_SESSION['pseudo'];
	$query = $conn->query("SELECT pseudo_exp, avatar FROM amis INNER JOIN utilisateurs ON utilisateurs.pseudo = amis.pseudo_exp WHERE pseudo_dest = '".$pseudo_."' and active = 1");
	$fetch = $query->fetchall();
	//print_r($fetch);
	return $fetch;
}

?>