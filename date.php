<?php
include('try.php');
$req=$bdd->query('SELECT * FROM commande ');
//$req->execute(array($_SESSION['commande']));
while($com=$req->fetch()){
$date1=  date_create($com['date_commande']);
$date2=date_create(date('Y-m-d'));
$diff=date_diff($date1,$date2);

// %a outputs the total number of days
echo $diff->format("Total number of days: %a.");
/*if (date('d')-date($com['date_commande'],'d')>=2) {
$req=$bdd->prepare('DELETE FROM commande,panier where id_commande=? ');
 $req->execute(array($com['id_commande']));
}*/}?>