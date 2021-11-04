<?php

//la function qui va recuperer les messages
function recup_message()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = $conn->query("SELECT conversations_messages.date_message,
								conversations_messages.corps_message,
								utilisateurs.pseudo,
								utilisateurs.avatar
								FROM conversations_messages
								INNER JOIN utilisateurs ON utilisateurs.pseudo = conversations_messages.pseudo_exp 
								INNER JOIN conversation_membres ON conversations_messages.id_conversation = conversation_membres.id_conversation 
								INNER JOIN conversations ON conversations_messages.id_conversation = conversations.id_conversation 
								WHERE conversations_messages.id_conversation = '{$_GET['id']}' 
								AND conversation_membres.pseudo_dest = '{$_SESSION['pseudo']}' 
								ORDER BY conversations_messages.date_message DESC");
	$fetch = $query->fetchall();
	//print_r($fetch);
	return $fetch;
}



?>