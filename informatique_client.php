
<?php

session_start();
if (isset($_SESSION['alert1'])) {
  echo"<script>alert('la quantité du produit est epuisée ou bien vous avez saisi une quantité non existante')</script>";
  unset($_SESSION['alert1']);
}


//$_SESSION['produit'][]=$_SESSION['ref'];
if (!isset($_SESSION['quantite'])) {
include('try.php');
$req=$bdd->query("SELECT * FROM produit ");
while ( $res=$req->fetch()) {
 $_SESSION['quantite'][$res['ref_produit']]=$res['quantite_produit'];

}

  
}
?>





<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <title>informatique</title>
  <link rel="stylesheet" type="text/css" href="doc/css/bootstrap.css"/>
   <link rel="stylesheet" type="text/css" href="panier.css">
 <link rel="stylesheet" type="text/css" href="laga1.css"/>
  <link rel="stylesheet" type="text/css" href="profile.css"/>
 
</head>

<body>
<?php
if (isset($_SESSION['nom'])&&isset($_SESSION['prenom'])&&!empty($_SESSION['nom'])&&!empty($_SESSION['prenom'])) {?>
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
    <a href="deconnexion.php" style="color:black;"> <button name="deconnexion"style="margin-top:-10px;">
  <span class="glyphicon glyphicon-off" > </span>  Deconnexion 
 </button> </a> 

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
 



 

 
  

<div class="container "style="margin-top:20px;">
  <?php

include('try.php');

$req=$bdd->query('SELECT categorie.*, classe.*, produit.*
FROM (classe INNER JOIN categorie ON classe.id_classe = categorie.id_classe) 
INNER JOIN produit ON categorie.id_categorie = produit.id_categorie
 WHERE nom_classe="informatique" AND promotion="non" ORDER BY nom_categorie');

while($donnee = $req -> fetch())
{
   
   $ref=$donnee['ref_produit'];
    

    
    ?>
  <div class="col-xs-4 " >
    <div class="thumbnail"style="height:520px;">
      <img  class="img img-thumbnail im" src = "<?php echo $donnee['image']; ?>" style="height:100px;"/>
      <div class="caption">
        <h2 style="color:red;">Informations</h2>
      <p><?php 
    echo '<pre><h4 >'.$donnee['information'].'</h4></pre>';
    
    echo  '<h4>quantité restante :<span class="badge">'.$_SESSION['quantite'][$donnee['ref_produit']].'</span></h4>';
    echo '<h2 style="font-weight:bold;">Prix:'. number_format( $donnee['prix'],'2').' DA</h2> </br>';
   $ref=$donnee['ref_produit'];
    ?>
    </p>
        <p class="text-center">
    
        <form method="POST"   action="ajout_panier.php?ref=<?php echo $ref; ?>&amp;id=1;">
       <div class="col-xs-10">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-5 control-label">quantité : </label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="inputEmail3"  name="qtt" required patern="[1-9]">
    </div>
  </div></div>
  
  <input type="submit" class="btn btn-default btn-danger envoyer bphp" value="ajouter au panier" name="com" ></input> 
        </form> 
       
        </p>
      </div>
    </div>
  </div>

  <?php
  //$_SESSION['ref']=$ref;

}?>

</div>

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
    







 
 <script type="text/javascript" src="doc/js/jquery-2.1.3.min.js"> </script> 
 <script type="text/javascript" src="doc/js/monscript.js"></script>
 <script type="text/javascript" src="doc/js/bootstrap.js"></script>
</body>
  </html>
<?php } else
  header('location:inscription.php');
  ?>

