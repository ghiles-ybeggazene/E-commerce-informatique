<?php
session_start();
header("Content-type:text/javascript");

if(isset($_SESSION['login']))
{
	if($_SESSION['login'] == 'GIL_INFORMATIQUE')
{

	
	include('try.php');
	$ident = $_GET["idu"];
	$req = $bdd -> prepare('SELECT * FROM classe where id_classe = ?');
	$req -> execute(array($ident));
	$ligne = $req -> fetch();

	
	$nom_classe = $ligne['nom_classe'];

	echo 'afficherM("'.$nom_classe.'","'.$ident.'")';

}else{
	header('location:webmaster.php');
}
}else{
	header('location:webmaster.php');
	
}

?>