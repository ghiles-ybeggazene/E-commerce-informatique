<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
<title>LAGA</title>



<link rel="stylesheet" type="text/css" href="doc/css/bootstrap.css"/>
 <link rel="stylesheet" type="text/css" href="laga1.css"/>
  <link rel="stylesheet" type="text/css" href="interface_client.css"/>
   <link rel="stylesheet" type="text/css" href="panier.css">
<?php //include('inclusion1.php');
 ?>

 </head>
 <body>
 <div class="container header3  im3  "  >
    
      <nav class="navbar-default navbar    "  >
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
 <div class="fond">
<div class="container content ">
  <div class="row">
   
     
    <div class="col-xs-3">
    <div class="panel panel-default  promotion">
  <!-- Default panel contents -->
  <div class="panel-heading "><h1 style="font-weight:bold;">PROMOTION</h1></div>
  <div class="panel-body">
    <!-- Table -->
  <table class="table">
  <?php 
  include('try.php');
  $reqi = $bdd -> query('SELECT categorie.*, classe.*, produit.*
FROM (classe INNER JOIN categorie ON classe.id_classe = categorie.id_classe) INNER JOIN produit ON categorie.id_categorie = produit.id_categorie
 WHERE nom_classe="informatique" AND promotion="oui"');

   $nbi =0;
   while ($rowi = $reqi->fetch()) {

     $nbi = $nbi+$rowi['quantite_produit'];
     
   }
   $reqm = $bdd->query('SELECT categorie.*, classe.*, produit.*
FROM (classe INNER JOIN categorie ON classe.id_classe = categorie.id_classe) INNER JOIN produit ON categorie.id_categorie = produit.id_categorie
 WHERE nom_classe="mobilier" AND promotion="oui"');
   $nbm =0;
   while ($rowm = $reqm->fetch()) {

     $nbm = $nbm+$rowm['quantite_produit'];
     
   }
   
   
  ?>
    <tr><td><h2><a href="informatique_promo_main.php"class="lienpanel">Informatique</a></h2><span class="badge pull-right" ><?php echo $nbi; ?></span></td></tr>
    <tr><td><h2><a href="mobilier_promo_main.php"class="lienpanel">Bureautique</a></h2><span class="badge pull-right"><?php echo $nbm; ?></span></td></tr>
  </table>
  </div>
  <div class="panel-footer">
<h1 style="color:red;">Profitez en!!!<h1>
  </div>
</div>
  </div>
   <div class="col-xs-9 ">
   <div id="carousel-example-generic" class="carousel slide defile" data-ride="carousel" >
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="imgsite/01.jpg"  alt="" class=" img img-thumbnail img-responsive ">
      <div class="carousel-caption">
        
      </div>
    </div>
    <div class="item ">
      <img src="imgsite/02.jpg" alt=""class=" img img-thumbnail img-responsive " >
      <div class="carousel-caption">
        ......
      </div>
    </div>
    <div class="item ">
      <img src="imgsite/03.jpg" alt=""class=" img img-thumbnail img-responsive " >
      <div class="carousel-caption">
        ......
      </div>
    </div>
    <div class="item ">
      <img src="imgsite/04.jpg" alt=""class=" img img-thumbnail img-responsive " >
      <div class="carousel-caption">
        ......
      </div>
    </div>
    <div class="item ">
      <img src="imgsite/05.jpg" alt=""class=" img img-thumbnail img-responsive " >
      <div class="carousel-caption">
        ......
      </div>
    </div>
    <div class="item ">
      <img src="imgsite/06.jpg" alt=""class=" img img-thumbnail img-responsive " >
      <div class="carousel-caption">
        ......
      </div>
    </div>
    <div class="item ">
      <img src="imgsite/07.jpg" alt=""class=" img img-thumbnail img-responsive " >
      <div class="carousel-caption">
        ......
      </div>
    </div>
    <div class="item ">
      <img src="imgsite/08.jpg" alt=""class=" img img-thumbnail img-responsive " >
      <div class="carousel-caption">
        ......
      </div>
    </div>
    <div class="item ">
      <img src="imgsite/09.jpg" alt=""class=" img img-thumbnail img-responsive " >
      <div class="carousel-caption">
        ......
      </div>
    </div>
    <div class="item ">
      <img src="imgsite/10.jpg" alt=""class=" img img-thumbnail img-responsive " >
      <div class="carousel-caption">
        ......
      </div>
    </div>
    
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span >Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span >Next</span>
  </a>
</div></div>
</div>
  
</div>


<div class="container footer">
 <div class="row well" style="height:150px;">
  <div class="col-xs-4">
 
  <a href=""><img src="imgsite/f.jpg"style="padding-top:20px;"></a>
  <a href=""><img src="imgsite/t.jpg"style="padding-top:20px;"></a>
  <a href=""><img src="imgsite/s.jpg"style="padding-top:20px;"></a>
   </div> 
<div class="col-xs-4"><h5 style="fontweight:bold;">SNC GLOBAL INFO LAGA & CIE Mobilier de bureaux, 
informatique et bureautique RN 12 Tirsatine AZAZGA T.O,
 Tel: 026 34 48 35- Mob: 0770 805 043 Email: globalinfolaga@gmail.com 
  Agence BDL freha N°005 00145 4002317960 55 
 N° RC: 15/00-0049354B14 N° Art: 15170040700 N° IF…: 001415004935443 
 N° IS…: 001315189033148</h5></div> 
<div class="col-xs-2 col-xs-offset-2">
  
  <a href="#top" style="color:red;fontweight:bold"><h4 style="margin-top: 35px;
  margin-bottom: 0;">Revenir en haut</h4></a>
</div>

   

 </div>


</div>

 
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
  <script type="text/javascript" src="doc/js/monscript.js"></script>
  <script type="text/javascript" src="doc/js/bootstrap.js"></script>
<?php //include('inclusion1.php');?>
  
 
 </html>