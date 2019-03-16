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
<div class="row  text-center c"> 
	<div class="col-xs-12  ">
		<div class="panel panel-default">
			<div class="panel-heading "> 
				<h1 class="titre" style="font-weight:bold;color:red">
					VOICI LE FORMULAIRE D'AJOUT DES CATEGORIES !!!
				</h1>
			</div>
			<div class="panel-body"style="background-color:black;">
				<form class="form-horizontal text-center" id="formulaire" class="form-horizontal"style="margin-top:30px" method="post" action="gestion_categorie.php">


					<div class="col-xs-12">
						<div class="form-group">
							<label for="categorie" class="col-xs-4 control-label">
								NOM CATEGORIE : 
							</label>
							<div class="col-xs-4">
								<input type="text"  required class="form-control" id="ref" placeholder="le nom de la categorie ex : laptop" name="categorie"  patern="[a-zA-Z0-9]"data-toggle="tooltip" data-placement="left" title="Tooltip on left">
							</div>
						</div>
					</div>

					<div class="col-xs-12">
						<div class="form-group">
							<label for="classe" class="col-xs-4 control-label">
								NOM CLASSE : 
							</label>

							<div class="col-xs-4">
								<select class="form-control"  name="classe">
								<?php
								include('try.php');
								$req = $bdd -> query('SELECT * FROM classe');
								while ($donnee = $req -> fetch()) 
								{
								
								?>
								<option class="form-control" id="categorie" value="<?php echo ($donnee['nom_classe']); ?>" placeholder="la classe du produit ex : informatique" required data-toggle="tooltip" data-placement="left" title="Tooltip on left">
									<?php
										echo ($donnee['nom_classe']);
									?>
								</option>
								<?php } ?>
							</select>	
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="col-xs-12">
							<div class="form-group">
								<button class="btn btn-default btn-primary" name="btn_ajout2"> AJOUTER CATEGORIE </button>	
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<?php

if (isset($_POST['btn_ajout2'])) 
{
	if (isset($_POST['categorie']) && !empty($_POST['categorie']) && isset($_POST['classe']) && !empty($_POST['classe'])) 
	{
		$categorie = strip_tags($_POST['categorie']);
		$classe = strip_tags($_POST['classe']);
		$ins = $bdd -> prepare('SELECT * FROM categorie WHERE nom_categorie =?');
		$ins -> execute(array($categorie));
		$l = $ins -> fetch();
		if (count($l['nom_categorie'])==0) 
		{
			$ins225 = $bdd -> prepare('SELECT * FROM classe WHERE nom_classe =?');
			$ins225 -> execute(array($classe));
			$l22 = $ins225 -> fetch();
			$idc = $l22['id_classe'];

			$req = $bdd -> prepare('INSERT INTO categorie(nom_categorie,id_classe) VALUES(?,?)');
			$req -> execute(array($categorie,$idc));
			echo "<script>alert('la categorie est ajoutée !!!');</script>";
		}
		else
		{
			echo "<script>alert('erreur, cette categorie existe déja !!!');</script>";
		}
	}
	else
	{
		echo "<script>alert('erreur, nom de categorie non trouvé !!!');</script>";
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

			<form class="form-horizontal" method="post" action="gestion_categorie.php">
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
									<input type="radio" name="critere" id="option2" value="id_categorie" required>
									ID
								</label>
							</div>

							<div class="radio col-xs-1">
								<label class="c">
									<input type="radio" name="critere" id="option3" value="nom_categorie" required>
									NOM
								</label>
							</div>
							<div class="radio col-xs-1">
								<label class="c">
									<input type="radio" name="critere" id="option3" value="nom_classe" required>
									CLASSE
								</label>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>



<div class="calque" id="calqueM" style="display:none;">
		<div class="ta9">
			<div><div class="Titre">FORMULAIRE DE MODIFICATION</div><div class="x" style="display:none">X</div></div>
			<div>
				<form method="post" id="formM" action="modifier_categorie.php">
					<input name="ref" value="" type="hidden">
					<table class="table table-bordered table-hover">

						<tr>
							<td>NOM</td>
							<td><input type="text" name="nom_cat" id="nom_cat"></td>
						</tr>
	
					</table>
	            <div class="action2 "><button type="button" class="btn btn-default btn-primary" onClick="fermerCalqueM()">FERMER</button><button type="submit" class="btn btn-default btn-primary">MODIFIER</button></div>
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
		$req_rech = $bdd -> prepare('SELECT * FROM classe INNER JOIN categorie ON categorie.id_classe = classe.id_classe WHERE '.$radio_rech.'=?');
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
					<td > <div><?php echo ($res['id_categorie']); ?></div> </td>
					<td > <div><?php echo ($res['nom_categorie']); ?></div> </td>
					<td ><button class="btn btn-default btn-warning " onclick="modifier('<?php echo $res["id_categorie"]; ?>')"> MODIFIER CATEGORIE </button></td>
					<td ><button class="btn btn-default btn-danger " onclick="supprimer('<?php echo $res["id_categorie"]; ?>')"> SUPPRIMER CATEGORIE </button></td>
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
			<th>ID CATEGORIE</th>
			<th>NOM CATEGORIE</th>
			<th>ID CLASSE</th>
			<th>MODIFICATION</th>
			<th>SUPPRESSION</th>
		</tr>
	</thead>
	<tbody>
<?php
			$req225 = $bdd -> prepare('SELECT * FROM categorie');
			$req225 -> execute(array());
			while ($ligne = $req225 -> fetch()) 
			{
			?>
		<tr>
			<td > <div><?php echo ($ligne['id_categorie']); ?></div> </td>
			<td > <div><?php echo ($ligne['nom_categorie']); ?></div> </td>
			<td > <div><?php echo ($ligne['id_classe']); ?></div> </td>
			<td ><button class="btn btn-default btn-warning " onclick="modifier('<?php echo $ligne["id_categorie"]; ?>')"> MODIFIER CATEGORIE </button></td>
			<td ><button class="btn btn-default btn-danger " onclick="supprimer('<?php echo $ligne["id_categorie"]; ?>')"> SUPPRIMER CATEGORIE </button></td>
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
		var sur = confirm("etes vous sur de supprimer cette categorie ???");
		if(sur)
			{
				var formulaire = document.getElementById("form");
				formulaire.setAttribute("action","suppression_categorie.php");
				formulaire.idu.setAttribute("value",reference);
				setTimeout(function(){formulaire.submit();},500);	
			}
	}

function modifier(reference){
			var sc = document.createElement("script");
			sc.setAttribute("src","info_categorie.php?idu="+reference);
			document.body.appendChild(sc);
		}



	function afficherM(Tab,reference){
			var calque = document.getElementById("calqueM");
			var formM  = document.getElementById("formM");
			
			calque.style.display = "block";
			formM.nom_cat.value = Tab;
			formM.ref.value = reference;

		}

		function fermerCalqueM(){
		calque = document.getElementById("calqueM");
		calque.style.display = "none";
	}
		
</script>


<?php
		if(isset($_SESSION['modif_cat_reussit']))
		{
			echo('<script>alert("modification reussite");</script>');
			unset($_SESSION['modif_cat_reussit']);
		}
		if(isset($_SESSION['erreur_modif_cat_gle']))
		{
			echo('<script>alert("erreur !!! vous n\'avez pas ecrit tous les champs");</script>');
			unset($_SESSION['erreur_modif_cat_gle']);
		}

		if (isset($_SESSION['supp_cat_reussit'])) 
		{
			echo('<script>alert("suppression reussite");</script>');
			unset($_SESSION['supp_cat_reussit']);
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