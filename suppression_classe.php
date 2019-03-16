<?php
session_start();

if ($_SESSION['login'] == 'GIL_INFORMATIQUE') 
{
	
	$id = $_POST['idu'];
	include('try.php');
	$req = $bdd -> prepare('DELETE FROM classe WHERE id_classe = ?');
	$req -> execute(array($id));
	$_SESSION['supp_classe_reussit']='';
	header('location:gestion_classe.php');


}
else
{
	header('location:webmaster.php');	
}
?>