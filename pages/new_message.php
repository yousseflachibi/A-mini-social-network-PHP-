<?php 
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');

	//var_dump(pseudo_incorrect());
?>
<h3>Envoyer un message</h3>
<?php
	if(isset($_GET['pseudo']) && !empty($_GET['pseudo']) && pseudo_incorrect() == 1){
		if(isset($_POST['submit'])){
			$sujet = htmlspecialchars(trim($_POST["sujet"]));
			$message = (htmlentities(trim($_POST["message"])));
			if (!empty($sujet) && !empty($message)) {
				ceer_conversation($sujet, $message);
				?>
					<div class="success">Votre message a bien été envoyé</div>
				<?php
			}else{
				?>
					<div class='error'>Le sujet et le message sont obligatoires</div>
				<?php
			}
		}else{

		}
	}else{
		header("Location:index.php?page=membre");
	}
?>

<form method="post" action="">
	<label for="a">à :</label>
	<input type="text" name="a" id="a" value="<?php echo $_GET['pseudo']; ?>" disabled="disabled"><br />
	<label for="sujet">Sujet : </label>
	<input type="text" name="sujet" id="sujet"><br />
	<label for="message">Votre message : </label>
	<textarea rows="6" cols="30" name="message" id="message"></textarea><br /><br />
	<input type="submit" value="Envoyer" name="submit">
</form>