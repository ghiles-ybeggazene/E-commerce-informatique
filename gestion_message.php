
<?php
session_start();


  


?> 


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title>gestion message</title>
  <link rel="stylesheet" type="text/css" href="doc/css/bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="messagerie.css">
 <link rel="stylesheet" type="text/css" href="laga1.css"/>
   
  <link rel="stylesheet" type="text/css" href="panier.css"/>
 


</head>
<body  >
<?php include('barre_menu_admin.php');?>
<table class="table table-striped table-bordered table-hover table-condensed">
<thead>
  
  <tr>
   <th>INFO_CLIENT</th>
    <th>message non_vues </th>
   <th>MESSAGES_ECHANGES</th> 

  </tr>
</thead>
<tbody>
<?php 
include('try.php');
$req=$bdd->query('SELECT* FROM client' );
while ($res=$req->fetch()) {?>
<tr>
  <td><?php echo '<div class="alert alert-danger">'.'nom : '.$res['nom'].' <br/>'.'prenom :'.$res['prenom'].' <br/>'.'adresse : '.$res['adresse'].' <br/>'.'login : '.$res['login'].'</div>' ;?></td>
  <td><?php $vue=$bdd->prepare('SELECT contenu_message as mess
    FROM message where login_emetteur=? and etat_message="non_vue"' ); 
    $vue->execute(array($res['login']));
    $cpt=0;
    while($mess=$vue->fetch())
    {
      $cpt++;
    }
  
    echo '<div class="badge">'.$cpt.'</div>';?></td>
  
  <td><a class="btn btn-danger"href="message_interne_admin.php?login=<?php echo $res['login']; ?>">voir<br/>messagerie</a> </td>
</tr>
<?php } ?>
 </tbody>
</table>



<script type="text/javascript" src="doc/js/monscript.js"></script>
 <script type="text/javascript" src="doc/js/jquery-2.1.3.min.js"> </script> 
<script type="text/javascript" src="doc/js/bootstrap.js"></script>
</body>
</html>