<?php 
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');
?>
<h3>Vos amis</h3>

<?php
$liste_amis_exp = liste_amis_exp();
$liste_amis_dest = liste_amis_dest();

foreach ($liste_amis_exp as $liste_ami_exp) {
	?>
		<p><a href="index.php?page=profile&pseudo=<?php echo $liste_ami_exp['pseudo_dest']; ?>" ><?php echo $liste_ami_exp['pseudo_dest'] ?></a></p>
		<a href="index.php?page=profile&pseudo=<?php echo $liste_ami_exp['pseudo_dest']; ?>"><img src="avatar/<?php echo $liste_ami_exp['avatar'];?>"></a>
	<?php
}


foreach ($liste_amis_dest as $liste_ami_dest) {
	?>
		<p><a href="index.php?page=profile&pseudo=<?php echo $liste_ami_dest['pseudo_exp']; ?>" ><?php echo $liste_ami_dest['pseudo_exp'] ?></a></p>
		<a href="index.php?page=profile&pseudo=<?php echo $liste_ami_dest['pseudo_exp']; ?>"><img src="avatar/<?php echo $liste_ami_dest['avatar'];?>"></a>
	<?php
}

if(empty($liste_amis_dest) && empty($liste_amis_exp)){
	?>
		<div class="error">Vous n'avez pas d'amis</div>
	<?php
}


?>