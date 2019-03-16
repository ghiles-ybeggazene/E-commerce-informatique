<?php
session_start();

if (isset($_POST['connexion'])) 
{
    
	if (isset($_POST['log']) && isset($_POST['pass1']) && !empty($_POST['log']) && !empty($_POST['pass1']))  
	{
	    $password=strip_tags($_POST['pass1']);
	    $login=strip_tags($_POST['log']);
	    include('try.php');
	    $a = $bdd -> prepare('SELECT * FROM administrateur where password_admin=? and login_admin =?');
	    $a -> execute(array($password, $login));
	    if ($d= $a-> fetch()) 
	    {
	    	$_SESSION['login'] = 'GIL_INFORMATIQUE';	
		  	$_SESSION['loginn'] = $login;
		  	include('barre_menu_admin.php');
		  	?>
		  	<title>WEBMASTER</title>
		  	<?php
		  	
	  	}
      	else 
      	{
      		$_SESSION['erreur_mdp_incorrect']='';
      		header("location:webmaster.php");
      	}

	}
	else
	{
		$_SESSION['erreur_mdp_remplir_tous_champs']='';
		
		header("location:webmaster.php");
	}	
}
else
{
	header("location:webmaster.php");
}

?>
<body>

<div class="container">
<div class="row text-center" style="margin-top:40px;">
<p><img src="an22.gif" class="img img-circle"></p>

<br/><br/><br/><br/><br/>
<?php
$r = $bdd -> prepare('SELECT * FROM commande WHERE trait_commande = ?');
$r -> execute(array("non_traité"));
$cpt=0;
while($d = $r -> fetch())
$cpt++;
if($cpt!=0)
{
?>
<a href="gestion_commande.php" style="color:red;"><h2>vous avez <span class="badge" style="font-size:22px;"><?php echo $cpt; ?></span> commandes non traitées</h2></a>
<?php
}
else
{
?>
	<h2>vous n'avez pas de nouvelles commandes</h2>
<?php
}

?>


<br/><br/>

<?php
$r1 = $bdd -> prepare('SELECT * FROM message WHERE etat_message = ? and login_recepteur=?');
$r1 -> execute(array("non_vue","admin"));
$cpt1=0;
while($d1 = $r1 -> fetch())
$cpt1++;
if($cpt1!=0)
{
?>
<a href="gestion_message.php" style="color:red;"><h2>vous avez <span class="badge" style="font-size:22px;"><?php echo $cpt1; ?></span> messages non traitées</h2></a>
<?php
}
else
{
?>
	<h2>vous n'avez pas de nouveaux messages</h2>
<?php
}

?>
</div>
</div>





</body>