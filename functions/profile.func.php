<?php
// la function  qui va recuperer les informations de la personne choisi par l'utilisateur

function recuperer_info_membre_choisi(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$pseudo = htmlentities($_GET['pseudo']);
	
	$info = array();
	$pseudo_ = $_SESSION['pseudo'];
	$query = $conn->query("SELECT * FROM utilisateurs WHERE pseudo != '".$pseudo_."' and pseudo = '".$pseudo."'");
	$fetch = $query->fetchall();
	//print_r($fetch);
	return $fetch;
}

//la fonction qui va verifier si une demande existe entre les deux membres
function demande_existe(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = $conn->query("SELECT COUNT(id_invitation) FROM amis WHERE 
		(pseudo_exp = '{$_SESSION['pseudo']}' and pseudo_dest = '{$_GET['pseudo']}')
		OR 
		(pseudo_exp = '{$_GET['pseudo']}' and pseudo_dest = '{$_SESSION['pseudo']}')
		");
	$fetch = $query->fetch();
	return (int)$fetch[0];
}

// la function  qui va verifier si le destinataire a accepté la demande
function accepter_demande(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = $conn->query("SELECT active FROM amis WHERE 
		(pseudo_exp = '{$_SESSION['pseudo']}' and pseudo_dest = '{$_GET['pseudo']}')
		OR 
		(pseudo_exp = '{$_GET['pseudo']}' and pseudo_dest = '{$_SESSION['pseudo']}')
		");
	$fetch = $query->fetchall();
	//var_dump($fetch);
	//die(1);
	return $fetch;
}

function verifier_expediteur(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = $conn->query("SELECT COUNT(id_invitation) FROM amis WHERE 
		pseudo_exp = '{$_SESSION['pseudo']}' AND pseudo_dest = '{$_GET['pseudo']}'
		");
	$fetch = $query->fetch();
	//var_dump($fetch);
	//die(1);
	return (int)$fetch[0];
}
?>