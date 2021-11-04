<?php 
	include('functions/membre.func.php');
	include('body/header.php');
	include('body/menu.php');
?>

<h3>Changer votre image de profile</h3>
<?php
	if(isset($_POST['submit'])){
		$avatar = $_FILES['avatar']['name'];
		$avatar_tmp = $_FILES['avatar']['tmp_name'];
		if(!empty($avatar)){
			$image_ext = strtolower(explode('.',$avatar)[1]);
			if(in_array($image_ext, array('jpg','jpeg','png','gif'))){
				modifier_image_profile($avatar_tmp,$avatar);

				header("Location:index.php?page=membre");
			}else{
				echo "<div class='error'>Veuillez saisir une image valide</div>";
			}
		}
	}
	

	///foreach ($infos as $info) {
		?>
			<img src="avatar/<?php echo $infos[15]; ?>" height="100" width="100" alt="avatar"/>

		<?php
	//}

?>
<form method="POST" action="" enctype="multipart/form-data">
	<input type="file" name="avatar"><br/><br/>
	<input type="submit" value="Valider" name="submit"/>
</form>