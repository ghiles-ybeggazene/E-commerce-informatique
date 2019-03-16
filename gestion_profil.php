<?php 
session_start();
?><meta charset='utf-8'>
<?php
if (isset($_SESSION['login'])) 
{
	if ($_SESSION['login']=='GIL_INFORMATIQUE') 
	{
		include('try.php');
		include('barre_menu_admin.php');
		?>


<?php

if (isset($_POST['btn_modif'])) 
{
	if (
		isset($_POST['login']) && !empty($_POST['login'])&&
		isset($_POST['password']) && !empty($_POST['password']) &&
		isset($_POST['new_password']) && !empty($_POST['new_password'])
		) 
	{
		$login = strip_tags($_POST['login']); 
		$password = strip_tags($_POST['password']); 
		$new_password = strip_tags($_POST['new_password']);

		$b =$bdd -> prepare('SELECT * FROM administrateur WHERE password_admin =?');
		$b -> execute(array($password));
		$bb = $b -> fetch();
		if ($password == $bb['password_admin']) 
		{

			$bbb =$bdd -> prepare('SELECT * FROM administrateur WHERE login_admin =?');
			$bbb -> execute(array($login));
			$c = $bbb -> fetch();
			if (!$c) 
			{
				$ss = $bdd -> prepare('UPDATE administrateur SET login_admin=?,password_admin=?');
				$ss -> execute(array($login,$new_password));
				$_SESSION['loginn'] = $login;
				echo "<script>setTimeout(function(){alert('modification reussite');},50)</script>";
			}
			else
			{
				echo "<script>setTimeout(function(){alert('ce login existe déja');},50)</script>";
			}
		}
		else
		{
			echo "<script>setTimeout(function(){alert('erreur lors de verification du mot de passe');},50)</script>";
		}
	} 
	else
	{
		echo "<script>setTimeout(function(){alert('veuillez renseignez tous les champs');},50)</script>";
	}
}

?>
<style type="text/css">
.t{
	color:red;
}
</style>
<div class="panel panel-default ">
	<div class="panel-heading"> 
		<h1  class="text-center titre" style="font-weight:bold;color:red ">
			MES DONNEES
		</h1>
	</div>
	<?php
	$d = $bdd -> prepare('SELECT * FROM administrateur WHERE login_admin=?');
	$d -> execute(array($_SESSION['loginn']));
	$dd = $d-> fetch();
	?>
	<div class="panel-body"style="background-color:black">
		<div class="col-xs-12">
			<div class="row">
				<div class="col-xs-offset-3 col-xs-3">
					<h4 style="color:red; fontweight:bold;">
						MON LOGIN :  
						<span style="color:white;">
							<?php  echo $dd['login_admin'];?>
						</span> 
					</h4>
				</div>
			
				<div class="col-xs-3">
					<h4 style="color:red; fontweight:bold;">
						MON PASSWORD :  
						<span style="color:white;">
							<?php  echo $dd['password_admin'];?>
						</span> 
					</h4>
				</div>
			</div>
		</div>
	</div>
</div>
<br><br><br>
<div class="panel panel-default ">
	<div class="panel-heading"> 
		<h1  class="text-center titre" style="font-weight:bold;color:red ">
			MODIFIER MES DONNEES
		</h1>
	</div>
	<div class="panel-body t"style="background-color:black;">
		<form class="form-horizontal text-center"autofocus method="post" action="gestion_profil.php">
			<div class="col-xs-12">
				<div class="form-group">
					<label for="login" class="col-xs-5 control-label">
						MON LOGIN : 
					</label>

					<div class="col-xs-4">
						<input class="form-control" type="text" name="login" id="login" placeholder="votre login">
					</div>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="form-group">
					<label for="quantite" class="col-xs-5 control-label">
						MON PASSWORD : 
					</label>

					<div class="col-xs-4">
						<input class="form-control" type="text" name="password" id="password" placeholder="votre mot de passe">
					</div>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="form-group">
					<label for="quantite" class="col-xs-5 control-label">
						MON NOUVEAU PASSWORD : 
					</label>

					<div class="col-xs-4">
						<input class="form-control" type="text" name="new_password" id="new_password" placeholder="votre nouveau password">
					</div>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="col-xs-offset-4 col-xs-5">
					<button id="form_valid" class="btn btn-primary btn_default" name="btn_modif" id="btn_modif">
						MODIFIER
					</button>
				</div>
			</div>
		</form> 
	</div>
</div>





<?php
}
else
{
	header('location:webmaster.php');
}
	}
	else
	{
		header('location:webmaster.php');
	}


?>