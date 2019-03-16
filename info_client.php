<?php
session_start();
header("Content-type:text/javascript");
if(isset($_SESSION['login'])){
	if($_SESSION['login'] == 'GIL_INFORMATIQUE')
{
	
	include('try.php');
	$ident = $_GET["idu"];
	$req = $bdd -> prepare('SELECT * FROM client WHERE id = ?');
	$req -> execute(array($ident));
	$ligne = $req -> fetch();

	$nom = $ligne['nom'];
	$prenom = $ligne['prenom'];
	$adresse = $ligne['adresse'];
	$tel = $ligne['tel'];
	$login = $ligne['login'];
	$password = $ligne['password'];
	$email = $ligne['email'];
	$age = $ligne['date_naiss'];
	$sexe = $ligne['sexe'];



	echo 'afficherProfile({"id":"'.$ident.'","nom":"'.$nom.'","prenom":"'.$prenom.'","adresse":"'.$adresse.'","tel":"'.$tel.'","login":"'.$login.'","password":"'.$password.'","email":"'.$email.'","age":"'.$age.'","sexe":"'.$sexe.'"})';
}
else
{
	
	header('location:webmaster.php');
}
}else{
	header('location:webmaster.php');
	
}

?>