<?php 
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');
?>
<h3>Vos invitations</h3>
<?php
	$invitation_acceptees = invitation_acceptee();
	$invitations = recup_invitations();
	if(count($invitations) > 0){
		foreach ($invitations as $invitation) {
			if($invitation['active']==0){
			?>
				<img src='avatar/<?php echo $invitation['avatar'];?>' height='100' width='100' alt='avatar'/>
				<div class="error">
					<?php echo $invitation['pseudo_exp'];?> a voulu vous ajouter comme ami(e)<br/>
					<a href="index.php?page=accepter&pseudo=<?php echo $invitation['pseudo_exp']; ?>">Accepter|</a><a href="index.php?page=refuser&pseudo=<?php echo $invitation['pseudo_exp']; ?>">Refuser</a>
				</div>
			<?php
			}else{
				?>
					<div>Vous êtes désormais ami(e) avec <?php echo $invitation['pseudo_exp'];?></div>
				<?php
			}
		}
	}else if(count($invitation_acceptees) > 0){
		foreach ($invitation_acceptees as $invitation_acceptee) {
			update_date_vue();
			?>
				<div class="success"><?php echo $invitation_acceptee["pseudo_dest"];?> a accepté votre invitation</div>
			<?php
		}
	}else{
		?>
			<div class="error">Vous n'avez pas d'invitation</div>
		<?php
	}
?>