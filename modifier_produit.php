<?php
session_start();
if (isset($_SESSION['login'])) 
{

		if(isset($_POST['cat']) && !empty($_POST['cat']) && 
			isset($_POST['desc']) && !empty($_POST['desc']) && 
			isset($_POST['prix']) && !empty($_POST['prix']) && 
			isset($_POST['img']) && !empty($_POST['img']) && 
			isset($_POST['promo']) && !empty($_POST['promo']) && 
			isset($_POST['qnt']) && !empty($_POST['qnt'])  
		)
		{	$promo = strip_tags($_POST['promo']);
			$cat = strip_tags($_POST['cat']);
			$desc = strip_tags($_POST['desc']);
			$prix = strip_tags($_POST['prix']);
			$img = strip_tags($_POST['img']);
			$qnt = strip_tags($_POST['qnt']);
			$ref = strip_tags($_POST['ref']);
			if (preg_match('#[0-9]+#', $qnt)) 
			{
				if (preg_match('#[0-9]+#', $prix)) 
				{
					include('try.php');
					$coco = $bdd -> prepare('SELECT * FROM categorie WHERE  nom_categorie =?');
					$coco -> execute(array($cat));
					$id_cat = $coco -> fetch();
	
					$co = $bdd -> prepare('UPDATE produit SET  prix=?, image=?, quantite_produit=?, information=?, promotion=? WHERE ref_produit=?');	
					$co -> execute(array($prix,$img,$qnt,$desc,$promo,$ref));
					$_SESSION['modif_prod_reussi']='';
					header('location:gestion_produit.php');	
				}
				else
				{
					$_SESSION['err_modif_prod_prix']='';
					header('location:gestion_produit.php');	
				}
			}
			else
			{	$_SESSION['err_modif_prod_qte']='';
				header('location:gestion_produit.php');	
			}
		}
		else
		{	$_SESSION['err_modif_prod_gle']='';
			header('location:gestion_produit.php');
		}

	
}
else
{
	header('location:webmaster.php');
}



?>