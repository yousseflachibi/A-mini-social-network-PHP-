<?php

//la function qui change  les informations du membre
function changer_informations_membre($email,$situation,$apropos){
	try{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//die("UPDATE utilisateurs set email= '".$email."' , situation = '".$situation."' , apropos= '".$apropos."' WHERE pseudo = '".$_SESSION['pseudo']."'");
		$query = $conn->prepare("UPDATE utilisateurs set email= '".$email."' , situation = '".$situation."' , apropos= '".$apropos."' WHERE pseudo = '".$_SESSION['pseudo']."'");
		$query->execute();
	}catch(PDOException $e){
		//echo $e.getMessage();
		die($e);
	}
}

?>