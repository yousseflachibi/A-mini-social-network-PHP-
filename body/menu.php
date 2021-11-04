<?php
$ibi = afficher_ibi();
	if($ibi !== 0){
		?>
			<div class="ibi" style="background-color: #FF0000;border: 1px solid #000;color: #FFF;border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius: 10px;width: 20px;position: relative;left: 670px;top: 10px;">
				<?php
					echo $ibi;
				?>
			</div>
		<?php
	}
?>
<div class="menu">
	<ul>
		<li><a href="index.php?page=membre">Accueil</a></li>
		<li><a href="index.php?page=update">Charger vos informations</a></li>
		<li><a href="index.php?page=liste_membre">les membres</a></li>
		<li><a href="index.php?page=amis">Vos amis</a></li>
		<li><a href="index.php?page=invitations">Invitations</a></li>
		<li><a href="index.php?page=conversations">Messages</a></li>
		<li class="nbr"><?php echo nombre_membre() > 1 ? nombre_membre().' membres' : nombre_membre().' membre'; ?></li>
	</ul>
</div>