<?php  


session_start();

if (isset($_SESSION['nom'])&&isset($_SESSION['prenom'])&&!empty($_SESSION['nom'])&&!empty($_SESSION['prenom'])) {


?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>

<link rel="stylesheet" type="text/css" href="doc/css/bootstrap.css"/>
 <link rel="stylesheet" type="text/css" href="laga1.css"/>
  <link rel="stylesheet" type="text/css" href="panier.css"/>
  <title>a propos</title>
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

  <h4 style="color:red;margin-top:0px;margin-left:-10px;"><?php echo $_SESSION['nom'].' '.$_SESSION['prenom'];?></h4>
    <a href="deconnexion.php" style="color:black;"><button name="deconnexion"style="margin-top:-10px;">
  <span class="glyphicon glyphicon-off" > </span> Deconnexion 
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
  <p><img src="imgsite/logo.png"  ></p>
  </div>
  </div>
 </div>
 <div class="container header1 im1 ">
  <div class="text-right">
 
  </div>
 </div>
 <div class="container "style="margin-top:20px;">
 <div class="row">
 <div class="col-xs-7">
  <p> <span style="color:red">GLOBAL INFO LAGA</span> est une entreprise dont le statuts juridique est SNC, fondée en 2014 par les frères LAGA pour mettre en pratique un savoir faire acquis pendant 15 ans d’expériences dans le domaine de l’informatique.
La vente d’équipements informatique, bureautiques, mobiliers de bureau est sa principale activité.
En marche de cette activité il s’occupe de l’installation d’équipements et logiciels de point de vente.</p>

    
     
      
        
         
        </div>
<div class="col-xs-4 col-xs-offset-1 ">

<img src="imgsite/map.png" alt="map" style="whidth:200px;"class="ima"/>
<p>L’entreprise GLOBAL INFO LAGA se situe au boulevard Ahmed Zaidat dans la ville d’AZAZGA, wilaya de TIZI-OUZOU.</p></div>
     </div>
     <div class="row">
  <div class="col-xs-12">
    
<p>
<h1>Les partenaires de l’entreprise :</h1>
<p><span style="color:red">GLOBAL INFO LAGA </span>est en partenariat avec plusieurs grandes entreprises informatiques, parmi elles on trouve : KASPERSKY, AZUS, MSI, HP.</br>
Ce partenariat offre a l’entreprises des avantages par rapport a ses concurrents, en effet il lui permet d’avoir des produits certifiés à des prix avantageux, mais aussi  d’avoir des formations assurées par ses partenaires.
</p> 
    
  </div>

</div>

 <div class="row">
 <div class= "col-xs-6">
 <h1> Les types de produits :</h1>
<h2>On distingue 3 catégories de produits :</h2>
<h3>a.  Matériels informatiques : </h3>
<p>• Ordinateurs portables.</br>
• Ordinateurs de bureau.</br>
• Ordinateurs tout en un (all in one).</br>
• Accessoires (imprimantes, scanners…).</br>
• Périphériques (claviers, souris, support de stockage…).</p>

<h3>b.  Mobiliers de bureau :</h3>
<p>• Armoires.</br>
• Chaises.</br>
• Comptoirs.</p>

<h3>c.  Logiciels de point de vente.</h3>
</div>
<div class="col-xs-6">
 
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
</div>
 

</div>
</div>
<div class="row">
   <div class="col-xs-12">  
   <h1> CLAUSES DE GRANTIES :</h1>
   <p>
1.  La société garantie au client le matériel vendu contre tous défauts de fabrication et de main d’œuvre pendant une période limitée de 1 ans a partir de la date d’achat dont 10 mois pièces.</br>
2.  La garantie prend effet à la date d’achat.
3.  Les batteries micro portable et les claviers, manettes de jeu ,les souris ,les baffles, flash Discs, l’alimentation du boitier et consommable sont garanties de démarrage.</br>
4.  La garantie pour le matériel acheté en kit est de 3mois.</br>
5.  L’installation software n’est pas garantie.</br>
6.  L’incapacité de lecture de lecteur cd-rom des graves n’est pas une affirmation que le lecteur est défectueux.</br>
7.  La société ne garantie pas que ce matériel fonctionnera de manière interrompue ou sans erreur de son matériel.</br>
8.  La société ne garantie que les défauts découlant d’un usage normal du matériel, par conséquent cette garantie ne couvre pas les cas suivants :                                                                                                  
-Un mauvais entretien.</br>
-Une modification ou utilisation non autorisée.</br>
-Utilisation de la carte d’extension non approuvée.</br>
-Une défectuosité d’un distributeur de normes de tentions non équipées d’un protecteur de surtension et surintensité.</br>
-Une utilisation en dehors des normes ou abusives.</br>
-Ouverture de matériel.</br>
-Mauvaise conditions de transport.</br>
-Des pistes défectueuses apparues sur u disque dur ne sont pas garanties.</br>
   9. En cas de défectuosité du matériel le client doit ramener à la société durant la période de la garantie.</br>
 10. Le matériel défectueux sous garantie doit être remis à nos magasins dans son emballage d’origine, les disquettes ou cd-rom des pilotes, câble de connexion et d’alimentation.</br>
11. L’application de la garantie doit se faire dans nos ateliers.
12. L’application de la garantie n’est garantie que si le  fournisseur accorde(l’application de la garantie sur le matériel défectueux en question).</br>
13. Les laptops sont garanties au démarrage(clavier, souris ,baffles, batteries, chargeur+software ).
14. Si la société n’est en mesure de réparer le matériel défectueux pour des raisons quelconque dans un délais de 1 moi.</br>
  La société s’engage à prêter au client un matériel qui présente les mêmes qualités et fonctionnalités du matériel défectueux le temps nécessaire pour le réparer auprès du fournisseur.</br>
Il est conseillé d’effectuer régulièrement des copies de sauvegarde de données stockées sur votre disc dur ou d’autres supports de stockage en guise de précaution contre des éventuelles pannes altération et perte de données avant de renvoyer un quelconque produit pour réparation.</br>
Ce certificat doit impérativement être présenté au service après-vente l’ors d’un retour de matériel.



  


    </p>

  </div>

</div>
        
      </div> 
<div class="container footer">
 <div class="row alert alert-danger" style="height:150px;">
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
header('location:inscription.php');?>
