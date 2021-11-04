<h1>Inscription</h1>

<?php
	
	if(isset($_POST['submit'])){
		$sexe = htmlspecialchars(trim($_POST["sexe"]));
		$pseudo = (htmlentities(trim($_POST["pseudo"])));
		$password = (htmlentities(trim($_POST["password"])));
		$repeatpassword = (htmlentities(trim($_POST["repeatpassword"])));
		$email = (htmlentities(trim($_POST["email"])));
		$apropos =(htmlentities(trim($_POST["apropos"])));
		$situation = (htmlspecialchars(trim($_POST["situation"])));

		if (empty($pseudo)) {
			$errors[] = "Veuillez saisir un pseudo";
		}

		if(empty($password)){
			$errors[]="Veuillez saisir un password";
		}

		if($password != $repeatpassword){
			$errors[]="Vos deux password doivent être identiques";
		}

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors[]="Votre adresse email n'est pas correcte";
		}

		if(empty($apropos)){
			$errors[]="Veuillez vous décrire en quelques ligne";
		}

		if(pseudo_existe($pseudo)>0){
			$errors[]="Ce pseudo n'est pas disponible";
		}

		if(email_existe($email)>0){
			$errors[]="Cette adresse email existe déjà <br> avez vous oublié votre <a href='#'>password?</a>";
		}

		if(!empty($errors)){
			foreach ($errors as $error) {
				echo "<div class='error'>".$error."</div>";
			}
		}else{
			inscrire_utilisateur($pseudo,$password,$email,$sexe,$situation,$apropos);
			die('Inscription terminée, vous pouvez vous <a href=\'index.php?page=login\'>connecter</a>');
		}
	}
	
?>

<form method="POST" action="">
	<label for="sexe" class="form-label">Sexe:</label>
	<select name="sexe" class="form-select" style="margin: auto; width:200px;">
		<?php echo isset($sexe)? '<option value='.$sexe.'>'.$sexe.'</option>':'';?>
		<?php echo $sexe != 'Homme' ? '<option value="Homme">Homme</option>':'';?>
		<?php echo $sexe != 'Femme' ? '<option value="Femme">Femme</option>':'';?>
		<!--option value="Homme">Homme</option>
		<option value="Femme">Femme</option-->
	</select><br/><br/>
	<label for="situation" class="form-label">Situation:</label>
	<select name="situation" class="form-select" style="margin: auto;; width:200px;">
		<?php echo isset($situation)? '<option value='.$situation.'>'.$situation.'</option>':'';?>
		<?php echo $situation != 'Célibataire' ? '<option value="Célibataire">Célibataire</option>':'';?>
		<?php echo $situation != 'En couple' ? '<option value="En couple">En couple</option>':'';?>
		<?php echo $situation != 'Divorcé(e)' ? '<option value="Divorcé(e)">Divorcé(e)</option>':'';?>
		<?php echo $situation != 'Veuf(ve)' ? '<option value="Veuf(ve)">Veuf(ve)</option>':'';?>
		<!--option value="Célibataire">Célibataire</option>
		<option value="En couple">En couple</option>
		<option value="Divorcé(e)">Divorcé(e)</option>
		<option value="Veuf(ve)">Veuf(ve)</option--->
	</select><br/><br/>
	<label for="pseudo" class="form-label">Votre pseudo:</label>
	<input type="text" name="pseudo" value="<?php echo isset($pseudo)? $pseudo:'';?>" class="form-control" style="margin: auto;"><br />
	<label for="password" class="form-label">Votre password:</label>
	<input type="password" name="password" class="form-control" style="margin: auto;"><br />
	<label for="repeatpassword" class="form-label">Repetez votre password:</label>
	<input type="password" name="repeatpassword" class="form-control" style="margin: auto;"><br />
	<label for="email" class="form-label">Veuillez saisir votre email:</label>
	<input type="text" name="email" value="<?php echo isset($email)? $email:'';?>" class="form-control" style="margin: auto;"><br/>

	<label for="apropos" class="form-label">A propos de vous</label>
	<textarea rows="6" cols="30" name="apropos"><?php echo isset($apropos)? $apropos:'';?></textarea><br/><br/>

	<input type="submit" value="S'inscrire" name="submit" class="btn btn-primary">
</form>

<a href="index.php?page=login">Retournez à la page de connexion</a>