<?php

session_start();

include('try.php');

$req1=$bdd->query('SELECT * FROM commande');
//$req->execute(array($_SESSION['commande']));
while($com=$req1->fetch()){
$date1=date_create($com['date_commande']);
$date2=date_create(date('Y-m-d'));
$diff=date_diff($date1,$date2);

// %a outputs the total number of days
if( $diff->format(" %a")>2)



 {
$req=$bdd->prepare('DELETE FROM commande where id_commande=? ');
 $req->execute(array($com['id_commande']));
 $req=$bdd->prepare('DELETE FROM panier where id_commande=?');
  $req->execute(array($com['id_commande']));
}}



?>




<!DOCTYPE html >
<html 0672335671>
<head>
<meta charset="utf-8"/>
<title>panier</title>

<link rel="stylesheet" type="text/css" href="doc/css/bootstrap.css"/>
 <link rel="stylesheet" type="text/css" href="laga1.css"/>
  <link rel="stylesheet" type="text/css" href="profile.css"/>
    <link rel="stylesheet" type="text/css" href="panier.css"/>
<?php //include('inclusion1.php');
 if (isset($_SESSION['nom'])&&isset($_SESSION['prenom'])&&!empty($_SESSION['nom'])&&!empty($_SESSION['prenom'])) {
 
 if (isset($_SESSION['alert1'])) {
  header('location:informatique_client.php');
}else if (isset($_SESSION['alert2'])) {
  header('location:informatique_promo_client.php');
}else if (isset($_SESSION['alert3'])) {
  header('location:mobilier_client.php');
}else if (isset($_SESSION['alert4'])) {
  header('location:mobilier_promo_client.php');
}

if (!isset($_SESSION['produit'])) {
  $_SESSION['produit']=array();
}
 //SUPPRIMER LA COMMANDE
if (isset($_POST['ouisupp'] )) {
foreach ($_SESSION['produit'] as $_SESSION['ref'] => $value) {
  if (array_key_exists($_SESSION['ref'], $_SESSION['quantite'])) {
  $_SESSION['quantite'][$_SESSION['ref']]=($_SESSION['quantite'][$_SESSION['ref']]+$_SESSION['produit'][$_SESSION['ref']]);
  }
}

foreach ($_SESSION['produit'] as  $_SESSION['ref'] =>$key) {
 
    unset($_SESSION['produit'][$_SESSION['ref']]);

  }$_SESSION['prix']=0;
  //annuler la suppression 
}else if(isset($_POST['nonsupp'] )) {
  echo "<script> alert('suppression annulée');</script>";
}



 //VALIDER LA COMMANDE

else if (isset($_POST['ouival'])) {

 
 include('try.php');
 $max=$bdd->query("SELECT MAX(id_commande)as maximum from panier");
 $res=$max->fetch();
 $maxx=($res['maximum']+1);
 foreach ($_SESSION['produit'] as $_SESSION['ref'] => $nbr_produit) {
   
 
$req3=$bdd->prepare("INSERT INTO  panier (id_commande,ref_produit,nbr_produit)
  values(?,?,?)");
$req3->execute(array($maxx,$_SESSION['ref'],$nbr_produit));

$mod=$bdd->prepare("UPDATE produit SET quantite_produit=? where ref_produit=?");
$mod->execute(array($_SESSION['quantite'][$_SESSION['ref']],$_SESSION['ref']));
}
$nbr=array_sum($_SESSION['produit']);
 /*$list=implode(',',array_keys($_SESSION['produit']) ) ;*/
$req4=$bdd->prepare("INSERT INTO  commande (id_commande,login,date_commande,total_commande,trait_commande)
  values(?,?,now(),?,'non_traitée')");
$req4->execute(array($maxx,$_SESSION['login'],$_SESSION['prix']));

$_SESSION['produit']=array();
$_SESSION['prix']=0;
$_SESSION['commande']=$maxx;
header('location:facture.php');


//annuler la validation
}else if (isset($_POST['nonval'])) {
  echo '<script>alert("commande non validée")</script>';
}	
 



 ?>

 </head>
 <body>
 <div class="container header3  im3  "  >
    
      <nav class="navbar-default navbar    " >
       <div class="container-fluid " >
    
    

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-default navbar-fixed-top" >
    <div class="row ">
    <div class="col-xs-8">
      <ul class="nav navbar-nav">
       
        
        <li ><a href="apropos_client.php"class="a1"><span class="glyphicon glyphicon-certificate"></span> A PROPOS </a></li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle a1" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-book">
            
          </span> MON COMPTE <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="profile.php"> Mon profil</a></li>
            <li class="divider"></li>
            <li><a href="#"data-toggle="modal" data-target="#supprimer">Supprimer mon compte</a></li>
            <li class="divider"></li>
            <li><a href="messagerie_client.php">Messagerie</a></li>
            
            
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle a1" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-blackboard"></span> PRODUITS <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="informatique_client.php">Informatique</a></li>
            <li class="divider"></li>
            <li><a href="mobilier_client.php">Mobilier de bureau</a></li>
           
            
            
          </ul>
        </li>
        
       
        <li >
          <a href="panier.php" ><span class="glyphicon glyphicon-shopping-cart"></span> MON PANIER  </a>
          
        </li>
      </ul></div>
      <div class="col-xs-2">
      <div class="input-group pull-right recherchep">
      <span class="input-group-btn">
        <button class="btn btn-default recherches" type="button"><span class="glyphicon glyphicon-search"></span></button>
      </span>
      <input type="text" class="form-control recherches" placeholder="Search for...">
    </div><!-- /input-group -->
    </div> 
    <div class="col-xs-2"style="border-left:1px solid black;">

  <h4 style="color:red;margin-top:0px;margin-left:-10px;"><?php echo$_SESSION['nom'].' '.$_SESSION['prenom'];?></h4>
    <a href="deconnexion.php" style="color:black;"><button name="deconnexion"style="margin-top:-10px;">
  <span class="glyphicon glyphicon-off" > </span>  Deconnexion 
 </button> </a>

    </div> 













    </div> 
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
<div class="container header1 im1 ">
  <div class="text-right">
  
  </div>
 </div>
 <div class="container header2 im2 ">
 <div class="row">
 <div class="col-lg-12 text-center">
  <a href="#"data-toggle="modal" data-target="#image2"><img src="imgsite/logo.png"  ></a>
  </div>
  </div>
 </div>
 <div class="container header1 im1 ">
  <div class="text-right">
 
  </div>
 </div>
 
<div class="container"style="margin-top:30px;">
<div class="row">


<div class="col-xs-5">
    <div class="panel panel-danger  promotion">
  <!-- Default panel contents -->
  <div class="panel-heading text-center" ><h1 style="font-weight:bold;">Commander</h1></div>
  <div class="panel-body">
    <!-- Table -->
  <table class="table">
  
  
    <tr><td><h2><a href="informatique_client.php"class="lienpanel" ><span style="color:red;">1.</span>  Consulter les produits informatiques</a></td></tr>
    <tr><td><h2><a href="mobilier_client.php"class="lienpanel"><span style="color:red;">2.</span>  Consulter les produits bureautiques</a></td></tr>
   <tr><td><h2><a href="informatique_promo_client.php"class="lienpanel"><span style="color:red;">3.</span>  Consulter les produits promotions (informatiques)</a></td></tr>
    <tr><td><h2><a href="mobilier_promo_client.php"class="lienpanel"><span style="color:red;">4.</span>  Consulter les produits promotions (bureautiques)</a></td></tr>


  </table>
  </div>
  
</div>
  </div>

























<div class="col-xs-7">
<?php if (count($_SESSION['produit'])==0) {
  if (isset($_SESSION['facture'])) {
    echo("<div class=\"alert alert-danger text-center\"style='margin-top:50px;'><h1>vous avez effectué une commande</h1> </div>" );
  }else
   	echo("<div class=\"alert alert-danger text-center\"style='margin-top:50px;'><h1>Panier vide</h1> </div>" );
   }else{?>

<table   class="table table-striped table-bordered table-hover table-condensed">
	<thead>
		<tr class="danger">
			<td class="lead">Image</td>
			<td>Catégorie</td>
			<td>Prix unitaire</td>
			<td>Quantité </td>
			<td>prix total </td>
			<td>Supprimer</td>
		</tr>
	</thead>
	<tbody>

    <?php 
   
    foreach ($_SESSION['produit'] as $_SESSION['ref'] =>$quant ) {
	include('try.php');
  /*
query('SELECT categorie.*, classe.*, produit.*
FROM (classe INNER JOIN categorie ON classe.id_classe = categorie.id_classe) INNER JOIN produit ON categorie.id_categorie = produit.id_categorie
 WHERE nom_classe="informatique" AND promotion="oui"');
  */
	$req=$bdd->prepare("SELECT image,prix,nom_categorie,ref_produit FROM (classe INNER JOIN categorie ON classe.id_classe = categorie.id_classe) INNER JOIN produit ON categorie.id_categorie = produit.id_categorie
  where ref_produit=?");
	$req->execute(array($_SESSION['ref']));
    $res=$req->fetch();
 
	

    	
?>


	<tr class="warning">

			<td> <img  class="img img-thumbnail img-responsive im" src = "<?php echo $res['image']; ?>" style="height:120px;width:120px"/></td>
			<td><?php echo $res['nom_categorie'] ?></td>
			<td><?php echo number_format($res['prix']).' DA' ;?></td>
			<td><?php echo '<span class="badge">'.intval( $quant).'</span>';?></td>
			<td><?php echo number_format($quant*$res['prix'],2).' DA';?></td>
			<td><a href="ajout_panier.php?reff=<?php echo $res['ref_produit'] ; ?>"><button class="btn btn-danger"style="margin-top:30px;"><span class=" glyphicon glyphicon-trash"></span></button></a></td>
		</tr><?php 
        
   $_SESSION['categorie'][$_SESSION['ref']]=$res['nom_categorie'];

		} 

/*foreach ($_SESSION['produit'] as $key => $_SESSION['ref'] ) {
	$tab[]=count(array_keys($_SESSION['produit'],$_SESSION['ref']));*/


		?>


		</tbody>
		
</table>

<div class="well"><h2 style="color:red;"><?php 
/*$nbr = count(array_keys($_SESSION['produit'],'toto'));
echo $nbr;*/
echo 'Prix Total : '.number_format($_SESSION['prix'],2).'Da';?></h2></div>

</div>
<div class="text-center">
<form action="" method="post">
<div class="col-xs-3"><a class="btn btn-danger"data-toggle="modal" data-target="#supprimercommande">supprimer</br>ma commande</a></div>
<div class="col-xs-3"><a class="btn btn-danger"data-toggle="modal" data-target="#valider">Valider</br>ma commande</a></div>

</form>

</div>
</div>

</div>


 





   

<div class="modal fade" id="valider">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        <div class="alert alert-danger">VOULEZ VOUS VRAIMENT CONFIRMER VOTRE COMMANDE?</div>
        <form method="post" action="">
        <button class="btn btn-primary"name="ouival"style="margin-right:10px;" >OUI</button>
    <button class="btn btn-primary"name="nonval">NON</button></form>
      </div>
        
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal2 -->

<div class="modal fade" id="supprimercommande">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        <div class="alert alert-danger">VOULEZ VOUS VRAIMENT SUPPRIMER VOTRE COMMANDE?</div>
        <form method="post" action="">
        <button class="btn btn-primary"name="ouisupp"style="margin-right:10px;" >OUI</button>
    <button class="btn btn-primary"name="nonsupp">NON</button></form>
      </div>
        
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal2 -->


<?php }?>


 
<div class="modal fade" id="image2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-heart"></span> GLOBAL INFO LAGA</h4>
      </div>
      <div class="modal-body">
        <span style="color:red">GLOBAL INFO LAGA</span> est une entreprise dont le statuts juridique est SNC, fondée en 2014 par les frères LAGA pour mettre en pratique un savoir faire acquis pendant 15 ans d’expériences dans le domaine de l’informatique.
La vente d’équipements informatique, bureautiques, mobiliers de bureau est sa principale activité.
En marche de cette activité il s’occupe de l’installation d’équipements et logiciels de point de vente.

    
     
      
        <h3>Information supplémentaires</h3>
         <img src="imgsite/map.png" alt="map" style="whidth:200px;">
        <p>SNC GLOBAL INFO LAGA & CIE                                                                                                                                                                                                             Mobilier de bureaux, informatique et bureautique
RN 12 Tirsatine AZAZGA T.O, Tel: 026 34 48 35- Mob: 0770 805 043
Email: globalinfolaga@gmail.com   site web: www.globalinfolaga.net
Agence BDL freha N°005 00145 4002317960 55
N° RC: 15/00-0049354B14           N° Art: 15170040700           N° IF…: 001415004935443           N° IS…: 001315189033148
</p>
      </div>
        
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal2 -->
<div class="modal fade" id="supprimer">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="panel-body">
 <form class="form form-horizontal "autofocus method="post" action="interface_client.php">
 <div class="row">
  <div class="form-group ">
  <div class="col-xs-4">
    <label for="exampleInputName2 ">Nom d'utilisateur : </label></div>
    <div class="col-xs-4">
    <input type="text" class="form-control t" id="exampleInputName2" placeholder="Jane Doe" name="loginn" autofocus>
  </div></div></div>
  <div class="row">
  <div class="form-group ">
  <div class="col-xs-4">
    <label for="exampleInputEmail2">Mot de passe : </label></div>
    <div class="col-xs-4">
    <input type="password" class="form-control t" id="exampleInputEmail2" placeholder="jane.doe@example.com" name="pass1">
  </div></div></div>
  <h4 class="modal-title"><span class="glyphicon glyphicon-warning-sign"></span> ETES VOUS SURE DE VOULOIRE SUPPRIMER VOTRE COMPTE???</h4>
  <button type="submit" class="btn btn-default btn-danger envoyer bphp"  name="supprimer">supprimer</button>
        <button type="submit" class="btn btn-default btn-danger envoyer bphp"  name="annuler">annuler</button>
</form> 
</div>
      </div>
      <div class="modal-body">
      
      </div>
        
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal2 --> 
 <script type="text/javascript" src="doc/js/jquery-2.1.3.min.js"> </script> 
<script type="text/javascript" src="doc/js/bootstrap.js"></script>
 <script type="text/javascript" src="doc/js/monscript.js"></script>
 

 </body>
 </html>
 <?php
}else 
header('location:inscription.php');


 ?>
 