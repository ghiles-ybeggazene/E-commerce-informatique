<?php
session_start();

if ($_SESSION['login'] == 'GIL_INFORMATIQUE') 
{
	
	$id = $_POST['idu'];
	include('try.php');
	$req = $bdd -> prepare('UPDATE commande set trait_commande=? WHERE id_commande = ?');
	$req -> execute(array("traité",$id));
	$_SESSION['trait_commande_reussit']='';
	header('location:gestion_commande.php');


}
else
{
	header('location:webmaster.php');	
}
?>