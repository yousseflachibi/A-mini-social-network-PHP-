<div class="header">
<?php
	$infos = infos_membre_connecte();
	echo "Bienvenue ".$infos[2];
	//print_r($infos);
	if(!isset($_SESSION['pseudo'])){
		header("Location:index.php?page=login");
	}
?>
<p><a href="index.php?page=logout">Se déconnecter</a></p>
<style type="text/css">
	.conversation, .messages
{
	width: 600px;
	background-color: #333;
	margin: 0 auto;
	border-radius: 10px;
	/*-moz-border-radius: 10px;
	-webkit-border-radius: 10px;*/
}

.conversation a
{
	color: pink;
}

.conversation p a
{
	color: #FFF;
}	

.messages a
{
	color: pink;
}

.messages p
{
	color: white;
}

.messages p em
{
	color: lightgreen;
}


</style>
</div>