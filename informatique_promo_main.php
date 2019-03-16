<!DOCTYPE html >
<html 0672335671>
<head>
<meta charset="utf-8"/>
<title>informatique promotion</title>

<link rel="stylesheet" type="text/css" href="doc/css/bootstrap.css"/>
 <link rel="stylesheet" type="text/css" href="laga1.css"/>
 <link rel="stylesheet" type="text/css" href="profile.css"/>
<?php //include('inclusion1.php');
 ?>

 </head>
 <body>
 <div class="container header3  im3  "  >
    
      <nav class="navbar-default navbar    " >
       <div class="container-fluid " >
    
    

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-default navbar-fixed-top" >
    <div class="row ">
    <div class="col-xs-9">
      <ul class="nav navbar-nav    ">
        <li ><a href="index.php" class=" a1"><span class="glyphicon glyphicon-home"></span> ACCUEIL </a></li>
        
        <li ><a href="apropos_main.php"class="a1"><span class="glyphicon glyphicon-certificate"></span> A PROPOS </a></li>
          <li ><a href="inscription.php"class="a1"><span class="glyphicon glyphicon-star"></span> CONNEXION </a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-blackboard"></span> PRODUITS <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="informatique_main.php">Informatique</a></li>
            <li class="divider"></li>
            <li><a href="mobilier_main.php">Mobilier de bureau</a></li>
            
            
          </ul>
        </li>
        
       
        
      </ul></div>
      <div class="col-xs-3">
      <div class="input-group pull-right recherchep">
      <span class="input-group-btn">
        <button class="btn btn-default recherches" type="button"><span class="glyphicon glyphicon-search"></span></button>
      </span>
      <input type="text" class="form-control recherches" placeholder="Search for...">
    </div><!-- /input-group -->
    </div>  
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
 <div class="container header1 im1 "id="top">
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

$req = $bdd -> query('SELECT categorie.*, classe.*, produit.*
FROM (classe INNER JOIN categorie ON classe.id_classe = categorie.id_classe) INNER JOIN produit ON categorie.id_categorie = produit.id_categorie
 WHERE nom_classe="informatique" AND promotion="oui" ORDER BY nom_categorie');

while($donnee = $req -> fetch())
{
  
  
    
    
    ?>
  <div class="col-xs-4 " >
    <div class="thumbnail"style="height:700px;">
      <img  class="img img-thumbnail im" src = "<?php echo $donnee['image']; ?>" />
      <div class="caption">
       
      <p><?php 
    
    echo '<h3 style="font-weight:bold;">  Prix:<span style="color:red;">'. number_format( $donnee['prix'],'2').' DA </br></span> </h3> ';
   
   
    
    

    ?>
     </p>
       
      </div>
    </div>
  </div>
  <?php
  

}?> </div>
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
    

  
</body>

 <script type="text/javascript" src="doc/js/jquery-2.1.3.min.js"> </script> 
<script type="text/javascript" src="doc/js/bootstrap.js"></script>
 <script type="text/javascript" src="doc/js/monscript.js"></script></body>
 </html>