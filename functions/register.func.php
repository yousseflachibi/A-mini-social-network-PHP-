<?php

//function qui va se charger d'inscription l'utilisateur
function inscrire_utilisateur($pseudo,$password_user,$email,$sexe,$situation,$apropos){
	try{

		$password_user = sha1($password_user);
		$servername = "localhost";
		$username = "root";
		$password = "";
		$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $conn->prepare("INSERT INTO utilisateurs(pseudo, password, email, sexe, situation, apropos,avatar) VALUES('".$pseudo."','".$password_user."','".$email."','".$sexe."','".$situation."','".$apropos."','default.png')");
		$query->execute();
	}catch(PDOException $e){
		//echo $e.getMessage();
		die($e);
	}
	/*
		$query = $db->prepare('SELECT defe FROM information WHERE term = 1');
		$query->execute();
		$fetch = $query->fetch();
		print_r($fetch);
	*/
	/*
		$query = $db->query('SELECT defe FROM information WHERE term = 1');
		$fetch = $query->fetch();
		print_r($fetch);
	*/
}

function pseudo_existe($pseudo){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = $conn->query("SELECT COUNT(id) FROM utilisateurs WHERE pseudo ='$pseudo'");
	$fetch = $query->fetch();
	//die(json_encode($fetch[0]));
	return (int)$fetch[0];

}	

function email_existe($email){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = $conn->query("SELECT COUNT(id) FROM utilisateurs WHERE email ='$email'");
	$fetch = $query->fetch();
	//die(json_encode($fetch[0]));
	return (int)$fetch[0];

}
?>