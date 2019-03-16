<?php
session_start();
header("Content-type:text/javascript");

if(isset($_SESSION['login']))
{
	if($_SESSION['login'] == 'GIL_INFORMATIQUE')
{

	
	include('try.php');
	$ident = $_GET["idu"];
	$req = $bdd -> prepare('SELECT categorie.*, classe.*, produit.* FROM (classe INNER JOIN categorie ON classe.id_classe = categorie.id_classe) INNER JOIN produit ON categorie.id_categorie = produit.id_categorie where ref_produit = ?');
	$req -> execute(array($ident));
	$ligne = $req -> fetch();

	$classe = $ligne['nom_classe'];
	$categorie = $ligne['nom_categorie'];
	$prix = $ligne['prix'];
	$information = strip_tags($ligne['information']);
	$information = str_replace(array("\r\n","\n"),"<br>",$information);
	$image = addcslashes($ligne['image'],"\\");
	$promotion = $ligne['promotion'];
	$quantite_produit = $ligne['quantite_produit'];
	$id_cat = $ligne['id_categorie'];


	if(!isset($_GET['mod']))
		echo 'afficher({"ref_produit":"'.$ident.'","classe":"'.$classe.'","categorie":"'.$categorie.'","prix":"'.$prix.'","information":"'.$information.'","image":"'.$image.'","promotion":"'.$promotion.'","quantite":"'.$quantite_produit.'"})';
	else
		echo 'afficherM({"ref_produit":"'.$ident.'","id_cat":"'.$id_cat.'","prix":"'.$prix.'","information":"'.$information.'","image":"'.$image.'","promotion":"'.$promotion.'","quantite":"'.$quantite_produit.'"})';

}else{
	header('location:webmaster.php');
}
}else{
	header('location:webmaster.php');
	
}

?>