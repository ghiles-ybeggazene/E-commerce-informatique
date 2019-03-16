<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title>bienvenue</title>
  <link rel="stylesheet" type="text/css" href="doc/css/bootstrap.css"/>
 <link rel="stylesheet" type="text/css" href="laga1.css"/>
  <link rel="stylesheet" type="text/css" href="profile.css"/>
   <link rel="stylesheet" type="text/css" href="interface_client.css"/>
</head>
<body>


<?php
if (isset($_SESSION['nom'])&&isset($_SESSION['prenom'])&&!empty($_SESSION['nom'])&&!empty($_SESSION['prenom'])) {

if (isset($_POST['supprimer'] )) 
{
  

  if (isset($_POST['loginn']) && isset($_POST['pass1'] )&&!empty($_POST['loginn'])  && !empty($_POST['pass1']) )
  {       include('try.php');
      $req1 = $bdd->prepare("SELECT login, password FROM client WHERE login=?");
        $req1->execute(array($_POST['loginn']));
        $result = $req1 -> fetch();
    if($result['login'] == $_POST['loginn']&& $result['password'] == $_POST['pass1'])
    {
      include('try.php');
      $req = $bdd->prepare("DELETE FROM client WHERE login=?");
        $req->execute(array($_POST['loginn']));
        
        header('location:index.php');
          session_destroy();  
    }
    else
    {
      
      echo"<script>alert('ereur dans votre login ou mot de passe')</script>";
    }
  }
  else
  {
    
    header('location:interface_client.php');
  }
} 
  if (isset($_POST['annuler'] )) 
  {
    
    echo "<script>alert('suppression annulée')</script>";
    
  }

  ?>






















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
<div class="container">
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
  $reqi = $bdd->query('SELECT categorie.*, classe.*, produit.*
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
    <tr><td><h2><a href="informatique_promo_client.php"class="lienpanel">Informatique</a></h2><span class="badge pull-right" ><?php echo $nbi; ?></span></td></tr>
    <tr><td><h2><a href="mobilier_promo_client.php"class="lienpanel">Bureautique</a></h2><span class="badge pull-right"><?php echo $nbm; ?></span></td></tr>
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
      <img src="client/slide1.jpg"  alt="" class=" img img-thumbnail img-responsive "style="width:860px;height:600px;">
      <div class="carousel-caption">
        
      </div>
    </div>
    <div class="item ">
      <img src="client/slide2.jpg" alt=""class=" img img-thumbnail img-responsive "style="width:860px;height:600px;" >
      <div class="carousel-caption">
        ......
      </div>
    </div>
    <div class="item ">
      <img src="client/slide3.jpg" alt=""class=" img img-thumbnail img-responsive "style="width:860px;height:600px;" >
      <div class="carousel-caption">
        ......
      </div>
    </div>
    <div class="item ">
      <img src="client/slide4.jpg" alt=""class=" img img-thumbnail img-responsive "style="width:860px;height:600px;" >
      <div class="carousel-caption">
        ......
      </div>
    </div>
   
   <div class="item ">
      <img src="client/slide5.jpg" alt=""class=" img img-thumbnail img-responsive "style="width:860px;height:600px;" >
      <div class="carousel-caption">
        ......
      </div>
    </div>
    <div class="item ">
      <img src="client/slide6.jpg" alt=""class=" img img-thumbnail img-responsive "style="width:860px;height:600px;" >
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
  </div></div>

   


















   <?php 
if (isset($_SESSION['inscrit'])) {
  echo '<script>alert("inscription reussite")</script>';
  unset($_SESSION['inscrit']);
}

 ?>
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
Agence BDL freha N°005 00145 6002317960 55
N° RC: 15/00-0049354B14           N° Art: 15170040700           N° IF…: 001415004935443           N° IS…: 001315189033148
</p>
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
header('location:inscription.php');?>
