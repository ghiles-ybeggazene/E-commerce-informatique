<?php
session_start();
if (isset($_SESSION['login'])) 
{

		if(isset($_POST['nom_cat']) && !empty($_POST['nom_cat']) )
		{	$nom_cat=strip_tags($_POST['nom_cat']);
			$ref = $_POST['ref'];
					include('try.php');	
					$co = $bdd -> prepare('UPDATE categorie SET nom_categorie=? WHERE id_categorie=?');	
					$co -> execute(array($nom_cat,$ref));
					$_SESSION['modif_cat_reussit']='';
					header('location:gestion_categorie.php');	

		}
		else
		{
			$_SESSION['erreur_modif_cat_gle']='';
			header('location:gestion_categorie.php');
			
		}

	
}
else
{
	header('location:webmaster.php');
}



?>