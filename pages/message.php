<?php 
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');
?>

<h3>Les messages</h3>
<?php
	//print_r(recup_message());
$messages = recup_message();
foreach ($messages as $message) {
	?>
		<div class="messages">
			<p>Envoyé par : <a href="index.php?page=profile&pseudo=<?php  echo $message['pseudo']; ?>"><?php echo $message['pseudo']; ?></a> Le : <?php echo date('d/m/Y à H:i:s', strtotime($message['date_message']))?></p><br>
			<img src="avatar//<?php echo "".$message['avatar']."";?>" height="50" width="50"><br>
			<p><em><?php echo $message['corps_message']; ?></em><hr></p>
		</div>
	<?php
}
?>