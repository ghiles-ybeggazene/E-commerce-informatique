<?php

include('try.php');
$req=$bdd->prepare('SELECT produit.*, classe.*, client.*, commande.*, panier.*, categorie.*
FROM (((classe INNER JOIN categorie ON classe.id_classe = categorie.id_classe) INNER JOIN produit ON categorie.id_categorie = produit.id_categorie) INNER JOIN (commande INNER JOIN panier ON commande.id_commande = panier.id_commande) ON produit.ref_produit = panier.ref_produit) INNER JOIN client ON commande.login = client.login
WHERE commande.id_commande=? ');
$req->execute(array($_GET['idc']));
$donnee = $req -> fetch();

?>
<link rel="stylesheet" type="text/css" href="facture.css">
<link rel="stylesheet" type="text/css" href="doc/css/bootstrap.css"/>
<script type="text/javascript" src="doc/js/jquery-2.1.3.min.js"> </script>  
<script type="text/javascript" src="doc/js/bootstrap.js"></script>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>commande</title>
</head>
<body>
<div class="container" style="padding-top:60px;"><div class="row text-center"><a href="gestion_commande.php"><button class="btn btn_default btn-primary">RETOUR</button></a></div></div>

<div class="container" style="border: 1px solid black;">
<div style="margin-bottom:10px;">

<p ><img src="imgsite/logo.png" class="image"></p>
<hr/>

</div>



<div class="row">
<link rel="stylesheet" type="text/css" href="facture.css"/>




<h1  >Bon De Commande</h1>
     
         <div ><h3 >Information du client :</h3></div>
              <div class="encadre">
                  <div class="la_marge">

                      <p> <?php echo $donnee['nom']; ?> </p>
                      <p> <?php echo $donnee['prenom']; ?> </p>
                      <p><?php echo $donnee['adresse']; ?></p>
                  
                  </div>
            	</div>

 
		

   <div  >

        <div ><h3>Information de la commande :</h3></div>
        <table >
	      <thead>
		       <tr >
		            <th>Catégorie</th>
			        <th >Information Produit</th>
			        <th>Prix unitaire (DA)</th>
			        <th>Quantité </th>
			        <th>prix  produit (DA)  </th>
		        </tr>
	      </thead>
	      <tbody>
     			<?php
     			$req2=$bdd->prepare('SELECT produit.*, panier.*, categorie.*
FROM (categorie INNER JOIN produit ON categorie.id_categorie = produit.id_categorie) INNER JOIN panier ON produit.ref_produit = panier.ref_produit
WHERE panier.id_commande=?');
				$req2->execute(array($_GET['idc']));
				$pt=0;
				$tp=0;
				while ($donnee2 = $req2 -> fetch()) 
				{
     			?>
				<tr>
						<td class="ted"><?php echo $donnee2['nom_categorie']; ?></td>
    					<td class="ted1"><?php echo $donnee2['information']; ?></td>
    					<td class="ted"><?php echo $donnee2['prix']; ?></td>
    					<td class="ted"><?php echo $donnee2['nbr_produit']; $tp = $tp+$donnee2['nbr_produit'];?></td>
    					<td class="ted"><?php echo ($donnee2['nbr_produit']*$donnee2['prix']); $pt+=$donnee2['nbr_produit']*$donnee2['prix'];?></td>
    				</tr>
    			<?php
    			}
    			?>	
					
			</tbody>
			<tfoot>
			<tr>
			<td colspan="3"></td>
			<td> <p ><h5><strong>total_produits :</strong></p><?php echo $tp;?></td>
			<td class="ted1"><p  ><h5>Le prix total  </h5></p><?php echo number_format($pt);?></td>	
			</tr>	


			</tfoot>
		</table>
 				 
	</div>

	    
			
			

</div>
<hr />
<p><h4>OBSERVATION!:</h4>
<ul><h4 class="red"><li>VOUS DEVEZ IMPERATIVEMENT RAMENER CETTE EXEMPLAIRE LORS DE 
LA RECUPERATION DE VOTRE PRODUITS COMMANDES</li></h4>
 <h4 class="red"><li>VOUS DEVEZ VOUS PRESENTER AU MAGASIN AVANT 48H DE VOTRE COMMANDE</li></h4> 
</ul>
</p>
</div>
</body>
</html>
