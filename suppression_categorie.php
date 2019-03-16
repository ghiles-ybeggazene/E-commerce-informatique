<?php 
	session_start();
?>
<meta charset='utf-8'>

<?php
	if (isset($_SESSION['login'])) 
	{
		if ($_SESSION['login']=='GIL_INFORMATIQUE') 
		{
			include('try.php');
			$id = $_POST['idu'];
			$req = $bdd -> prepare('DELETE FROM categorie WHERE id_categorie = ?');
			$req -> execute(array($id));
			$_SESSION['supp_cat_reussit']='';
			header('location:gestion_categorie.php');
		}
		else
		{
			header('location:webmaster.php');	
		}
	}
	else
	{
		header('location:webmaster.php');	
	}
?>