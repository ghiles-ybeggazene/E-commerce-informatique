<?php
session_start();
include("try.php");
if(isset($_SESSION['login']) && $_SESSION['login'] == 'GIL_INFORMATIQUE')
{

	

	?>
	<meta charset="utf-8">
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
		<body>
	<div class="calque" id="calque1" style="display:none">
		<div class="ta9">
			<div><div class="Titre">Titre Azul</div><div class="x" style="display:none">X</div></div>
			<div>
	        	<table width="100%">
	        		<tr>
	                	<td colspan="2"><img id="image" style="display:block;margin:auto;" src="" height="150px" width="150px"></td>
	                </tr>
	            	<tr>
	                	<td>CLASSE :</td>
	                	<td id="classe"></td>
	                </tr>
	                <tr>
	                	<td>CATEGORIE :</td>
	                	<td id="categorie"></td>
	                </tr>
	                <tr>
	                	<td></td>
	                	<td><span id="information"></span></td>
	                </tr>
	                <tr>
	                	<td>PRIX :</td>
	                	<td id="prix"></td>
	                </tr>
	                <tr>
	                	<td>PROMOTION :</td>
	                	<td id="promotion"></td>
	                </tr>
					<tr>
	                	<td>QUANTIITE :</td>
	                	<td id="quantite"></td>
	                </tr>
	            </table>
	            <div class="action2 "><button class="btn btn-default btn-primary" onClick="fermerCalque()">FERMER</button></div>
	        </div>
		</div>
	</div>



	<div class="calque" id="calqueM" style="display:none;">
		<div class="ta9">
			<div><div class="Titre">FORMULAIRE DE MODIFICATION</div><div class="x" style="display:none">X</div></div>
			<div>
				<form method="post" id="formM" action="modifier_promotion.php">
					<input name="ref" value="" type="hidden">
					<table class="table table-bordered table-hover">
						<tr>
							<td>CATEGORIE</td>
							<td>
							<select name="cat">
							<?php 
							$rX = $bdd -> prepare('SELECT * FROM classe');
							$rX -> execute(array());
							while($result = $rX -> fetch()){
							?>
								<optgroup label="<?php echo $result['nom_classe'];?>">
							<?php 
							$r5X = $bdd -> prepare('SELECT * FROM categorie WHERE id_classe = ?');
							$r5X -> execute(array($result['id_classe']));
							while($result2 = $r5X -> fetch()){
							?>
								<option value="<?php echo $result2['id_categorie'];?>"><?php echo $result2['nom_categorie'];?></option>
							<?php }}?>
							</select>
							</td>
						</tr>
						<tr>
							<td>INFORMATION</td>
							<td><textarea name="desc"></textarea></td>
						</tr>
						<tr>
							<td>PRIX</td>
							<td><input type="text" name="prix" value=""></td>
						</tr>
						<tr>
							<td>QUANTITE</td>
							<td><input type="text" name="qnt" value=""></td>
						</tr>
						<tr>
							<td>PROMOTION</td>
							<td><input type="text" name="promo" value=""></td>
						</tr>
						<tr>
							<td>IMAGE</td>
							<td><img src="" style="width:200px; height:200px"><br><input type="text" name="img" value=""></td>
						</tr>
					</table>
	            <div class="action2 "><button type="button" class="btn btn-default btn-primary" onClick="fermerCalqueM()">FERMER</button><button type="submit" class="btn btn-default btn-primary">MODIFIER</button></div>
				</form>
	        </div>
		</div>
	</div>


<?php
	include('barre_menu_admin.php');
?>

<div class="text-center depl"><a href="ajouter_promotion.php"><button class="btn btn-default btn-primary"> AJOUTER PROMOTION </button></a></div><br><br><br>
    <?php
	include("try.php");

	$req = $bdd -> query("SELECT categorie.*, classe.*, produit.* FROM (classe INNER JOIN categorie ON classe.id_classe = categorie.id_classe) INNER JOIN produit ON categorie.id_categorie = produit.id_categorie where promotion='oui'");?>
	
		<div class="row  text-center " style="margin-bottom:20px"> 
		<div class="panel panel-default">
			<div class="panel-heading "> 
				<h1 class="titre" style="font-weight:bold;color:red">
					voulez-vous utlisez le systeme de recherche rapide !!!
				</h1>
			</div>
			<div class="panel-body"style="background-color:black;">
	
				<form class="form-horizontal" style="margin-top:30px" method="post" action="gestion_promotion.php">
					<div class="col-xs-10 col-xs-offset-2">
						<div class="form-group col-xs-6">
							<input class="form-control"  type="text" name="rech"  data-toggle="tooltip" data-placement="left" title="Tooltip on left" placeholder="entrez une information du produit a rechercher!!!">
						</div> 
						<div class="form-group col-xs-2">
							<input type="submit" name="consult_rech" class="btn btn-default btn-primary" value="RECHERCHER" />
						</div>
					</div>
					
					<div class="col-xs-11 col-xs-offset-1 ">
						<div class="row">
							<div class="form-group">
								<label for="critere" class="col-xs-3 c control-label">
									CRITERE DE RECHERCHE :
								</label>
								
								<div class="radio col-xs-1">
									<label class="c">
										<input type="radio" name="critere" id="option2" value="nom_classe" required>
										CLASSE
									</label>
								</div>

								<div class="radio col-xs-1">
									<label class="c">
										<input type="radio" name="critere" id="option3" value="nom_categorie" required>
										CATEGORIE
									</label>
								</div>

								<div class="radio col-xs-1">
									<label class="c">
										<input type="radio" name="critere" id="option4" value="prix" required>
										PRIX
									</label>
								</div>


								<div class="radio col-xs-1">
									<label class="c">
										<input type="radio" name="critere" id="option5" value="quantite_produit" required>
										QUANTITE
									</label>
								</div>


								<div class="radio col-xs-1">
									<label class="c">
										<input type="radio"  name="critere" id="option1" value="ref_produit" required>
										REFERENCE
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
		$req_rech = $bdd -> prepare('SELECT categorie.*, classe.*, produit.* FROM (classe INNER JOIN categorie ON classe.id_classe = categorie.id_classe) INNER JOIN produit ON categorie.id_categorie = produit.id_categorie WHERE '.$radio_rech.'=? and promotion="oui"');
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
					<th>NOM</th>
					<th>PRENOM</th>
					<th>INFORMATION</th>
					<th> SUPPRESSION</th>
				</tr>
			</thead>
			<?php
			}
			?>
		<tbody>
			<tr>
				<td><img src="<?php echo ($res['image']); ?>" height="150px" width="150px"> </td>
				<td > <div class="depl"><?php echo ($res['ref_produit']); ?></div> </td>
				<td ><button class="btn btn-default btn-primary depl" onclick="consulter('<?php echo $res["ref_produit"]; ?>')"> CONSULTER INFO </button></td>
				<td ><button class="btn btn-default btn-warning depl" onclick="modifier('<?php echo $res["ref_produit"]; ?>')"> MODIFIER PROMOTION </button></td>
				<td ><button class="btn btn-default btn-danger depl" onclick="supprimer('<?php echo $res["ref_produit"]; ?>')"> SUPPRIMER PROMOTION </button></td>
			</tr>

		</tbody>
		<?php
		$i++;
		}
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
				<th>IMAGE</th>
				<th>REFERENCE</th>
				<th>INFORMATION</th>
				<th>MODIFICATION</th>
				<th>SUPPRESSION</th>
			</tr>
		</thead>
		<tbody>
		<?php while($req1 = $req -> fetch())
		{
			?>
			<tr>
				<td><img src="<?php echo ($req1['image']); ?>" height="150px" width="150px"> </td>
				<td > <div class="depl"><?php echo ($req1['ref_produit']); ?></div> </td>
				<td ><button class="btn btn-default btn-primary depl" onclick="consulter('<?php echo $req1["ref_produit"]; ?>')"> CONSULTER INFO </button></td>
				<td ><button class="btn btn-default btn-warning depl" onclick="modifier('<?php echo $req1["ref_produit"]; ?>')"> MODIFIER PROMOTION </button></td>
				<td ><button class="btn btn-default btn-danger depl" onclick="supprimer('<?php echo $req1["ref_produit"]; ?>')"> SUPPRIMER PROMOTION </button></td>
			</tr>
			
			<?php
		}
	}

		if (isset($_SESSION['supp_promo_reussi'])) 
	{
		echo('<script>alert("suppression reussite!!")</script>');
		unset($_SESSION['supp_promo_reussi']);
	}

	if (isset($_SESSION['ajt_promo_reussit'])) 
	{
		echo("<script>alert('la promotion est ajoutée!!!');</script>");
		unset($_SESSION['ajt_promo_reussit']);
	}

		if(isset($_SESSION['modif_promo_reussi']))
	{
		echo('<script>alert("modification reussite");</script>');
		unset($_SESSION['modif_promo_reussi']);
	}

	if(isset($_SESSION['err_modif_promo_prix']))
	{
		echo('<script>alert("erreur !!! le prix est une valeur numerique");</script>');
		unset($_SESSION['err_modif_promo_prix']);
	}

	if(isset($_SESSION['err_modif_promo_qte']))
	{
		echo('<script>alert("erreur !!! la quantite est une valeur numerique")</script>');
		unset($_SESSION['err_modif_promo_qte']);
	}

	if(isset($_SESSION['err_modif_promo_gle']))
	{
		echo('<script>alert("erreur !!! vous n\'avez pas ecrit tous les champs");</script>');
		unset($_SESSION['err_modif_promo_gle']);
	}
}
		?>								
		</tbody>
	</table>



	<form id="form" style="display:none" method="post">
		<input name="idu" value="">
	</form>


	<script>

		function supprimer(reference)
		{
			var sur = confirm("etes vous sur de supprimer cette promotion ???");
			if(sur)
				{
					var formulaire = document.getElementById("form");
					formulaire.setAttribute("action","suppression_promotion.php");
					formulaire.idu.setAttribute("value",reference);
					setTimeout(function(){formulaire.submit();},500);	
				}
				
		}
		function consulter(reference)
		{
		var sc = document.createElement("script");
		sc.setAttribute("src","info_promotion.php?idu="+reference);
		document.body.appendChild(sc);
		}

		function modifier(reference){
			var sc = document.createElement("script");
			sc.setAttribute("src","info_promotion.php?idu="+reference+"&mod=");
			document.body.appendChild(sc);
		}

		function afficherM(Tab){
			var calque = document.getElementById("calqueM");
			var formM  = document.getElementById("formM");
			
			calque.style.display = "block";
			formM.desc.innerHTML = Tab.information;
			formM.cat.value = Tab.id_cat;
			formM.prix.value = Tab.prix;
			formM.qnt.value = Tab.quantite;
			formM.promo.value = Tab.promotion;
			formM.ref.value = Tab.ref_produit;
			formM.img.value = Tab.image;
			
			var img = document.querySelector("#formM img");
			img.src = Tab.image;
			
		}

		function fermerCalqueM(){
		calque = document.getElementById("calqueM");
		calque.style.display = "none";
	}
		



		function afficher(Tab)
		{
		var calque = document.getElementById("calque1");
		calque.style.display = "block";
		var Titre = document.querySelector("#calque1 .Titre");
		Titre.innerHTML = "INFORMATION DU PRODUIT REF° "+Tab.ref_produit;
		
		var image = document.getElementById("image");
		image.src = Tab.image;

		var classe = document.getElementById("classe");
		classe.innerHTML = Tab.classe;

		var categorie = document.getElementById("categorie");
		categorie.innerHTML = Tab.categorie;

		var information = document.getElementById("information");
		information.innerHTML = Tab.information;

		var promotion = document.getElementById("promotion");
		promotion.innerHTML = Tab.promotion;

		var quantite = document.getElementById("quantite");
		quantite.innerHTML = Tab.quantite;

		var prix = document.getElementById("prix");
		prix.innerHTML = Tab.prix;
	}
	function fermerCalque(){
		calque = document.getElementById("calque1");
		calque.style.display = "none";
	}
		
	</script>