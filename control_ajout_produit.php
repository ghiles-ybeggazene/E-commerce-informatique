<?php 
session_start();
?><meta charset='utf-8'><?php
if (isset($_SESSION['login'])) 
{
	if ($_SESSION['login']=='GIL_INFORMATIQUE') 
	{
		include('try.php');
		if (
			isset($_POST['ref']) && !empty($_POST['ref']) && 
			isset($_POST['categorie']) && !empty($_POST['categorie']) && 
			isset($_POST['prix']) && !empty($_POST['prix']) &&
			isset($_POST['information']) && !empty($_POST['information']) &&
			isset($_POST['image']) && !empty($_POST['image']) &&
			isset($_POST['quantite']) && !empty($_POST['quantite'])
			) 
		{
			$ref = strip_tags($_POST['ref']);
			$categorie = strip_tags($_POST['categorie']);
			$prix = strip_tags($_POST['prix']);
			$information = strip_tags($_POST['information']);
			$image = strip_tags($_POST['image']);
			$quantite = strip_tags($_POST['quantite']);
			if (preg_match('#^[1-9][0-9]*$#', $quantite)) 
			{
				if (preg_match('#^[1-9][0-9]*$#', $prix)) 
				{
					$cat = $bdd -> prepare('SELECT * FROM categorie WHERE nom_categorie =?');
					$cat -> execute(array($categorie));
					$ct = $cat -> fetch();
					$ct1 = $ct['id_categorie'];
					$req = $bdd -> prepare('SELECT categorie.*, classe.*, produit.* FROM (classe INNER JOIN categorie ON classe.id_classe = categorie.id_classe) INNER JOIN produit ON categorie.id_categorie = produit.id_categorie where ref_produit = ?');
					$req -> execute(array($ref));
					$ligne = $req -> fetch();
					if (count($ligne['ref'])==0) 
					{
						$ins = $bdd -> prepare('INSERT INTO produit(ref_produit,id_categorie,prix,information,image,quantite_produit,promotion) VALUES(?,?,?,?,?,?,?)');	
						$ins -> execute(array($ref,$ct1,$prix,$information,$image,$quantite,'non'));
						$_SESSION['ajt_prod_reussit']='';
						header('location:gestion_produit.php');
					}
					else
					{
						$_SESSION['erreur_prod_existe']='';
						header('location:ajouter_produit.php');
					}	
				}
				else
				{
					$_SESSION['erreur_prod_prix']='';
					header('location:ajouter_produit.php');
				}
			}
			else
			{
				$_SESSION['erreur_prod_qte']='';
				header('location:ajouter_produit.php');
			}

		}
		else
		{	
			$_SESSION['erreur_prod_remplir']='';
			header('location:ajouter_produit.php');
		}
		
?>



<?php
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

