
<?php
session_start();


?>




<?php 
if (isset($_POST['send'])) {
	if (isset($_POST['message'])&& !empty($_POST['message'])) {
		include('try.php');$admin="admin";$message=htmlspecialchars($_POST['message']);
		$req = $bdd->prepare("INSERT INTO messagerie (login,admin,message,date_message) VALUES (?,?,?,now())");
				$req->execute(array($_SESSION['login'],$admin,$message));
				header('Location:messagerie.php');
	}else
header('Location:messagerie.php');
	
}else
header('Location:messagerie.php');
	


?> 