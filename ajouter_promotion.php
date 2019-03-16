<?php
session_start();
if (isset($_SESSION['login'])) 
{
	if ($_SESSION['login']=='GIL_INFORMATIQUE') 
	{
		include('barre_menu_admin.php');

?>
<title>AJOUTER UNE PROMOTION</title>
<style type="text/css">
	label{
		color:red;
	}
	span.erreur{
		color:blue;	
	}

</style>
<div class="row  text-center fm1"> 
	<div class="col-xs-12  fm">
		<div class="panel panel-default">
			<div class="panel-heading "> 
				<h1 class="titre" style="font-weight:bold;color:red">
					VOICI LE FORMULAIRE D'AJOUT DES PROMOTIONS !!!
				</h1>
			</div>
			<div class="panel-body"style="background-color:black;">
				<form id="formulaire" class="form-horizontal"style="margin-top:30px" method="post" action="control_ajout_promotion.php">
					<div class="col-xs-12">
						<div class="form-group">
							<label for="ref" class="col-xs-2 control-label">
								REFERENCE : 
							</label>
							<div class="col-xs-4">
								<input type="text"  required class="form-control" id="ref" placeholder="la reference de la promotion ex : s2009" name="ref"  patern="[a-zA-Z0-9]"data-toggle="tooltip" data-placement="left" title="Tooltip on left">
							</div>
							<div class="col-xs-6"> 
								<span id="erreur_ref" class="erreur"></span>
							</div>
						</div>
					</div>

					<div class="col-xs-12">
						<div class="form-group">
							<label for="categorie" class="col-xs-2 control-label">
								CATEGORIE : 
							</label>

							<div class="col-xs-4">
								<select class="form-control"  name="categorie">
								<?php
								include('try.php');
								$req = $bdd -> query('SELECT classe.*, categorie.* FROM classe INNER JOIN categorie ON classe.id_classe = categorie.id_classe');
								while ($donnee = $req -> fetch()) {
								
								?>
								<option class="form-control" id="categorie" value="<?php echo ($donnee['nom_categorie']); ?>" placeholder="la categorie de la promotion ex : laptop" required data-toggle="tooltip" data-placement="left" title="Tooltip on left">
									<?php
										echo ($donnee['nom_categorie']);
									?>
								</option>
								<?php } ?>
							</select>	
							</div>
							<div class="col-xs-6"> 
								<span id="erreur_categorie" class="erreur"></span>
							</div>
						</div>
					</div>

					<div class="col-xs-12">
						<div class="form-group">
							<label for="prix" class="col-xs-2 control-label">
								PRIX : 
							</label>

							<div class="col-xs-4">
								<input type="number" class="form-control" min="0" id="prix" placeholder="le prix de la promotion ex : 25000" name="prix" required patern="[0-9]+" data-toggle="tooltip" data-placement="left" title="Tooltip on left">
							</div>
							<div class="col-xs-6"> 
								<span id="erreur_prix" class="erreur"></span>
							</div>
						</div>
					</div>

					<div class="col-xs-12">
						<div class="form-group">
							<label for="information" class="col-xs-2 control-label">
								INFORMATION : 
							</label>

							<div class="col-xs-4">
								<textarea class="form-control" id="information" placeholder="les informations suplementaires sur ce promotion " name="information" "data-toggle="tooltip" data-placement="left" title="Tooltip on left"></textarea>
							</div>
							<div class="col-xs-6"> 
								<span id="erreur_information" class="erreur"></span>
							</div>
						</div>
					</div>

					<div class="col-xs-12">
						<div class="form-group">
							<label for="image" class="col-xs-2 control-label">
								IMAGE : 
							</label>

							<div class="col-xs-4">
								<input type="text" class="form-control" id="image" placeholder="definir le chemin relatif de limage" name="image" required patern="[a-zA-Z0-9]"data-toggle="tooltip" data-placement="left" title="Tooltip on left">
								<span id="helpBlock" style="color : yellow;" class="help-block">
									exemple : sans prix/informatique/laptop.jpg
								</span>
							</div>
							<div class="col-xs-6"> 
								<span id="erreur_image" class="erreur"></span>
							</div>
						</div>
					</div>

					<div class="col-xs-12">
						<div class="form-group">
							<label for="quantite" class="col-xs-2 control-label">
								QUANTITE : 
							</label>

							<div class="col-xs-4">
								<input type="number" class="form-control" min="1" id="quantite" placeholder="definir la quantite de la promotion ex : 10" name="quantite" required patern="[a-zA-Z0-9]"data-toggle="tooltip" data-placement="left" title="Tooltip on left">
							</div>
							<div class="col-xs-6"> 
								<span id="erreur_quantite" class="erreur"></span>
							</div>
						</div>
					</div>
				</form>
				<div class="col-xs-offset-2 col-xs-4">
					<button id="form_valid" class="btn btn-primary btn_default" onclick="verifier();" name="btn_ajout" id="btn_ajout">AJOUTER</button>
				</div>
			</div> 
		</div>					 
	</div> 
</div>
<script type="text/javascript">
function verifier()
{
	var formulaire = document.getElementById("formulaire");
	
	var err_ref = document.getElementById("erreur_ref");
	var err_categorie = document.getElementById("erreur_categorie");
	var err_image = document.getElementById("erreur_image");
	var err_information = document.getElementById("erreur_information");
	var err_qte = document.getElementById("erreur_quantite");
	var err_prix = document.getElementById("erreur_prix");
	var bool = 0;
	
	if(formulaire.ref.value =='')
	{
		err_ref.innerHTML += "merci de completer le champs reference !!!</br>";
		bool++;
	}
	
	/*
    if(!formulaire.categorie.checked)
	{
		err_categorie.innerHTML += "merci de completer le champs categorie !!!</br>";
		bool++;
	}
    */
	
	if(formulaire.prix.value=='')
	{
		err_prix.innerHTML += "merci de completer le champs prix !!!</br>";
		bool++;
	}
	
	if(formulaire.prix.value.isNaN)
	{
		err_prix.innerHTML += "le champs prix doit etre une valeur numerique !!!</br>";
		bool++;
	}
	
	if(formulaire.prix.value <=0 )
	{
		err_prix.innerHTML += "le champs prix doit etre positif !!!</br>";
		bool++;
	}

	/*
    if(formulaire.information.value=='')
	{
		err_information.innerHTML += "merci de completer le champs information !!!</br>";
		bool++;
	}
    */
	
        if(formulaire.image.value=='')
	{
		err_image.innerHTML += "merci de completer le champs image !!!</br>";
		bool++;
	}
    
	    if(formulaire.quantite.value=='')
	{
		err_qte.innerHTML += "merci de completer le champs quantite !!!</br>";
		bool++;
	}
    	
	if(formulaire.quantite.value.isNaN)
	{
		err_qte.innerHTML += "le champs quantite doit etre une valeur numerique !!!</br>";
		bool++;
	}
	
	if(formulaire.quantite.value <=0 )
	{
		err_qte.innerHTML += "le champs quantite doit etre positif !!!</br>";
		bool++;
	}        
	if(bool == 0)
	{
		formulaire.submit();
	}

}
</script>
<?php

if (isset($_SESSION['erreur_promo_existe'])) 
{
	echo("<script>alert('cette promotion existe deja!!!');</script>");
	unset($_SESSION['erreur_promo_existe']);
}

if (isset($_SESSION['erreur_promo_prix'])) {
	echo "<script>alert('le prix de la promotion n\'est pas compatible !!!');</script>";
	unset($_SESSION['erreur_promo_prix']);
}


if (isset($_SESSION['erreur_promo_qte'])) {
	echo "<script>alert('la quantité de la promotion n\'est pas compatible !!!');</script>";
	unset($_SESSION['erreur_promo_qte']);
}


if (isset($_SESSION['erreur_promo_remplir'])) {
	echo("<script>alert('veuillez renseignez tous les champs!!!');</script>");
	unset($_SESSION['erreur_promo_remplir']);
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