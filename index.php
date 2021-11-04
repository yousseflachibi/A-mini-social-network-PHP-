<?php

include('functions/connection.php');
include('functions/ibi.func.php');

$page = htmlentities($_GET['page']);

include('functions/'.$page.'.func.php');

$pages = scandir('pages');
//print_r($pages);
/*if(in_array($_GET['page'].".php",$pages)){
	echo "Cette page existe";
}else{
	echo "Cette page n'existe pas";
}*/

if(!empty($page) && in_array($_GET['page'].".php",$pages)){
	$content = 'pages/'.$_GET['page'].".php";
}else{
	header("Location:index.php?page=login");
}
if(isset($_SESSION['pseudo']) && $page != 'membre' && $page != 'update' && $page != 'update_avatar' && $page != 'liste_membre' && $page != 'profile' && $page != 'envoi' && $page != 'annuler' && $page != 'invitations' && $page != 'accepter' && $page != 'refuser' && $page != 'amis' && $page != 'supprimer_amis' && $page != 'new_message' && $page != 'conversations' && $page != 'message'){
	header("Location:index.php?page=membre");
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<?php
		if($_GET['page'] == 'login' || $_GET['page'] == 'register'){
	
	?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<?php	
		}
	?>
	<title></title>
</head>
<body>
	<div id='content'>
		<?php 
			include($content); 
		?>
	</div>
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>