<?php

//la function qui va nous permettre d'afficher l'info-bulle des invitations	
function afficher_ibi(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = $conn->query("SELECT COUNT(id_invitation) FROM amis WHERE 
		(pseudo_dest = '{$_SESSION['pseudo']}' AND date_invitation = date_confirmation) 
		OR (pseudo_exp='{$_SESSION['pseudo']}' AND date_confirmation > date_vue)
		");
	$fetch = $query->fetch();
	//var_dump($fetch);
	//die(1);
	return (int)$fetch[0];
}

//la function qui va nous permettre de mettre à jour la date_vue dans la bdd pour pouvoir cacher l'info-bulle
function update_date_vue(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = $conn->prepare("UPDATE amis SET date_vue=NOW() WHERE pseudo_exp='{$_SESSION['pseudo']}' AND active=1");
	$query->execute();
}
?>