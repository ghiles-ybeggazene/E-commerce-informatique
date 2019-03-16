
<?php
session_start();

      
  

  

  


?> 


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title>mon profile</title>
  <link rel="stylesheet" type="text/css" href="doc/css/bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="messagerie.css">
 <link rel="stylesheet" type="text/css" href="laga1.css"/>
  <link rel="stylesheet" type="text/css" href="profile.css"/> 
  <link rel="stylesheet" type="text/css" href="panier.css"/>
 


</head>
<body >

           



<?php   
if (isset($_SESSION['nom'])&&isset($_SESSION['prenom'])&&!empty($_SESSION['nom'])&&!empty($_SESSION['prenom'])) {
  



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
            <li><a href="messagerie_client.php">Messagerie




            </a></li>
            
            
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle a1" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-blackboard"></span> PRODUITS <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="informatique_client.php">Informatique</a></li>
            <li class="divider"></li>
            <li><a href="mobilier.php">Mobilier de bureau</a></li>
            
            
            
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
<?php 
include('try.php');
           $vue=$bdd->prepare('SELECT contenu_message as mess
    FROM message where login_recepteur=? and etat_message="non_vue"' ); 
    $vue->execute(array($_SESSION['login']));
    $cpt=0;
    while($mess=$vue->fetch())
    {
      $cpt++;
    }
  
    echo '<div class="alert alert-danger text_center"style="margin-top:10px;"><h3> vous avez : ' . $cpt .'  nouveau(x)message(s)</h3></div>';?>





     <?php
     $admin="admin";

   include('try.php');
     $affiche=$bdd->prepare('SELECT * FROM message  WHERE(
      (login_emetteur=? AND login_recepteur=?)
      OR (login_emetteur=? AND login_recepteur=?))
      ORDER BY date_message ');?>
      <div class="container table-bordered ">
      <div class="row text-center">

     <?php
     $affiche->execute(array($_SESSION['login'], $admin, $admin,$_SESSION['login']));
     while ($rep=$affiche->fetch()){
      if ($rep['login_emetteur']==$_SESSION['login']AND $rep['login_recepteur']=$admin) {
    ?><div class="row pading">
      <div class="col-xs-2 col-xs-offset-1 alert alert-danger ">
     <span class="glyphicon glyphicon-user"></span><span style="color:red"class="place "><?php  echo $_SESSION['nom'].' '.$_SESSION['prenom'].'<br/> '.$rep['date_message'] ;?>"</span></p>
     </div><div class="col-xs-7 col-xs-offset-1 ">
    <div ><pre><?php  echo $rep['contenu_message'];?></div>
      </div></div>
<?php
}
else if ($rep['login_emetteur']==$admin AND $rep['login_recepteur']==$_SESSION['login']) {
if ($rep['etat_message']=="non_vue") {?>
<div class="row pading "><div class="col-xs-7 col-xs-offset-1 ">
    <div ><pre class="pre"><?php echo $rep['contenu_message'];?></div></div>
<div class="col-xs-2 col-xs-offset-1 well   ">
     <span class="place"><?php echo 'ADMIN</br>'.'<p style="color:red">'.$rep['date_message'].'</p>'; ?>

     </div>

     </div>
<?php }else{


  ?>
  <div class="row pading "><div class="col-xs-7 col-xs-offset-1 ">
    <div ><pre class="pre"><?php echo $rep['contenu_message'];?></div></div>
<div class="col-xs-2 col-xs-offset-1 well   ">
     <span class="place"><?php echo 'ADMIN</br> '.$rep['date_message'] ?></span></p>

     </div>

     </div>
    <?php }}
  
 }
 
 
 ?> 
</div>
  </div>


    
       <div class="container bouton">
       <div class="row">
           <form class="form" action="trait_message_client.php" method="post">
               <div class="input-group">
                    <textarea class="form-control"name="message" autofocus placeholder="votre message" ></textarea> 
                       <span class="input-group-btn"><a href="#lastsms"><button class="btn btn-primary env " type="submit" name="send">envoyer</button></a>
                       </span>
                </div>
            </form>
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
<?php
$vue=$bdd->prepare('UPDATE message SET etat_message="vue" where login_recepteur=?');
$vue->execute(array($_SESSION['login']));
        
if (isset($_SESSION['envoyer'])) {
  echo "<script>alert('vous avez envoyer un message')</script>";
  unset($_SESSION['envoyer']);
}




          ?>
 
 

 <script type="text/javascript" src="doc/js/jquery-2.1.3.min.js"> </script> 
 <script type="text/javascript" src="doc/js/bootstrap.js"></script>
 <script type="text/javascript" src="doc/js/monscript.js"></script>
 </body>
 </html>
 <?php 
}else
header('location:inscription.php');

 ?>
   




 






  











  










 



  







 











  
    

