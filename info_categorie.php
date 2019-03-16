<?php
session_start();
header("Content-type:text/javascript");

if(isset($_SESSION['login']))
{
	if($_SESSION['login'] == 'GIL_INFORMATIQUE')
{

	
	include('try.php');
	$ident = $_GET["idu"];
	$req = $bdd -> prepare('SELECT * FROM categorie where id_categorie = ?');
	$req -> execute(array($ident));
	$ligne = $req -> fetch();

	
	$nom_cat = $ligne['nom_categorie'];

	echo 'afficherM("'.$nom_cat.'","'.$ident.'")';

}else{
	header('location:webmaster.php');
}
}else{
	header('location:webmaster.php');
	
}

?>