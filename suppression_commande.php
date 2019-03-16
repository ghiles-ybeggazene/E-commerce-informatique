<?php
session_start();

if ($_SESSION['login'] == 'GIL_INFORMATIQUE') 
{
	
	$id = $_POST['idu'];
	include('try.php');
	$req = $bdd -> prepare('DELETE FROM commande WHERE id_commande = ?');
	$req -> execute(array($id));
	$_SESSION['supp_commande_reussit']='';
	header('location:gestion_commande.php');


}
else
{
	header('location:webmaster.php');	
}
?>