<?php

//la function qui va recuperer les infos de l'utilisateur connecté
function infos_membre_connecte(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$info = array();
	$pseudo = $_SESSION['pseudo'];
	$query = $conn->query("SELECT * FROM utilisateurs WHERE pseudo ='$pseudo'");
	$fetch = $query->fetch();
	//die(json_encode($fetch));
	foreach ($fetch as $row) {
		$info[]=$row;
	}
	return $info;

}

//La fonction  qui va compter le nombre de personnes inscrites
function nombre_membre(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = $conn->query("SELECT COUNT(id) FROM utilisateurs");
	$fetch_one = $query->fetchColumn();
	//print_r($fetch_one);
	return $fetch_one;
}
?>