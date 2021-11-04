<?php 
	include('body/header.php');
	include('body/menu.php');
?>
<div class="info">
	<?php
		//foreach ($infos as $info)
		//{
		//var_dump($infos);
			?>
				<p><a href="index.php?page=update_avatar">Changer d'image</a></p>
				<a href="index.php?page=update_avatar"><img src="avatar/<?php echo $infos[15]; ?>" height="200" width="200" alt="avatar"></a>
				<p><strong>Email</strong> : <em><?php echo $infos[6]; ?></em></p>
				<p><strong>Sexe</strong> : <em><?php echo $infos[8]; ?></em></p>
				<p><strong>Situation</strong> : <em><?php echo $infos[10]; ?></em></p>
				<p><strong>A propos de vous</strong> : <em><?php echo $infos[12]; ?></em></p>
			<?php
		//}
	?>
</div>