<?php
session_start();
?>
<!DOCTYPE html>
<html >
<head>
<meta charset="utf-8"/>
<title>laga</title>

<link rel="stylesheet" type="text/css" href="doc/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="laga1.css"/>

</head>
<body>
	
<style type="text/css">
  .c{color:red;}
</style>

<div class=" container page " >
<div class="row ">
<div class ="col-xs-12">


<div class="panel panel-default ">
  <div class="panel-heading"> 
  <h1  class="text-center titre" style="font-weight:bold;color:red ">
  authentification</h1>
  </div>
  <div class="panel-body"style="background-color:black;">
 <form class="form-inline text-center"autofocus method="post" action="admin.php">
  <div class="form-group ">
    <label class="c" for="exampleInputName2 ">Nom d'utilisateur : </label>
    <input type="text" class="form-control t" id="exampleInputName2" placeholder="votre nom d'utilisateur" name="log" required>
  </div>
  <div class="form-group ">
    <label class="c" for="exampleInputEmail2">Mot de passe : </label>
    <input type="password" class="form-control t" id="exampleInputEmail2" placeholder="votre mot de passe"name="pass1"required>
  </div>
  <button type="submit" class="btn btn-danger"name="connexion">Connexion</button>
</form> 
</div></div></div></div>

  <script type="text/javascript" src="doc/js/jquery-2.1.3.min.js"> </script>  
	<script type="text/javascript" src="doc/js/monscript.js"></script>
	<script type="text/javascript" src="doc/js/bootstrap.js"></script>


<?php

if(isset($_SESSION['erreur_mdp_incorrect']))
{
  echo("<script>alert('votre mot de passe ou votre login est incorrect!!!');</script>");
  unset($_SESSION['erreur_mdp_incorrect']);
}
if (isset($_SESSION['erreur_mdp_remplir_tous_champs'])) 
{
  echo" <script>alert('il faut remplir tous les champs !!!')</script>";
  unset($_SESSION['erreur_mdp_remplir_tous_champs']);
}
    

?>
</body>
</html>