<?php
session_start();




?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title>messagerie</title>
  <link rel="stylesheet" type="text/css" href="doc/css/bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="messagerie.css">
 <link rel="stylesheet" type="text/css" href="laga1.css"/>
  <link rel="stylesheet" type="text/css" href="profile.css"/> 
  <link rel="stylesheet" type="text/css" href="panier.css"/>
 


</head>
<body style="background-color:black;">
<?php
include('barre_menu_admin.php');



        

	include('try.php');
$requette=$bdd->prepare('SELECT * FROM client WHERE login=?');
$requette->execute(array($_SESSION['loginn']));
$info=$requette->fetch();
	

	?>

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
     $affiche->execute(array($_SESSION['loginn'], $admin, $admin,$_SESSION['loginn']));
     while ($rep=$affiche->fetch()){
      if ($rep['login_emetteur']==$_SESSION['loginn']AND $rep['login_recepteur']=$admin) {
    ?><div class="row pading">
      <div class="col-xs-2 col-xs-offset-1 alert alert-danger ">
     <span class="glyphicon glyphicon-user"></span><span style="color:red"class="place ">
     <?php  echo $info['nom'].' '.$info['prenom'].'<br/> '.$rep['date_message'] ;?>"</span></p>
     </div><div class="col-xs-7 col-xs-offset-1 ">
    <div ><pre><?php  echo $rep['contenu_message'];?></div>
      </div></div>
<?php
}
else if ($rep['login_emetteur']==$admin AND $rep['login_recepteur']==$_SESSION['loginn']) {?>
  <div class="row pading "><div class="col-xs-7 col-xs-offset-1 ">
    <div ><pre class="pre"><?php echo $rep['contenu_message'];?></div></div>
<div class="col-xs-2 col-xs-offset-1 alert alert-warning   ">
     <span class="place"><?php echo 'admin <br/>'.$rep['date_message'] ;?></span></p>

     </div>

     </div>
    <?php }
  
 }
 
 
 ?> 
</div>
  </div>


    
       <div class="container bouton">
       <div class="row">
           <form class="form" action="message_interne_admin.php" method="post">
               <div class="input-group">
                    <textarea class="form-control"name="message" autofocus placeholder="votre message" ></textarea> 
                       <span class="input-group-btn"><a href="#lastsms">
                       <button class="btn btn-primary env " type="submit" name="send">envoyer</button></a>
                       </span>
                </div>
            </form>
            </div> 
        </div>
        </pre></div>
        <?php
$vue=$bdd->prepare('UPDATE message SET etat_message="vue" where login_emetteur=?');
$vue->execute(array($_SESSION['loginn']));
  if (isset($_SESSION['env'])) {
        	echo '<script> alert("vous avez envoyer un message");</script>';
        	unset($_SESSION['env']);
        }      





          ?>

       <script type="text/javascript" src="doc/js/monscript.js"></script>
 <script type="text/javascript" src="doc/js/jquery-2.1.3.min.js"> </script> 
<script type="text/javascript" src="doc/js/bootstrap.js"></script>
 <script type="text/javascript" src="doc/js/monscript.js"></script>

        </body>
        </html>
        
	

