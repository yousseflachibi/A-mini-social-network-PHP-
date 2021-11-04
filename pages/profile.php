<?php 
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');
?>

<div class="info">
<?php
$infos_membres_choisis = recuperer_info_membre_choisi();
//var_dump(verifier_expediteur());
if(count($infos_membres_choisis) != 0 && $_GET['pseudo']!=$_SESSION['pseudo']){
	foreach ($infos_membres_choisis as $infos_membres_choisi) {

		if(demande_existe() == 0){
?>
			<div class="error">Vous n'êtes pas ami(e) avec <?php echo $infos_membres_choisi['pseudo'];?>
				<a href="index.php?page=envoi&pseudo=<?php echo $infos_membres_choisi['pseudo'];?>">Envoyer une invitation</a>
			</div>
<?php
		}else if(count(accepter_demande()) == 1 && verifier_expediteur() == 1){
			$active_ = accepter_demande();
			$active_ = $active_[0]['active'];
			if($active_==1){
?>				
			
			<img src="avatar/<?php echo $infos_membres_choisi['avatar']; ?>" height="200" width="200" alt="avatar">
			<p><strong>Email</strong> : <em><?php echo $infos_membres_choisi['email']; ?></em></p>
			<p><strong>Sexe</strong> : <em><?php echo $infos_membres_choisi['sexe']; ?></em></p>
			<p><strong>Situation</strong> : <em><?php echo $infos_membres_choisi['situation']; ?></em></p>
			<p><strong>A propos de vous</strong> : <em><?php echo $infos_membres_choisi['apropos']; ?></em></p>
			<a href="index.php?page=supprimer_amis&pseudo=<?php echo $infos_membres_choisi['pseudo']; ?>" class="error">Retirer <?php echo $infos_membres_choisi['pseudo']; ?> de votre liste d'amis</a>
<?php
			}else{
?>	
				<div class="success">Demande en envoyée<br />
					<a href="index.php?page=annuler&pseudo=<?php echo $infos_membres_choisi['pseudo']; ?>">Annuler la demande</a>
				</div>
<?php
			}
		}else if(count(accepter_demande()) == 1 && verifier_expediteur() == 0){
			$active_ = accepter_demande();
			$active_ = $active_[0]['active'];
			if($active_==1){

?><p><a href="index.php?page=new_message&pseudo=<?php echo $_GET['pseudo']; ?>">Envoyer un message</a></p>
				<img src="avatar/<?php echo $infos_membres_choisi['avatar']; ?>" height="200" width="200" alt="avatar">
			<p><strong>Email</strong> : <em><?php echo $infos_membres_choisi['email']; ?></em></p>
			<p><strong>Sexe</strong> : <em><?php echo $infos_membres_choisi['sexe']; ?></em></p>
			<p><strong>Situation</strong> : <em><?php echo $infos_membres_choisi['situation']; ?></em></p>
			<p><strong>A propos de vous</strong> : <em><?php echo $infos_membres_choisi['apropos']; ?></em></p>
			<a href="index.php?page=supprimer_amis&pseudo=<?php echo $infos_membres_choisi['pseudo']; ?>" class="error">Retirer <?php echo $infos_membres_choisi['pseudo']; ?> de votre liste d'amis</a>
<?php
			}else{
?>
				<div class="success">Demande en cours<br />
					"Verifiez vos invitations"
				</div>
<?php			
			}
		}else{
?>

			<img src="avatar/<?php echo $infos_membres_choisi['avatar']; ?>" height="200" width="200" alt="avatar">
			<p><strong>Email</strong> : <em><?php echo $infos_membres_choisi['email']; ?></em></p>
			<p><strong>Sexe</strong> : <em><?php echo $infos_membres_choisi['sexe']; ?></em></p>
			<p><strong>Situation</strong> : <em><?php echo $infos_membres_choisi['situation']; ?></em></p>
			<p><strong>A propos de vous</strong> : <em><?php echo $infos_membres_choisi['apropos']; ?></em></p>
<?php		
		}
	}
}else{
	header("Location:index.php?page=membre");
}

?>
</div>