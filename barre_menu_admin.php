<?php 
?><meta charset='utf-8'><?php
if (isset($_SESSION['login'])) 
{
	if ($_SESSION['login']=='GIL_INFORMATIQUE') 
	{
		include('try.php');
?>

<!DOCTYPE html >
<html >
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="doc/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="laga1.css"/>
</head>
	<body>
		<div class="container header3  im3  "  >
			<nav class="navbar-default navbar    " >
			    <div class="container-fluid " >
				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse navbar-default navbar-fixed-top" >
					    <div class="row ">
						    <div class="col-xs-9">
						      <ul class="nav navbar-nav    ">
						      		<!--<li ><a href="admin.php" class="a1"><span class="glyphicon glyphicon-star"></span> ACCUEIL <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ADMIN </a></li>-->
							        <li ><a href="gestion_produit.php" class="a1"><span class="glyphicon glyphicon-star"></span> GESTION <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PRODUIT </a></li>
							        <li ><a href="gestion_commande.php"class="a1"><span class="glyphicon glyphicon-star"></span> GESTION <br> &nbsp;&nbsp;COMMANDE </a></li>
							        <li ><a href="gestion_message.php"class="a1"><span class="glyphicon glyphicon-star"></span> GESTION <br> &nbsp;&nbsp;&nbsp;&nbsp;MESSAGE </a></li> 
							        <li ><a href="gestion_promotion.php"class="a1"><span class="glyphicon glyphicon-star"></span> GESTION <br> &nbsp;&nbsp;PROMOTION </a></li> 
							        <li ><a href="gestion_client.php"class="a1"><span class="glyphicon glyphicon-star"></span> GESTION <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLIENT </a></li>
							        <li ><a href="gestion_classe.php"class="a1"><span class="glyphicon glyphicon-star"></span> GESTION <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLASSE </a></li> 
							        <li ><a href="gestion_categorie.php"class="a1"><span class="glyphicon glyphicon-star"></span> GESTION <br>&nbsp;&nbsp;CATEGORIE </a></li>  
						       		<li ><a href="gestion_profil.php"class="a1"><span class="glyphicon glyphicon-star"></span> MON <br>&nbsp;PROFIL </a></li>  
						       </ul>    
					     	</div>
					     	<div class="col-xs-2 pull-right"style="border-left:1px solid black;">
							    <h3 style="color:red;margin-top:0px;margin-left:-10px;"><?php echo "ADMINISTRATEUR"?></h3>
							    <div class="text-center">
							    	<a href="deconnexion_admin.php" style="color:black;">
								    	<button name="deconnexion"style="margin-top:-10px;">
									  		<span class="glyphicon glyphicon-off" > </span> Deconnexion 
								 		</button> 
							 		</a>
							 	</div>
							</div> 
				    	</div>  
			        </div><!-- /.navbar-collapse -->
	   	    	</div>
	   	    </nav>
		</div><!-- /.container-fluid -->

		 <div class="container header1 im1 ">
			  <div class="text-right">
				  <img src=""/>
				  <img src=""/>
				  <img src=""/> 
			  </div>
		 </div>
		 <div class="container header2 im2 ">
			<div class="row">
				<div class="col-lg-12 text-center">
					<a href="#"data-toggle="modal" data-target="#image2"><img src="imgsite/logo.png" ></a>
				</div>
			</div>
		 </div>
		 <div class="container header1 im1 ">
			  <div class="text-right">
			  
			  </div>
		 </div>
	<script type="text/javascript" src="doc/js/jquery-2.1.3.min.js"> </script>	
	<script type="text/javascript" src="doc/js/monscript.js"></script>
	<script type="text/javascript" src="doc/js/bootstrap.js"></script>
</body>
</html>

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