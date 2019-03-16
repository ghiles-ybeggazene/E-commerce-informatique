<?php 
	session_start();
?>
<meta charset='utf-8'>

<?php
	if (isset($_SESSION['login'])) 
	{
		if ($_SESSION['login']=='GIL_INFORMATIQUE') 
		{	


			include('barre_menu_admin.php');
			include('try.php');
			/*$req = $bdd -> prepare('SELECT * FROM classe');
			$req -> execute(array());*/
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
	.depl{
		margin-top: 60px;
	}
	.c{color:red;}

	</style>


<div class="calque" id="calqueM" style="display:none;">
		<div class="ta9">
			<div><div class="Titre">FORMULAIRE DE MODIFICATION</div><div class="x" style="display:none">X</div></div>
			<div>
				<form method="post" id="formM" action="modifier_classe.php">
					<input name="ref" value="" type="hidden">
					<table class="table table-bordered table-hover">

						<tr>
							<td>NOM</td>
							<td><input type="text" name="nom_classe" id="nom_classe"></td>
						</tr>
	
					</table>
	            <div class="action2 "><button type="button" class="btn btn-default btn-primary" onClick="fermerCalqueM()">FERMER</button><button type="submit" class="btn btn-default btn-primary">MODIFIER</button></div>
				</form>
	        </div>
		</div>
	</div>

<div class="row  text-center "> 
	<div class="col-xs-12  ">
		<div class="panel panel-default">
			<div class="panel-heading "> 
				<h1 class="titre" style="font-weight:bold;color:red">
					VOICI LE FORMULAIRE D'AJOUT DES CLASSES !!!
				</h1>
			</div>
			<div class="panel-body"style="background-color:black;">
			<form class="form-inline text-center" id="formulaire" class="form-horizontal"style="margin-top:30px" method="post" action="gestion_classe.php">
			
			<!--<div class="col-xs-offset-3 col-xs-2" >
				<div class="form-group" style="  margin-right: -45px;">
					<label for="classe" class="control-label" style="color:red;">NOM CLASSE :</label>
				</div>
			</div>-->
			<div class=" col-xs-offset-3 col-xs-2">
				<div class="form-group ">
					<input id="classe" name="classe" type="text" class="form-control" placeholder="le nom de la classe">
				</div>
			</div>
			<div class="col-xs-4">
				<div class="form-group">
					<button class="btn btn-default btn-primary" name="btn_ajout"> AJOUTER CLASSE </button>	
				</div>
			</div>
			
			
			</form>
		</div>
	</div>
</div>




<?php

if (isset($_POST['btn_ajout'])) 
{
	if (isset($_POST['classe']) && !empty($_POST['classe'])) 
	{
		$classe = strip_tags($_POST['classe']);
		$ins = $bdd -> prepare('SELECT * FROM classe WHERE nom_classe =?');
		$ins -> execute(array($classe));
		$l = $ins -> fetch();
		if (count($l['nom_classe'])==0) 
		{
			$req22 = $bdd -> prepare('INSERT INTO classe(nom_classe) VALUES(?)');
			$req22 -> execute(array($classe));
			echo "<script>alert('la classe est ajoutée !!!');</script>";

		}
		else
		{
			echo "<script>alert('erreur, cette classe existe déja !!!');</script>";
		}
	}
	else
	{
		echo "<script>alert('erreur, nom de classe non trouvé !!!');</script>";
	}
}

?>


<div class="row  text-center " style="margin-top:60px"> 
	<div class="panel panel-default">
		<div class="panel-heading "> 
			<h1 class="titre" style="font-weight:bold;color:red">
				voulez-vous utlisez le systeme de recherche rapide !!!
			</h1>
		</div>
		<div class="panel-body"style="background-color:black;margin-bottom:60px">

			<form class="form-horizontal" method="post" action="gestion_classe.php">
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
									<input type="radio" name="critere" id="option2" value="id_classe" required>
									ID
								</label>
							</div>

							<div class="radio col-xs-1">
								<label class="c">
									<input type="radio" name="critere" id="option3" value="nom_classe" required>
									NOM
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
		$req_rech = $bdd -> prepare('SELECT * FROM classe WHERE '.$radio_rech.'=?');
		$req_rech -> execute(array($input_rech));
		$i=0;
		while($res = $req_rech -> fetch())
		{
			if ($i==0) 
			{
		?>
		<table class="table table-bordered table-compressed text-center table-hover">
			<thead>
				<tr>
					<th>ID CLASSE</th>
					<th>NOM CLASSE</th>
					<th>MODIFICATION</th>
					<th> SUPPRESSION</th>
				</tr>
			</thead>
			<?php
			}
			?>
			<tbody>
				<tr>
					<td > <div><?php echo ($res['id_classe']); ?></div> </td>
					<td > <div><?php echo ($res['nom_classe']); ?></div> </td>
					<td ><button class="btn btn-default btn-warning " onclick="modifier('<?php echo $res["id_classe"]; ?>')"> MODIFIER PRODUIT </button></td>
					<td ><button class="btn btn-default btn-danger " onclick="supprimer('<?php echo $res["id_classe"]; ?>')"> SUPPRIMER PRODUIT </button></td>
				</tr>
			</tbody>
		<?php
		$i++;
		}
		?></table><?php
		if ($i==0) 
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

<table class="table table-bordered table-compressed text-center table-hover">
	<thead>
		<tr>
			<th>ID CLASSE</th>
			<th>NOM CLASSE</th>
			<th>MODIFICATION</th>
			<th>SUPPRESSION</th>
		</tr>
	</thead>
	<tbody>
<?php
			$req = $bdd -> prepare('SELECT * FROM classe');
			$req -> execute(array());
			while ($ligne = $req -> fetch()) 
			{
			?>
		<tr>
			<td > <div><?php echo ($ligne['id_classe']); ?></div> </td>
			<td > <div><?php echo ($ligne['nom_classe']); ?></div> </td>
			<td ><button class="btn btn-default btn-warning " onclick="modifier('<?php echo $ligne["id_classe"]; ?>')"> MODIFIER CLASSE </button></td>
			<td ><button class="btn btn-default btn-danger " onclick="supprimer('<?php echo $ligne["id_classe"]; ?>')"> SUPPRIMER CLASSE </button></td>
		</tr>
			<?php
			}
}
?>
	</tbody>
</table>




<form id="form" style="display:none;" method="post">
	<input name="idu" style="display:none;" value="">
</form>
<script>
	function supprimer(reference)
	{
		var sur = confirm("etes vous sur de supprimer cette classe ???");
		if(sur)
			{
				var formulaire = document.getElementById("form");
				formulaire.setAttribute("action","suppression_classe.php");
				formulaire.idu.setAttribute("value",reference);
				setTimeout(function(){formulaire.submit();},500);	
			}
	}


	function modifier(reference){
			var sc = document.createElement("script");
			sc.setAttribute("src","info_classe.php?idu="+reference);
			document.body.appendChild(sc);
		}



	function afficherM(Tab,reference){
			var calque = document.getElementById("calqueM");
			var formM  = document.getElementById("formM");
			
			calque.style.display = "block";
			formM.nom_classe.value = Tab;
			formM.ref.value = reference;

		}

		function fermerCalqueM(){
		calque = document.getElementById("calqueM");
		calque.style.display = "none";
	}



</script>









<?php

		if(isset($_SESSION['modif_classe_reussit']))
		{
			echo('<script>alert("modification reussite");</script>');
			unset($_SESSION['modif_classe_reussit']);
		}
		
		if(isset($_SESSION['erreur_modif_classe_gle']))
		{
			echo('<script>alert("erreur !!! vous n\'avez pas ecrit tous les champs");</script>');
			unset($_SESSION['erreur_modif_classe_gle']);
		}

		if (isset($_SESSION['supp_classe_reussit'])) {
			echo('<script>alert("suppression reussite!!")</script>');
			unset($_SESSION['supp_classe_reussit']);
		}

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