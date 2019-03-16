<?php
session_start();
if (isset($_SESSION['login'])) 
{

		if(isset($_POST['cat']) && !empty($_POST['cat']) && 
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
					/*$coco = $bdd -> prepare('SELECT * FROM categorie WHERE  nom_categorie =?');
					$coco -> execute(array($cat));
					$id_cat = $coco -> fetch();*/
	
					$co = $bdd -> prepare('UPDATE produit SET id_categorie=? , prix=?, image=?, quantite_produit=?, information=?, promotion=? WHERE ref_produit=?');	
					$co -> execute(array($cat,$prix,$img,$qnt,$desc,$promo,$ref));
					$_SESSION['modif_promo_reussi']='';
					header('location:gestion_promotion.php');	
				}
				else
				{
					$_SESSION['err_modif_promo_prix']='';
					header('location:gestion_promotion.php');
						
				}
			}
			else
			{
				$_SESSION['err_modif_promo_qte']='';
				header('location:gestion_promotion.php');
				
			}
		}
		else
		{
			$_SESSION['err_modif_promo_gle']='';
			header('location:gestion_promotion.php');
			
		}

	
}
else
{
	header('location:webmaster.php');
}



?>