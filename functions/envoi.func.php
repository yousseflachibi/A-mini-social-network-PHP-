<?php

// la function  qui va enregister l'invitation dans la DB
function enreg_invitation(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$pseudo = htmlentities($_GET['pseudo']);
	
	$info = array();
	$pseudo_ = $_SESSION['pseudo'];
	$query = $conn->prepare("INSERT INTO amis(id_invitation, pseudo_exp, pseudo_dest, date_invitation, date_confirmation, date_vue, active) VALUES('','{$_SESSION['pseudo']}','{$_GET ['pseudo']}', NOW(),NOW(),NOW(),0)");
	$query->execute();
}

?>