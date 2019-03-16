<?php
session_start();
if ($_SESSION['login'] == 'GIL_INFORMATIQUE') 
{
	$id = $_POST['idu'];
	include('try.php');
	$req = $bdd -> prepare('DELETE FROM client WHERE id = ?');
	$req -> execute(array($id));
	$_SESSION['supp_client_reussit']='';
	header('location:gestion_client.php');
}
else
{
	header('location:webmaster.php');	
}
?>