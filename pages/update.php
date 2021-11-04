<?php 
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');

	if(isset($_POST['submit'])){	
		$email = (htmlentities(trim($_POST["email"])));
		$apropos =(htmlentities(trim($_POST["apropos"])));
		$situation = (htmlspecialchars(trim($_POST["situation"])));
		changer_informations_membre($email,$situation,$apropos);
		header("Location:index.php?page=membre");
	}
?>

<h3>Changer vos informations</h3>

<form method="POST">
	<label for="situation">Votre situation : </label>
	<select name="situation">
		<?php echo isset($infos[11])? '<option value='.$infos[11].'>'.$infos[11].'</option>':'';?>
		<?php echo $infos[11] != 'Célibataire' ? '<option value="Célibataire">Célibataire</option>':'';?>
		<?php echo $infos[11] != 'En couple' ? '<option value="En couple">En couple</option>':'';?>
		<?php echo $infos[11] != 'Divorcé(e)' ? '<option value="Divorcé(e)">Divorcé(e)</option>':'';?>
		<?php echo $infos[11] != 'Veuf(ve)' ? '<option value="Veuf(ve)">Veuf(ve)</option>':'';?>
	</select><br/><br/>
	<label for="email">Votre email : </label>
	<input type="text" name="email" value="<?php echo $infos[7];?>"><br/><br/>

	<label for="apropos">A propos de vous</label>
	<textarea rows="6" cols="30" name="apropos"><?php echo $infos[12]; ?></textarea><br/><br/>

	<input type="submit" name="submit" value="Changer">
</form>