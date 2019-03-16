<?php
session_start();

?>

<!DOCTYPE html >
<html >
<head>
<meta charset="utf-8"/>
<title>inscription</title>

<link rel="stylesheet" type="text/css" href="doc/css/bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="inscription.css"/>
 <link rel="stylesheet" type="text/css" href="laga1.css"/>



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
          <a href="#" class="dropdown-toggle "data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-blackboard"></span> PRODUITS <span class="caret"></span></a>
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

  <?php



 



 try {
  $tab[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION; 
  $bdd=new PDO('mysql:host=localhost;dbname=laga','root','',$tab);
} catch (Exception $e) {
  die('erreur'.$e->getMessage());
}

 if (isset($_POST['VALIDER'])) {
  	
  

if (
    isset($_POST['nomm']) && 
    isset($_POST['prenomm']) && 
    isset($_POST['maill']) && 
    isset($_POST['loginn']) && 
    isset($_POST['pass1']) && 
    isset($_POST['pass2']) && 
    isset($_POST['adressee']) && 
    isset($_POST['tell']) && 
    isset($_POST['agee']) &&
    isset($_POST['op']) &&
    !empty($_POST['op']) &&
    !empty($_POST['nomm']) &&
    !empty($_POST['prenomm']) && 
    !empty ($_POST['maill']) && 
    !empty($_POST['loginn']) && 
    !empty($_POST['pass1']) && 
    !empty($_POST['pass2']) && 
    !empty($_POST['adressee']) && 
    !empty($_POST['tell'])&&
    !empty($_POST['agee'])){
      $nom=htmlspecialchars($_POST['nomm']);
      $prenom=htmlspecialchars($_POST['prenomm']);
      $mail=htmlspecialchars($_POST['maill']);
      $login=htmlspecialchars($_POST['loginn']);
      $adresse=htmlspecialchars($_POST['adressee']);
      $password=htmlspecialchars($_POST['pass2']);
      $tel=htmlspecialchars($_POST['tell']);
      $age=htmlspecialchars($_POST['agee']);
      $sexe=htmlspecialchars($_POST['op']);

          $_SESSION['nom']=$nom;
          $_SESSION['prenom']=$prenom;
          $_SESSION['adresse']=$adresse;
          $_SESSION['naissance']=$age;
          $_SESSION['tel']=$tel;
          $_SESSION['email']=$mail;
          $_SESSION['inscrit']="oui";
          $_SESSION['login']=$login;
          $_SESSION['password']=$password;
  
 if (!preg_match('#([0-9].)+#', $nom)) {
  if (!preg_match('#([0-9].)+#', $prenom)) {
  if (   date('Y/m/d')-$_POST['agee']>18 ) {
    
    
  

  if (preg_match('#.{8,20}#', $_POST['loginn'])) 
  {
    if ($_POST['pass1']==$_POST['pass2']) 
    {
      
      $req = $bdd->prepare("SELECT (id) as doublons FROM client  WHERE  login=?");
      $req ->execute( array($login ));
      $row = $req->fetch();
      if (count($row['doublons'])==0)
      {   

          $_SESSION['password']=$_POST['pass2'];
        $req = $bdd->prepare("INSERT INTO client(nom,prenom,adresse,tel,login,password,email,date_naiss,sexe) 
          VALUES (?,?,?,?,?,?,?,?,?)");
        $req->execute(array($nom,$prenom,$adresse,$tel,$login,$password,$mail,$age,$sexe));


        header('Location:interface_client.php');
      }
      else{
       

include('ereur1.php');
 echo '<script>alert("inscription echouée");</script>';


        
      }   
    }
    else
    { 
         
    
include('ereur2.php');
 echo '<script>alert("inscription echouée");</script>';


    }

  }
  
  else{
  
include ('ereur3.php');
 echo '<script>alert("inscription echouée");</script>';}     
}else
{
include('ereur4.php');
 echo '<script>alert("inscription echouée");</script>';
}
}else{
include ('ereur5.php');
 echo '<script>alert("inscription echouée");</script>';   
}
}
else{
  include ('ereur6.php');
   echo '<script>alert("inscription echouée");</script>'; 
}
         
}else{
  
  include('formulaire.php');
   
}
}


else if (isset($_POST['connexion'])) {
    
  
  if (isset($_POST['loginn']) && 
    isset($_POST['pass1']) && 
    !empty($_POST['loginn']) && 
    !empty($_POST['pass1']))  {
    
    $password=htmlspecialchars($_POST['pass1']);
  $login=htmlspecialchars($_POST['loginn']);
  $req = $bdd->prepare("SELECT nom,prenom,login,password as connexion FROM client  WHERE  login=? AND password=?");
      $req->execute(array($login,$password));
      $row = $req->fetch();
      
      if (count($row['connexion'])==1) {
      $_SESSION['nom']=$row['nom'];
      $_SESSION['prenom']=$row['prenom'];
      $_SESSION['login']=$row['login'];
      $_SESSION['password']=$row['password']; 
    header('location:interface_client.php'); }
      else {
      echo" <script>alert('votre mot de passe ou votre login est incorrect')</script>";
      }
      }
  
  include('formulaire.php');

   }
else{
  
  include('formulaire.php');
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
Agence BDL freha N°005 00145 4002317960 55
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

 </body></html>