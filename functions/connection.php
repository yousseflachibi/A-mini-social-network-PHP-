<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

try{

	$conn = new PDO("mysql:host=$servername;dbname=rs",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//die ("connected to server");

}catch(PDOException $e){
	//echo $e.getMessage();
	die($e);
}
?>