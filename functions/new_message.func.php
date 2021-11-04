<?php

//la fonction qui va nous permette de verifier si le pseudo existe et si la personne n'essaye pas de s'auto envoyer un message 
function pseudo_incorrect(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query=$conn->query("SELECT COUNT(pseudo) FROM utilisateurs WHERE pseudo='{$_GET['pseudo']}' AND pseudo !='{$_SESSION['pseudo']}'");
	$fetch = $query->fetch();
	return (int)$fetch[0];
}

//la fonction qui va creer la conversation et le message qui va avec 
function ceer_conversation($sujet, $message){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$in_login = $_SESSION['pseudo'];

	try{
		$query = $conn->prepare("INSERT INTO conversations(id_conversation, sujet_conversation) VALUES('','".$sujet."')");
		$query->execute();
		$id_conversation = $conn->lastInsertId();
		$query = $conn->prepare("INSERT INTO conversations_messages(id_conversation, pseudo_exp, corps_message, date_message) VALUES('".$id_conversation."','".$in_login."','".$message."', NOW())");
		$query->execute();
		//var_dump("INSERT INTO conversations_messages(id_conversation, pseudo_exp, corps_message, date_message) VALUES('".$id_conversation."','".$in_login."','".$message."', NOW())");	
		$query = $conn->prepare("INSERT INTO conversation_membres(id_conversation, pseudo_dest) VALUES('".$id_conversation."','{$_GET['pseudo']}')");
		$query->execute();
	}catch(PDOException $e){
		//echo $e.getMessage();
		die($e);
	}
}

?>