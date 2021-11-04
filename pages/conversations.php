<?php 
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');
?>

<h3>Les converasations</h3>
<?php

print_r(recup_conversation());
$converasations = recup_conversation();
if(count($converasations)!=0){
	foreach ($converasations as $conversation) {
		?>
			<div class ="conversation">
				<a href="index.php?page=profile&pseudo=<?php echo $conversation['pseudo'];?>"><?php echo "".$conversation['pseudo'].""; ?></a><br>
				<img src="avatar/<?php echo "".$conversation['avatar']."";?>" height="70" width="70">
				<p><a href="index.php?page=message&id=<?php echo "".$conversation['id_conversation'];?>"><?php echo $conversation['sujet_conversation']?></a></p>
				<p>Posté le : <?php echo date('d/m/Y à H:i:s', strtotime($conversation['date_message'])); ?></p>
			</div>
			<br>
		<?php
	}
}else{
	?>
		<div class="error">Vous n'avez pas de message</div>
	<?php
}