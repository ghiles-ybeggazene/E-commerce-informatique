<?php
session_start();
if($_SESSION['login'] == 'GIL_INFORMATIQUE')
{
	include('barre_menu_admin.php');
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
	}/*
	.action2 button{
		background: #00f;
		color: #fff;
		font-weight: bold;
		border: 2px solid #000;
	}*/
	.c{
		color:red;
	}
	</style>
		<title>GESTION CLIENT</title>
		<body>
	<div class="calque" id="calque1" style="display:none">
		<div class="ta9">
			<div><div class="Titre">Titre Azul</div><div class="x" style="display:none">X</div></div>
			<div>
	        	<table width="100%">
	            	<tr>
	                	<td>NOM :</td>
	                	<td id="nom"></td>
	                </tr>
	                <tr>
	                	<td>PRENOM :</td>
	                	<td id="prenom"></td>
	                </tr>
	                <tr>
	                	<td>ADRESSE :</td>
	                	<td id="adresse"></td>
	                </tr>
	                <tr>
	                	<td>TELEPHONE :</td>
	                	<td id="tel"></td>
	                </tr>
					<tr>
	                	<td>EMAIL :</td>
	                	<td id="email"></td>
	                </tr>
					<tr>
	                	<td>DATE DE NAISSANCE :</td>
	                	<td><span id="age"></span></td>
	                </tr>
					<tr>
	                	<td>SEXE :</td>
	                	<td id="sexe"></td>
	                </tr>
	                <tr>
	                	<td>LOGIN :</td>
	                	<td id="login"></td>
	                </tr>
	                <tr>
	                	<td>PASSWORD :</td>
	                	<td id="password"></td>
	                </tr>
	            </table>
	            <div class="action2 "><button class="btn btn-default btn-primary" onClick="fermerCalque()">FERMER</button></div>
	        </div>
		</div>
	</div>

	<?php
	include("try.php");

	$req = $bdd -> query("SELECT * FROM client");?>
	<div class="row  text-center " style="margin-top:60px"> 
		<div class="panel panel-default">
			<div class="panel-heading "> 
				<h1 class="titre" style="font-weight:bold;color:red">
					voulez-vous utlisez le systeme de recherche rapide !!!
				</h1>
			</div>
			<div class="panel-body"style="background-color:black;">
	
				<form class="form-horizontal" style="margin-top:30px" method="post" action="gestion_client.php">
					<div class="col-xs-10 col-xs-offset-2">
						<div class="form-group col-xs-6">
							<input class="form-control"  type="text" name="rech"  data-toggle="tooltip" data-placement="left" title="Tooltip on left" placeholder="entrez une information du client a rechercher!!!">
						</div> 
						<div class="form-group col-xs-2">
							<input type="submit" name="consult_rech" class="btn btn-default btn-primary" value="RECHERCHER" />
						</div>
					</div>
					
					<div class="col-xs-12 ">
						<div class="row">
							<div class="form-group">
								<label for="critere" class="col-xs-3 c control-label">
									CRITERE DE RECHERCHE :
								</label>
								<div class="radio col-xs-1">
									<label class="c">
										<input type="radio"  name="critere" id="option1" value="nom" required>
										NOM
									</label>
								</div>
								<div class="radio col-xs-1">
									<label class="c">
										<input type="radio" name="critere" id="option2" value="prenom" required>
										PRENOM
									</label>
								</div>

								<div class="radio col-xs-1">
									<label class="c">
										<input type="radio" name="critere" id="option3" value="id" required>
										ID
									</label>
								</div>

								<div class="radio col-xs-1">
									<label class="c">
										<input type="radio" name="critere" id="option4" value="login" required>
										LOGIN
									</label>
								</div>


								<div class="radio col-xs-1">
									<label class="c">
										<input type="radio" name="critere" id="option5" value="tel" required>
										TELEPHONE
									</label>
								</div>

								<div class="radio col-xs-1">
									<label class="c">
										<input type="radio" name="critere" id="option6" value="email" required>
										EMAIL
									</label>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<form id="form" style="display:none" method="post">
		<input name="idu" value="">
	</form>

	<?php

	if(isset($_POST['consult_rech']))
	{
		if(isset($_POST['rech']) && !empty($_POST['rech']) && isset($_POST['critere']) && !empty($_POST['critere']))
		{
			$input_rech = strip_tags($_POST['rech']);
			$radio_rech = strip_tags($_POST['critere']);
			$req_rech = $bdd -> prepare('SELECT * FROM client WHERE '.$radio_rech.'=?');
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
						<th>ID</th>
						<th>NOM</th>
						<th>PRENOM</th>
						<th>ADRESSE</th>
						<th>TELEPHONE</th>
						<th>EMAIL</th>
						<th>LOGIN</th>
						<th>PASSWORD</th>
						<th>DATE DE <br>NAISSANCE</th>
						<th>SEXE</th>
						<th>SUPPRESSION</th>
					</tr>
				</thead>
				<?php
				}
				?>
			<tbody>
				<tr>
					<td> <?php echo ($res['id']); ?> </td>
					<td> <?php echo ($res['nom']); ?> </td>
					<td> <?php echo ($res['prenom']); ?> </td>
					<td> <?php echo ($res['adresse']); ?> </td>
					<td> <?php echo ($res['tel']); ?> </td>
					<td> <?php echo ($res['email']); ?> </td>
					<td> <?php echo ($res['login']); ?> </td>
					<td> <?php echo ($res['password']); ?> </td>
					<td> <?php echo ($res['date_naiss']); ?> </td>
					<td> <?php echo ($res['sexe']); ?> </td>
					<td><button class="btn btn-default  btn-danger" onclick="supp(<?php echo $res['id']; ?>)"> SUPPRIMER CLIENT </button></td>
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
				<th>NOM</th>
				<th>PRENOM</th>
				<th>INFORMATION</th>
				<th> SUPPRESSION</th>
			</tr>
		</thead>
		<tbody>
		<?php while($req1 = $req -> fetch())
		{
			?>
			<tr>
			<td> <?php echo ($req1['nom']); ?> </td>
			<td> <?php echo ($req1['prenom']); ?> </td>
			<td><button class="btn btn-default btn-primary" onclick="profile(<?php echo $req1['id']; ?>)"> CONSULTER INFO </button></td>
			<td><button class="btn btn-default  btn-danger" onclick="supp(<?php echo $req1['id']; ?>)"> SUPPRIMER CLIENT </button></td>
			</tr>
			
			<?php
		}
	}
		?>
		</tbody>
	</table>

	<script>
	function supp(idu){
		var sur = confirm("etes vous sur de supprimer ce client ???");
		if(sur)
		{
			form = document.getElementById("form");
			form.setAttribute("action","suppression_client.php");
			form.idu.setAttribute("value",idu);
			setTimeout(function(){form.submit();},500);
		}
	}
	function profile(idu){
		var sc = document.createElement("script");
		sc.setAttribute("src","info_client.php?idu="+idu);
		document.body.appendChild(sc);
	}
	function afficherProfile(Tab){
		var calque = document.getElementById("calque1");
		calque.style.display = "block";
		var Titre = document.querySelector("#calque1 .Titre");
		Titre.innerHTML = "Profile de Client N° "+Tab.id;
		var nom = document.getElementById("nom");
		nom.innerHTML = Tab.nom;

		var prenom = document.getElementById("prenom");
		prenom.innerHTML = Tab.prenom;

		var adresse = document.getElementById("adresse");
		adresse.innerHTML = Tab.adresse;

		var tel = document.getElementById("tel");
		tel.innerHTML = Tab.tel;

		var login = document.getElementById("login");
		login.innerHTML = Tab.login;

		var password = document.getElementById("password");
		password.innerHTML = Tab.password;

		var email = document.getElementById("email");
		email.innerHTML = Tab.email;

		var age = document.getElementById("age");
		age.innerHTML = Tab.age;

		var sexe = document.getElementById("sexe");
		sexe.innerHTML = Tab.sexe;

	}
	function fermerCalque(){
		calque = document.getElementById("calque1");
		calque.style.display = "none";
	}
	</script>
<?php

if (isset($_SESSION['supp_client_reussit'])) {
	echo('<script>alert("suppression reussite!!!")</script>');
	$_SESSION['supp_client_reussit'];
}

}
else
{
	header('location:webmaster.php');
}
?>

</body>
</html>
