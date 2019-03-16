<?php
session_start();
if($_SESSION['login'] == 'GIL_INFORMATIQUE')
{
	include('barre_menu_admin.php');
	include('try.php');
	$req = $bdd -> prepare('SELECT * FROM commande WHERE trait_commande = ?');
	$req -> execute(array("non_traité"));
	$req2 = $bdd -> prepare('SELECT * FROM commande WHERE trait_commande = ?');
	$req2 -> execute(array("traité"));
?>
<style>
	.calque{
		background: rgba(0, 0, 0, 0.65);
		position: fixed;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		z-index: 5000;
	}
	.ta9{
		position:relative;
		width:600px;
		min-height:100px;
		background:#fff;
		box-shadow:0 0 5px #000;
		margin:auto;
		margin-top:50px;
		padding:5px;
	}
	.x{
		position:absolute;
		right:9px;
		top:6px;	
	}
	.Titre{
		padding-bottom:10px;
		border-bottom:1px solid #666;
		text-align: center;
	}
	.action2{
		text-align:center;
		  margin-top: 50px;
	}
	.c{
		color:red;
	}
	</style>
<title>GESTION COMMANDE</title>
<body>



<div class="row  text-center " style="margin-top:60px"> 
	<div class="panel panel-default">
		<div class="panel-heading "> 
			<h1 class="titre" style="font-weight:bold;color:red">
				voulez-vous utlisez le systeme de recherche rapide !!!
			</h1>
		</div>
		<div class="panel-body"style="background-color:black;margin-bottom:60px">

			<form class="form-horizontal" method="post" action="gestion_commande.php">
				<div class="col-xs-10 col-xs-offset-2">
					<div class="form-group col-xs-6">
						<input class="form-control"  type="text" name="rech"  data-toggle="tooltip" data-placement="left" title="Tooltip on left" placeholder="entrez une information de la classe a rechercher!!!">
					</div> 
					<div class="form-group col-xs-2">
						<input type="submit" name="consult_rech" class="btn btn-default btn-primary" value="RECHERCHER" />
					</div>
				</div>
				<div class="col-xs-11 col-xs-offset-1 ">
					<div class="row">
						<div class="form-group">
							<label for="critere" class="col-xs-offset-1 col-xs-3 c control-label">
								CRITERE DE RECHERCHE :
							</label>
							
							<div class="radio col-xs-1">
								<label class="c">
									<input type="radio" name="critere" id="option2" value="id_commande" required>
									ID
								</label>
							</div>

							<div class="radio col-xs-1">
								<label class="c">
									<input type="radio" name="critere" id="option3" value="login" required>
									LOGIN DU CLIENT
								</label>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php

if(isset($_POST['consult_rech']))
{
	if(isset($_POST['rech']) && !empty($_POST['rech']) && isset($_POST['critere']) && !empty($_POST['critere']))
	{
		$input_rech = strip_tags($_POST['rech']);
		$radio_rech = strip_tags($_POST['critere']);
		$req_rech1 = $bdd -> prepare('SELECT * FROM commande WHERE '.$radio_rech.'=? and trait_commande=?');
		$req_rech1 -> execute(array($input_rech,"non_traité"));
		
		$req_rech2 = $bdd -> prepare('SELECT * FROM commande WHERE '.$radio_rech.'=? and trait_commande=?');
		$req_rech2 -> execute(array($input_rech,"traité"));
		$i=0;
		$j=0;
		$k=0;
		while($res1 = $req_rech1 -> fetch())
		{
			if ($i==0) 
			{
		?>
		<h2 class="text-center">LES COMMANDES NON TRAITES</h2>
		<table class="table table-bordered table-compressed text-center table-hover">
			<thead>
				<tr>
					<th>ID COMMANDE</th>
					<th>LOGIN DU CLIENT</th>
					<th>DATE COMMANDE</th>
					<th>TOTALCOMMANDE</th>
					<th>ETAT COMMANDE</th>
					<th>CONSULTER INFO</th>
					<th>VALIDER COMMANDE</th>
					<th>SUPPRESSION</th>
				</tr>
			</thead>
			<?php
			}
			?>
			<tbody>
				<tr>
					<td > <div><?php echo ($res1['id_commande']); ?></div> </td>
					<td > <div><?php echo ($res1['login']); ?></div> </td>
					<td > <div><?php echo ($res1['date_commande']); ?></div> </td>
					<td > <div><?php echo ($res1['total_commande']); ?></div> </td>
					<td > <div><?php echo ($res1['trait_commande']); ?></div> </td>
					<td ><a href="info_commane.php?idc=<?php echo $res1['id_commande']; ?>"><button class="btn btn-default btn-primary "> CONSULTER INFO </button></a></td>
					<td ><button class="btn btn-default btn-warning " onclick="valider(<?php echo $res1["id_commande"]; ?>)"> VALIDER COMMANDE </button></td>
					<td ><button class="btn btn-default btn-danger " onclick="supprimer('<?php echo $res1["id_commande"]; ?>')"> SUPPRIMER COMMANDE </button></td>
				</tr>
				</tbody>
		<?php
		$k++;
		$i++;
		}
		?>
		</table><?php


		while($res2 = $req_rech2 -> fetch())
		{
			if ($j==0) 
			{
		?>
		<h2 class="text-center">LES COMMANDES TRAITES</h2>
		<table class="table table-bordered table-compressed text-center table-hover">
			<thead>
				<tr>
					<th>ID COMMANDE</th>
					<th>LOGIN DU CLIENT</th>
					<th>DATE COMMANDE</th>
					<th>TOTALCOMMANDE</th>
					<th>ETAT COMMANDE</th>
					<th>CONSULTER INFO</th>
					

					<th>SUPPRESSION</th>
				</tr>
			</thead>
			<?php
			}
			?>
			<tbody>
				<tr>
					<td > <div><?php echo ($res2['id_commande']); ?></div> </td>
					<td > <div><?php echo ($res2['login']); ?></div> </td>
					<td > <div><?php echo ($res2['date_commande']); ?></div> </td>
					<td > <div><?php echo ($res2['total_commande']); ?></div> </td>
					<td > <div><?php echo ($res2['trait_commande']); ?></div> </td>
					<td ><a href="info_commande.php?idc=<?php echo ($res2['id_commande']); ?>"><button class="btn btn-default btn-primary "> CONSULTER INFO </button></a></td>
					<td ><button class="btn btn-default btn-danger " onclick="supprimer('<?php echo $res2["id_commande"]; ?>')"> SUPPRIMER COMMANDE </button></td>
				</tr>
				</tbody>
		<?php
		$j++;
		$k++;
		}
		?>
		</table><?php
		if ($k==0) 
		{
			echo('<script>alert("l\'enregistrement que vous avez demander n\'existe pas !!!");</script>');
		}



	}
	else
	{
		echo('<script>alert("vous n\'avez rien ecrit !!!");</script>');
	}
}
else
{
?>
<h2 class="text-center">LES COMMANDES NON TRAITES</h2>

<table class="table table-bordered table-compressed text-center table-hover">
	<thead>
		<tr>
			<th>ID COMMANDE</th>
			<th>LOGIN DU CLIENT</th>
			<th>DATE COMMANDE</th>
			<th>TOTALCOMMANDE</th>
			<th>ETAT COMMANDE</th>
			<th>CONSULTER INFO</th>
			<th>VALIDER COMMANDE</th>
			<th>SUPPRESSION</th>
		</tr>
	</thead>
	<tbody>
<?php
	while ($ligne = $req -> fetch()) {
?>		
	<tr>
		<td > <div><?php echo ($ligne['id_commande']); ?></div> </td>
		<td > <div><?php echo ($ligne['login']); ?></div> </td>
		<td > <div><?php echo ($ligne['date_commande']); ?></div> </td>
		<td > <div><?php echo ($ligne['total_commande']); ?></div> </td>
		<td > <div><?php echo ($ligne['trait_commande']); ?></div> </td>
		<td ><a href="info_commande.php?idc=<?php echo $ligne['id_commande']; ?>"><button class="btn btn-default btn-primary "> CONSULTER INFO </button></a></td>
		<td ><button class="btn btn-default btn-warning " onclick="valider(<?php echo $ligne["id_commande"]; ?>)"> VALIDER COMMANDE </button></td>
		<td ><button class="btn btn-default btn-danger " onclick="supprimer(<?php echo $ligne["id_commande"]; ?>)"> SUPPRIMER COMMANDE </button></td>
	</tr>
<?php
	}
?>
</tbody>
</table>

<script id="scriptCMD"></script>
<h2 class="text-center">LES COMMANDES TRAITES</h2>

<table class="table table-bordered table-compressed text-center table-hover">
	<thead>
		<tr>
			<th>ID COMMANDE</th>
			<th>LOGIN DU CLIENT</th>
			<th>DATE COMMANDE</th>
			<th>TOTALCOMMANDE</th>
			<th>ETAT COMMANDE</th>
			<th>CONSULTER INFO</th>
			<th>SUPPRESSION</th>
		</tr>
	</thead>
	<tbody>
<?php
	while ($ligne = $req2 -> fetch()) {
?>		
		<tr>
			<td > <div><?php echo ($ligne['id_commande']); ?></div> </td>
			<td > <div><?php echo ($ligne['login']); ?></div> </td>
			<td > <div><?php echo ($ligne['date_commande']); ?></div> </td>
			<td > <div><?php echo ($ligne['total_commande']); ?></div> </td>
			<td > <div><?php echo ($ligne['trait_commande']); ?></div> </td>
			<td ><a href="info_commande.php?idc=<?php echo ($ligne['id_commande']); ?>"><button class="btn btn-default btn-primary "> CONSULTER INFO </button></a></td>
			<td ><button class="btn btn-default btn-danger " onclick="supprimer(<?php echo $ligne["id_commande"]; ?>)"> SUPPRIMER COMMANDE </button></td>
		</tr>
<?php
	}
?>
</tbody>
</table>

	<form id="form" style="display:none" method="post">
		<input name="idu" value="">
	</form>
	<script>
	/*
	function consulter(idc){
		var sc = document.createElement("scriptCMD");
		sc.setAttribute("src","info_commande.php?idc="+reference);
		document.body.appendChild(sc);
	}
	*/
	</script>
	<script>
	function supprimer(reference)
	{
		var sur = confirm("etes vous sur de supprimer cette commande ???");
		if(sur)
			{
				var formulaire = document.getElementById("form");
				formulaire.setAttribute("action","suppression_commande.php");
				formulaire.idu.setAttribute("value",reference);
				setTimeout(function(){formulaire.submit();},500);	
			}
	}


	function valider(reference)
	{
		var sur = confirm("etes vous sur de valider cette commande ???");
		if(sur)
			{
				var formulaire = document.getElementById("form");
				formulaire.setAttribute("action","valider_commande.php");
				formulaire.idu.setAttribute("value",reference);
				setTimeout(function(){formulaire.submit();},500);	
			}	
	}


	</script>
<?php
}


if (isset($_SESSION['trait_commande_reussit'])) 
{
	echo ('<script>alert("validation reussite!!!");</script>');
	unset($_SESSION['trait_commande_reussit']);
}

if (isset($_SESSION['supp_commande_reussit'])) 
{
	echo ('<script>alert("suppression reussite!!!");</script>');
	unset($_SESSION['supp_commande_reussit']);
}


}else{
	include('webmaster.php');
}
?>
