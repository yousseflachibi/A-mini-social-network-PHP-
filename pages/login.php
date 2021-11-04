<h1>Connexion</h1>

<?php

	if(isset($_POST['submit'])){
		$pseudo = (htmlentities(trim($_POST["pseudo"])));
		$password = (htmlentities(trim($_POST["password"])));

		if (empty($pseudo)) {
			$errors[] = "Veuillez saisir un pseudo";
		}

		if(empty($password)){
			$errors[]="Veuillez saisir un password";
		}

		if(!empty($errors)){
			foreach ($errors as $error) {
				echo "<div class='error'>".$error."</div>";
			}
		}else{
			if(verifier_combinaison_pseudo_password($pseudo,$password) == false){
				echo "<div class='error'>Pseudo ou password incorrect</div>";
			}else{
				$_SESSION['pseudo']=$pseudo;
				header("Location:index.php?page=membre");
			}
		}
	}

?>

<form method="POST" action="">
	<label for="pseudo" class="form-label">Votre pseudo:</label>
	<input type="text" name="pseudo" class="form-control" style="margin: auto;"><br />
	<label for="password" class="form-label">Votre password:</label>
	<input type="password" name="password" class="form-control" style="margin: auto;"><br /><br />
	<input type="submit" value="Se connecter" name="submit" class="btn btn-primary">
</form>

<a href="index.php?page=register">Pas encore membre</a>