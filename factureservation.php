<?php 
session_start();
 


ob_start();
?>

<page>
<link rel="stylesheet" type="text/css" href="facture.css"/>
<?php
include('try.php');

$commande=$bdd->prepare('SELECT * FROM client WHERE login=?');
$commande->execute(array($_SESSION['login']));
$infoclient=$commande->fetch();

?>



<div >
     <div >
         <div ><h3 >Information du client :</h3></div>
              <div class="encadre">
                  <div class="la_marge">

                      <p>  Nom  : 	<?php echo $infoclient['nom'];?></p>
                      <p> Prenom : <?php echo $infoclient['prenom'];?></p>
                      <p>Adresse : <?php echo $infoclient['adresse'];?></p>
                      <p> Numero Client  : <?php echo $infoclient['id'];?></p>
                  </div>
            	</div>

 
		</div>

   <div  >

        <div ><h3>Information de la commande :</h3></div>
        <table >
	      
		       <tr >
		            <th>Catégorie</th>
			        <th >Information Produit</th>
			        <th>Prix unitaire (DA)</th>
			        <th>Quantité </th>
			        <th>prix total (produit) (DA)  </th>
		        </tr>
	      
     			<?php 
    				$req=$bdd->prepare('SELECT categorie.*, commande.*, panier.*, produit.*
					FROM (categorie INNER JOIN produit ON categorie.id_categorie = produit.id_categorie) 
					INNER JOIN (commande INNER JOIN panier ON commande.id_commande = panier.id_commande) 
					ON produit.ref_produit = panier.ref_produit  where commande.id_commande=? ');
					$req->execute(array($_SESSION['commande']));
					while ($res=$req->fetch()) {
					?>
					<tr><td><?php echo $res['nom_categorie']; ?></td>
    					<td><?php echo $res['information']; ?></td>
    					<td><?php echo number_format($res['prix'],2); ?></td>
    					<td><?php  echo $res['nbr_produit']; ?></td>
    					<td><?php echo number_format($res['prix']*$res['nbr_produit'],2) ;?></td>
    				</tr>

					<?php }?> 
			
		</table>
 				 
	</div>

	    <?php 
				$req=$bdd->prepare('SELECT * FROM commande where id_commande=?');
				$req->execute(array($_SESSION['commande']));
				$com=$req->fetch();
				?>
			<div ><?php echo '<strong>Commandée le :</strong> '. date($com['date_commande']);?>
			</div>

			<div ><?php echo '<strong>Le prix total :</strong> '. number_format($com['total_commande'],2).' DA';?></div>
			<div ><?php echo '<strong>Facture N° :</strong> '. $com['id_commande'];?></div>
			<div >
			<p class="couleur">NB:<ul>
<li>VOUS DEVEZ IMPERATIVEMENT RAMENER CETTE EXEMPLAIRE LORS DE 
LA RECUPERATION DE VOTRE PRODUITS COMMANDES</li>
<li> VOUS DEVEZ VOUS PRESENTER AU MAGASIN AVANT 48H DE VOTRE COMMANDE</li>
</ul>
</p>
</div>
</div>
</page>

<?php
$content = ob_get_clean();
require('pdf/class.php');
try{
$pdf= new HTML2PDF('p','A4','fr');
$pdf->pdf->SetDisplayMode('fullpage');
$pdf->writeHTML($content);
$pdf->Output('test.pdf');
}catch(html2pdf_exception $e) {
	die($e);
}?>



