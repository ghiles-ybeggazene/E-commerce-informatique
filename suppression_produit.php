<?php
session_start();

if ($_SESSION['login'] == 'GIL_INFORMATIQUE') 
{
	
	$id = $_POST['idu'];
	include('try.php');
	$req = $bdd -> prepare('DELETE FROM produit WHERE ref_produit = ?');
	$req -> execute(array($id));
	$_SESSION['supp_prod_reussi']='';
	header('location:gestion_produit.php');


}
else
{
	header('location:webmaster.php');	
}
?>