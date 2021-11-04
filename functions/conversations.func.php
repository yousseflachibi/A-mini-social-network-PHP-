<?php

//la function qui va recuperer les conversations
function recup_conversation(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$results = array();
	$query = $conn->query("SELECT conversations.id_conversation, conversations.sujet_conversation,
		utilisateurs.pseudo, utilisateurs.avatar,
		conversations_messages.date_message 
		FROM conversations 
		LEFT JOIN conversations_messages ON conversations.id_conversation = conversations_messages.id_conversation 
		INNER JOIN conversation_membres ON conversations.id_conversation = conversation_membres.id_conversation 
		INNER JOIN utilisateurs ON utilisateurs.pseudo = conversations_messages.pseudo_exp 
		WHERE pseudo_dest = '{$_SESSION['pseudo']}' 
		GROUP BY conversations.id_conversation 
		ORDER BY conversations_messages.date_message");
	$fetch = $query->fetchall();
	//print_r($fetch);
	return $fetch;
}

?>