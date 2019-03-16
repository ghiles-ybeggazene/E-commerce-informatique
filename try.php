<?php
try {
$tab[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;	
 $bdd=new PDO('mysql:host=localhost;dbname=LAGA','root','',$tab);
 $bdd->exec("SET CHARACTER SET UTF8");
 } catch (Exception $e) {
 	die('erreur'.$e->getMessage());
 }?>