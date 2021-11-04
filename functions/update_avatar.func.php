<?php

//la function qui va changer l'image de profile du membre
function modifier_image_profile($avatar_tmp, $avatar){

	try{

		move_uploaded_file($avatar_tmp, 'avatar/'.$avatar);
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		
		$info = array();
		$pseudo = $_SESSION['pseudo'];
		$query = $conn->prepare("UPDATE utilisateurs set avatar = '".$avatar."' WHERE pseudo ='{$_SESSION['pseudo']}' ");
		$query->execute();

		

	}catch(PDOException $e){
		//echo $e.getMessage();
		die($e);
	}
}
?>