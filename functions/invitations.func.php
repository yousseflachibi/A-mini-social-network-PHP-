<?php


//la function qui va recuperer les infos de l'utilisateur connecté
function recup_invitations(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$info = array();
	$pseudo = $_SESSION['pseudo'];
	$query = $conn->query("SELECT pseudo_exp, date_invitation, active, avatar FROM amis 
		 INNER JOIN utilisateurs ON utilisateurs.pseudo = amis.pseudo_exp 
		 WHERE pseudo_dest ='{$_SESSION['pseudo']}'
	 	 ORDER BY date_invitation DESC");
	$fetch = $query->fetchall();
	return $fetch;
}

//la function qui va nous permettre d'afficher si sa demande a été acceptée
function invitation_acceptee(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = $conn->query("SELECT pseudo_dest FROM amis WHERE 
		pseudo_exp = '{$_SESSION['pseudo']}' AND active= 1
		");
	$fetch = $query->fetchall();
	//var_dump($fetch);
	//die(1);
	return $fetch;
}

?>