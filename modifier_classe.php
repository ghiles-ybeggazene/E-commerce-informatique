<?php
session_start();
if (isset($_SESSION['login'])) 
{

		if(isset($_POST['nom_classe']) && !empty($_POST['nom_classe']) )
		{	$nom_classe=strip_tags($_POST['nom_classe']);
			$ref = $_POST['ref'];
					include('try.php');	
					$co = $bdd -> prepare('UPDATE classe SET nom_classe=? WHERE id_classe=?');	
					$co -> execute(array($nom_classe,$ref));
					$_SESSION['modif_classe_reussit']='';
					header('location:gestion_classe.php');	

		}
		else
		{	$_SESSION['erreur_modif_classe_gle']='';
			header('location:gestion_classe.php');
			
		}

	
}
else
{
	header('location:webmaster.php');
}



?>